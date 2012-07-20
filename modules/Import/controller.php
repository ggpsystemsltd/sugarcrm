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

/*********************************************************************************

 * Description: Controller for the Import module
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/

require_once("modules/Import/Forms.php");
require_once("include/MVC/Controller/SugarController.php");
require_once('modules/Import/sources/ImportFile.php');
require_once('modules/Import/views/ImportListView.php');

class ImportController extends SugarController
{
    /**
     * @see SugarController::loadBean()
     */
    public function loadBean()
    {
        global $mod_strings;

        $this->importModule = isset($_REQUEST['import_module']) ? $_REQUEST['import_module'] : '';

        $this->bean = loadBean($this->importModule);
        if ( $this->bean ) {
            if ( !$this->bean->importable )
                $this->bean = false;
            elseif ( $_REQUEST['import_module'] == 'Users' && !is_admin($GLOBALS['current_user']) )
                $this->bean = false;
            elseif ( $this->bean->bean_implements('ACL')){
                if(!ACLController::checkAccess($this->bean->module_dir, 'import', true)){
                    ACLController::displayNoAccess();
                    sugar_die('');
                }
            }
        }
        
        if ( !$this->bean ) {
            $_REQUEST['message'] = $mod_strings['LBL_ERROR_IMPORTS_NOT_SET_UP'];
            $this->view = 'error';
        }
        else
            $GLOBALS['FOCUS'] = $this->bean;
    }
    
    function action_index()
    {
        $this->action_Step1();
    }

    function action_mapping()
    {
        global $mod_strings, $current_user;
        $results = array('message' => '');
        // handle publishing and deleting import maps
        if(isset($_REQUEST['delete_map_id']))
        {
            $import_map = new ImportMap();
            $import_map->mark_deleted($_REQUEST['delete_map_id']);
        }

        if(isset($_REQUEST['publish']) )
        {
            $import_map = new ImportMap();

            $import_map = $import_map->retrieve($_REQUEST['import_map_id'], false);

            if($_REQUEST['publish'] == 'yes')
            {
                $result = $import_map->mark_published($current_user->id,true);
                if (!$result)
                    $results['message'] = $mod_strings['LBL_ERROR_UNABLE_TO_PUBLISH'];
            }
            elseif( $_REQUEST['publish'] == 'no')
            {
                // if you don't own this importmap, you do now, unless you have a map by the same name
                $result = $import_map->mark_published($current_user->id,false);
                if (!$result)
                    $results['message'] = $mod_strings['LBL_ERROR_UNABLE_TO_UNPUBLISH'];
            }
        }
        
        echo json_encode($results);
        sugar_cleanup(TRUE);
    }
    function action_RefreshMapping()
    {
        global $mod_strings;
        require_once('modules/Import/sources/ImportFile.php');
        require_once('modules/Import/views/view.confirm.php');
        $v = new ImportViewConfirm();
        $fileName = $_REQUEST['importFile'];
        $delim = $_REQUEST['delim'];
        if ($delim == '\t') {
            $delim = "\t";
        }
        $enclosure = $_REQUEST['qualif'];
        $enclosure = html_entity_decode($enclosure, ENT_QUOTES);
        $hasHeader = isset($_REQUEST['header']) && !empty($_REQUEST['header']) ? TRUE : FALSE;

        $importFile = new ImportFile( $fileName, $delim, $enclosure, FALSE);
        $importFile->setHeaderRow($hasHeader);
        $rows = $v->getSampleSet($importFile);

        $ss = new Sugar_Smarty();
        $ss->assign("SAMPLE_ROWS",$rows);
        $ss->assign("HAS_HEADER",$hasHeader);
        $ss->assign("column_count",$v->getMaxColumnsInSampleSet($rows));
        $ss->assign("MOD",$mod_strings);
        $ss->display('modules/Import/tpls/confirm_table.tpl');
        sugar_cleanup(TRUE);

    }

    function action_RefreshTable()
    {
        $offset = isset($_REQUEST['offset']) ? $_REQUEST['offset'] : 0;
        $tableID = isset($_REQUEST['tableID']) ? $_REQUEST['tableID'] : 'errors';
        $has_header = $_REQUEST['has_header'] == 'on' ? TRUE : FALSE;
        if($tableID == 'dup')
            $tableFilename = ImportCacheFiles::getDuplicateFileName();
        else
            $tableFilename = ImportCacheFiles::getErrorRecordsFileName();

        $if = new ImportFile($tableFilename, ",", '"', FALSE, FALSE);
        $if->setHeaderRow($has_header);
        $lv = new ImportListView($if,array('offset'=> $offset), $tableID);
        $lv->display(FALSE);
        
        sugar_cleanup(TRUE);
    }
    
	function action_Step1()
    {
        $fromAdminView = isset($_REQUEST['from_admin_wizard']) ? $_REQUEST['from_admin_wizard'] : FALSE;
        if( $this->importModule == 'Administration' || $fromAdminView
            || $this->bean instanceof Person
        )
        {
    		$this->view = 'step1';
        }
        else
            $this->view = 'step2';
    }
    
    function action_Step2()
    {
		$this->view = 'step2';
    }

    function action_Confirm()
    {
		$this->view = 'confirm';
    }

    function action_Step3()
    {
		$this->view = 'step3';
    }

    function action_DupCheck()
    {
		$this->view = 'dupcheck';
    }

    function action_Step4()
    {
		$this->view = 'step4';
    }
    
    function action_Last()
    {
		$this->view = 'last';
    }
    
    function action_Undo()
    {
		$this->view = 'undo';
    }
    
    function action_Error()
    {
		$this->view = 'error';
    }

    function action_ExtStep1()
    {
        $this->view = 'extStep1';
    }

    function action_Extdupcheck()
    {
        $this->view = 'extdupcheck';
    }

    function action_Extimport()
    {
        $this->view = 'extimport';
    }
    
    function action_GetControl()
    {
        echo getControl($_REQUEST['import_module'],$_REQUEST['field_name']);
        exit;
    }
}
?>