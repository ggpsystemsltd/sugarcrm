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




class SugarWidgetFieldteam_name extends SugarWidgetFieldname
{
 function displayInput(&$layout_def) 
 {
        $selected_teams = empty($layout_def['input_name0']) ? '' : $layout_def['input_name0'];
 		$str = '<select multiple="true" size="3" name="' . $layout_def['name'] . '[]">' . get_select_options_with_id(get_team_array(false), $selected_teams) . '</select>';
 		return $str;
 }
    public function queryFilterone_of($layout_def, $rename_columns = true)
    {
        if($layout_def['name'] == 'team_id')
        {
            $ids = array();
            $db = DBManagerFactory::getInstance();
            foreach($layout_def['input_name0'] as $value)
            {
                array_push($ids, $db->quoted($value));
            }
            $query = 'select team_set_id from team_sets_teams where team_id IN (' . implode(', ', $ids) . ') group by team_set_id';
            $ids = array();
            $result = $db->query($query, true);
            while($row = $db->fetchByAssoc($result))
            {
                array_push($ids, $db->quoted($row['team_set_id']));
            }
            $layout_def['name'] = 'team_set_id';
            if(count($ids) == 0)
            {
                array_push($ids, '-1');
            }
            return $this->_get_column_select($layout_def) . ' IN (' . implode(', ', $ids) . ') ';

        }
        else
        {
            return parent::queryFilterone_of($layout_def, $rename_columns);
        }
    }

    public function queryFilterStarts_With(&$layout_def)
    {
        if($layout_def['name'] == 'team_id')
        {
            $db = DBManagerFactory::getInstance();
            $query = "select team_set_id from team_sets_teams where team_id LIKE {$db->quoted($layout_def['input_name0'] . '%')} group by team_set_id";
            $ids = array();
            $result = $db->query($query, true);
            while($row = $db->fetchByAssoc($result))
            {
                array_push($ids, $db->quoted($row['team_set_id']));
            }
            $layout_def['name'] = 'team_set_id';
            if(count($ids) == 0)
            {
                array_push($ids, '-1');
            }
            return $this->_get_column_select($layout_def) . ' IN (' . implode(', ', $ids) . ') ';
        }
        else
        {
            return parent::queryFilterStarts_With($layout_def);
        }
    }
}

?>
