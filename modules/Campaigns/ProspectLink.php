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

* Description: Bug 40166. Need for return right join for campaign's target list relations.
* All Rights Reserved.
* Contributor(s): ______________________________________..
********************************************************************************/

require_once('data/Link2.php');

/**
 * @brief Bug #40166. Campaign Log Report will not display Contact/Account Names
 */
class ProspectLink extends Link2
{

    /**
     * This method changes join of any item to campaign through target list
     * if you want to use this join method you should add code below to your vardef.php
     * 'link_class' => 'ProspectLink',
     * 'link_file' => 'modules/Campaigns/ProspectLink.php'
     *
     * @see Link::getJoin method
     */
    public function getJoin($params, $return_array = false)
    {
        $join_type= ' INNER JOIN ';
        if (isset($params['join_type']))
        {
            $join_type = $params['join_type'];
        }
        $join = '';
        $bean_is_lhs=$this->_get_bean_position();

        if (
            $this->_relationship->relationship_type == 'one-to-many'
            && $bean_is_lhs
        )
        {
            $table_with_alias = $table = $this->_relationship->rhs_table;
            $key = $this->_relationship->rhs_key;
            $module = $this->_relationship->rhs_module;
            $other_table = (empty($params['left_join_table_alias']) ? $this->_relationship->lhs_table : $params['left_join_table_alias']);
            $other_key = $this->_relationship->lhs_key;
            $alias_prefix = $table;
            if (!empty($params['join_table_alias']))
            {
                $table_with_alias = $table. " ".$params['join_table_alias'];
                $table = $params['join_table_alias'];
                $alias_prefix = $params['join_table_alias'];
            }

            $join .= ' '.$join_type.' prospect_list_campaigns '.$alias_prefix.'_plc ON';
            $join .= ' '.$alias_prefix.'_plc.'.$key.' = '.$other_table.'.'.$other_key."\n";

            // join list targets
            $join .= ' '.$join_type.' prospect_lists_prospects '.$alias_prefix.'_plp ON';
            $join .= ' '.$alias_prefix.'_plp.prospect_list_id = '.$alias_prefix.'_plc.prospect_list_id AND';
            $join .= ' '.$alias_prefix.'_plp.related_type = '.$GLOBALS['db']->quoted($module)."\n";

            // join target
            $join .= ' '.$join_type.' '.$table_with_alias.' ON';
            $join .= ' '.$table.'.id = '.$alias_prefix.'_plp.related_id AND';
            $join .= ' '.$table.'.deleted=0'."\n";

            if ($return_array)
            {
                $ret_arr = array();
                $ret_arr['join'] = $join;
                $ret_arr['type'] = $this->_relationship->relationship_type;
                if ($bean_is_lhs)
                {
                    $ret_arr['rel_key'] = $this->_relationship->join_key_rhs;
                }
                else
                {
                    $ret_arr['rel_key'] = $this->_relationship->join_key_lhs;
                }
                return $ret_arr;
            }
            return $join;
        } else {
            return parent::getJoin($params, $return_array);
        }
    }
}
