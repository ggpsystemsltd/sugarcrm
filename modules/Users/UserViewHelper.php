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


/**
 * This helper handles the rest of the fields for the Users Edit and Detail views.
 * There are a lot of fields on those views that do not map directly to being used on the metadata based UI, so they are handled here.
 */
class UserViewHelper {
    /**
     * The smarty template handler for the template
     * @var SugarSmarty
     */
    protected $ss;
    /**
     * The bean that we are viewing.
     * @var SugarBean
     */
    protected $bean;
    /**
     * What type of view we are looking at, valid values are 'EditView' and 'DetailView'
     * @var string
     */
    protected $viewType;
    /**
     * Is the current user an admin for the Users module
     * @var bool
     */
    protected $is_current_admin;
    /**
     * Is the current user a system wide admin
     * @var bool
     */
    protected $is_super_admin;
    /**
     * The current user type
     * One of: REGULAR ADMIN GROUP PORTAL_ONLY
     * @var string
     */
    public $usertype;


    /**
     * Constructor, pass in the smarty template, the bean and the viewtype
     */
    public function __construct(Sugar_Smarty &$smarty, SugarBean &$bean, $viewType = 'EditView' ) {
        $this->ss = $smarty;
        $this->bean = $bean;
        $this->viewType = $viewType;
    }

    /**
     * This function populates the smarty class that was passed in through the constructor
     */
    public function setupAdditionalFields() {
        $this->assignUserTypes();
        $this->setupButtonsAndTabs();
        $this->setupUserTypeDropdown();
        $this->setupPasswordTab();
        $this->setupEmailSettings();
        $this->setupThemeTab();
        $this->setupAdvancedTab();
        
    }

    protected function assignUserTypes() {
        global $current_user, $app_list_strings;

        // There is a lot of extra stuff that needs to go in here to properly render
        $this->is_current_admin=is_admin($current_user)
            ||$current_user->isAdminForModule('Users');
        $this->is_super_admin = is_admin($current_user);

        $this->usertype='REGULAR';
        if($this->is_super_admin){
            $this->usertype='Administrator';
        }


        // check if the user has access to the User Management
        $this->ss->assign('USER_ADMIN',$current_user->isAdminForModule('Users')&& !is_admin($current_user));
        

        if ($this->is_current_admin) {
            $this->ss->assign('IS_ADMIN','1');
        } else {
            $this->ss->assign('IS_ADMIN', '0');
        }

        if ($this->is_super_admin) {
            $this->ss->assign('IS_SUPER_ADMIN','1');
        } else {
            $this->ss->assign('IS_SUPER_ADMIN', '0');
        }

        $this->ss->assign('IS_PORTALONLY', '0');
        $this->ss->assign('IS_GROUP', '0');
        if((!empty($this->bean->is_group) && $this->bean->is_group)  || (isset($_REQUEST['usertype']) && $_REQUEST['usertype']=='group')){
            $this->ss->assign('IS_GROUP', '1');
            $this->usertype='GROUP';
        }



        $edit_self = $current_user->id == $this->bean->id;
        $admin_edit_self = is_admin($current_user) && $edit_self;


        $this->ss->assign('IS_FOCUS_ADMIN', is_admin($this->bean));
        
        if($edit_self) {
            $this->ss->assign('EDIT_SELF','1');
        }
        if($admin_edit_self) {
            $this->ss->assign('ADMIN_EDIT_SELF','1');
        }

    }
    
    protected function setupButtonsAndTabs() {
        global $current_user;

        if (isset($GLOBALS['sugar_config']['show_download_tab'])) {
            $enable_download_tab = $GLOBALS['sugar_config']['show_download_tab'];
        }else{
            $enable_download_tab = true;
        }

        $this->ss->assign('SHOW_DOWNLOADS_TAB', $enable_download_tab);


        $the_query_string = 'module=Users&action=DetailView';
        if(isset($_REQUEST['record'])) {
            $the_query_string .= '&record='.$_REQUEST['record'];
        }
        $buttons = "";
        if (!$this->bean->is_group){
            if ($this->bean->id == $current_user->id) {
                $reset_pref_warning = translate('LBL_RESET_PREFERENCES_WARNING','Users');
                $reset_home_warning = translate('LBL_RESET_HOMEPAGE_WARNING','Users');
            }
            else {
                $reset_pref_warning = translate('LBL_RESET_PREFERENCES_WARNING_USER','Users');
                $reset_home_warning = translate('LBL_RESET_HOMEPAGE_WARNING_USER','Users');
            }

            //bug 48170
            $user_preference_url = "module=Users&action=resetPreferences";
            if(isset($_REQUEST['record'])){
                $user_preference_url .= "&record=".$_REQUEST['record'];
            }
            $buttons .="<input type='button' class='button' onclick='if(confirm(\"{$reset_pref_warning}\"))window.location=\"".$_SERVER['PHP_SELF'] .'?'.$user_preference_url."&reset_preferences=true\";' value='".translate('LBL_RESET_PREFERENCES','Users')."' />";
            $buttons .="&nbsp;<input type='button' class='button' onclick='if(confirm(\"{$reset_home_warning}\"))window.location=\"".$_SERVER['PHP_SELF'] .'?'.$the_query_string."&reset_homepage=true\";' value='".translate('LBL_RESET_HOMEPAGE','Users')."' />";
        }
        if (isset($buttons)) $this->ss->assign("BUTTONS", $buttons);
        


        if (isset($this->bean->id)) {
            $this->ss->assign('ID',$this->bean->id);
        }
        
    }


    /**
     * setupUserTypeDropdown
     *
     * This function handles setting up the user type dropdown field.  It determines which user types are available for the current user.
     * At the end of the function two Smarty variables (USER_TYPE_DROPDOWN and USER_TYPE_READONLY) are assigned.
     *
     */
    public function setupUserTypeDropdown() {
        global $current_user;
        

        //if this is an existing bean and the type is empty, then populate user type
        if(!empty($this->bean->id) && empty($this->bean->user_type))
	    {
            $this->setUserType($this->bean);
            $userType = $this->bean->user_type;
        } else {
            $userType = $this->usertype;
        }

        $availableUserTypes = array();
        $userTypes = array(
            'RegularUser' => array(
                'label' => translate('LBL_REGULAR_USER','Users'),
                'description' => translate('LBL_REGULAR_DESC','Users'),
            ),
            'GROUP' => array(
                'label' => translate('LBL_GROUP_USER','Users'),
                'description' => translate('LBL_GROUP_DESC','Users'),
            ),
            'Administrator' => array(
                'label' => translate('LBL_ADMIN_USER','Users'),
                'description' => translate('LBL_ADMIN_DESC','Users'),
            ),
        );

        if ( $userType == 'GROUP' || $userType == 'PORTAL_ONLY' ) {
            $availableUserTypes = array($this->usertype);
        } else {
            if ( $this->ss->get_template_vars('USER_ADMIN') ) {
                $availableUserTypes = array('RegularUser');
            } elseif($this->ss->get_template_vars('ADMIN_EDIT_SELF')) {
                $availableUserTypes = array('Administrator');
            } elseif($this->ss->get_template_vars('IS_SUPER_ADMIN')) {
                $availableUserTypes = array(
                    'RegularUser',
                    'Administrator',
                    );
            } else {
                $availableUserTypes = array($userType);
            }
        }

        $userTypeDropdown = '<select id="UserType" name="UserType" onchange="user_status_display(this);" ';
        if ( count($availableUserTypes) == 1 ) {
            $userTypeDropdown .= ' disabled ';
        }
        $userTypeDropdown .= '>';
     
        $userTypeDescription = '';

        $setSelected = !empty($this->bean->id);

        foreach ( $availableUserTypes as $currType ) {
            if ($setSelected && $currType == $userType ) {
                $userTypeDropdown .= '<option value="'.$currType.'" SELECTED>'.$userTypes[$currType]['label'].'</option>';
            } else {
                $userTypeDropdown .= '<option value="'.$currType.'">'.$userTypes[$currType]['label'].'</option>';
            }
        }
        $userTypeDropdown .= '</select><div id="UserTypeDesc">&nbsp;</div>';
        
        $this->ss->assign('USER_TYPE_DROPDOWN',$userTypeDropdown);
        $this->ss->assign('USER_TYPE_READONLY',$userTypes[$userType]['label'] . "<input type='hidden' id='UserType' value='{$userType}'><div id='UserTypeDesc'>&nbsp;</div>");
        
    }

    protected function setupPasswordTab() {
        global $current_user;
        
        $this->ss->assign('PWDSETTINGS', isset($GLOBALS['sugar_config']['passwordsetting']) ? $GLOBALS['sugar_config']['passwordsetting'] : array());
        if ( isset($GLOBALS['sugar_config']['passwordsetting']) && isset($GLOBALS['sugar_config']['passwordsetting']['customregex']) ) {
            $pwd_regex=str_replace( "\\","\\\\",$GLOBALS['sugar_config']['passwordsetting']['customregex']);
            $this->ss->assign("REGEX",$pwd_regex);
        }


        $enable_syst_generate_pwd=false;
        if(isset($GLOBALS['sugar_config']['passwordsetting']) && isset($GLOBALS['sugar_config']['passwordsetting']['SystemGeneratedPasswordON'])){
            $enable_syst_generate_pwd=$GLOBALS['sugar_config']['passwordsetting']['SystemGeneratedPasswordON'];
        }

        // If new regular user without system generated password or new portal user
        if(((isset($enable_syst_generate_pwd) && !$enable_syst_generate_pwd && $this->usertype!='GROUP') || $this->usertype =='PORTAL_ONLY') && empty($this->bean->id)) {
            $this->ss->assign('REQUIRED_PASSWORD','1');
        } else {
            $this->ss->assign('REQUIRED_PASSWORD','0');
        }

        // If my account page or portal only user or regular user without system generated password or a duplicate user
        if((($current_user->id == $this->bean->id) || $this->usertype=='PORTAL_ONLY' || (($this->usertype=='REGULAR' || $this->usertype == 'Administrator' || (isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true' && $this->usertype!='GROUP')) && !$enable_syst_generate_pwd)) && !$this->bean->external_auth_only ) {
            $this->ss->assign('CHANGE_PWD', '1');
        } else {
            $this->ss->assign('CHANGE_PWD', '0');
        }
        
        // Make sure group users don't get a password change prompt
        if ( $this->usertype == 'GROUP' ) {
            $this->ss->assign('CHANGE_PWD', '0');
        }

        $configurator = new Configurator();
        if ( isset($configurator->config['passwordsetting']) 
             && ($configurator->config['passwordsetting']['SystemGeneratedPasswordON']
                 || $configurator->config['passwordsetting']['forgotpasswordON'])
             && $this->usertype != 'GROUP' && $this->usertype != 'PORTAL_ONLY' ) {
            $this->ss->assign('REQUIRED_EMAIL_ADDRESS','1');
        } else {
            $this->ss->assign('REQUIRED_EMAIL_ADDRESS','0');
        }
        if($this->usertype=='GROUP' || $this->usertype=='PORTAL_ONLY') {
            $this->ss->assign('HIDE_FOR_GROUP_AND_PORTAL', 'none');
            $this->ss->assign('HIDE_CHANGE_USERTYPE','none');
        } else {
            $this->ss->assign('HIDE_FOR_NORMAL_AND_ADMIN','none');
            if (!$this->is_current_admin) {
                $this->ss->assign('HIDE_CHANGE_USERTYPE','none');
            } else {
                $this->ss->assign('HIDE_STATIC_USERTYPE','none');
            }
        }
        
    }

    protected function setupThemeTab() {
        $user_theme = $this->bean->getPreference('user_theme');
        if(isset($user_theme)) {
            $this->ss->assign("THEMES", get_select_options_with_id(SugarThemeRegistry::availableThemes(), $user_theme));
        } else {
            $this->ss->assign("THEMES", get_select_options_with_id(SugarThemeRegistry::availableThemes(), $GLOBALS['sugar_config']['default_theme']));
        }
        $this->ss->assign("SHOW_THEMES",count(SugarThemeRegistry::availableThemes()) > 1);
        $this->ss->assign("USER_THEME_COLOR", $this->bean->getPreference('user_theme_color'));
        $this->ss->assign("USER_THEME_FONT", $this->bean->getPreference('user_theme_font'));
        $this->ss->assign("USER_THEME", $user_theme);
        
// Build a list of themes that support group modules
        $this->ss->assign("DISPLAY_GROUP_TAB", 'none');
        
        $selectedTheme = $user_theme;
        if(!isset($user_theme)) {
            $selectedTheme = $GLOBALS['sugar_config']['default_theme'];
        }
        
        $themeList = SugarThemeRegistry::availableThemes();
        $themeGroupList = array();
        
        foreach ( $themeList as $themeId => $themeName ) {
            $currThemeObj = SugarThemeRegistry::get($themeId);
            if ( isset($currThemeObj->group_tabs) && $currThemeObj->group_tabs == 1 ) {
                $themeGroupList[$themeId] = true;
                if ( $themeId == $selectedTheme ) {
                    $this->ss->assign("DISPLAY_GROUP_TAB", '');
                }
            } else {
                $themeGroupList[$themeId] = false;
            }
        }
        $this->ss->assign("themeGroupListJSON",json_encode($themeGroupList));
        
    }
    
    protected function setupAdvancedTab() {
        $this->setupAdvancedTabUserSettings();
        $this->setupAdvancedTabTeamSettings();
        $this->setupAdvancedTabNavSettings();
        $this->setupAdvancedTabLocaleSettings();
        $this->setupAdvancedTabPdfSettings();
    }

    protected function setupAdvancedTabUserSettings() {
        global $current_user, $locale, $app_strings, $app_list_strings, $sugar_config;
        // This is for the "Advanced" tab, it's not controlled by the metadata UI so we have to do more for it.

        $this->ss->assign('EXPORT_DELIMITER', $this->bean->getPreference('export_delimiter'));

        if($this->bean->receive_notifications ||(!isset($this->bean->id) && $admin->settings['notify_send_by_default'])) $this->ss->assign("RECEIVE_NOTIFICATIONS", "checked");

        //jc:12293 - modifying to use the accessor method which will translate the
        //available character sets using the translation files
        $export_charset = $locale->getExportCharset('', $this->bean);
        $export_charset_options = $locale->getCharsetSelect();
        $this->ss->assign('EXPORT_CHARSET', get_select_options_with_id($export_charset_options, $export_charset));
        $this->ss->assign('EXPORT_CHARSET_DISPLAY', $export_charset);
        //end:12293

        if( $this->bean->getPreference('use_real_names') == 'on' 
            || ( empty($this->bean->id) 
                 && isset($GLOBALS['sugar_config']['use_real_names']) 
                 && $GLOBALS['sugar_config']['use_real_names'] 
                 && $this->bean->getPreference('use_real_names') != 'off') ) {
            $this->ss->assign('USE_REAL_NAMES', 'CHECKED');
        }

        if($this->bean->getPreference('mailmerge_on') == 'on') {
            $this->ss->assign('MAILMERGE_ON', 'checked');
        }

        if($this->bean->getPreference('no_opps') == 'on') {
            $this->ss->assign('NO_OPPS', 'CHECKED');
        }

        $reminder_time = $this->bean->getPreference('reminder_time');
        if(empty($reminder_time)){
            $reminder_time = -1;
        }
        $this->ss->assign("REMINDER_TIME_OPTIONS", get_select_options_with_id($app_list_strings['reminder_time_options'],$reminder_time));
        if($reminder_time > -1){
            $this->ss->assign("REMINDER_TIME_DISPLAY", 'inline');
            $this->ss->assign("REMINDER_CHECKED", 'checked');
            $this->ss->assign("REMINDER_TIME", $app_list_strings['reminder_time_options'][$reminder_time]);
        }else{
            $this->ss->assign("REMINDER_TIME_DISPLAY", 'none');
        }
        $this->ss->assign('CALENDAR_PUBLISH_KEY', $this->bean->getPreference('calendar_publish_key' ));

        $publish_url = $sugar_config['site_url'].'/vcal_server.php';
        $token = "/";
        //determine if the web server is running IIS
        //if so then change the publish url
        if(isset($_SERVER) && !empty($_SERVER['SERVER_SOFTWARE'])){
            $position = strpos(strtolower($_SERVER['SERVER_SOFTWARE']), 'iis');
            if($position !== false){
                $token = '?parms=';
            }
        }
        
        $publish_url .= $token.'type=vfb&source=outlook&key='.$this->bean->getPreference('calendar_publish_key' );
        if (! empty($this->bean->email1)) {
            $publish_url .= '&email='.$this->bean->email1;
        } else {
            $publish_url .= '&user_name='.$this->bean->user_name;
        }
        $this->ss->assign("CALENDAR_PUBLISH_URL", $publish_url);
        $this->ss->assign("CALENDAR_SEARCH_URL", $sugar_config['site_url'].'/vcal_server.php/type=vfb&email=%NAME%@%SERVER%');
        

        $this->ss->assign("SETTINGS_URL", $sugar_config['site_url']);

    }

    protected function setupAdvancedTabTeamSettings() {
        global $sugar_config;

        $authclass = '';
        if(!empty($sugar_config['authenticationClass'])){
            $this->ss->assign('EXTERNAL_AUTH_CLASS_1', $sugar_config['authenticationClass']);
            $this->ss->assign('EXTERNAL_AUTH_CLASS', $sugar_config['authenticationClass']);
            $authclass = $sugar_config['authenticationClass'];
        }else{
            if(!empty($GLOBALS['system_config']->settings['system_ldap_enabled'])){
                $this->ss->assign('EXTERNAL_AUTH_CLASS_1', translate('LBL_LDAP','Users'));
                $this->ss
                        ->assign('EXTERNAL_AUTH_CLASS', translate('LBL_LDAP_AUTHENTICATION','Users'));
                $authclass = 'LDAPAuthenticate';
            }
        }
        if(!empty($this->bean->external_auth_only)) {
            $this->ss->assign('EXTERNAL_AUTH_ONLY_CHECKED', 'CHECKED');
        }
        
        if($this->is_super_admin && !empty($authclass)) {
            $this->ss->assign('DISPLAY_EXTERNAL_AUTH',true);
        }
        
        if(!empty($this->bean->id)) {
            require_once('include/SugarFields/Fields/Teamset/EmailSugarFieldTeamsetCollection.php');

            //If you're an administrator editing the user or if you're a module level admin, then allow the widget to display all Teams
            if($this->usertype == 'Administrator' || $GLOBALS['current_user']->isAdminForModule( 'Users')) {
                $teamsWidget = new EmailSugarFieldTeamsetCollection($this->bean, $this->bean->field_defs, '', $this->viewType);
            } else {
                $teamsWidget = new EmailSugarFieldTeamsetCollection($this->bean, $this->bean->field_defs, 'get_non_private_teams_array', $this->viewType);
                $teamsWidget->user_id = $this->bean->id;
            }

            $this->ss->assign('DEFAULT_TEAM_OPTIONS', $teamsWidget->get_code());

            require_once('modules/Teams/TeamSetManager.php');
            $default_teams = TeamSetManager::getCommaDelimitedTeams($this->bean->team_set_id, $this->bean->team_id, true);
            $this->ss->assign("DEFAULT_TEAM_LIST", $default_teams);
        }
        
        $this->ss->assign('SHOW_TEAM_SELECTION', !empty($this->bean->id));
        $this->ss->assign('IS_PORTALONLY', '0');
        
        if (isset($sugar_config['enable_web_services_user_creation']) && $sugar_config['enable_web_services_user_creation'] &&
            (!empty($this->bean->portal_only) && $this->bean->portal_only) || (isset($_REQUEST['usertype']) && $_REQUEST['usertype']=='portal')) {
            $this->ss->assign('IS_PORTALONLY', '1');
            $this->usertype='PORTAL_ONLY';
        }
    }

    protected function setupAdvancedTabNavSettings() {
        global $app_list_strings;

        // Grouped tabs?
        $useGroupTabs = $this->bean->getPreference('navigation_paradigm');
        if ( ! isset($useGroupTabs) ) {
            if ( ! isset($GLOBALS['sugar_config']['default_navigation_paradigm']) ) {
                $GLOBALS['sugar_config']['default_navigation_paradigm'] = 'gm';
            }
            $useGroupTabs = $GLOBALS['sugar_config']['default_navigation_paradigm'];
        }
        $this->ss->assign("USE_GROUP_TABS",($useGroupTabs=='gm')?'checked':'');
        
        $user_max_tabs = $this->bean->getPreference('max_tabs');
        if(isset($user_max_tabs) && $user_max_tabs > 0) {
            $this->ss->assign("MAX_TAB", $user_max_tabs);
        } elseif(SugarThemeRegistry::current()->maxTabs > 0) {
            $this->ss->assign("MAX_TAB", SugarThemeRegistry::current()->maxTabs);
        } else {
            $this->ss->assign("MAX_TAB", $GLOBALS['sugar_config']['default_max_tabs']);
        }
        $this->ss->assign("MAX_TAB_OPTIONS", range(1, ((!empty($GLOBALS['sugar_config']['default_max_tabs']) && $GLOBALS['sugar_config']['default_max_tabs'] > 10 ) ? $GLOBALS['sugar_config']['default_max_tabs'] : 10)));
        
        $user_subpanel_tabs = $this->bean->getPreference('subpanel_tabs');
        if(isset($user_subpanel_tabs)) {
            $this->ss->assign("SUBPANEL_TABS", $user_subpanel_tabs?'checked':'');
        } else {
            $this->ss->assign("SUBPANEL_TABS", $GLOBALS['sugar_config']['default_subpanel_tabs']?'checked':'');
        }

        /* Module Tab Chooser */
        require_once('include/templates/TemplateGroupChooser.php');
        require_once('modules/MySettings/TabController.php');
        $chooser = new TemplateGroupChooser();
        $controller = new TabController();
        
        
        if($this->is_current_admin || $controller->get_users_can_edit()) {
            $chooser->display_hide_tabs = true;
        } else {
            $chooser->display_hide_tabs = false;
        }

        $chooser->args['id'] = 'edit_tabs';
        $chooser->args['values_array'] = $controller->get_tabs($this->bean);
        foreach($chooser->args['values_array'][0] as $key=>$value) {
            $chooser->args['values_array'][0][$key] = $app_list_strings['moduleList'][$key];
        }
        
        foreach($chooser->args['values_array'][1] as $key=>$value) {
            $chooser->args['values_array'][1][$key] = $app_list_strings['moduleList'][$key];
        }
        
        foreach($chooser->args['values_array'][2] as $key=>$value) {
            $chooser->args['values_array'][2][$key] = $app_list_strings['moduleList'][$key];
        }
        
        $chooser->args['left_name'] = 'display_tabs';
        $chooser->args['right_name'] = 'hide_tabs';
        
        $chooser->args['left_label'] =  translate('LBL_DISPLAY_TABS','Users');
        $chooser->args['right_label'] =  translate('LBL_HIDE_TABS','Users');
        $chooser->args['title'] =  translate('LBL_EDIT_TABS','Users').' <!--not_in_theme!--><img border="0" src="themes/default/images/helpInline.gif" onmouseover="return overlib(\'Choose which tabs are displayed.\', FGCLASS, \'olFgClass\', CGCLASS, \'olCgClass\', BGCLASS, \'olBgClass\', TEXTFONTCLASS, \'olFontClass\', CAPTIONFONTCLASS, \'olCapFontClass\', CLOSEFONTCLASS, \'olCloseFontClass\', WIDTH, -1, NOFOLLOW, \'ol_nofollow\' );" onmouseout="return nd();"/>';
        
        $this->ss->assign('TAB_CHOOSER', $chooser->display());
        $this->ss->assign('CHOOSER_SCRIPT','set_chooser();');
        $this->ss->assign('CHOOSE_WHICH', translate('LBL_CHOOSE_WHICH','Users'));
        
    }

    protected function setupAdvancedTabLocaleSettings() {
        global $locale, $sugar_config, $app_list_strings;

        ///////////////////////////////////////////////////////////////////////////////
        ////	LOCALE SETTINGS
        ////	Date/time format
        $dformat = $locale->getPrecedentPreference($this->bean->id?'datef':'default_date_format', $this->bean);
        $tformat = $locale->getPrecedentPreference($this->bean->id?'timef':'default_time_format', $this->bean);
        $nformat = $locale->getPrecedentPreference('default_locale_name_format', $this->bean);
        if (!array_key_exists($nformat, $sugar_config['name_formats'])) {
            $nformat = $sugar_config['default_locale_name_format'];
        }
        $timeOptions = get_select_options_with_id($sugar_config['time_formats'], $tformat);
        $dateOptions = get_select_options_with_id($sugar_config['date_formats'], $dformat);
        $nameOptions = get_select_options_with_id($locale->getUsableLocaleNameOptions($sugar_config['name_formats']), $nformat);
        $this->ss->assign('TIMEOPTIONS', $timeOptions);
        $this->ss->assign('DATEOPTIONS', $dateOptions);
        $this->ss->assign('NAMEOPTIONS', $nameOptions);
        $this->ss->assign('DATEFORMAT', $sugar_config['date_formats'][$dformat]);
        $this->ss->assign('TIMEFORMAT', $sugar_config['time_formats'][$tformat]);
        $this->ss->assign('NAMEFORMAT', $sugar_config['name_formats'][$nformat]);

        //// Timezone
        if(empty($this->bean->id)) { // remove default timezone for new users(set later)
            $this->bean->user_preferences['timezone'] = '';
        }
        
        $userTZ = $this->bean->getPreference('timezone');
        
        if(empty($userTZ) && !$this->bean->is_group && !$this->bean->portal_only) {
            $userTZ = TimeDate::guessTimezone();
            $this->bean->setPreference('timezone', $userTZ);
        }
        
        if(!$this->bean->getPreference('ut')) {
            $this->ss->assign('PROMPTTZ', ' checked');
        }
        $this->ss->assign('TIMEZONE_CURRENT', $userTZ);
        $this->ss->assign('TIMEZONEOPTIONS', TimeDate::getTimezoneList());
        $this->ss->assign("TIMEZONE", TimeDate::tzName($userTZ));

        
        // FG - Bug 4236 - Managed First Day of Week
        $fdowDays = array();
        foreach ($app_list_strings['dom_cal_day_long'] as $d) {
            if ($d != "") {
                $fdowDays[] = $d;
            }
        }
        $this->ss->assign("FDOWOPTIONS", $fdowDays);
        $currentFDOW = $this->bean->get_first_day_of_week();

        if (!isset($currentFDOW)) {$currentFDOW = 0;}
        $this->ss->assign("FDOWCURRENT", $currentFDOW);
        $this->ss->assign("FDOWDISPLAY", $app_list_strings['dom_cal_day_long'][$currentFDOW]);

        //// Numbers and Currency display
        require_once('modules/Currencies/ListCurrency.php');
        $currency = new ListCurrency();
        
        // 10/13/2006 Collin - Changed to use Localization.getConfigPreference
        // This was the problem- Previously, the "-99" currency id always assumed
        // to be defaulted to US Dollars.  However, if someone set their install to use
        // Euro or other type of currency then this setting would not apply as the
        // default because it was being overridden by US Dollars.
        $cur_id = $locale->getPrecedentPreference('currency', $this->bean);
        if($cur_id) {
            $selectCurrency = $currency->getSelectOptions($cur_id);
            $this->ss->assign("CURRENCY", $selectCurrency);
        } else {
            $selectCurrency = $currency->getSelectOptions();
            $this->ss->assign("CURRENCY", $selectCurrency);
        }
        
        $currencyList = array();
        foreach($locale->currencies as $id => $val ) {
            $currencyList[$id] = $val['symbol'];
        }
        $currencySymbolJSON = json_encode($currencyList);
        $this->ss->assign('currencySymbolJSON', $currencySymbolJSON);
        
        $currencyDisplay = new Currency();
        if(isset($cur_id) ) {
            $currencyDisplay->retrieve($cur_id);
            $this->ss->assign('CURRENCY_DISPLAY', $currencyDisplay->iso4217 .' '.$currencyDisplay->symbol );
        } else {
            $this->ss->assign("CURRENCY_DISPLAY", $currencyDisplay->getDefaultISO4217() .' '.$currencyDisplay->getDefaultCurrencySymbol() );
        }
        
        // fill significant digits dropdown
        $significantDigits = $locale->getPrecedentPreference('default_currency_significant_digits', $this->bean);
        $sigDigits = '';
        for($i=0; $i<=6; $i++) {
            if($significantDigits == $i) {
                $sigDigits .= "<option value=\"$i\" selected=\"true\">$i</option>";
            } else {
                $sigDigits .= "<option value=\"$i\">{$i}</option>";
            }
        }
        
        $this->ss->assign('sigDigits', $sigDigits);
        $this->ss->assign('CURRENCY_SIG_DIGITS', $significantDigits);
        
        $num_grp_sep = $this->bean->getPreference('num_grp_sep');
        $dec_sep = $this->bean->getPreference('dec_sep');
        $this->ss->assign("NUM_GRP_SEP",(empty($num_grp_sep) ? $GLOBALS['sugar_config']['default_number_grouping_seperator'] : $num_grp_sep));
        $this->ss->assign("DEC_SEP",(empty($dec_sep) ? $GLOBALS['sugar_config']['default_decimal_seperator'] : $dec_sep));
        $this->ss->assign('getNumberJs', $locale->getNumberJs());
        
        //// Name display format
        $this->ss->assign('default_locale_name_format', $locale->getLocaleFormatMacro($this->bean));
        $this->ss->assign('getNameJs', $locale->getNameJs());
        $this->ss->assign('NAME_FORMAT', $this->bean->getLocaleFormatDesc());
        ////	END LOCALE SETTINGS
    }

    protected function setupAdvancedTabPdfSettings() {
        ///////////////////////////////////////////////////////////////////////////////
        /////////  PDF SETTINGS
        global $focus_user;
        $focus_user = $this->bean;
        if ( !isset($this->bean->id) ) {
            if ( !defined('SUGARPDF_USE_DEFAULT_SETTINGS') ) {
                define('SUGARPDF_USE_DEFAULT_SETTINGS', true);
            }
        }
        if ( !defined('SUGARPDF_USE_FOCUS') ) {
            define('SUGARPDF_USE_FOCUS', true);
        }
        include_once('include/Sugarpdf/sugarpdf_config.php');
        if ( PDF_CLASS == 'TCPDF' ) {
            $this->ss->assign('SHOW_PDF_OPTIONS',true);
            $this->ss->assign('PDF_CLASS',PDF_CLASS);
            $this->ss->assign('PDF_UNIT',PDF_UNIT);
            $this->ss->assign('PDF_PAGE_FORMAT_LIST',get_select_options_with_id(array_combine(explode(",",PDF_PAGE_FORMAT_LIST), explode(",",PDF_PAGE_FORMAT_LIST)), PDF_PAGE_FORMAT));
            $this->ss->assign('PDF_PAGE_ORIENTATION_LIST',get_select_options_with_id(array("P"=>translate("LBL_PDF_PAGE_ORIENTATION_P",'Users'),"L"=>translate("LBL_PDF_PAGE_ORIENTATION_L",'Users')),PDF_PAGE_ORIENTATION));
            $this->ss->assign('PDF_MARGIN_HEADER',PDF_MARGIN_HEADER);
            $this->ss->assign('PDF_MARGIN_FOOTER',PDF_MARGIN_FOOTER);
            $this->ss->assign('PDF_MARGIN_TOP',PDF_MARGIN_TOP);
            $this->ss->assign('PDF_MARGIN_BOTTOM',PDF_MARGIN_BOTTOM);
            $this->ss->assign('PDF_MARGIN_LEFT',PDF_MARGIN_LEFT);
            $this->ss->assign('PDF_MARGIN_RIGHT',PDF_MARGIN_RIGHT);
        
            require_once('include/Sugarpdf/FontManager.php');
            $fontManager = new FontManager();
            $fontlist = $fontManager->getSelectFontList();
            $this->ss->assign('PDF_FONT_NAME_MAIN',get_select_options_with_id($fontlist, PDF_FONT_NAME_MAIN));
            $this->ss->assign('PDF_FONT_NAME_MAIN_DISPLAY',$fontlist[PDF_FONT_NAME_MAIN]);
            $this->ss->assign('PDF_FONT_SIZE_MAIN',PDF_FONT_SIZE_MAIN);
            $this->ss->assign('PDF_FONT_NAME_DATA',get_select_options_with_id($fontlist, PDF_FONT_NAME_DATA));
            $this->ss->assign('PDF_FONT_NAME_DATA_DISPLAY',$fontlist[PDF_FONT_NAME_DATA]);
            $this->ss->assign('PDF_FONT_SIZE_DATA',PDF_FONT_SIZE_DATA);
            ///////// END PDF SETTINGS
            ////////////////////////////////////////////////////////////////////////////////
        }
    }
    
    protected function setupEmailSettings() {
        global $current_user, $app_list_strings;

        $this->ss->assign("MAIL_SENDTYPE", get_select_options_with_id($app_list_strings['notifymail_sendtype'], $this->bean->getPreference('mail_sendtype')));

        ///////////////////////////////////////////////////////////////////////////////
        ////	EMAIL OPTIONS
        // We need to turn off the requiredness of emails if it is a group or portal user
        if ($this->usertype == 'GROUP' || $this->usertype == 'PORTAL_ONLY' ) {
            global $dictionary;
            $dictionary['User']['fields']['email1']['required'] = false;
        }
        // hack to disable email field being required if it shouldn't be required
        if ( $this->ss->get_template_vars("REQUIRED_EMAIL_ADDRESS") == '0' ) {
            $GLOBALS['dictionary']['User']['fields']['email1']['required'] = false;
        }
        $this->ss->assign("NEW_EMAIL",  '<span id="email_span">' . getEmailAddressWidget($this->bean, "email1", $this->bean->email1, $this->viewType) . '</span>');
        // hack to undo that previous hack
        if ( $this->ss->get_template_vars("REQUIRED_EMAIL_ADDRESS") == '0' ) {
            $GLOBALS['dictionary']['User']['fields']['email1']['required'] = true;
        }
        $raw_email_link_type = $this->bean->getPreference('email_link_type');
        if ( $this->viewType == 'EditView' ) {
            $this->ss->assign('EMAIL_LINK_TYPE', get_select_options_with_id($app_list_strings['dom_email_link_type'], $raw_email_link_type));
        } else {
            $this->ss->assign('EMAIL_LINK_TYPE', $app_list_strings['dom_email_link_type'][$raw_email_link_type]);
        }
        
        /////	END EMAIL OPTIONS
        ///////////////////////////////////////////////////////////////////////////////
        

        /////////////////////////////////////////////
        /// Handle email account selections for users
        /////////////////////////////////////////////
        $hide_if_can_use_default = true;
        if( !($this->usertype=='GROUP' || $this->usertype=='PORTAL_ONLY') ) {
            // email smtp
            $systemOutboundEmail = new OutboundEmail();
            $systemOutboundEmail = $systemOutboundEmail->getSystemMailerSettings();
            $mail_smtpserver = $systemOutboundEmail->mail_smtpserver;
            $mail_smtptype = $systemOutboundEmail->mail_smtptype;
            $mail_smtpport = $systemOutboundEmail->mail_smtpport;
            $mail_smtpssl = $systemOutboundEmail->mail_smtpssl;
            $mail_smtpuser = "";
            $mail_smtppass = "";
            $mail_smtpdisplay = $systemOutboundEmail->mail_smtpdisplay;
            $mail_smtpauth_req=true;
            
            if( !$systemOutboundEmail->isAllowUserAccessToSystemDefaultOutbound() ) {
                $mail_smtpauth_req = $systemOutboundEmail->mail_smtpauth_req;
                $userOverrideOE = $systemOutboundEmail->getUsersMailerForSystemOverride($this->bean->id);
                if($userOverrideOE != null) {
                    $mail_smtpuser = $userOverrideOE->mail_smtpuser;
                    $mail_smtppass = $userOverrideOE->mail_smtppass;
                }
                
                
                if(!$mail_smtpauth_req && (empty($systemOutboundEmail->mail_smtpserver) || empty($systemOutboundEmail->mail_smtpuser) || empty($systemOutboundEmail->mail_smtppass))) {
                    $hide_if_can_use_default = true;
                } else{
                    $hide_if_can_use_default = false;
                }
            }
            
            $this->ss->assign("mail_smtpdisplay", $mail_smtpdisplay);
            $this->ss->assign("mail_smtpserver", $mail_smtpserver);
            $this->ss->assign("mail_smtpuser", $mail_smtpuser);
            $this->ss->assign("mail_smtppass", "");
            $this->ss->assign("mail_haspass", empty($systemOutboundEmail->mail_smtppass)?0:1);
            $this->ss->assign("mail_smtpauth_req", $mail_smtpauth_req);
            $this->ss->assign('MAIL_SMTPPORT',$mail_smtpport);
            $this->ss->assign('MAIL_SMTPSSL',$mail_smtpssl);
        }
        $this->ss->assign('HIDE_IF_CAN_USE_DEFAULT_OUTBOUND',$hide_if_can_use_default );
        
    }


    /**
     * setUserType
     * This function is used to set the user_type variable for a given User instance
     *
     * @param Mixed $user The user instance to set the user_type variable on
     * @return String value representing the user type
     */
    function setUserType($user)
    {
        //bug #49175: user's always regular
        //need to get user_type from bean
        $user->user_type = '';

        if ($user->is_admin)
        {
            $user->user_type = 'Administrator';
        }
        else if ($user->is_group)
        {
            $user->user_type = 'GROUP';
        }
        else
        {
            $user->user_type = 'RegularUser';
        }
    }
}
