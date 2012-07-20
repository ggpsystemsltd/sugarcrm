<?PHP
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

require_once('data/SugarBean.php');
require_once('include/SugarObjects/templates/basic/Basic.php');
require_once('include/externalAPI/ExternalAPIFactory.php');
require_once('include/SugarOauth.php');

class EAPM extends Basic {
	var $new_schema = true;
	var $module_dir = 'EAPM';
	var $object_name = 'EAPM';
	var $table_name = 'eapm';
	var $importable = false;
		var $id;
		var $type;
		var $name;
		var $date_entered;
		var $date_modified;
		var $modified_user_id;
		var $modified_by_name;
		var $created_by;
		var $created_by_name;
		var $description;
		var $deleted;
		var $created_by_link;
		var $modified_user_link;
		var $assigned_user_id;
		var $assigned_user_name;
		var $assigned_user_link;
		var $password;
		var $url;
		var $validated = false;
		var $oauth_token;
		var $oauth_secret;
		var $application;
		var $consumer_key;
		var $consumer_secret;
		var $disable_row_level_security = true;

	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
}

   static function getLoginInfo($application, $includeInactive = false)
   {
       global $current_user;

       $eapmBean = new EAPM();

       if ( isset($_SESSION['EAPM'][$application]) && !$includeInactive ) {
           if ( is_array($_SESSION['EAPM'][$application]) ) {
               $eapmBean->fromArray($_SESSION['EAPM'][$application]);
           } else {
               return null;
           }
       } else {
           $queryArray = array('assigned_user_id'=>$current_user->id, 'application'=>$application, 'deleted'=>0 );
           if ( !$includeInactive ) {
               $queryArray['validated'] = 1;
           }
           $eapmBean = $eapmBean->retrieve_by_string_fields($queryArray);
           
           // Don't cache the include inactive results
           if ( !$includeInactive ) {
               if ( $eapmBean != null ) {
                   $_SESSION['EAPM'][$application] = $eapmBean->toArray();
               } else {
                   $_SESSION['EAPM'][$application] = '';
                   return null;
               }
           }
       }

       if(isset($eapmBean->password)){
           require_once("include/utils/encryption_utils.php");
           $eapmBean->password = blowfishDecode(blowfishGetKey('encrypt_field'),$eapmBean->password);;
       }

       return $eapmBean;
    }

    function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false) {
        global $current_user;

        if ( !is_admin($GLOBALS['current_user']) ) {
            // Restrict this so only admins can see other people's records
            $owner_where = $this->getOwnerWhere($current_user->id);
            
            if(empty($where)) {
                $where = $owner_where;
            } else {
                $where .= ' AND '.  $owner_where;
            }
        }
        
        return parent::create_new_list_query($order_by, $where, $filter, $params, $show_deleted,$join_type, $return_array, $parentbean, $singleSelect);
    }

   function save($check_notify = FALSE ) {
       $this->fillInName();
       if ( !is_admin($GLOBALS['current_user']) ) {
           $this->assigned_user_id = $GLOBALS['current_user']->id;
       }
       $parentRet = parent::save($check_notify);

       // Nuke the EAPM cache for this record
       if ( isset($_SESSION['EAPM'][$this->application]) ) {
           unset($_SESSION['EAPM'][$this->application]);
       }

       return $parentRet;
   }

   function mark_deleted($id)
   {
       // Nuke the EAPM cache for this record
       if ( isset($_SESSION['EAPM'][$this->application]) ) {
           unset($_SESSION['EAPM'][$this->application]);
       }
       
       return parent::mark_deleted($id);
   }

   function validated()
   {
       if(empty($this->id)) {
           return false;
       }
        // Don't use save, it will attempt to revalidate
       $adata = $GLOBALS['db']->quote($this->api_data);
       $GLOBALS['db']->query("UPDATE eapm SET validated=1,api_data='$adata'  WHERE id = '{$this->id}' AND deleted = 0");
       if(!$this->deleted && !empty($this->application)) {
           // deactivate other EAPMs with same app
           $sql = "UPDATE eapm SET deleted=1 WHERE application = '{$this->application}' AND id != '{$this->id}' AND deleted = 0 AND assigned_user_id = '{$this->assigned_user_id}'";
           $GLOBALS['db']->query($sql,true);
       }

       // Nuke the EAPM cache for this record
       if ( isset($_SESSION['EAPM'][$this->application]) ) {
           unset($_SESSION['EAPM'][$this->application]);
       }

   }

	protected function fillInName()
	{
        if ( !empty($this->application) ) {
            $apiList = ExternalAPIFactory::loadFullAPIList(false, true);
        }
	    if(!empty($apiList) && isset($apiList[$this->application]) && $apiList[$this->application]['authMethod'] == "oauth") {
	        $this->name = sprintf(translate('LBL_OAUTH_NAME', $this->module_dir), $this->application);
	    }
	}

	public function fill_in_additional_detail_fields()
	{
	    $this->fillInName();
	    parent::fill_in_additional_detail_fields();
	}

	public function fill_in_additional_list_fields()
	{
	    $this->fillInName();
	    parent::fill_in_additional_list_fields();
	}

	public function save_cleanup()
	{
	    $this->oauth_token = "";
        $this->oauth_secret = "";
        $this->api_data = "";
	}

    /**
     * Given a user remove their associated accounts. This is called when a user is deleted from the system.
     * @param  $user_id
     * @return void
     */
    public function delete_user_accounts($user_id){
        $sql = "DELETE FROM {$this->table_name} WHERE assigned_user_id = '{$user_id}'";
        $GLOBALS['db']->query($sql,true);
    }
}

// External API integration, for the dropdown list of what external API's are available
function getEAPMExternalApiDropDown() {
    $apiList = ExternalAPIFactory::getModuleDropDown('',true, true);

    return $apiList;

}
