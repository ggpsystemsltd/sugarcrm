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



require_once('modules/DynamicFields/templates/Fields/TemplateTextArea.php');
require_once('modules/DynamicFields/templates/Fields/TemplateFloat.php');
require_once('modules/DynamicFields/templates/Fields/TemplateInt.php');
require_once('modules/DynamicFields/templates/Fields/TemplateDate.php');
require_once('modules/DynamicFields/templates/Fields/TemplateDatetimecombo.php');
require_once('modules/DynamicFields/templates/Fields/TemplateBoolean.php');
require_once('modules/DynamicFields/templates/Fields/TemplateEnum.php');
require_once('modules/DynamicFields/templates/Fields/TemplateMultiEnum.php');
require_once('modules/DynamicFields/templates/Fields/TemplateRadioEnum.php');
require_once('modules/DynamicFields/templates/Fields/TemplateEmail.php');
require_once('modules/DynamicFields/templates/Fields/TemplateRelatedTextField.php');

require_once('modules/DynamicFields/templates/Fields/TemplateURL.php');
require_once('modules/DynamicFields/templates/Fields/TemplateIFrame.php');
require_once('modules/DynamicFields/templates/Fields/TemplateHTML.php');
require_once('modules/DynamicFields/templates/Fields/TemplatePhone.php');
require_once('modules/DynamicFields/templates/Fields/TemplateCurrency.php');
require_once('modules/DynamicFields/templates/Fields/TemplateParent.php');
require_once('modules/DynamicFields/templates/Fields/TemplateCurrencyId.php');
require_once('modules/DynamicFields/templates/Fields/TemplateAddress.php');
require_once('modules/DynamicFields/templates/Fields/TemplateParentType.php');
require_once('modules/DynamicFields/templates/Fields/TemplateEncrypt.php');
require_once('modules/DynamicFields/templates/Fields/TemplateId.php');
require_once('modules/DynamicFields/templates/Fields/TemplateImage.php');
require_once('modules/DynamicFields/templates/Fields/TemplateDecimal.php');
function get_widget($type)
{

	$local_temp = null;
	switch(strtolower($type)){
			case 'char':
			case 'varchar':
			case 'varchar2':
						$local_temp = new TemplateText(); break;
			case 'text':
			case 'textarea':
						$local_temp = new TemplateTextArea(); break;
			case 'double':

			case 'float':
						$local_temp = new TemplateFloat(); break;
			case 'decimal':
						$local_temp = new TemplateDecimal(); break;
			case 'int':
						$local_temp = new TemplateInt(); break;
			case 'date':
						$local_temp = new TemplateDate(); break;
			case 'bool':
						$local_temp = new TemplateBoolean(); break;
			case 'relate':
						$local_temp = new TemplateRelatedTextField(); break;
			case 'enum':
						$local_temp = new TemplateEnum(); break;
			case 'multienum':
						$local_temp = new TemplateMultiEnum(); break;
			case 'radioenum':
						$local_temp = new TemplateRadioEnum(); break;
			case 'email':
						$local_temp = new TemplateEmail(); break;
		    case 'url':
						$local_temp = new TemplateURL(); break;
			case 'iframe':
						$local_temp = new TemplateIFrame(); break;
			case 'html':
						$local_temp = new TemplateHTML(); break;
			case 'phone':
						$local_temp = new TemplatePhone(); break;
			case 'currency':
						$local_temp = new TemplateCurrency(); break;
			case 'parent':
						$local_temp = new TemplateParent(); break;
			case 'parent_type':
						$local_temp = new TemplateParentType(); break;
			case 'currency_id':
						$local_temp = new TemplateCurrencyId(); break;
			case 'address':
						$local_temp = new TemplateAddress(); break;
			case 'encrypt':
						$local_temp = new TemplateEncrypt(); break;
			case 'id':
						$local_temp = new TemplateId(); break;
			case 'datetimecombo':
			case 'datetime':
						$local_temp = new TemplateDatetimecombo(); break;
            case 'image':
                        $local_temp = new TemplateImage(); break;
			default:
						$file = false;
						if(file_exists('custom/modules/DynamicFields/templates/Fields/Template'. ucfirst($type) . '.php')){
							$file  =	'custom/modules/DynamicFields/templates/Fields/Template'. ucfirst($type) . '.php';
						}else if(file_exists('modules/DynamicFields/templates/Fields/Template'. ucfirst($type) . '.php')){
							$file  =	'modules/DynamicFields/templates/Fields/Template'. ucfirst($type) . '.php';
						}
						if(!empty($file)){
							require_once($file);
							$class  = 'Template' . ucfirst($type) ;
							$customClass = 'Custom' . $class;
							if(class_exists($customClass)){
								$local_temp = new $customClass();
							}else{
								$local_temp = new $class();
							}
							break;
						}else{
							$local_temp = new TemplateText(); break;
						}
	}

	return $local_temp;
}
?>