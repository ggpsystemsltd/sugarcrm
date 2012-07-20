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


require_once('include/Dashlets/DashletGeneric.php');
require_once('include/externalAPI/ExternalAPIFactory.php');

class SugarFeedDashlet extends DashletGeneric {
var $displayRows = 15;

var $categories;

var $userfeed_created;

var $selectedCategories = array();

var $myFavoritesOnly = false;

    function SugarFeedDashlet($id, $def = null) {
		global $current_user, $app_strings, $app_list_strings;

		require('modules/SugarFeed/metadata/dashletviewdefs.php');
		$this->myItemsOnly = false;
        parent::DashletGeneric($id, $def);
		$this->myItemsOnly = false;
		$this->isConfigurable = true;
		$this->hasScript = true;
		$pattern = array();
		$pattern[] = "/-/";
		$pattern[] = "/[0-9]/";
		$replacements = array();
		$replacements[] = '';
		$replacements[] = '';
		$this->idjs = preg_replace($pattern,$replacements,$this->id);
        // Add in some default categories.
        $this->categories['ALL'] = translate('LBL_ALL','SugarFeed');
        // Need to get the rest of the active SugarFeed modules
        $module_list = SugarFeed::getActiveFeedModules();
        
        // Translate the category names
        if ( ! is_array($module_list) ) { $module_list = array(); }
        foreach ( $module_list as $module ) {
            if ( $module == 'UserFeed' ) {
                // Fake module, need to translate specially
                $this->categories[$module] = translate('LBL_USER_FEED','SugarFeed');
            } else {
                $this->categories[$module] = $app_list_strings['moduleList'][$module];
            }
        }

        // Need to add the external api's here
        $this->externalAPIList = ExternalAPIFactory::getModuleDropDown('SugarFeed',true);
        if ( !is_array($this->externalAPIList) ) { $this->externalAPIList = array(); }
        foreach ( $this->externalAPIList as $apiObj => $apiName ) {
            $this->categories[$apiObj] = $apiName;
        }


        if(empty($def['title'])) $this->title = translate('LBL_HOMEPAGE_TITLE', 'SugarFeed');
		if(!empty($def['rows']))$this->displayRows = $def['rows'];
		if(!empty($def['categories']))$this->selectedCategories = $def['categories'];
		if(!empty($def['userfeed_created'])) $this->userfeed_created = $def['userfeed_created'];
        if(!empty($def['myFavoritesOnly']))$this->myFavoritesOnly = $def['myFavoritesOnly'];
        $this->searchFields = $dashletData['SugarFeedDashlet']['searchFields'];
        $this->columns = $dashletData['SugarFeedDashlet']['columns'];
		$catCount = count($this->categories);
		ACLController::filterModuleList($this->categories, false);
		if(count($this->categories) < $catCount){
			if(!empty($this->selectedCategories)){
				ACLController::filterModuleList($this->selectedCategories, true);
			}else{
				$this->selectedCategories = array_keys($this->categories);
				unset($this->selectedCategories[0]);
			}
		}

        $this->seedBean = new SugarFeed();
    }

	function process($lvsParams = array()) {
        global $current_user;

        $currentSearchFields = array();
        $configureView = true; // configure view or regular view
        $query = false;
        $whereArray = array();
        $lvsParams['massupdate'] = false;

        // apply filters
        if(isset($this->filters) || $this->myItemsOnly) {
            $whereArray = $this->buildWhere();
        }

        $this->lvs->export = false;
        $this->lvs->multiSelect = false;
		$this->lvs->quickViewLinks = false;
        // columns
    foreach($this->columns as $name => $val) {
                if(!empty($val['default']) && $val['default']) {
                    $displayColumns[strtoupper($name)] = $val;
                    $displayColumns[strtoupper($name)]['label'] = trim($displayColumns[strtoupper($name)]['label'], ':');
                }
            }

        $this->lvs->displayColumns = $displayColumns;

        $this->lvs->lvd->setVariableName($this->seedBean->object_name, array());

        $lvsParams['overrideOrder'] = true;
        $lvsParams['orderBy'] = 'date_entered';
        $lvsParams['sortOrder'] = 'DESC';
        $lvsParams['custom_from'] = '';


        // Get the real module list
        if (empty($this->selectedCategories)){
            $mod_list = $this->categories;
        } else {
            $mod_list = array_flip($this->selectedCategories);//27949, here the key of $this->selectedCategories is not module name, the value is module name, so array_flip it.
        }

        $external_modules = array();
        $admin_modules = array();
        $owner_modules = array();
        $regular_modules = array();
        foreach($mod_list as $module => $ignore) {
			// Handle the UserFeed differently
			if ( $module == 'UserFeed') {
				$regular_modules[] = 'UserFeed';
				continue;
			}
            if ( in_array($module,$this->externalAPIList) ) {
                $external_modules[] = $module;
            }
			if (ACLAction::getUserAccessLevel($current_user->id,$module,'view') <= ACL_ALLOW_NONE ) {
				// Not enough access to view any records, don't add it to any lists
				continue;
			}
            if (ACLAction::getUserAccessLevel($current_user->id,$module,'admin') >= ACL_ALLOW_ADMIN_DEV ) {
                $admin_modules[] = $module;
				continue;
			}
			if ( ACLAction::getUserAccessLevel($current_user->id,$module,'view') == ACL_ALLOW_OWNER ) {
				$owner_modules[] = $module;
            } else {
                $regular_modules[] = $module;
            }
        }

        if(!empty($this->displayTpl))
        {
        	//MFH BUG #14296
            $where = '';
            if(!empty($whereArray)){
                $where = '(' . implode(') AND (', $whereArray) . ')';

            }

            $additional_where = '';


			$module_limiter = " sugarfeed.related_module in ('" . implode("','", $regular_modules) . "')";

			if( is_admin($GLOBALS['current_user'] ) )
            {
                $all_modules = array_merge($regular_modules, $owner_modules, $admin_modules);
                $module_limiter = " sugarfeed.related_module in ('" . implode("','", $all_modules) . "')";
            }
            else if ( count($owner_modules) > 0
				 || count($admin_modules) > 0
				) {
                $this->seedBean->disable_row_level_security = true;
                
                 //From SugarBean add_team_security_where_clause but customized select.
                $lvsParams['custom_from'] .= ' LEFT JOIN (select tst.team_set_id, team_memberships.id as team_membership_id from team_sets_teams tst INNER JOIN team_memberships team_memberships ON tst.team_id = team_memberships.team_id AND team_memberships.user_id = "' . $current_user->id . '" AND team_memberships.deleted=0 group by tst.team_set_id) sugarfeed_tf on sugarfeed_tf.team_set_id  = sugarfeed.team_set_id ';

                $module_limiter = " ((sugarfeed.related_module IN ('".implode("','", $regular_modules)."') "
					."AND team_membership_id IS NOT NULL "
					.") ";
				if ( count($admin_modules) > 0 ) {
					$module_limiter .= "OR (sugarfeed.related_module IN ('".implode("','", $admin_modules)."')) ";
				}
				if ( count($owner_modules) > 0 ) {
					$module_limiter .= "OR (sugarfeed.related_module IN('".implode("','", $owner_modules)."') AND sugarfeed.assigned_user_id = '".$current_user->id."' "
						."AND team_membership_id IS NOT NULL "
						.") ";
				}
				$module_limiter .= ")";
            }
			if(!empty($where)) { $where .= ' AND '; }

            if ($this->myFavoritesOnly) {
                require_once('modules/SugarFavorites/SugarFavorites.php');
                $user_favorites_module = new SugarFavorites();

                if (!isset($lvsParams['custom_from'])) {
                    $lvsParams['custom_from'] = '';
                }
                $lvsParams['custom_from'] = ' INNER JOIN ' . $user_favorites_module->table_name . ' ON (' . $user_favorites_module->table_name . '.record_id = sugarfeed.related_id AND ' . $user_favorites_module->table_name . '.module = sugarfeed.related_module AND ' . $user_favorites_module->table_name . '.assigned_user_id = \'' . $current_user->id . '\' AND ' . $user_favorites_module->table_name . '.deleted = 0) ' . $lvsParams['custom_from'];
            }

			$where .= $module_limiter;

            $this->lvs->setup($this->seedBean, $this->displayTpl, $where , $lvsParams, 0, $this->displayRows,
                              array('name',
                                    'description',
                                    'date_entered',
                                    'created_by',
                                    'related_module',
                                    'team_id',
                                    'team_name',
                                    'team_count',
                                    'link_url',
                                    'link_type'));

            foreach($this->lvs->data['data'] as $row => $data) {

                $this->lvs->data['data'][$row]['NAME'] = str_replace("{this.CREATED_BY}",get_assigned_user_name($this->lvs->data['data'][$row]['CREATED_BY']),$data['NAME']);

                //Translate the SugarFeeds labels if necessary.
                preg_match('/\{([^\^ }]+)\.([^\}]+)\}/', $this->lvs->data['data'][$row]['NAME'] ,$modStringMatches );
                if(count($modStringMatches) == 3 && $modStringMatches[1] == 'SugarFeed' && !empty($data['RELATED_MODULE']) )
                {
                    $modKey = $modStringMatches[2];
                    $modString = translate($modKey, $modStringMatches[1]);
                    if( strpos($modString, '{0}') === FALSE || !isset($GLOBALS['app_list_strings']['moduleListSingular'][$data['RELATED_MODULE']]) )
                        continue;
                    
                    $modStringSingular = $GLOBALS['app_list_strings']['moduleListSingular'][$data['RELATED_MODULE']];
                    $modString = string_format($modString, array($modStringSingular) );
                    $this->lvs->data['data'][$row]['NAME'] = preg_replace('/' . $modStringMatches[0] . '/', strtolower($modString), $this->lvs->data['data'][$row]['NAME']);
                }
            }

            // assign a baseURL w/ the action set as DisplayDashlet
            foreach($this->lvs->data['pageData']['urls'] as $type => $url) {
            	// awu Replacing action=DisplayDashlet with action=DynamicAction&DynamicAction=DisplayDashlet
                if($type == 'orderBy')
                    $this->lvs->data['pageData']['urls'][$type] = preg_replace('/(action=.*&)/Ui', 'action=DynamicAction&DynamicAction=displayDashlet&', $url);
                else
                    $this->lvs->data['pageData']['urls'][$type] = preg_replace('/(action=.*&)/Ui', 'action=DynamicAction&DynamicAction=displayDashlet&', $url) . '&sugar_body_only=1&id=' . $this->id;
            }

            $this->lvs->ss->assign('dashletId', $this->id);


        }

        $td = $GLOBALS['timedate'];
        $needResort = false;
        $resortQueue = array();
        $feedErrors = array();

        $fetchRecordCount = $this->displayRows + $this->lvs->data['pageData']['offsets']['current'];

        foreach ( $external_modules as $apiName ) {
            $api = ExternalAPIFactory::loadAPI($apiName);
            if ( $api !== FALSE ) {
                // FIXME: Actually calculate the oldest sugar feed we can see, once we get an API that supports this sort of filter.
                $reply = $api->getLatestUpdates(0,$fetchRecordCount);
                if ( $reply['success'] && count($reply['messages']) > 0 ) {
                    array_splice($resortQueue, count($resortQueue), 0, $reply['messages']);
                } else if ( !$reply['success'] ) {
                    $feedErrors[] = $reply['errorMessage'];
                }
            }
        }

        if ( count($feedErrors) > 0 ) {
            $this->lvs->ss->assign('feedErrors',$feedErrors);
        }

        // If we need to resort, get to work!
        foreach ( $this->lvs->data['data'] as $normalMessage ) {
            list($user_date,$user_time) = explode(' ',$normalMessage['DATE_ENTERED']);
            list($db_date,$db_time) = $td->to_db_date_time($user_date,$user_time);

            $unix_timestamp = strtotime($db_date.' '.$db_time);

            $normalMessage['sort_key'] = $unix_timestamp;
            $normalMessage['NAME'] = '</b>'.$normalMessage['NAME'];

            $resortQueue[] = $normalMessage;
        }

        usort($resortQueue,create_function('$a,$b','return $a["sort_key"]<$b["sort_key"];'));

        // Trim it down to the necessary number of records
        $numRecords = count($resortQueue);
        $numRecords = $numRecords - $this->lvs->data['pageData']['offsets']['current'];
        $numRecords = min($this->displayRows,$numRecords);

        //rrs bug: 42122 - was cutting out feed items.42122
        // $resortQueue = array_slice($resortQueue,$this->lvs->data['pageData']['offsets']['current'],$numRecords);
        foreach ( $resortQueue as $key=>&$item ) {
            if ( empty($item['NAME']) ) {
                continue;
            }
            
            if ( empty($item['IMAGE_URL']) ) {
                $item['IMAGE_URL'] = 'include/images/default_user_feed_picture.png';
                if ( isset($item['CREATED_BY']) ) {
                    $user = loadBean('Users');
                    $user->retrieve($item['CREATED_BY']);
                    if ( !empty($user->picture) ) {
                        $item['IMAGE_URL'] = 'index.php?entryPoint=download&id='.$user->picture.'&type=SugarFieldImage&isTempFile=1';
                    }
                }
            }
    
            $resortQueue[$key]['NAME'] = '<div style="float: left; margin-right: 3px; width: 50px; height: 50px;"><!--not_in_theme!--><img src="'.$item['IMAGE_URL'].'" style="max-width: 50px; max-height: 50px;"></div> '.$item['NAME'];
        }
        $this->lvs->data['data'] = $resortQueue;
    }

	  function deleteUserFeed() {
    	if(!empty($_REQUEST['record'])) {
			$feed = new SugarFeed();
			$feed->retrieve($_REQUEST['record']);
			if(is_admin($GLOBALS['current_user']) || $feed->created_by == $GLOBALS['current_user']->id){
            	$feed->mark_deleted($_REQUEST['record']);

			}
        }
    }
	 function pushUserFeed() {
    	if(!empty($_REQUEST['text']) || (!empty($_REQUEST['link_url']) && !empty($_REQUEST['link_type']))) {
			$text = htmlspecialchars($_REQUEST['text']);
			//allow for bold and italic user tags
			$text = preg_replace('/&amp;lt;(\/*[bi])&amp;gt;/i','<$1>', $text);
			$team_id = $_REQUEST['team_id'];
			$team_set_id = $team_id; //For now, but if we allow for multiple team selection then we'll have to change this
            SugarFeed::pushFeed($text, 'UserFeed', $GLOBALS['current_user']->id,
                                $team_id,
								$GLOBALS['current_user']->id,
                                $_REQUEST['link_type'], $_REQUEST['link_url']
                                ,$team_set_id
                                );
        }

    }

	 function pushUserFeedReply( ) {
         if(!empty($_REQUEST['text'])&&!empty($_REQUEST['parentFeed'])) {
			$text = htmlspecialchars($_REQUEST['text']);
			//allow for bold and italic user tags
			$text = preg_replace('/&amp;lt;(\/*[bi])&amp;gt;/i','<$1>', $text);
            // Fetch the parent, use the same team id's
            $parentFeed = new SugarFeed();
            $parentFeed->retrieve($_REQUEST['parentFeed']);
			$team_id = $parentFeed->team_id;
			$team_set_id = $team_id; //For now, but if we allow for multiple team selection then we'll have to change this
            SugarFeed::pushFeed($text, 'SugarFeed', $_REQUEST['parentFeed'],
                                $team_id,
								$GLOBALS['current_user']->id,
                                '', ''
                                ,$team_set_id
                                );
        }

    }

	  function displayOptions() {
        global $app_strings;
        global $app_list_strings;
        $ss = new Sugar_Smarty();
        $ss->assign('titleLBL', translate('LBL_TITLE', 'SugarFeed'));
		$ss->assign('categoriesLBL', translate('LBL_CATEGORIES', 'SugarFeed'));
		$ss->assign('autenticationPendingLBL', translate('LBL_AUTHENTICATION_PENDING', 'SugarFeed'));
        $ss->assign('rowsLBL', translate('LBL_ROWS', 'SugarFeed'));
        $ss->assign('saveLBL', $app_strings['LBL_SAVE_BUTTON_LABEL']);
        $ss->assign('clearLBL', $app_strings['LBL_CLEAR_BUTTON_LABEL']);
        $ss->assign('myFavoritesOnlyLBL', translate('LBL_MY_FAVORITES_ONLY', 'SugarFeed'));
        $ss->assign('title', $this->title);
		$ss->assign('categories', $this->categories);
        if ( empty($this->selectedCategories) ) {
            $this->selectedCategories['ALL'] = 'ALL';
        }
		$ss->assign('selectedCategories', $this->selectedCategories);
        $ss->assign('rows', $this->displayRows);
        $ss->assign('myFavoritesOnly', $this->myFavoritesOnly);
        $externalApis = array();
        foreach ( $this->externalAPIList as $apiObj => $apiName ) {
            //only show external APis that the user has not created
            if ( ! EAPM::getLoginInfo($apiName) ) {
                $externalApis[] = $apiObj;
            }
        }
        $ss->assign('externalApiList', JSON::encode($externalApis));
        $ss->assign('authenticateLBL', translate('LBL_AUTHENTICATE', 'SugarFeed'));
        $ss->assign('id', $this->id);
        if($this->isAutoRefreshable()) {
       		$ss->assign('isRefreshable', true);
			$ss->assign('autoRefresh', $GLOBALS['app_strings']['LBL_DASHLET_CONFIGURE_AUTOREFRESH']);
			$ss->assign('autoRefreshOptions', $this->getAutoRefreshOptions());
			$ss->assign('autoRefreshSelect', $this->autoRefresh);
		}

        return  $ss->fetch('modules/SugarFeed/Dashlets/SugarFeedDashlet/Options.tpl');
    }

	/**
	 * creats the values
	 * @return
	 * @param $req Object
	 */
	  function saveOptions($req) {
        global $sugar_config, $timedate, $current_user, $theme;
        $options = array();
        $options['title'] = $req['title'];
		$rows = intval($_REQUEST['rows']);
        if($rows <= 0) {
            $rows = 15;
        }
		if($rows > 100){
			$rows = 100;
		}
        if ( isset($req['autoRefresh']) )
            $options['autoRefresh'] = $req['autoRefresh'];
        $options['rows'] = $rows;
		$options['categories'] = $req['categories'];
		foreach($options['categories'] as $cat){
			if($cat == 'ALL'){
				unset($options['categories']);
			}
		}

        if(!empty($req['myFavoritesOnly'])) {
            $options['myFavoritesOnly'] = $req['myFavoritesOnly'];
        }
        else {
           $options['myFavoritesOnly'] = false;
        }

        return $options;
    }


      function sugarFeedDisplayScript() {
          // Forces the quicksearch to reload anytime the dashlet gets refreshed
          return '<script type="text/javascript">
enableQS(false);
</script>';
      }
	/**
	 *
	 * @return javascript including QuickSearch for SugarFeeds
	 */
	 function displayScript() {
	 	require_once('include/QuickSearchDefaults.php');
        $ss = new Sugar_Smarty();
        $ss->assign('saving', translate('LBL_SAVING', 'SugarFeed'));
        $ss->assign('saved', translate('LBL_SAVED', 'SugarFeed'));
        $ss->assign('id', $this->id);
        $ss->assign('idjs', $this->idjs);

        $str = $ss->fetch('modules/SugarFeed/Dashlets/SugarFeedDashlet/SugarFeedScript.tpl');
		$qsd = QuickSearchDefaults::getQuickSearchDefaults();
		$json = getJSONobj();
		$sqs_objects = $qsd->getQSTeam();
		foreach($sqs_objects['populate_list'] as &$v){
			$v .= '_' . $this->id;
		}
		foreach($sqs_objects['required_list'] as &$v){
			$v .= '_' . $this->id;
		}
		$sqs_objects['form'] = "form_{$this->id}";
		$sqs_objects_encoded = $json->encode($sqs_objects);
		$quicksearch_js = <<<EOQ
		<script type="text/javascript" language="javascript">
	 		if(typeof sqs_objects == 'undefined'){var sqs_objects = new Array;}
			sqs_objects["form_{$this->id}_team_name"] = $sqs_objects_encoded;
		</script>
EOQ;
        $str .= $quicksearch_js;
        return $str; // return parent::display for title and such
    }

	/**
	 *
	 * @return the fully rendered dashlet
	 */
	function display(){

		$listview = parent::display();
		$GLOBALS['current_sugarfeed'] = $this;
		$listview = preg_replace_callback('/\{([^\^ }]+)\.([^\}]+)\}/', create_function(
            '$matches',
            'if($matches[1] == "this"){$var = $matches[2]; return $GLOBALS[\'current_sugarfeed\']->$var;}else{return translate($matches[2], $matches[1]);}'
        ),$listview);

        //grab each token and store the module for later processing
        preg_match_all('/\[(\w+)\:/', $listview, $alt_modules);

        //now process each token to create the proper url and image tags in feed, leaving a string for the alt to be replaced in next step
		$listview = preg_replace('/\[(\w+)\:([\w\-\d]*)\:([^\]]*)\]/', '<a href="index.php?module=$1&action=DetailView&record=$2"><img src="themes/default/images/$1.gif" border=0 REPLACE_ALT>$3</a>', $listview); /*SKIP_IMAGE_TAG*/

        //process each module for the singular version so we can populate the alt tag on the image
        $altStrings = array();
        foreach($alt_modules[1] as $alt){
            //create the alt string and replace the alt token
            $altString = 'alt="'.translate('LBL_VIEW','SugarFeed').' '.$GLOBALS['app_list_strings']['moduleListSingular'][$alt].'"';
            $listview = preg_replace('/REPLACE_ALT/', $altString, $listview,1);
        }

		return $listview.'</div></div>';
	}


	/**
	 *
	 * @return the title and the user post form
	 * @param $text Object
	 */
	function getHeader($text='') {
		return parent::getHeader($text) . $this->getPostForm().$this->getDisabledWarning().$this->sugarFeedDisplayScript().'<div class="sugarFeedDashlet"><div id="contentScroller'.$this->idjs.'">';
	}


	/**
	 *
	 * @return a warning message if the sugar feed system is not enabled currently
	 */
	function getDisabledWarning(){
        /* Check to see if the sugar feed system is enabled */
        if ( ! $this->shouldDisplay() ) {
            // The Sugar Feeds are disabled, populate the warning message
            return translate('LBL_DASHLET_DISABLED','SugarFeed');
        } else {
            return '';
        }
    }

	/**
	 *
	 * @return the form for users posting custom messages to the feed stream
	 */
	function getPostForm(){
        global $current_user;

        if ( (!empty($this->selectedCategories) && !in_array('UserFeed',$this->selectedCategories))
             || $this->myFavoritesOnly
			) {
            // The user feed system isn't enabled, don't let them post notes
            return '';
        }
		$user_name = ucfirst($GLOBALS['current_user']->user_name);
		$moreimg = SugarThemeRegistry::current()->getImage('advanced_search' , 'onclick="toggleDisplay(\'more_' . $this->id . '\'); toggleDisplay(\'more_img_'.$this->id.'\'); toggleDisplay(\'less_img_'.$this->id.'\');"',null,null,'.gif',translate('LBL_SHOW_MORE_OPTIONS','SugarFeed'));
		$lessimg = SugarThemeRegistry::current()->getImage('basic_search' , 'onclick="toggleDisplay(\'more_' . $this->id . '\'); toggleDisplay(\'more_img_'.$this->id.'\'); toggleDisplay(\'less_img_'.$this->id.'\');"',null,null,'.gif',translate('LBL_HIDE_OPTIONS','SugarFeed'));
		$ss = new Sugar_Smarty();
		$ss->assign('LBL_TO', translate('LBL_TO', 'SugarFeed'));
		$ss->assign('LBL_POST', translate('LBL_POST', 'SugarFeed'));
		$ss->assign('LBL_SELECT', translate('LBL_SELECT', 'SugarFeed'));
		$ss->assign('LBL_IS', translate('LBL_IS', 'SugarFeed'));
		$ss->assign('id', $this->id);
        if ( !empty($current_user) ) {
            $team_id = $current_user->default_team;
        } else {
            $team_id = 1;
        }
		$team_name =   get_assigned_team_name($team_id);
		$ss->assign('team_id', $team_id);
		$ss->assign('team_name', $team_name);
		$ss->assign('more_img', $moreimg);
		$ss->assign('less_img', $lessimg);
        if($current_user->getPreference('use_real_names') == 'on'){
            $ss->assign('user_name', $current_user->full_name);
        }
        else {
            $ss->assign('user_name', $user_name);
        }
        $linkTypesIn = SugarFeed::getLinkTypes();
        $linkTypes = array();
        foreach ( $linkTypesIn as $key => $value ) {
            $linkTypes[$key] = translate('LBL_LINK_TYPE_'.$value,'SugarFeed');
        }
		$ss->assign('link_types', $linkTypes);
		return $ss->fetch('modules/SugarFeed/Dashlets/SugarFeedDashlet/UserPostForm.tpl');

	}

    // This is called from the include/MySugar/DashletsDialog/DashletsDialog.php and determines if we should display the SugarFeed dashlet as an option or not
    static function shouldDisplay() {

        $admin = new Administration();
        $admin->retrieveSettings();

        if ( !isset($admin->settings['sugarfeed_enabled']) || $admin->settings['sugarfeed_enabled'] != '1' ) {
            return false;
        } else {
            return true;
        }
    }
}
