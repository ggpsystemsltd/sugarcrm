<?php
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
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


global $current_user, $beanFiles;
set_time_limit(3600);


$db = DBManagerFactory::getInstance();

if (is_admin($current_user) || isset ($from_sync_client) || is_admin_for_any_module($current_user)) {
	isset($_REQUEST['execute'])? $execute=$_REQUEST['execute'] : $execute= false;
	$export = false;

	if (sizeof($_POST) && isset ($_POST['raction'])) {
		if (isset ($_POST['raction']) && strtolower($_POST['raction']) == "export") {
			//jc - output buffering is being used. if we do not clean the output buffer
			//the contents of the buffer up to the length of the repair statement(s)
			//will be saved in the file...
			ob_clean();

			header("Content-Disposition: attachment; filename=repairSugarDB.sql");
			header("Content-Type: text/sql; charset={$app_strings['LBL_CHARSET']}");
			header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
			header("Last-Modified: " . TimeDate::httpTime());
			header("Cache-Control: post-check=0, pre-check=0", false);
			header("Content-Length: " . strlen($_POST['sql']));

		    //jc:7347 - for whatever reason, html_entity_decode is choking on converting
		    //the html entity &#039; to a single quote, so we will use str_replace
		    //instead
		    $sql = str_replace('&#039;',"'", $_POST['sql']);
		    //echo html_entity_decode($_POST['sql']);
		    echo $sql;
		}
		elseif (isset ($_POST['raction']) && strtolower($_POST['raction']) == "execute") {
			$sql = str_replace(
				array(
					"\n",
					'&#039;',
				),
				array(
					'',
					"'",
				),
				preg_replace('#(/\*.+?\*/\n*)#', '', $_POST['sql'])
			);
			foreach (explode(";", $sql) as $stmt) {
				$stmt = trim($stmt);

				if (!empty ($stmt)) {
					$db->query($stmt,true,'Executing repair query: ');
				}
			}

			echo "<h3>{$mod_strings['LBL_REPAIR_DATABASE_SYNCED']}</h3>";
		}
	} else {

		if (!$export && empty ($_REQUEST['repair_silent'])) {
			if ( empty($hideModuleMenu) )
		        echo getClassicModuleTitle($mod_strings['LBL_REPAIR_DATABASE'], array($mod_strings['LBL_REPAIR_DATABASE']), true);
			echo "<h1 id=\"rdloading\">{$mod_strings['LBL_REPAIR_DATABASE_PROCESSING']}</h1>";
			ob_flush();
		}

		$sql = '';

		VardefManager::clearVardef();
		$repairedTables = array();

		foreach ($beanFiles as $bean => $file) {
			if(file_exists($file)){
				require_once ($file);
				unset($GLOBALS['dictionary'][$bean]);
				$focus = new $bean ();
				if (($focus instanceOf SugarBean) && !isset($repairedTables[$focus->table_name])) {
				    $sql .= $db->repairTable($focus, $execute);
				    $repairedTables[$focus->table_name] = true;
				}
                //Repair Custom Fields
                if (($focus instanceOf SugarBean) && $focus->hasCustomFields() && !isset($repairedTables[$focus->table_name . '_cstm'])) {
				    $df = new DynamicField($focus->module_dir);
                    //Need to check if the method exists as during upgrade an old version of Dynamic Fields may be loaded.
                    if (method_exists($df, "repairCustomFields"))
                    {
                        $df->bean = $focus;
                        $sql .= $df->repairCustomFields($execute);
                        $repairedTables[$focus->table_name . '_cstm'] = true;
                    }
				}
			}
		}

		$olddictionary = $dictionary;

		unset ($dictionary);
		include ('modules/TableDictionary.php');

		foreach ($dictionary as $meta) {

			if ( !isset($meta['table']) || isset($repairedTables[$meta['table']]))
                continue;
            
            $tablename = $meta['table'];
			$fielddefs = $meta['fields'];
			$indices = $meta['indices'];
			$engine = isset($meta['engine'])?$meta['engine']:null;
			$sql .= $db->repairTableParams($tablename, $fielddefs, $indices, $execute, $engine);
			$repairedTables[$tablename] = true;
		}

		$dictionary = $olddictionary;



		if (empty ($_REQUEST['repair_silent'])) {
			echo "<script type=\"text/javascript\">document.getElementById('rdloading').style.display = \"none\";</script>";

			if (isset ($sql) && !empty ($sql)) {

				$qry_str = "";
				foreach (explode("\n", $sql) as $line) {
					if (!empty ($line) && substr($line, -2) != "*/") {
						$line .= ";";
					}

					$qry_str .= $line . "\n";
				}

	            $ss = new Sugar_Smarty();
	            $ss->assign('MOD', $GLOBALS['mod_strings']);
	            $ss->assign('qry_str', $qry_str);
	            echo $ss->fetch('modules/Administration/templates/RepairDatabase.tpl');
			} else {
				echo "<h3>{$mod_strings['LBL_REPAIR_DATABASE_SYNCED']}</h3>";
			}
		}
	}

} else {
	sugar_die($GLOBALS['app_strings']['ERR_NOT_ADMIN']);
}