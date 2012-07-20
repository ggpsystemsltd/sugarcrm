<?php

/*

Modification information for LGPL compliance

r56990 - 2010-06-16 13:05:36 -0700 (Wed, 16 Jun 2010) - kjing - snapshot "Mango" svn branch to a new one for GitHub sync

r56989 - 2010-06-16 13:01:33 -0700 (Wed, 16 Jun 2010) - kjing - defunt "Mango" svn dev branch before github cutover

r55980 - 2010-04-19 13:31:28 -0700 (Mon, 19 Apr 2010) - kjing - create Mango (6.1) based on windex

r51719 - 2009-10-22 10:18:00 -0700 (Thu, 22 Oct 2009) - mitani - Converted to Build 3  tags and updated the build system 

r51634 - 2009-10-19 13:32:22 -0700 (Mon, 19 Oct 2009) - mitani - Windex is the branch for Sugar Sales 1.0 development

r50752 - 2009-09-10 15:18:28 -0700 (Thu, 10 Sep 2009) - dwong - Merged branches/tokyo from revision 50372 to 50729 to branches/kobe2
Discard lzhang r50568 changes in Email.php and corresponding en_us.lang.php

r50375 - 2009-08-24 18:07:43 -0700 (Mon, 24 Aug 2009) - dwong - branch kobe2 from tokyo r50372

r46741 - 2009-05-01 06:25:44 -0700 (Fri, 01 May 2009) - roger - PRO tagging.

r45148 - 2009-03-16 07:43:29 -0700 (Mon, 16 Mar 2009) - clee - Bug:28522
There were several issues with the code to select teams as well as the quicksearch code.  The main issues for the teams selection was that the fields all share the same name and the elements were not being properly selected within the javascript code.
include/EditView/EditView2.php
include/generic/SugarWidgets/SugarWidgetSubpanelTopButtonQuickCreate.php
include/generic/SugarWidgets/SugarWidgetSubpanelTopCreateNoteButton.php
include/generic/SugarWidgets/SugarWidgetSubpanelTopCreateTaskButton.php
include/generic/SugarWidgets/SugarWidgetSubpanelTopScheduleCallButton.php
include/generic/SugarWidgets/SugarWidgetSubpanelTopScheduleMeetingButton.php
include/javascript/sugar_3.js
include/SearchForm/tpls/header.tpl
include/Smarty/plugins/function.sugar_button.php
include/Smarty/plugins/function.sugarvar_teamset.php
include/SugarFields/Fields/Collection/ViewSugarFieldCollection.php
include/SugarFields/Fields/Collection/CollectionEditView.tpl
include/SugarFields/Fields/Collection/SugarFieldCollection.js
include/SugarFields/Fields/Teamset/SugarFieldTeamset.php
include/SugarFields/Fields/Teamset/ViewSugarFieldTeamsetCollection.php
include/SugarFields/Fields/Teamset/Teamset.js
include/SugarFields/Fields/Teamset/TeamsetCollectionEditView.tpl
include/SugarFields/Fields/TeamsetCollectionMassupdateView.tpl
include/SugarFields/Fields/Teamset/TeamsetCollectionSearchView.tpl
include/TemplateHandler/TemplateHandler.php
modules/Teams/TeamSetManager.php
themes/default/IE7.js
Removed:
include/SugarFields/Fields/Teamset/TeamsetCollectionQuickCreateView.tpl

r44915 - 2009-03-09 11:58:23 -0700 (Mon, 09 Mar 2009) - roger - changes to remove the ajax call from the team widget.

r44310 - 2009-02-20 10:04:55 -0800 (Fri, 20 Feb 2009) - roger - fix bug with comma delimited team names.

r44105 - 2009-02-13 11:19:44 -0800 (Fri, 13 Feb 2009) - roger - hanlde showing the user name if we encounter a private team.

r43362 - 2009-01-19 13:12:00 -0800 (Mon, 19 Jan 2009) - roger - 
r42807 - 2008-12-29 11:16:59 -0800 (Mon, 29 Dec 2008) - dwong - Branch from trunk/sugarcrm r42806 to branches/tokyo/sugarcrm

r42627 - 2008-12-17 21:21:09 -0800 (Wed, 17 Dec 2008) - Collin Lee - Changed the teams in detail view to show a comma separated list of teams.


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


function smarty_function_sugarvar_teamset($params, &$smarty) {
    require_once('include/SugarFields/SugarFieldHandler.php');
    $sfh = new SugarFieldHandler();
    $sugarField = $sfh->getSugarField('Teamset');
    return $sugarField->render($params, $smarty);
}
?>