<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Master Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/master-subscription-agreement
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2012 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/


require_once 'include/php-sql-parser.php';

/**
 * SQL Validator class
 * @api
 */
class SugarSQLValidate
{
	/**
	 * Parse SQL query WHERE and ORDER BY clauses and validate that nothing bad is happening there
	 * @param string $where
	 * @param string $order_by
	 * @return bool
	 */
	public function validateQueryClauses($where, $order_by = '')
	{
	    if(empty($where) && empty($order_by)) {
	        return true;
	    }

	    if(empty($where) && !empty($order_by)) {
	        $where = "deleted=0";
	    }

		$parser = new PHPSQLParser();
		$testquery = "SELECT dummy FROM dummytable WHERE $where";
		$clauses = 3;
		if(!empty($order_by)) {
		    $testquery .= " ORDER BY $order_by";
		    $clauses++;
		}
		$parsed = $parser->parse($testquery);
		//$GLOBALS['log']->debug("PARSE: ".var_export($parsed, true));

		if(count($parsed) != $clauses) {
		    // we assume: SELECT, FROM, WHERE, maybe ORDER
		    return false;
		}
		$parts = array_keys($parsed);
		if($parts[0] != "SELECT" || $parts[1] != "FROM" || $parts[2] != "WHERE") {
		    // check the keys to be SELECT, FROM, WHERE
		    return false;
		}
		if(!empty($order_by) && $parts[3] != "ORDER") {
		    // extra key is ORDER
		    return false;
		}
        // verify SELECT didn't change
        if(count($parsed["SELECT"]) != 1 || $parsed["SELECT"][0] !== array ('expr_type' => 'colref','alias' => '`dummy`', 'base_expr' => 'dummy', 'sub_tree' => false)) {
            $GLOBALS['log']->debug("validation failed SELECT");
            return false;
        }
        // verify FROM didn't change
        if(count($parsed["FROM"]) != 1 || $parsed["FROM"][0] !== array ('table' => 'dummytable', 'alias' => 'dummytable', 'join_type' => 'JOIN', 'ref_type' => '', 'ref_clause' => '', 'base_expr' => false, 'sub_tree' => false)) {
            $GLOBALS['log']->debug("validation failed FROM");
            return false;
        }
        // check WHERE
        if(!$this->validateExpression($parsed["WHERE"], true)) {
            $GLOBALS['log']->debug("validation failed WHERE");
            return false;
        }
        // check ORDER
        if(!empty($order_by) && !$this->validateExpression($parsed["ORDER"])) {
            $GLOBALS['log']->debug("validation failed ORDER");
            return false;
        }
		return true;
	}

	/**
	 * Prohibited functions
	 * @var array
	 */
	protected $bad_functions = array("benchmark", "encode", "sleep",
	"generate_series", "load_file", "sys_eval", "user_name",
	"xp_cmdshell", "sys_exec", "sp_replwritetovarbin");

	/**
	 * Validate parsed SQL expression
	 * @param array $expr Parsed expression
	 * @return bool
	 */
	protected function validateExpression($expr, $allow_some_subqueries = false)
	{
	    foreach($expr as $term) {
	        if(!is_array($term)) continue;
	        // check subtrees
	        if(isset($term['expr_type']) &&  $term['expr_type'] == 'subquery') {
	            if(!$allow_some_subqueries || !$this->allowedSubquery($term)) {
    	            // subqueries are verboten, except for some very special ones
    	            $GLOBALS['log']->debug("validation failed subquery");
    	            return false;
    	        }
	        } else {
        	    if(!empty($term['sub_tree']) && !$this->validateExpression($term['sub_tree'], $allow_some_subqueries)) {
                    return false;
        	    }
	        }
	        if(isset($term['type']) && $term['type'] == 'expression') {
	            continue;
	        }
	        if($term['expr_type'] == 'const' || $term['expr_type'] == 'expression') {
	            // constants are OK, expressions checked above
	            continue;
	        }
	        if($term['expr_type'] == 'function') {
	            // prohibit some functions
	            if(in_array(strtolower($term['base_expr']), $this->bad_functions)) {
	                $GLOBALS['log']->debug("validation failed function");
	                return false;
	            }
	        }
	        if($term['expr_type'] == 'colref' && !$this->validateColumnName($term['base_expr'])) {
	            // check column names
	            $GLOBALS['log']->debug("validation failed column name");
	            return false;
	        }
	        if(!empty($term['alias']) && $term['alias'] != $term['base_expr'] && $term['alias'] != "`".$term['base_expr']."`") {
	            $GLOBALS['log']->debug("validation failed alias: ".var_export($term, true));
	            return false;
	        }
	    }
	    return true;
	}

	/**
	 * Tables allowed in subqueries
	 * @var array
	 */
	protected $subquery_allowed_tables = array(
		'email_addr_bean_rel' => true,
		'email_addresses' => true,
		'emails' => true,
		'emails_beans' => true,
		'emails_text' => true,
		'teams' => true,
		'team_sets_teams' => true);

	/**
	 * Allow some subqueries to pass
	 * Needed since OPI uses subqueries for email searches... sigh
	 * @param array $term term structure of the subquery
	 */
	protected function allowedSubquery($term)
	{
	    // Must be SELECT ... FROM ... WHERE ...
	    if(empty($term['sub_tree']) || empty($term['sub_tree']['SELECT']) || empty($term['sub_tree']['FROM']) || empty($term['sub_tree']['WHERE'])) {
	        $GLOBALS['log']->debug("subquery validation failed: missing item");
	        return false;
	    }

	    foreach($term['sub_tree']['SELECT'] as $select) {
	        if($select['expr_type'] == 'operator' && $select['base_expr'] == '*') {
	            continue;
	        }
	        if($select['expr_type'] != 'colref') {
	            $GLOBALS['log']->debug("subquery validation failed: column: {$select['expr_type']}");
	            // allow only columns in select
	            return false;
	        }
	    }

	    foreach($term['sub_tree']['FROM'] as $from) {
	        if(empty($this->subquery_allowed_tables[$from['table']])) {
	            $GLOBALS['log']->debug("subquery validation failed: table: {$from['table']}");
	            // only specific tables are allowed
	            return false;
	        }
	        if(!empty($from['ref_clause']) && !$this->validateQueryClauses($from['ref_clause'])) {
                // validate join condition, if bad, bail out
                $GLOBALS['log']->debug("subquery validation failed: join: {$from['ref_clause']}");
                return false;
	        }
	    }

	    if(!$this->validateExpression($term['sub_tree']['WHERE'])) {
	        // validate where clause, no sub-subqueries allowed here
	        $GLOBALS['log']->debug("subquery validation failed: where clause");
	        return false;
	    }

	    return true;
	}

	/**
	 * validateColumnName
     * This method validates the column name portion of the SQL statement and returns true if it is deemed safe.
     * We check against querying for the user_hash column.
     *
	 * @param $name String portion of the column name from SQL
	 * @return boolean True if column name is deemed safe, false otherwise
	 */
	protected function validateColumnName($name)
	{
	    if($name == ",") return true; // sometimes , gets as column name
	    $name = strtolower($name); // case does not matter

	    $parts = explode(".", $name);
	    if(count($parts) > 2) {
	        // too many dots
	        return false;
	    }

        foreach($parts AS $part)
        {
            //the user_hash column is forbidden in passed in SQL
            if($part == "user_hash")
            {
                return false;
            }

            //Remove leading and trailing ` characters for the part
            if(preg_match('/^[\`](.+?)[\`]$/', $part, $matches))
            {
               $part = $matches[1];
            }

            //We added an exception for # symbol (see Bug 50324)
            //This should be removed when Bug 50360 is resolved
            if(preg_match('/[^a-z0-9._#]/', $part)) {
                // bad chars in name
                return false;
            }

        }

	    return true;
	}
}