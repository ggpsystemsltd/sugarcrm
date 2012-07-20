<?php

/*

Modification information for LGPL compliance

r56990 - 2010-06-16 13:05:36 -0700 (Wed, 16 Jun 2010) - kjing - snapshot "Mango" svn branch to a new one for GitHub sync

r56989 - 2010-06-16 13:01:33 -0700 (Wed, 16 Jun 2010) - kjing - defunt "Mango" svn dev branch before github cutover

r55980 - 2010-04-19 13:31:28 -0700 (Mon, 19 Apr 2010) - kjing - create Mango (6.1) based on windex

r54347 - 2010-02-08 09:41:14 -0800 (Mon, 08 Feb 2010) - jmertic - Bug 35509 - Have any module that is not a submodule of one of the modules in the module bar list show up at the end of the module bar when it is active. Also, disable the sub-nav bar for now.

r53116 - 2009-12-09 17:24:37 -0800 (Wed, 09 Dec 2009) - mitani - Merge Kobe into Windex Revision 51633 to 53087

r51719 - 2009-10-22 10:18:00 -0700 (Thu, 22 Oct 2009) - mitani - Converted to Build 3  tags and updated the build system 

r51634 - 2009-10-19 13:32:22 -0700 (Mon, 19 Oct 2009) - mitani - Windex is the branch for Sugar Sales 1.0 development

r50752 - 2009-09-10 15:18:28 -0700 (Thu, 10 Sep 2009) - dwong - Merged branches/tokyo from revision 50372 to 50729 to branches/kobe2
Discard lzhang r50568 changes in Email.php and corresponding en_us.lang.php

r50375 - 2009-08-24 18:07:43 -0700 (Mon, 24 Aug 2009) - dwong - branch kobe2 from tokyo r50372

r49253 - 2009-07-02 16:46:02 -0700 (Thu, 02 Jul 2009) - faissah - 31534 The site name can't show in navigation bar

r42807 - 2008-12-29 11:16:59 -0800 (Mon, 29 Dec 2008) - dwong - Branch from trunk/sugarcrm r42806 to branches/tokyo/sugarcrm

r42268 - 2008-12-02 13:29:54 -0800 (Tue, 02 Dec 2008) - rob - Get some tweaks to core code done to prepare for an AJAX UI


*/


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



function smarty_function_sugar_link($params, &$smarty)
{
	if(empty($params['module'])){
		$smarty->trigger_error("sugar_link: missing 'module' parameter");
		return;
	}
	if(!empty($params['data']) && is_array($params['data'])){
		$link_url = 'index.php?';
		$link_url .= 'module=iFrames&action=index';
		$link_url .= '&record='.$params['data']['0'];
		$link_url .= '&tab=true';
    }else{
		$action = (!empty($params['action']))?$params['action']:'index';
	    
	    $link_url = 'index.php?';
	    $link_url .= 'module='.$params['module'].'&action='.$action;
	
	    if (!empty($params['record'])) { $link_url .= "&record=".$params['record']; }
	    if (!empty($params['extraparams'])) { $link_url .= '&'.$params['extraparams']; }
	}
	
	if (isset($params['link_only']) && $params['link_only'] == 1 ) {
        // Let them just get the url, they want to put it someplace
        return ajaxLink($link_url);
    }
	
	$id = (!empty($params['id']))?' id="'.$params['id'].'"':'';
	$class = (!empty($params['class']))?' class="'.$params['class'].'"':'';
	$style = (!empty($params['style']))?' style="'.$params['style'].'"':'';
	$title = (!empty($params['title']))?' title="'.$params['title'].'"':'';
	$accesskey = (!empty($params['accesskey']))?' accesskey="'.$params['accesskey'].'" ':'';
    $options = (!empty($params['options']))?' '.$params['options'].'':'';
    if(!empty($params['data']) && is_array($params['data']))
		$label =$params['data']['4'];
	elseif ( !empty($params['label']) )
	    $label = $params['label'];
	else
	    $label = (!empty($GLOBALS['app_list_strings']['moduleList'][$params['module']]))?$GLOBALS['app_list_strings']['moduleList'][$params['module']]:$params['module'];

    $link = '<a href="'.ajaxLink($link_url).'"'.$id.$class.$style.$options.'>'.$label.'</a>';
    return $link;
}