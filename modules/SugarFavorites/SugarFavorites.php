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



class SugarFavorites extends Basic 
{	
	public $new_schema = true;
	public $module_dir = 'SugarFavorites';
	public $object_name = 'SugarFavorites';
	public $table_name = 'sugarfavorites';
	public $importable = false;

    public $id;
    public $name;
    public $date_entered;
    public $date_modified;
    public $modified_user_id;
    public $modified_by_name;
    public $created_by;
    public $created_by_name;
    public $description;
    public $deleted;
    public $created_by_link;
    public $modified_user_link;
    public $assigned_user_id;
    public $assigned_user_name;
    public $assigned_user_link;
    public $module;
    public $record_id;
    public $tag;
    public $record_name;
    public $disable_row_level_security = true;
	
	public static function generateStar(
	    $on, 
	    $module, 
	    $record
	    )
	{
	global $app_strings;
		if ($on)
			return '<div class="star"><div class="on"   title="'.$app_strings['LBL_REMOVE_FROM_FAVORITES'].'" onclick="DCMenu.removeFromFavorites(this, \''.$module. '\',  \''.$record. '\');">&nbsp;</div></div>';
		else
			return '<div class="star"><div class="off"  title="'.$app_strings['LBL_ADD_TO_FAVORITES'].'" onclick="DCMenu.addToFavorites(this, \''.$module. '\',  \''.$record. '\');">&nbsp;</div></div>';
	}
	
	public static function generateGUID(
	    $module, 
	    $record,
	    $user_id = ''
	    )
	{
	    if(empty($user_id))
	        $user_id = $GLOBALS['current_user']->id;
	    
		return md5($module . $record . $user_id);
	}
	
	public static function isUserFavorite(
	    $module, 
	    $record,
	    $user_id = ''
	    )
	{
		$id = SugarFavorites::generateGUID($module, $record, $user_id);

		$focus = new SugarFavorites;
		$focus->retrieve($id);
		
		return !empty($focus->id);
	}

	public static function getUserFavoritesByModule(
	    $module = '',
	    User $user = null
	    )
	{
	    if ( empty($user) )
	        $where = " sugarfavorites.assigned_user_id = '{$GLOBALS['current_user']->id}' ";
	    else
	        $where = " sugarfavorites.assigned_user_id = '{$user->id}' ";
	    
        if ( !empty($module) )
            if ( is_array($module) )
                $where .= " AND sugarfavorites.module IN ('" . implode("','",$module) . "')";
            else
                $where .= " AND sugarfavorites.module = '$module' ";
        
        $focus = new SugarFavorites;
		$response = $focus->get_list("",$where);
	    
	    return $response['list'];
	}

    public static function markRecordDeletedInFavorites($record_id, $date_modified, $modified_user_id = "")
    {
        $focus = new SugarFavorites();
        $focus->mark_records_deleted_in_favorites($record_id, $date_modified, $modified_user_id);
    }

    public function mark_records_deleted_in_favorites($record_id, $date_modified, $modified_user_id = "")
    {
        if (isset($modified_user))
            $query = "UPDATE $this->table_name set deleted=1 , date_modified = '$date_modified', modified_user_id = '$modified_user_id' where record_id='$record_id'";
        else
            $query = "UPDATE $this->table_name set deleted=1 , date_modified = '$date_modified' where record_id='$record_id'";

        $this->db->query($query, true, "Error marking favorites deleted: ");
    }

	public function fill_in_additional_list_fields()
	{
	    parent::fill_in_additional_list_fields();
	    
	    $focus = loadBean($this->module);
	    if ( $focus instanceOf SugarBean ) {
	        $focus->retrieve($this->record_id);
	        if ( !empty($focus->id) )
	            $this->record_name = $focus->name;
	    }
	}
}