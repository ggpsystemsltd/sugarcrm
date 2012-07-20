<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

class TrackerUtility {

/**
 * getSQLHash
 * This method attempts to remove the values between single quotes in a SQL statement
 * in an effort to check if the same SQL (with different values between quotes or numerical values) 
 * has been run. A good portion of this code is similar to the appendN method found 
 * in include/database/FreeTDSManager.php file.
 * 
 * @param $sql SQL statement
 * @return String of SQL statement with unique values removed
 */
static function getGenericSQL($sql) {
	
	//Replace all escaped string sequences
	$sql = str_replace('\\\'', '*', $sql);

    // If there are odd number of single quotes, just return
    if((substr_count($sql, "'") & 1)) {
        return $sql;
    } 
          
    // Remove any remaining '' and do not parse... replace later (hopefully we don't even have any)
    $pairs = array();
    $regexp = '/(\'{2})/';
    preg_match_all($regexp, $sql, $pair_matches);
    if ($pair_matches) {
        foreach (array_unique($pair_matches[0]) as $key=>$value) {
           $pairs['<@PAIR-'.$key.'@>'] = $value;
        }
        if (!empty($pairs)) {
           $sql = str_replace($pairs, array_keys($pairs), $sql);
        }
    }

    $regexp = "/(N?\'.+?\')/is";
    preg_match_all($regexp, $sql, $matches);
    $replace = array();
    if (!empty($matches)) {
        foreach ($matches[0] as $key=>$value) {
                   // We are assuming that all nvarchar columns are no more than 200 characters in length
                   // One problem we face is the image column type in reports which cannot accept nvarchar data
                   if (!empty($value)) {
                       $replace[$value] = "'?'";
                   }
        }
    }
    
    if (!empty($replace)) {
        $sql = str_replace(array_keys($replace), $replace, $sql);
    }
    
    if (!empty($pairs)) {
        $sql = str_replace(array_keys($pairs), $pairs, $sql);
    }    

    if(strpos($sql, '<@#@#@PAIR@#@#@>')) {
       $sql = str_replace(array('<@#@#@PAIR@#@#@>'), array("''"), $sql);
    }

    if(preg_match('/^(INSERT.+?VALUES\s+?\()(.*?)(\).*?)/Ui', $sql, $matches)) {
       if(count($matches) == 4) {
          $sql = $matches[1] . preg_replace('/(\d{1,})/', '?', $matches[2]) . $matches[3];
       }
    }

    //Lastly replace all unquoted parameters with digits only
    $sql = preg_replace('/=\s*?(\d{1,})\s*?/', ' = ? ', $sql);
    
    return $sql;
}	
	
}



?>
