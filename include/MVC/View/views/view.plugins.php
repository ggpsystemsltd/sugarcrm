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


require_once('include/MVC/View/views/view.ajax.php');
require_once('include/SugarPlugins/SugarPlugins.php');

class ViewPlugins extends ViewAjax
{
    /**
     * @see SugarView::display()
     */
    public function display()
    {
    	global $app_strings;
        
		$sp = new SugarPlugins();
		
		$plugins = $sp->getPluginList();
		$pluginsCat = array(
					"Outlook" => array(
						"name" => $app_strings['LBL_PLUGIN_OUTLOOK_NAME'],
						"desc" => $app_strings['LBL_PLUGIN_OUTLOOK_DESC'],
						),
					"Word" => array(
						"name" => $app_strings['LBL_PLUGIN_WORD_NAME'],
						"desc" => $app_strings['LBL_PLUGIN_WORD_DESC'],
						),
					"Excel" => array(
						"name" => $app_strings['LBL_PLUGIN_EXCEL_NAME'],
						"desc" => $app_strings['LBL_PLUGIN_EXCEL_DESC'],
						),
					);
		$str = '<table cellpadding="0" cellspacing="0" class="detail view">';
		$str .= "<tr><th colspan='2'>";
		$str .= "<h4>{$app_strings['LBL_PLUGINS_TITLE']}</h4>";
		$str .= "</th><tr>";

		$str .= "<tr><td colspan='2' style='padding-left: 10px;'>{$app_strings['LBL_PLUGINS_DESC']}</td></tr>";

        foreach($pluginsCat as $key => $value )
        {
      			$pluginImage = SugarThemeRegistry::current()->getImageURL("plug-in_{$key}.gif");
                $pluginContents = '';

      			foreach($plugins as $plugin)
                {
      				$raw_name = urlencode($plugin['raw_name']);
      				$display_name = str_replace('_', ' ' , $plugin['formatted_name']);
      				if(strpos($display_name,$key)!==false)
                    {
      					$pluginContents .= "<li><a href='index.php?module=Home&action=DownloadPlugin&plugin={$raw_name}'>{$display_name}</a></li>";
      				}
      			}

                //If we have pluginContents value, combine together
      			if(!empty($pluginContents))
                {
                    $str .= "<tr><td valign='top' width='80' style='padding-right: 10px; padding-left: 10px;'><img src='{$pluginImage}' alt='{$pluginImage}'></td>";
                    $str .= "<td><b>{$value['name']}</b><br>";
                    $str .= $value['desc'];
                    $str .= '<ul id="pluginList">';
                    $str .= $pluginContents;
                    $str .= '</ul></td></tr>';
                }
      	}

		$str .= "</table>";

		echo $str;
    }
}
