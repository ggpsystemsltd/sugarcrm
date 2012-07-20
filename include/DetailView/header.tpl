{*
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

*}
{{* Add the preForm code if it is defined (used for vcards) *}}
{{if $preForm}}
	{{$preForm}}
{{/if}}
<table cellpadding="1" cellspacing="0" border="0" width="100%" class="actionsContainer">
<tr>
<td class="buttons" align="left" NOWRAP>
<form action="index.php" method="post" name="DetailView" id="form">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab">
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
{{if isset($form.hidden)}}
{{foreach from=$form.hidden item=field}}
{{$field}}
{{/foreach}}
{{/if}}

{{if !isset($form.buttons)}}
{{sugar_button module="$module" id="EDIT" view="$view"}}
{{sugar_button module="$module" id="DUPLICATE" view="EditView"}}
{{sugar_button module="$module" id="DELETE" view="$view"}}
{{else}}
	{{counter assign="num_buttons" start=0 print=false}}
	{{foreach from=$form.buttons key=val item=button}}
	  {{if !is_array($button) && in_array($button, $built_in_buttons)}}
	     {{counter print=false}}
	     {{sugar_button module="$module" id="$button" view="EditView"}}
	  {{/if}}
	{{/foreach}}
	{{if isset($closeFormBeforeCustomButtons)}}
	</form>
	</td>
	{{/if}}
	{{if count($form.buttons) > $num_buttons}}
			{{foreach from=$form.buttons key=val item=button}}
			  {{if is_array($button) && $button.customCode}}
              {{if isset($closeFormBeforeCustomButtons)}}
              <td class="buttons" align="left" NOWRAP>
              {{/if}}
			  {{sugar_button module="$module" id="$button" view="EditView"}}
              {{if isset($closeFormBeforeCustomButtons)}}
              </td>
              {{/if}}
			  {{/if}}
			{{/foreach}}
	{{/if}}
{{/if}}
{{if !isset($closeFormBeforeCustomButtons)}}
</form>
</td>
{{/if}}
{{if empty($form.hideAudit) || !$form.hideAudit}}
<td class="buttons" align="left" NOWRAP>
{{sugar_button module="$module" id="Audit" view="EditView"}}
</td>
{{/if}}
<td align="right" width="100%">{$ADMIN_EDIT}
	{{if $panelCount == 0}}
	    {{* Render tag for VCR control if SHOW_VCR_CONTROL is true *}}
		{{if $SHOW_VCR_CONTROL}}
			{$PAGINATION}
		{{/if}}
		{{counter name="panelCount" print=false}}
	{{/if}}
</td>
{{* Add $form.links if they are defined *}}
{{if !empty($form) && isset($form.links)}}
	<td align="right" width="10%">&nbsp;</td>
	<td align="right" width="100%" NOWRAP>
	{{foreach from=$form.links item=link}}
	    {{$link}}&nbsp;
	{{/foreach}}
	</td>
{{/if}}
</tr>
</table>