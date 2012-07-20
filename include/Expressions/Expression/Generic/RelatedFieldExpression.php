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

require_once('include/Expressions/Expression/Generic/GenericExpression.php');
/**
 * <b>related(Relationship <i>link</i>, String <i>field</i>)</b><br>
 * Returns the value of <i>field</i> in the related module <i>link</i><br/>
 * ex: <i>related($accounts, "industry")</i>
 */
class RelatedFieldExpression extends GenericExpression
{
	/**
	 * Returns the entire enumeration bare.
	 */
	function evaluate() {
		$params = $this->getParameters();
        //This should be of relate type, which means an array of SugarBean objects
        $linkField = $params[0]->evaluate();
        $relfield = $params[1]->evaluate();

        if (empty($linkField)) {
            return "";
        }
        
        foreach($linkField as $id => $bean)
        {
            if (!empty($bean->field_defs[$relfield]) && isset($bean->$relfield))
            {
                if (!empty($bean->field_defs[$relfield]['type']))
                {
                    global $timedate;
                    if ($bean->field_defs[$relfield]['type'] == "date")
                    {
                        $ret = $timedate->fromDbDate($bean->$relfield);
                        if (!$ret)
                            $ret = $timedate->fromUserDate($bean->$relfield);
                        $ret->isDate = true;
                        return $ret;
                    }
                    if ($bean->field_defs[$relfield]['type'] == "datetime")
                    {
                        $ret = $timedate->fromDb($bean->$relfield);
                        if (!$ret)
                            $ret = $timedate->fromUser($bean->$relfield);
                        return $ret;
                    }
                    if ($bean->field_defs[$relfield]['type'] == "bool")
                    {
                        require_once("include/Expressions/Expression/Boolean/BooleanExpression.php");
                        if ($bean->$relfield)
                            return BooleanExpression::$TRUE;
                        else
                            return BooleanExpression::$FALSE;
                    }
                }
                return $bean->$relfield;
            }
        }
        
        return "";
	}

	/**
	 * Returns the JS Equivalent of the evaluate function.
	 */
	static function getJSEvaluate() {
		return <<<EOQ
		    var params = this.getParameters();
			var linkField = params[0].evaluate();
			var relField = params[1].evaluate();

			if (typeof(linkField) == "string" && linkField != "")
			{
                //We just have a field name, assume its the name of a link field
                //and the parent module is the current module.
                //Try and get the current module and record ID
                var module = SUGAR.forms.AssignmentHandler.getValue("module");
                var record = SUGAR.forms.AssignmentHandler.getValue("record");
                var linkDef = SUGAR.forms.AssignmentHandler.getLink(linkField);
                var linkId = false, url = "index.php?";
                
                if (linkDef && linkDef.id_name && linkDef.module) {
                    var idField = document.getElementById(linkDef.id_name);
                    if (idField && idField.tagName == "INPUT")
                    {
                        linkId = SUGAR.forms.AssignmentHandler.getValue(linkDef.id_name, false, true);
                        module = linkDef.module;
                    }
                }
                if (!module || (!record && !linkId))
                    return "";

                if (linkId && linkId != "")
                {
                    url += SUGAR.util.paramsToUrl({
                        module:"ExpressionEngine",
                        action:"getRelatedValue",
                        record_id: linkId,
                        field: relField,
                        tmodule:module
                    });
                } else {
                    url += SUGAR.util.paramsToUrl({
                        module:"ExpressionEngine",
                        action:"execFunction",
                        id: record,
                        rel_id : linkId,
                        tmodule:module,
                        "function":"related",
                        params: YAHOO.lang.JSON.stringify(['\$' + linkField, '"' + relField + '"'])
                    });
                }
                //The response should the be the JSON encoded value of the related field
                return YAHOO.lang.JSON.parse(http_fetch_sync(url).responseText);
			} else if (typeof(rel) == "object") {
			    //Assume we have a Link object that we can delve into.
			    //This is mostly used for n level dives through relationships.
			    //This should probably be avoided on edit views due to performance issues.

			}

			return "";
EOQ;
	}

	/**
	 * Returns the opreation name that this Expression should be
	 * called by.
	 */
	static function getOperationName() {
		return array("related");
	}

	/**
	 * The first parameter is a number and the second is the list.
	 */
    static function getParameterTypes() {
		return array(AbstractExpression::$RELATE_TYPE, AbstractExpression::$STRING_TYPE);
	}

	/**
	 * Returns the maximum number of parameters needed.
	 */
	static function getParamCount() {
		return 2;
	}

	/**
	 * Returns the String representation of this Expression.
	 */
	function toString() {
	}
}

?>