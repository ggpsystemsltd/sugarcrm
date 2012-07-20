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

 
require_once('include/ListView/ListViewDisplay.php');
require_once('include/Sugar_Smarty.php');
require_once('include/utils.php');

class ListViewSmarty extends ListViewDisplay {
    
    var $data;
    var $ss; // the smarty object 
    var $displayColumns;
    var $tpl;
    var $moduleString;
    var $overlib = true;
    var $lvd;
    
    /**
     * Constructor, Smarty object immediately available after 
     *
     */
    function ListViewSmarty() {
        parent::ListViewDisplay();
        $this->ss = new Sugar_Smarty();
    }
    
    /**
     * Processes the request. Calls ListViewData process. Also assigns all lang strings, export links,
     * This is called from ListViewDisplay
     *    
     * @param file file Template file to use
     * @param data array from ListViewData
     * @param html_var string the corresponding html var in xtpl per row
     *
     */ 
    function process($file, $data, $htmlVar) {
        global $odd_bg, $even_bg, $hilite_bg, $click_bg, $app_strings, $image_path;
        parent::process($file, $data, $htmlVar);

        $this->tpl = $file;
        $this->data = $data;
       
        $this->ss->assign('bgHilite', $hilite_bg);
        $this->ss->assign('colCount', count($this->displayColumns) + 1);
        $this->ss->assign('htmlVar', strtoupper($htmlVar));
        $this->ss->assign('moduleString', $this->moduleString);

        $this->ss->assign('imagePath', $image_path);

        if($this->overlib) $this->ss->assign('overlib', true);
        
        $this->processArrows($data['pageData']['ordering']);

        $this->ss->assign('clearAll', $app_strings['LBL_CLEARALL']);
        $this->ss->assign('rowColor', array('oddListRow', 'evenListRow'));
        $this->ss->assign('bgColor', array($odd_bg, $even_bg));
    }
    
    /**
     * Assigns the sort arrows in the tpl
     *    
     * @param ordering array data that contains the ordering info
     *
     */
    function processArrows($ordering) {
        global $png_support;
        
        if(empty($GLOBALS['image_path'])) {
            global $theme;
            $GLOBALS['image_path'] = 'themes/'.$theme.'/images/';
        }
        
        if ($png_support == false) $ext = 'gif';
        else $ext = 'png';
        
        list($width,$height) = getimagesize($GLOBALS['image_path'] . 'arrow.' . (($png_support) ? 'png' : 'gif'));
        
        $this->ss->assign('arrowExt', $ext);
        $this->ss->assign('arrowWidth', $width);
        $this->ss->assign('arrowHeight', $height);
    }   



    /**
     * Displays the xtpl, either echo or returning the contents
     *    
     * @param end bool display the ending of the listview data (ie MassUpdate)
     *
     */
    function display($end = true) {
        if(empty($this->data['data'])) {
            global $app_strings;
            return '<h3>' . $app_strings['LBL_NO_RECORDS_FOUND'] . '</h3>';
        }

        $this->ss->assign('data', $this->data['data']);

        $this->data['pageData']['offsets']['lastOffsetOnPage'] = $this->data['pageData']['offsets']['current'] + count($this->data['data']);
        
        $totalWidth = 0;
        foreach($this->displayColumns as $name => $params) {
            $totalWidth += $params['width'];
        }
        $adjustment = $totalWidth / 100;

        foreach($this->displayColumns as $name => $params) {
            $this->displayColumns[$name]['width'] = round($this->displayColumns[$name]['width'] / $adjustment, 2);
            $this->displayColumns[$name]['label'] = rtrim($this->data['pageData']['labels'][strtolower($name)], ':');
        }
        
        $this->ss->assign('pageData', $this->data['pageData']);
        $this->ss->assign('rowCount', $this->rowCount);
        $this->ss->assign('displayColumns', $this->displayColumns);     
        $str = parent::display();
        $strend = parent::displayEnd();
    
        return $str . $this->ss->fetch($this->tpl) . (($end) ? '<br><br>' . $strend : '');
    }
}

?>