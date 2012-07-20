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


require_once('modules/DynamicFields/templates/Fields/TemplateRange.php');

class TemplateDate extends TemplateRange
{
	var $type = 'date';
	var $len = '';
	var $dateStrings;

function __construct() {
	parent::__construct();
	global $app_strings;
	$this->dateStrings = array(
			$app_strings['LBL_NONE']=>'',
            $app_strings['LBL_YESTERDAY']=> '-1 day',
            $app_strings['LBL_TODAY']=>'now',
            $app_strings['LBL_TOMORROW']=>'+1 day',
            $app_strings['LBL_NEXT_WEEK']=> '+1 week',
            $app_strings['LBL_NEXT_MONDAY']=>'next monday',
            $app_strings['LBL_NEXT_FRIDAY']=>'next friday',
            $app_strings['LBL_TWO_WEEKS']=> '+2 weeks',
            $app_strings['LBL_NEXT_MONTH']=> '+1 month',
            $app_strings['LBL_FIRST_DAY_OF_NEXT_MONTH']=> 'first day of next month', // must handle this non-GNU date string in SugarBean->populateDefaultValues; if we don't this will evaluate to 1969...
            $app_strings['LBL_THREE_MONTHS']=> '+3 months',  //kbrill Bug #17023
            $app_strings['LBL_SIXMONTHS']=> '+6 months',
            $app_strings['LBL_NEXT_YEAR']=> '+1 year',
        );
}


function get_db_default($modify=false){
		return '';
}

//BEGIN BACKWARDS COMPATABILITY
function get_xtpl_edit(){
		global $timedate;
		$name = $this->name;
		$returnXTPL = array();
		if(!empty($this->help)){
		    $returnXTPL[strtoupper($this->name . '_help')] = translate($this->help, $this->bean->module_dir);
		}
		$returnXTPL['USER_DATEFORMAT'] = $timedate->get_user_date_format();
		$returnXTPL['CALENDAR_DATEFORMAT'] = $timedate->get_cal_date_format();
		if(isset($this->bean->$name)){
			$returnXTPL[strtoupper($this->name)] = $this->bean->$name;
		}else{
		    if(empty($this->bean->id) && !empty($this->default_value) && !empty($this->dateStrings[$this->default_value])){
		        $returnXTPL[strtoupper($this->name)] = $timedate->asUserDate($timedate->getNow(true)->modify($this->dateStrings[$this->default_value]), false);
		    }
		}
		return $returnXTPL;
	}

function get_field_def(){
		$def = parent::get_field_def();
		if(!empty($def['default'])){
			$def['display_default'] = $def['default'];
			$def['default'] = '';
		}
		return $def;
	}
}
?>
