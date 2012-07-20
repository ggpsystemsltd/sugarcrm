<?php
if(!defined('sugarEntry') || !sugarEntry)
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

// User is used to store Forecast information.
class KBDocument extends SugarBean {

	var $id;
	var $kbdocument_name;
	var $description;
	var $status_id;
	var $created_by;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $kbdoc_approver_name;
    var $kbdoc_approver_id;
	var $assigned_user_id;
	var $team_id;
	var $active_date;
	var $exp_date;
	var $document_revision_id;
	var $filename;
	var $img_name;
	var $img_name_bare;
	var $related_doc_id;
	var $related_doc_rev_id;
	var $is_template;
	var $template_type;
	var $parent_id;
	var $parent_type;

	//additional fields.
	var $revision;
	var $kbdocument_revision_number;
    var $kbdocument_revision_id;
	var $last_rev_create_date;
	var $last_rev_created_by;
	var $last_rev_created_name;
	var $latest_revision;
	var $file_url;
	var $file_url_noimage;

	var $table_name = "kbdocuments";
	var $object_name = "KBDocument";
	var $user_preferences;

	var $encodeFields = Array ();

	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array ('revision');



	var $new_schema = true;
	var $module_dir = 'KBDocuments';

//todo remove leads relationship.
	var $relationship_fields = Array('contract_id'=>'contracts',

		'lead_id' => 'leads'
	 );

	function KBDocument() {
		parent :: SugarBean();
		$this->setupCustomFields('KBDocuments'); //parameter is module name
	}

	function get_notification_recipients() {
		$notify_user = new User();
		if ($this->status_id=='In Review') {
			$notify_user->retrieve($this->kbdoc_approver_id);
		} else {
			$notify_user->retrieve($this->assigned_user_id);
		}
		$this->new_assigned_user_name = $notify_user->full_name;

		$GLOBALS['log']->info("Notifications: recipient is $this->new_assigned_user_name");

		$user_list = array($notify_user);
		return $user_list;
	}


	  function set_notification_body($xtpl, $kbdoc)
	{
		global $app_list_strings,$current_user,$mod_strings,$timedate;
		$user = new User();
		$user->retrieve($kbdoc->created_by);
		$user_name = '';

		if($user->first_name != null){
		 $user_name = $user->first_name.' ';
		}
		if($user->last_name != null){
		 $user_name .= $user->last_name;
		}

		$xtpl->assign("KBDOCUMENT_NAME", $kbdoc->kbdocument_name);
		$xtpl->assign("KBDOCUMENT_STATUS", (isset($kbdoc->status_id) ? $app_list_strings['kbdocument_status_dom'][$kbdoc->status_id]:""));

        //date entered will be available most of the time, in the cases where it is cleared out, use the fetched row value
        $dateCreated = $timedate->to_display_date_time($kbdoc->date_entered);
        if(empty($dateCreated)){
            $dateCreated = $timedate->to_display_date_time($kbdoc->fetched_row['date_entered']);
        }

		$xtpl->assign("KBDOCUMENT_DATE_CREATED",$dateCreated);
		$xtpl->assign("KBDOCUMENT_CREATED_BY",$user_name);
		$xtpl->assign("KBDOCUMENT_DESCRIPTION", $kbdoc->description);
        if(isset($kbdoc->status_id) && $kbdoc->status_id != null){
	         if($app_list_strings['kbdocument_status_dom'][$kbdoc->status_id]=='Published'){
	          $xtpl->assign("NOTIFICATION_MESSAGE",$mod_strings['LBL_KB_NOTIFICATION']);
	         }
	         else if($app_list_strings['kbdocument_status_dom'][$kbdoc->status_id]=='In Review'){
	               $xtpl->assign("NOTIFICATION_MESSAGE","$current_user->name {$mod_strings['LBL_KB_PUBLISHED_REQUEST']}");
	          }
	         else if($app_list_strings['kbdocument_status_dom'][$kbdoc->status_id]=='Draft'){
	               $xtpl->assign("NOTIFICATION_MESSAGE",$mod_strings['LBL_KB_STATUS_BACK_TO_DRAFT']);
            }
        }
		return $xtpl;
	}

	function get_summary_text() {
		return "$this->kbdocument_name";
	}

	function is_authenticated() {
		return $this->authenticated;
	}

	function fill_in_additional_list_fields() {
		global $locale;
        $query = "SELECT first_name,last_name FROM users WHERE id = '$this->created_by'";
		$result = $this->db->query($query);
		$row = $this->db->fetchByAssoc($result);
		if(!empty($row)) {
		   $this->kbarticle_author_id = $this->created_by;
		   $this->kbarticle_author_name = $locale->getLocaleFormattedName($row['first_name'], $row['last_name']);
		   $this->created_by = $this->kbarticle_author_name;
		}
	}

	function fill_in_additional_detail_fields() {
		global $theme;
		global $current_language;
		global $timedate;

		parent::fill_in_additional_detail_fields();

		$this->assigned_name = get_assigned_team_name($this->team_id);
		$mod_strings = return_module_language($current_language, 'KBDocuments');

		$query = "SELECT filename,revision,file_ext FROM kbdocument_revisions WHERE id='$this->kbdocument_revision_id'";

		$result = $this->db->query($query);
		$row = $this->db->fetchByAssoc($result);

		//popuplate filename
		$this->filename = $row['filename'];
		$this->latest_revision = $row['revision'];

		//populate the file url.
		//image is selected based on the extension name <ext>_icon_inline, extension is stored in document_revisions.
		//if file is not found then default image file will be used.
		global $img_name;
		global $img_name_bare;
		if (!empty ($row['file_ext'])) {
			$img_name = SugarThemeRegistry::current()->getImageURL(strtolower($row['file_ext'])."_image_inline.gif");
			$img_name_bare = strtolower($row['file_ext'])."_image_inline";
		}

		//set default file name.
		if (!empty ($img_name) && file_exists($img_name)) {
			$img_name = $img_name_bare;
		} else {
			$img_name = "def_image_inline"; //todo change the default image.
		}


		$this->file_url = "<a href='index.php?entryPoint=download&id={$this->document_revision_id}&type=Documents' target='_blank'>".SugarThemeRegistry::current()->getImage($img_name, 'border="0"', null,null,'.gif',$mod_strings['LBL_LIST_VIEW_DOCUMENT'])."</a>";
		$this->file_url_noimage = "index.php?entryPoint=download&type=Documents&id={$this->document_revision_id}";

		//get last_rev_by user name.
		$query = "SELECT first_name,last_name, document_revisions.date_entered as rev_date FROM users, document_revisions WHERE users.id = document_revisions.created_by and document_revisions.id = '$this->document_revision_id'";
		$result = $this->db->query($query, true, "Eror fetching user name: ");
		$row = $this->db->fetchByAssoc($result);
		if (!empty ($row)) {
			$this->last_rev_created_name = $row['first_name'].' '.$row['last_name'];

			$this->last_rev_create_date = $timedate->to_display_date_time($row['rev_date']);
		}
	}

	function list_view_parse_additional_sections(& $list_form, $xTemplateSection) {
		return $list_form;
	}

    function create_export_query(&$order_by, &$where, $relate_link_join='')
    {
        $custom_join = $this->custom_fields->getJOIN(true, true,$where);
		if($custom_join)
				$custom_join['join'] .= $relate_link_join;
		$query = "SELECT
						kbdocuments.*";
		if($custom_join){
			$query .=  $custom_join['select'];
		}
		$query .= " FROM kbdocuments ";
		if($custom_join){
			$query .=  $custom_join['join'];
		}
		$where_auto = " kbdocuments.deleted = 0";

		if ($where != "")
			$query .= " WHERE $where AND ".$where_auto;
		else
			$query .= " WHERE ".$where_auto;

		if ($order_by != "")
			$query .= " ORDER BY $order_by";
		else
			$query .= " ORDER BY kbdocuments.kbdocument_name";

		return $query;
	}

    function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean){
        global $current_user;
        $ret_array=array();
        $ret_array['select'] = "SELECT jt0.id assigned_user_id, jt0.user_name assigned_user_name, jt1.id kbdoc_approver_id, jt1.user_name kbdoc_approver_name, kvr.views_number views_number";
        $ret_array['select'] .= ", kbdocuments.id, kbdocuments.kbdocument_name, kbdocuments.active_date, kbdocuments.exp_date, kbdocuments.status_id, kbdocuments.date_entered date_entered, kbdocuments.date_modified, kbdocuments.deleted, kbdocuments.is_external_article, kbdocuments.modified_user_id";
         $custom_join = false;
        if((!isset($params['include_custom_fields']) || $params['include_custom_fields']) &&  isset($this->custom_fields))
        {

            $custom_join = $this->custom_fields->getJOIN( empty($filter)? true: $filter );
            if($custom_join)
            {
                $ret_array['select'] .= ' ' .$custom_join['select'];
            }
        }
        if (!is_admin($current_user) && !$this->disable_row_level_security){
            $ret_array['select'] .= ", kbdocuments.team_id ";
        }
        $ret_array['from'] = " FROM kbdocuments left join kbdocuments_views_ratings kvr ON kbdocuments.id = kvr.kbdocument_id  LEFT JOIN  users jt0 ON jt0.id= kbdocuments.assigned_user_id AND jt0.deleted=0  LEFT JOIN  users jt1 ON jt1.id= kbdocuments.kbdoc_approver_id AND jt1.deleted=0 ";
        if($custom_join)
        {
            $ret_array['from'] .= ' ' . $custom_join['join'];
        }
        if (!is_admin($current_user) && !$this->disable_row_level_security){
            $this->add_team_security_where_clause($ret_array['from']);
        }
        if(!empty($where) && trim($where) != '') {
            // Strip leading AND or OR for bug 48173
            $ret_array['where'] = ' WHERE '. preg_replace('#^\s*(AND)|(OR)\s+#i', '', $where);
        } else {
            $ret_array['where'] = '';
        }
        //if order by just has asc or des
        $temp_order = trim($order_by);
        $temp_order = strtolower($temp_order);
        if($temp_order == 'asc'  ||  $temp_order == 'desc'){$order_by = '';}

        $ret_array['order_by'] = (!empty($order_by) ? ' ORDER BY '. $order_by : '  ORDER BY kbdocuments.date_entered');

        $ret_array['from_min'] = $ret_array['from'];
        if ( !$return_array ) {
            return  $ret_array['select'] . $ret_array['from'] . $ret_array['where']. $ret_array['order_by'];
        }
        return $ret_array;
    }


	function get_list_view_data() {
		global $current_language;
		$app_list_strings = return_app_list_strings_language($current_language);

		$document_fields = $this->get_list_view_array();
		$document_fields['FILE_URL'] = $this->file_url;
		$document_fields['FILE_URL_NOIMAGE'] = $this->file_url_noimage;
		$document_fields['LAST_REV_CREATED_BY'] = $this->last_rev_created_name;
		$document_fields['CATEGORY_ID'] = empty ($this->category_id) ? "" : $app_list_strings['document_category_dom'][$this->category_id];
		$document_fields['SUBCATEGORY_ID'] = empty ($this->subcategory_id) ? "" : $app_list_strings['document_subcategory_dom'][$this->subcategory_id];

		return $document_fields;
	}
	function mark_relationships_deleted($id) {
		//do nothing, this call is here to avoid default delete processing since
		//delete.php handles deletion of document revisions.
	}

	function bean_implements($interface) {
		switch ($interface) {
			case 'ACL' :
				return true;
		}
		return false;
	}

	//static function.
	function get_document_name($doc_id){
		if (empty($doc_id)) return null;

		$db = DBManagerFactory::getInstance();
		$query="select kbdocument_name from kbdocuments where id='$doc_id'";
		$result=$db->query($query);
		if (!empty($result)) {
			$row=$db->fetchByAssoc($result);
			if (!empty($row)) {
				return $row['kbdocument_name'];
			}
		}
		return null;
	}
	//static function.
	function get_kbdoc_body($kbdoc_id,$is_revision = false){
		if (empty($kbdoc_id)) return null;
		$db = DBManagerFactory::getInstance();
		if($is_revision){
			//if content is under a revision. old query
			//$query="select kbdocument_body from kbcontents where document_revision_id in
			//		( select id from document_revisions where kbdocument_revision_id in(select id from kbdocument_revisions where kbdocument_id  = '$kbdoc_id'))";
			//new query
			$query="select kbdocument_body from kbcontents where document_revision_id in
					(select document_revision_id from kbdocument_revisions where kbdocument_id  = '$kbdoc_id' and deleted=0) and deleted=0";
		}
		else{
			//if content is under the main document. old query
			//$query="select kbdocument_body from kbcontents where id in
			//	( select kbcontent_id from kbdocument_revisions where kbdocument_id = '$kbdoc_id')";
			//new query
			$query="select kbdocument_body from kbcontents where id in
				(select kbcontent_id from kbdocument_revisions where kbdocument_id = '$kbdoc_id' and deleted=0 and latest=1) and deleted=0";
		}
		$result=$db->query($query);
		if (!empty($result)) {
            //increment count
            require_once('modules/KBDocuments/SearchUtils.php');
             updateKBView($kbdoc_id);

			$row=$db->fetchByAssoc($result);
			if (!empty($row)) {
				$body = $row['kbdocument_body'];
				return $body;
			}
		}
		return null;
	}


    //static function.
    function get_kbdoc_body_without_incrementing_count($kbdoc_id,$is_revision = false, $increment=true){
        if (empty($kbdoc_id)) return null;
        $db = DBManagerFactory::getInstance();
        if($is_revision){
            //if content is under a revision. old query
            //$query="select kbdocument_body from kbcontents where document_revision_id in
            //      ( select id from document_revisions where kbdocument_revision_id in(select id from kbdocument_revisions where kbdocument_id  = '$kbdoc_id'))";
            //new query
            $query="select kbdocument_body from kbcontents where document_revision_id in
                    (select document_revision_id from kbdocument_revisions where kbdocument_id  = '$kbdoc_id' and deleted=0) and deleted=0";
        }
        else{
            //if content is under the main document. old query
            //$query="select kbdocument_body from kbcontents where id in
            //  ( select kbcontent_id from kbdocument_revisions where kbdocument_id = '$kbdoc_id')";
            //new query
            $query="select kbdocument_body from kbcontents where id in
                (select kbcontent_id from kbdocument_revisions where kbdocument_id = '$kbdoc_id' and deleted=0 and latest=1) and deleted=0";
        }
        $result=$db->query($query);
        if (!empty($result)) {
            $row=$db->fetchByAssoc($result);
            if (!empty($row)) {
                $body = $row['kbdocument_body'];
                return $body;
            }
        }
        return null;
    }

     //function is called statically.
    function get_kbdoc_attachments_for_newemail($kbdoc_id){
		if (empty($kbdoc_id)) return null;

		global $sugar_config,$app_strings;

		$docrevs = array();
		$query="select id,filename,file_mime_type from document_revisions where id in(select document_revision_id from kbdocument_revisions where kbdocument_id='$kbdoc_id' and deleted=0) and file_mime_type is not null and deleted=0";
		$result=$GLOBALS['db']->query($query);
        $i=0;
        $ret = array()	;
        $ret['attachments'] = array();
		while($a = $GLOBALS['db']->fetchByAssoc($result)) {
			$fileLocation = "upload://{$a['id']}";
			$note = new Note();
			$note->id = create_guid();
			$note->new_with_id = true; // duplicating the note with files
			//$note->parent_id = $this->id;
			//$note->parent_type = $this->module_dir;
			$note->name = $a['filename'];
			$note->filename = $a['filename'];
			$noteFile = "upload://$note->id";
			$note->file_mime_type = $a['file_mime_type'];
			if(!copy($fileLocation, $noteFile)) {
				$GLOBALS['log']->debug("EMAIL 2.0: could not copy attachment file $fileLocation => $noteFile");
			}
			$note->save();

			$ret['attachments'][$note->id] = array(
				'id'		=> $note->id,
				'filename'	=> $a['filename'],
			);
		}

		return $ret;
	}


	//get all attachments
	function get_kbdoc_attachments($kbdoc_id,$screen){
		if (empty($kbdoc_id)) return null;
		global $app_strings,$mod_strings;
		$db = DBManagerFactory::getInstance();
		$docrevs = array();
		//$kbdoc_rev_id = $kbdoc->kbdocument_revision_id;
		//old query
		//$query="select id,filename,document_id from document_revisions where kbdocument_revision_id ='$kbdoc_rev_id' and file_mime_type is not null";
		//new query
		$query="select id,filename from document_revisions where id in(select document_revision_id from kbdocument_revisions where kbdocument_id='$kbdoc_id' and deleted=0) and file_mime_type is not null and deleted=0";
		$result=$db->query($query);

		if (!empty($result)) {
			 while($row = $db->fetchByAssoc($result, false)){
               $docrevs[]=$row;
              }
		}
		$kbdoc_atts = '';
		if($screen =='Detail'){
			for($i=0;$i<count($docrevs);$i++){
			     $doc_rev_id = $docrevs[$i]['id'];
			     $filename = $docrevs[$i]['filename'];
				 $kbdoc_atts .="<div id=tag$i> <a href='index.php?entryPoint=download&id=$doc_rev_id&type=KBDocuments' class='tabDetailViewDFLink'>$filename</a>&nbsp;</div>";
			}
		}
		if($screen =='Edit'){

		 $doc='Doc';
			for($i=0;$i<count($docrevs);$i++){
			     $doc_rev_id = $docrevs[$i]['id'];
			     $filename = $docrevs[$i]['filename'];
			     $cDoc = "'" . "Doc".$i . "'";
			     $att = true;
			     $doc_rev ="'$doc_rev_id'";
			     $kbdoc_atts .="<div id=$cDoc>";
			     $kbdoc_atts .= SugarThemeRegistry::current()->getImage('delete', "onclick=\"SUGAR.kb.strikeOutFromImage($cDoc,$doc_rev,$att);SUGAR.kb.setCheckBox($doc_rev)\"", null, null, ".gif", $app_strings['LBL_REMOVE']);
				 $kbdoc_atts .="<a href='index.php?entryPoint=download&id=$doc_rev_id&type=KBDocuments' class='tabDetailViewDFLink'>$filename</a>&nbsp;";
				 $kbdoc_atts .= '<input id="'.$doc_rev_id.'" type="checkbox"  style="visibility:hidden" onclick="SUGAR.kb.strikeOutFromBox('.$cDoc.','.$doc_rev.')" name="'.$doc_rev_id.'" value="'.$doc_rev_id.'">';//.$app_strings['LNK_REMOVE'].'&nbsp;&nbsp;';
				 $kbdoc_atts .="</div>";
			}
		}

		 return $kbdoc_atts;
	}
	function parentTags($kbtag_id){
      $db = DBManagerFactory::getInstance();
  	  $query="select parent_tag_id,tag_name from kbtags where id ='$kbtag_id'";
	  $result=$db->query($query);
	  $kbtags=$db->fetchByAssoc($result);
      $tag_heirachy = $kbtags['tag_name'];
	  $parent_tag_id = $kbtags['parent_tag_id'];
    while ($parent_tag_id != null) {
      $db = DBManagerFactory::getInstance();
  	  $query="select parent_tag_id,tag_name from kbtags where id ='$parent_tag_id'";
	  $result=$db->query($query);
	  $kbtags=$db->fetchByAssoc($result);
      $tag_heirachy='/'.$tag_heirachy;
      }
    return $tag_heirachy;
 }
	function get_kbdoc_tags($kbdoc_id){
		if (empty($kbdoc_id)) return null;
		$db = DBManagerFactory::getInstance();
		$query="select kbtag_id from kbdocuments_kbtags where kbdocument_id = '$kbdoc_id'";
		$result=$db->query($query);
		if (!empty($result)) {
			$kbtags=$db->fetchByAssoc($result);
			if (!empty($kbtags)) {
				return $kbtags;
			}
		}
		return null;
	}

function get_tags($kbdoc_id){
	    $kbtags_heirarchy=array();
	    $kbtags = array();
	    if (empty($kbdoc_id)) return null;
		$db = DBManagerFactory::getInstance();
		$query="select kbtag_id,kbdocument_id from kbdocuments_kbtags where kbdocument_id = '$kbdoc_id'";
		$result=$db->query($query);
		if (!empty($result)) {
			$kbtags = $db->fetchByAssoc($result);
		}
	    return $kbtags;
}

function get_kbdoc_tags_heirarchy($kbdoc_id,$screen){
        global $app_strings,$mod_strings;
		$focus = new KBDocument();
		$kbtags_heirarchy=array();
	    $kbtags = array();
	    $kbdoctags = array();
	    if (empty($kbdoc_id)) return null;
		$query="select kbtag_id from kbdocuments_kbtags where kbdocument_id = '$kbdoc_id' and deleted=0";
		$result=$focus->db->query($query);
		$tags='';
       while($row = $focus->db->fetchByAssoc($result, false)){
         $kbdoctags[]=$row;
        }
      for($i=0;$i<count($kbdoctags);$i++){
      	 $tag_heirachy = '';
	     $kbtag_id = $kbdoctags[$i]['kbtag_id'];
	  	  $query="select parent_tag_id,tag_name from kbtags where id ='$kbtag_id' and deleted=0";
		  $result=$focus->db->query($query);
		  $kbtags=$focus->db->fetchByAssoc($result);
		  $att = 0;
		  if($kbtags != null){
		      $tag_heirachy = $kbtags['tag_name'];
			  $parent_tag_id = $kbtags['parent_tag_id'];
			    while ($parent_tag_id != null) {
			      $kbt = '';
			  	  $query="select parent_tag_id,tag_name from kbtags where id ='$parent_tag_id' and deleted=0";
				  $result=$focus->db->query($query);
				  $kbt=$focus->db->fetchByAssoc($result);
				  $parent_tag_id = $kbt['parent_tag_id'];
			      $tag_heirachy=$kbt['tag_name'].'/'.$tag_heirachy;
			     }

			     $kbtags_heirarchy[$i]=$tag_heirachy;
		         $cTag = "'" . "tag".$i . "'";
		         $cBox = "'$kbtag_id'";
		         $tags .= "<div id=$cTag onmouseover = '' onmouseout=''>";
		         if($screen == 'Edit'){
			       $tags .= SugarThemeRegistry::current()->getImage('delete', "onclick=\"SUGAR.kb.strikeOutFromImage($cTag,$cBox,$att)\"", null, null, ".gif", $mod_strings['LBL_REMOVE']);


			       //store already saved tags
			       $tags .= '<input id="savedTagIds[]" name="savedTagIds[]" type="hidden"  value="'.$kbtag_id.'">';
			       $tags .= "<strong>$tag_heirachy&nbsp;&nbsp";
			     }

			     if($screen=='Detail'){
			       $tags .= "$tag_heirachy&nbsp;&nbsp";
			     }
			     if($screen == 'Edit'){
			     	$tags .= '<input id="'.$kbtag_id.'" type="checkbox"  style="visibility:hidden" onclick="SUGAR.kb.strikeOutFromBox('.$cTag.','.$cBox.')" name="'.$kbtag_id.'" value="'.$kbtag_id.'">';//.$app_strings['LNK_REMOVE'].'&nbsp;&nbsp;';
			     }
			     //$tags .= "<input type='checkbox' name='remove_tags[]' value='.$kbtag_id.'> '.$app_strings['LNK_REMOVE'].'";

			     $tags .= "</div>";

			     //$tags .= "<onmouseover= 'return A customizable view into Accounts'></br>";
			     //$tags .= "<tr><td colspan='3' valign='top' valign='top'><input type='text' onmouseover=\"alert('aa');\" id='tags[]' name='tags[]' value='$tag_heirachy'></td></tr>";
			  }
       }
		return $tags; //btags_heirarchy;
	}
	function get_kbdocument_revisions($kbdoc_id){
		$return_array= Array();
		if (empty($kbdoc_id)) return $return_array;

		$db = DBManagerFactory::getInstance();
		$query="select id from kbdocument_revisions where kbdocument_id='$kbdoc_id' and deleted=0";
		$result=$db->query($query);
		if (!empty($result)) {
			while (($row=$db->fetchByAssoc($result)) != null) {
				$return_array[$row['id']]=$row['id'];
			}
		}
		return $return_array;
	}

	/**
	* This function is used to execute the query and create an array template objects
	* from the resulting ids from the query.
	* It is currently used for building sub-panel arrays.
    *
	* @param string $query - the query that should be executed to build the list
	* @param object $template - The object that should be used to copy the records.
    * @param int $row_offset Optional, default 0
    * @param int $limit Optional, default -1
    * @return array
	*/
	function build_related_list($query, &$template, $row_offset = 0, $limit = -1)
	{
		$GLOBALS['log']->info("Finding linked records $this->object_name: ".$query);

        if(isset($row_offset) && isset($limit) && $limit != -1) {
		    $result = $this->db->limitQuery($query, $row_offset, $limit, true, "Error retrieving $template->object_name list: ");
		} else {
			$result = $this->db->query($query, true);
		}

		$list = Array();
		$isFirstTime = true;
		$class = get_class($template);
		$disable_security_flag = ($template->disable_row_level_security) ? true : false;
		$authors = array();
		while($row = $this->db->fetchByAssoc($result))
		{
			if(!$isFirstTime)
			{
				$template = new $class();
				$template->disable_row_level_security = $disable_security_flag;
			}
			$isFirstTime = false;
			$record = $template->retrieve($row['id']);

			if($record != null)
			{
				// Check if we already have the author name queried
				if(!isset($authors[$record->created_by])) {
			       $query2 = "SELECT first_name, last_name FROM users WHERE id = '$record->created_by'";
	               $results2 = $template->db->query($query2);
			       $row2 = $template->db->fetchByAssoc($results2);
			       if (!empty ($row2)) {
					    $authors[$record->created_by] = $row2['first_name'].' '.$row2['last_name'];
				   }
				}
                $record->created_by = $authors[$record->created_by];

				// this copies the object into the array
				$list[] = $record;
			}
		}
		return $list;
	}



    /**
     * Changes the select expression of the given query to be 'count(*)' so you
     * can get the number of items the query will return.  This is used to
     * populate the upper limit on ListViews.
     *
     * @param string $query Select query string
     * @return string count query
     *
     * Internal function, do not override.
     */
    function create_list_count_query($query)
    {
        // change the select expression to 'count(*)'
        $pattern = '/SELECT(.*?)(\s){1}FROM(\s){1}/is';  // ignores the case
        $replacement = 'SELECT count(*) c FROM ';
        $modified_select_query = preg_replace($pattern, $replacement, $query,1);

        //change order by's to lowercase
        $OBPattern = '/order by/i';
        $modified_select_query = preg_replace($OBPattern, 'order by', $modified_select_query);

        //searching for last for last occurrence of 'order by' via string manipulation
        //was producing inconsistent results, so we are exploding into array instead
        $pattern = 'order by';
        $query_array = explode($pattern, $modified_select_query);
        //remove the last order by in the array, which would otherwise blow up the count query
        $throwaway = array_pop($query_array);

        //now that the last order by is removed, lets recreate string
        $first = true;
        $modified_order_by_query = '';
        foreach($query_array as $val){
            //do not add order by on first pass
            if($first){
                $modified_order_by_query .= " $val ";
                $first = false;
            }else{
                $modified_order_by_query .= ' order by '.$val;
            }
        }

        return $modified_order_by_query;
    }


}


?>
