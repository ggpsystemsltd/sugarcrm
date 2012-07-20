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


/**
 * Searches through the installed relationships to find broken self referencing one-to-many relationships 
 * (wrong field used in the subpanel, and the left link not marked as left)
 */
function upgrade_custom_relationships($modules = array())
{
	global $current_user, $moduleList;
	if (!is_admin($current_user)) sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']); 
	
	require_once("modules/ModuleBuilder/parsers/relationships/DeployedRelationships.php");
	require_once("modules/ModuleBuilder/parsers/relationships/OneToManyRelationship.php");
	
	if (empty($modules))
		$modules = $moduleList;
	
	foreach($modules as $module)
	{
		$depRels = new DeployedRelationships($module);
		$relList = $depRels->getRelationshipList();
		foreach($relList as $relName)
		{
			$relObject = $depRels->get($relName);
			$def = $relObject->getDefinition();
			//We only need to fix self referencing one to many relationships
			if ($def['lhs_module'] == $def['rhs_module'] && $def['is_custom'] && $def['relationship_type'] == "one-to-many")
			{
				$layout_defs = array();
				if (!is_dir("custom/Extension/modules/$module/Ext/Layoutdefs") || !is_dir("custom/Extension/modules/$module/Ext/Vardefs"))
					continue;
				//Find the extension file containing the vardefs for this relationship
				foreach(scandir("custom/Extension/modules/$module/Ext/Vardefs") as $file)
				{
					if (substr($file,0,1) != "." && strtolower(substr($file, -4)) == ".php")
					{
						$dictionary = array($module => array("fields" => array()));
						$filePath = "custom/Extension/modules/$module/Ext/Vardefs/$file";
						include($filePath);
						if(isset($dictionary[$module]["fields"][$relName]))
						{
							$rhsDef = $dictionary[$module]["fields"][$relName];
							//Update the vardef for the left side link field
							if (!isset($rhsDef['side']) || $rhsDef['side'] != 'left')
							{
								$rhsDef['side'] = 'left';
								$fileContents = file_get_contents($filePath);
								$out = preg_replace(
									'/\$dictionary[\w"\'\[\]]*?' . $relName . '["\'\[\]]*?\s*?=\s*?array\s*?\(.*?\);/s',
									'$dictionary["' . $module . '"]["fields"]["' . $relName . '"]=' . var_export_helper($rhsDef) . ";",
									$fileContents
								);
								file_put_contents($filePath, $out);
							}
						}
					}
				}
				//Find the extension file containing the subpanel definition for this relationship
				foreach(scandir("custom/Extension/modules/$module/Ext/Layoutdefs") as $file)
				{
					if (substr($file,0,1) != "." && strtolower(substr($file, -4)) == ".php")
					{
						$layout_defs = array($module => array("subpanel_setup" => array()));
						$filePath = "custom/Extension/modules/$module/Ext/Layoutdefs/$file";
						include($filePath);
						foreach($layout_defs[$module]["subpanel_setup"] as $key => $subDef)
						{
							if ($layout_defs[$module]["subpanel_setup"][$key]['get_subpanel_data'] == $relName)
							{
								$fileContents = file_get_contents($filePath);
								$out = preg_replace(
									'/[\'"]get_subpanel_data[\'"]\s*=>\s*[\'"]' . $relName . '[\'"],/s',
									"'get_subpanel_data' => '{$def["join_key_lhs"]}',",
									$fileContents
								);
								file_put_contents($filePath, $out);
							}
						}
					}
				}
			}
		}
	}
}

if (isset($_REQUEST['execute']) && $_REQUEST['execute'])
	upgrade_custom_relationships();