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

/**
 * Tab representation
 * @api
 */
class SugarTab
{
    function SugarTab($type='singletabmenu')
    {
        $this->type = $type;
        $this->ss = new Sugar_Smarty();
    }

    function setup($mainTabs, $otherTabs=array(), $subTabs=array(), $selected_group='All')
    {
        global $sugar_version, $sugar_config, $current_user;

        $max_tabs = $current_user->getPreference('max_tabs');
        if(!isset($max_tabs) || $max_tabs <= 0) $max_tabs = $GLOBALS['sugar_config']['default_max_tabs'];
				
				$key_all = translate('LBL_TABGROUP_ALL');
				if ($selected_group == 'All') {
						$selected_group = $key_all;
				}

        $moreTabs = array_slice($mainTabs,$max_tabs);
        /* If the current tab is in the 'More' menu, move it into the visible menu. */
        if(!empty($moreTabs[$selected_group]))
        {
        	$temp = array($selected_group => $mainTabs[$selected_group]);
            unset($mainTabs[$selected_group]);
            array_splice($mainTabs, $max_tabs-1, 0, $temp);
        }

        $subpanelTitles = array();

        if(isset($otherTabs[$key_all]) && isset($otherTabs[$key_all]['tabs']))
        {
            foreach($otherTabs[$key_all]['tabs'] as $subtab)
            {
                $subpanelTitles[$subtab['key']] = $subtab['label'];
            }
        }

        $this->ss->assign('showLinks', 'false');
        $this->ss->assign('sugartabs', array_slice($mainTabs, 0, $max_tabs));
        $this->ss->assign('moreMenu', array_slice($mainTabs, $max_tabs));
        $this->ss->assign('othertabs', $otherTabs);
        $this->ss->assign('subpanelTitlesJSON', json_encode($subpanelTitles));
        $this->ss->assign('startSubPanel', $selected_group);
        $this->ss->assign('sugarVersionJsStr', "?s=$sugar_version&c={$sugar_config['js_custom_version']}");
        if(!empty($mainTabs))
        {
            $mtak = array_keys($mainTabs);
            $this->ss->assign('moreTab', $mainTabs[$mtak[min(count($mtak)-1, $max_tabs-1)]]['label']);
        }
    }

    function fetch()
    {
        return $this->ss->fetch('include/SubPanel/tpls/' . $this->type . '.tpl');
    }

    function display()
    {
       $this->ss->display('include/SubPanel/tpls/' . $this->type . '.tpl');
    }
}



?>
