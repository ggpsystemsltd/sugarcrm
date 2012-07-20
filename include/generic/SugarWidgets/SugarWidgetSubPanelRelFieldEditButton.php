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





//TODO Rename this to edit link
class SugarWidgetSubPanelRelFieldEditButton extends SugarWidgetField
{
	function displayHeaderCell(&$layout_def)
	{
		return '&nbsp;';
	}

	function displayList(&$layout_def)
	{
		die("<pre>" . print_r($layout_def, true) . "</pre>");

        $rel = $layout_def['linked_field'];
        $module = $layout_def['module'];


        global $app_strings;

		$edit_icon_html = SugarThemeRegistry::current()->getImage( 'edit_inline',
			'align="absmiddle" alt="' . $app_strings['LNK_EDIT'] . '" border="0"');

        $script = "
        function editRel(name, id, module) {
            editRelPanel = new YAHOO.SUGAR.AsyncPanel('rel_edit', {
                width: 500,
                draggable: true,
                close: true,
                constraintoviewport: true,
                fixedcenter: false
            });
            var a = editRelPanel;
			a.setHeader( 'Edit Properties' );
			a.render(document.body);
			a.params = {
                module: 'Relationships',
                action: 'editfields',
                rel_module: module,
                id: id,
                rel: name,
                to_pdf: 1
            };
            a.load('index.php?' + SUGAR.util.paramsToUrl(a.params));
            a.show();
            a.center();
		}";

        return "<script>$script</script>"
             . '<div onclick="editRel(\'p1_b1_accounts\', \'cac203f3-0380-495f-3231-4cf58f089f00\', \'Accounts\')">'
             . $edit_icon_html . "</div>";
	}
		
}

?>