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

class TemplateDatetimecombo extends TemplateRange 
{
	var $type = 'datetimecombo';
	var $len = '';
	var $dateStrings = array(
		'-none-' => '',
        'today'=>'now',
        'yesterday'=> '-1 day',
        'tomorrow'=>'+1 day',
        'next week'=> '+1 week',
        'next monday'=>'next monday',
        'next friday'=>'next friday',
        'two weeks'=> '+2 weeks',
        'next month'=> '+1 month',
        'first day of next month'=> 'first of next month', // must handle this non-GNU date string in SugarBean->populateDefaultValues; if we don't this will evaluate to 1969...
        'three months'=> '+3 months',  //kbrill Bug #17023
        'six months'=> '+6 months',
        'next year'=> '+1 year',
    );
    
    var $hoursStrings = array(
    	'' => '',
    	'01' => '01',	
    	'02' => '02',
    	'03' => '03',
    	'04' => '04',
    	'05' => '05',
    	'06' => '06',
    	'07' => '07',
    	'08' => '08',
    	'09' => '09',
    	'10' => '10',
    	'11' => '11',
    	'12' => '12',
    );
    
    var $hoursStrings24 = array(
    	'' => '',
        '00' => '00',
    	'01' => '01',	
    	'02' => '02',
    	'03' => '03',
    	'04' => '04',
    	'05' => '05',
    	'06' => '06',
    	'07' => '07',
    	'08' => '08',
    	'09' => '09',
    	'10' => '10',
    	'11' => '11',
    	'12' => '12',
    	'13' => '13',	
    	'14' => '14',
    	'15' => '15',
    	'16' => '16',
    	'17' => '17',
    	'18' => '18',
    	'19' => '19',
    	'20' => '20',
    	'21' => '21',
    	'22' => '22',
    	'23' => '23',
    );    
    
    var $minutesStrings = array(
    	'' => '',
    	'00' => '00',	
    	'15' => '15',
    	'30' => '30',
    	'45' => '45',
    );
    
    var $meridiemStrings = array(
    	'' => '',
    	'am' => 'am',
    	'pm' => 'pm',
    );

	function get_db_default($modify=false){
			return '';
	}

	function get_field_def(){
		$def = parent::get_field_def();
	    $def['dbType'] = 'datetime';
	    if(!empty($def['default'])){
			$def['display_default'] = $def['default'];
			$def['default'] = '';
		}
		return $def;
	}
	
    function populateFromPost(){
    	parent::populateFromPost();
    	if(!empty($_REQUEST['defaultDate']) && !empty($_REQUEST['defaultTime'])){
    		$_REQUEST['default'] = $_REQUEST['defaultDate'].'&'.$_REQUEST['defaultTime'];
    		
    		$defaultTime = $_REQUEST['defaultTime'];
			$hours = substr($defaultTime, 0, 2); 
			$minutes = substr($defaultTime, 3, 2);
			$meridiem = substr($defaultTime, 5, 2);
    		if(empty($meridiem)) {
  		      if($hours == '00') {
  		      	 $hours = 12;
  		      	 $meridiem = 'am';
  		      } else if($hours > 12) {
  		      	 $hours -= 12;
  		      	 $meridiem = 'pm';
  		      } else {
  		      	 $meridiem = 'am';
  		      }
  		      $_REQUEST['default'] = $_REQUEST['defaultDate'].'&'.$hours.':'.$minutes.''.$meridiem;
    		}
    	}else{
    		$_REQUEST['default'] = '';
    	}
    	unset($_REQUEST['defaultDate']);
    	unset($_REQUEST['defaultTime']);
    	
		foreach($this->vardef_map as $vardef=>$field){
			if(isset($_REQUEST[$vardef])){
                //  Bug #48826. Some fields are allowed to have special characters and must be decoded from the request
                if (is_string($_REQUEST[$vardef]) && in_array($vardef, $this->decode_from_request_fields_map))
                    $this->$vardef = html_entity_decode($_REQUEST[$vardef]);
                else
                    $this->$vardef = $_REQUEST[$vardef];

				if($vardef != $field){
					$this->$field = $this->$vardef;
				}
			}
		}
		$GLOBALS['log']->debug('populate: '.print_r($this,true));
	}
	
}
?>
