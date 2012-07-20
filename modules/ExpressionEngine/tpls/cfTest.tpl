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
{literal}<!--<script type=text/javascript>
Ext.onReady(function() {
//Register fields individually
/*SUGAR.forms.AssignmentHandler.registerFields({
form:"EditView",
fields:['industry', 'employees', 'name', 'phone_office', 'phone_fax']
});*/
//Register an entire form at once
SUGAR.forms.AssignmentHandler.registerForm("EditView");
if (!Ext.isIE) console.log("name = " + SUGAR.forms.AssignmentHandler.getValue('name'));
//Values of the form can now be used in expressions
if (!Ext.isIE) console.log("Length of $name = " + new SUGAR.forms.evalVariableExpression('strlen($name)').evaluate());
//Create a new Dependency
var typeDep = new SUGAR.forms.Dependency(
new SUGAR.forms.Trigger(['name', 'employees'], 'true'),
new SUGAR.forms.SetValueAction('phone_office', 'add($employees, strlen($name))')
);
//Set value of a field directly (will trigger any Dependencies)
SUGAR.forms.AssignmentHandler.assign('employees', 100);
var types = [];
types[""] = "";
types["one"] = "A";
types["two"] = "B";
types["three"] = "C";
SUGAR.forms.AssignmentHandler.assign('account_type', types);
SUGAR.forms.AssignmentHandler.assign('industry', ["", "Shipping", "Faxing", "Retail"]);
var aFaxesDep = new SUGAR.forms.Dependency(
new SUGAR.forms.Trigger(['account_type'], 'contains($account_type, "one")'),
[new SUGAR.forms.Action('industry', '"Faxing"'), new SUGAR.forms.ReadOnlyAction('phone_fax', 'true')],
new SUGAR.forms.ReadOnlyAction('phone_fax', 'false')
);
if (!Ext.isIE) console.log("done");
});
</script> -->
<form action="index.php" method="POST" name="EditView" id="EditView">
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td>
				<input type="hidden" name="module" value="Accounts"><input type="hidden" name="record" value="ea087e5d-d800-207c-b731-4900d27403a6"><input type="hidden" name="isDuplicate" value="false"><input type="hidden" name="action"><input type="hidden" name="return_module" value="Accounts"><input type="hidden" name="return_action" value="DetailView"><input type="hidden" name="return_id" value="ea087e5d-d800-207c-b731-4900d27403a6"><input type="hidden" name="contact_role"><input type="hidden" name="relate_to" value="Accounts"><input type="hidden" name="relate_id" value="ea087e5d-d800-207c-b731-4900d27403a6"><input type="hidden" name="offset" value="1"><input title="Save" accessKey="S" class="button" onclick="this.form.action.value='Save'; return check_form('EditView');" type="submit" name="button" value="Save"><input title="Cancel" accessKey="X" class="button" onclick="this.form.action.value='DetailView'; this.form.module.value='Accounts'; this.form.record.value='ea087e5d-d800-207c-b731-4900d27403a6';" type="submit" name="button" value="Cancel"><input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record=ea087e5d-d800-207c-b731-4900d27403a6&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="View Change Log">
			</td>
			<td align='right'>
			</td>
		</tr>
	</table>
	<script src="modules/Accounts/Account.js?s=7c74ed735ef6055c5337721c01c06cbe&c=1">
	</script>
	<table width="100%" cellspacing="0" cellpadding="0" class='detail view' id='tabFormPagination'>
		<tr class='pagination'>
			<td COLSPAN="20" style='padding: 0px;'>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr>
						<td nowrap align='right' >
							<button type='button' class='button' title='Return to List' onClick='document.location.href="index.php?action=index&module=Accounts&offset=0";'>
								Return to List
							</button>&nbsp;&nbsp;&nbsp;&nbsp;
							<button type='button' class='button' title='Previous' disabled>
								<img src="themes/default/images/previous_off.gif" width="8" height="11" alt=$mod_strings.LBL_PREVIOUS border='0' align='absmiddle' />
							</button>&nbsp;&nbsp;(1)&nbsp;&nbsp;
							<button type='button' class='button' title='Next' disabled>
								<img src="themes/default/images/next_off.gif" width="8" height="11" alt=$mod_strings.LBL_NEXT border='0' align='absmiddle' />
							</button>&nbsp;&nbsp;
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<div id="LBL_ACCOUNT_INFORMATION">
		<table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
			<th scope="row" align="left" colspan="8">
				<h4>
					Account Information
				</h4>
			</th>
			<tr>
				<td valign="top" width='12.5%' scope="row" NOWRAP>
 Name:
					<span class="required">
						*
					</span>
				</td>
				<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
					<input type='text' name='name' id='name' size='30' maxlength='150' value='Test account 4' title='' tabindex='0'>
					<td valign="top" width='12.5%' scope="row" NOWRAP>
 Phone Office:
					</td>
					<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
						<input type='text' name='phone_office' id='phone_office' size='30' maxlength='25' value='' title='' tabindex='1'>
						</tr>
						<tr>
							<td valign="top" width='12.5%' scope="row" NOWRAP>
 Website:
							</td>
							<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
								<input type='text' name='website' id='website' size='30' maxlength='255' value='http://' title='' tabindex='0'>
								<td valign="top" width='12.5%' scope="row" NOWRAP>
 Fax:
								</td>
								<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
									<input type='text' name='phone_fax' id='phone_fax' size='30' maxlength='25' value='' title='' tabindex='p'>
									</tr>
									<tr>
										<td valign="top" width='12.5%' scope="row" NOWRAP>
 Ticker Symbol:
										</td>
										<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
											<input type='text' name='ticker_symbol' id='ticker_symbol' size='30' maxlength='10' value='' title='' tabindex='t'>
											<td valign="top" width='12.5%' scope="row" NOWRAP>
 Alternate Phone:
											</td>
											<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
												<input type='text' name='phone_alternate' id='phone_alternate' size='30' maxlength='25' value='' title='' tabindex='p'>
												</tr>
												<tr>
													<td valign="top" width='12.5%' scope="row" NOWRAP>
 Member of:
													</td>
													<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
														<input type="text" name="parent_name" class="sqsEnabled" tabindex="p" id="parent_name" size="" value="" title='' autocomplete="off"><input type="hidden" name="parent_id" id="parent_id" value=""><input type="button" name="btn_parent_name" tabindex="p" title="Select" accessKey="T" class="button" value="Select" onclick='open_popup("Accounts", 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name"}}, "single", true);'><input type="button" name="btn_clr_parent_name" tabindex="p" title="Clear" accessKey="C" class="button" onclick="this.form.parent_name.value = ''; this.form.parent_id.value = '';" value="Clear">
														<td valign="top" width='12.5%' scope="row" NOWRAP>
 Employees:
														</td>
														<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
															<input type='text' name='employees' id='employees' size='30' maxlength='10' value='' title='' tabindex='e'>
															</tr>
															<tr>
																<td valign="top" width='12.5%' scope="row" NOWRAP>
 Ownership:
																</td>
																<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																	<input type='text' name='ownership' id='ownership' size='30' maxlength='100' value='' title='' tabindex='o'/>
																</td>
																<td valign="top" width='12.5%' scope="row" NOWRAP>
 Rating:
																</td>
																<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																	<input type='text' name='rating' id='rating' size='30' maxlength='25' value='' title='' tabindex='r'>
																	</tr>
																	<tr>
																		<td valign="top" width='12.5%' scope="row" NOWRAP>
 Industry:
																		</td>
																		<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																			<select name="industry" id="industry" title='' tabindex="i">
																				<option label="" value=""></option>
																				<option label="Apparel" value="Apparel">Apparel</option>
																				<option label="Banking" value="Banking">Banking</option>
																				<option label="Biotechnology" value="Biotechnology">Biotechnology</option>
																				<option label="Chemicals" value="Chemicals">Chemicals</option>
																				<option label="Communications" value="Communications">Communications</option>
																				<option label="Construction" value="Construction">Construction</option>
																				<option label="Consulting" value="Consulting">Consulting</option>
																				<option label="Education" value="Education">Education</option>
																				<option label="Electronics" value="Electronics">Electronics</option>
																				<option label="Energy" value="Energy">Energy</option>
																				<option label="Engineering" value="Engineering">Engineering</option>
																				<option label="Entertainment" value="Entertainment">Entertainment</option>
																				<option label="Environmental" value="Environmental">Environmental</option>
																				<option label="Finance" value="Finance">Finance</option>
																				<option label="Government" value="Government">Government</option>
																				<option label="Healthcare" value="Healthcare">Healthcare</option>
																				<option label="Hospitality" value="Hospitality">Hospitality</option>
																				<option label="Insurance" value="Insurance">Insurance</option>
																				<option label="Machinery" value="Machinery">Machinery</option>
																				<option label="Manufacturing" value="Manufacturing">Manufacturing</option>
																				<option label="Media" value="Media">Media</option>
																				<option label="Not For Profit" value="Not For Profit">Not For Profit</option>
																				<option label="Recreation" value="Recreation">Recreation</option>
																				<option label="Retail" value="Retail">Retail</option>
																				<option label="Shipping" value="Shipping">Shipping</option>
																				<option label="Technology" value="Technology">Technology</option>
																				<option label="Telecommunications" value="Telecommunications">Telecommunications</option>
																				<option label="Transportation" value="Transportation">Transportation</option>
																				<option label="Utilities" value="Utilities">Utilities</option>
																				<option label="Other" value="Other">Other</option>
																			</select>
																			<td valign="top" width='12.5%' scope="row" NOWRAP>
 SIC Code:
																			</td>
																			<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																				<input type='text' name='sic_code' id='sic_code' size='30' maxlength='10' value='' title='' tabindex='s'>
																				</tr>
																				<tr>
																					<td valign="top" width='12.5%' scope="row" NOWRAP>
 Type:
																					</td>
																					<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																						<select name="account_type" id="account_type" title='' tabindex="a">
																							<option label="" value=""></option>
																							<option label="Analyst" value="Analyst">Analyst</option>
																							<option label="Competitor" value="Competitor">Competitor</option>
																							<option label="Customer" value="Customer">Customer</option>
																							<option label="Integrator" value="Integrator">Integrator</option>
																							<option label="Investor" value="Investor">Investor</option>
																							<option label="Partner" value="Partner">Partner</option>
																							<option label="Press" value="Press">Press</option>
																							<option label="Prospect" value="Prospect">Prospect</option>
																							<option label="Reseller" value="Reseller">Reseller</option>
																							<option label="Other" value="Other">Other</option>
																						</select>
																						<td valign="top" width='12.5%' scope="row" NOWRAP>
 Annual Revenue:
																						</td>
																						<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																							<input type='text' name='annual_revenue' id='annual_revenue' size='30' maxlength='25' value='' title='' tabindex='a'>
																							</tr>
																							<tr>
																								<td valign="top" width='12.5%' scope="row" NOWRAP>
 Team:
																									<span class="required">
																										*
																									</span>
																								</td>
																								<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																									<input type="text" name="team_name" class="sqsEnabled" tabindex="0" id="team_name" size="" value="(admin)" title='' autocomplete="off"><input type="hidden" name="team_id" id="team_id" value="20b44716-ddeb-ba03-84e7-48fcc85755df"><input type="button" name="btn_team_name" tabindex="0" title="Select"  class="button" value="Select" onclick='open_popup("Teams", 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"team_id","name":"team_name"}}, "single", true);'><input type="button" name="btn_clr_team_name" tabindex="0" title="Clear" class="button" onclick="this.form.team_name.value = ''; this.form.team_id.value = '';" value="Clear">
																									<td valign="top" width='12.5%' scope="row" NOWRAP>
																									</td>
																									<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																									</td>
																									</tr>
																									<tr>
																										<td valign="top" width='12.5%' scope="row" NOWRAP>
 Assigned to:
																										</td>
																										<td valign="top" width='37.5%' class='tabEditViewDF' colspan='3' NOWRAP>
																											<input type="text" name="assigned_user_name" class="sqsEnabled" tabindex="a" id="assigned_user_name" size="" value="admin" title='' autocomplete="off"><input type="hidden" name="assigned_user_id" id="assigned_user_id" value="1"><input type="button" name="btn_assigned_user_name" tabindex="a" title="Select" class="button" value="Select" onclick='open_popup("Users", 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}, "single", true);'><input type="button" name="btn_clr_assigned_user_name" tabindex="a" title="Clear" class="button" onclick="this.form.assigned_user_name.value = ''; this.form.assigned_user_id.value = '';" value="Clear">
																											</tr>
																										</table>
																										</div>
																										<p>
																											<div id="LBL_ADDRESS_INFORMATION">
																												<table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
																													<th scope="row" align="left" colspan="8">
																														<h4>
																															Address Information
																														</h4>
																													</th>
																													<tr>
																														<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																															<script type="text/javascript" src='include/SugarFields/Fields/Address/SugarFieldAddress.js?s=7c74ed735ef6055c5337721c01c06cbe&c=1'>
																															</script>
																															<table border="0" cellspacing="0" cellpadding="0">
																																<tr>
																																	<td valign="top" width='%' scope="row" NOWRAP>
 Billing Address:
																																	</td>
																																	<td width='%' class='tabEditViewDF'>
																																		<textarea id="billing_address_street" name="billing_address_street" maxlength="150" rows="2" cols="30" tabindex="2">
																																		</textarea>
																																	</td>
																																</tr>
																																<tr>
																																	<td width='%' scope="row" NOWRAP>
 City:
																																	</td>
																																	<td width='%' class='tabEditViewDF'>
																																		<input type="text" name="billing_address_city" id="billing_address_city" size="30" maxlength='150' value='' tabindex="2">
																																	</td>
																																</tr>
																																<tr>
																																	<td width='%' scope="row" NOWRAP>
 State:
																																	</td>
																																	<td width='%' class='tabEditViewDF'>
																																		<input type="text" name="billing_address_state" id="billing_address_state" size="30" maxlength='150' value='' tabindex="2">
																																	</td>
																																</tr>
																																<tr>
																																	<td width='%' scope="row" NOWRAP>
 Postal Code:
																																	</td>
																																	<td width='%' class='tabEditViewDF'>
																																		<input type="text" name="billing_address_postalcode" id="billing_address_postalcode" size="30" maxlength='150' value='' tabindex="2">
																																	</td>
																																</tr>
																																<tr>
																																	<td width='%' scope="row" NOWRAP>
 Country:
																																	</td>
																																	<td width='%' class='tabEditViewDF'>
																																		<input type="text" name="billing_address_country" id="billing_address_country" size="30" maxlength='150' value='' tabindex="2">
																																	</td>
																																</tr>
																																<tr>
																																	<td colspan="2">
																																		&nbsp;
																																	</td>
																																</tr>
																															</table>
																															<script type="text/javascript">
																																var fromKey = '';
																																var toKey = 'billing';
																																var checkbox = toKey + "_checkbox";
																																var obj = new TestCheckboxReady(checkbox);
																															</script>
																															<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																																<script type="text/javascript" src='include/SugarFields/Fields/Address/SugarFieldAddress.js?s=7c74ed735ef6055c5337721c01c06cbe&c=1'>
																																</script>
																																<table border="0" cellspacing="0" cellpadding="0">
																																	<tr>
																																		<td valign="top" width='%' scope="row" NOWRAP>
 Shipping Address:
																																		</td>
																																		<td width='%' class='tabEditViewDF'>
																																			<textarea id="shipping_address_street" name="shipping_address_street" maxlength="150" rows="2" cols="30" tabindex="3">
																																			</textarea>
																																		</td>
																																	</tr>
																																	<tr>
																																		<td width='%' scope="row" NOWRAP>
 City:
																																		</td>
																																		<td width='%' class='tabEditViewDF'>
																																			<input type="text" name="shipping_address_city" id="shipping_address_city" size="30" maxlength='150' value='' tabindex="3">
																																		</td>
																																	</tr>
																																	<tr>
																																		<td width='%' scope="row" NOWRAP>
 State:
																																		</td>
																																		<td width='%' class='tabEditViewDF'>
																																			<input type="text" name="shipping_address_state" id="shipping_address_state" size="30" maxlength='150' value='' tabindex="3">
																																		</td>
																																	</tr>
																																	<tr>
																																		<td width='%' scope="row" NOWRAP>
 Postal Code:
																																		</td>
																																		<td width='%' class='tabEditViewDF'>
																																			<input type="text" name="shipping_address_postalcode" id="shipping_address_postalcode" size="30" maxlength='150' value='' tabindex="3">
																																		</td>
																																	</tr>
																																	<tr>
																																		<td width='%' scope="row" NOWRAP>
 Country:
																																		</td>
																																		<td width='%' class='tabEditViewDF'>
																																			<input type="text" name="shipping_address_country" id="shipping_address_country" size="30" maxlength='150' value='' tabindex="3">
																																		</td>
																																	</tr>
																																	<tr>
																																		<td width='%' scope="row" NOWRAP>
 Copy address from left:<input id="shipping_checkbox" name="shipping_checkbox" type="checkbox" onclick="syncFields('billing', 'shipping');";  CHECKED>
																																		</td>
																																	</tr>
																																</table>
																																<script type="text/javascript">
																																	var fromKey = 'billing';
																																	var toKey = 'shipping';
																																	var checkbox = toKey + "_checkbox";
																																	var obj = new TestCheckboxReady(checkbox);
																																</script>
																																</tr>
																															</table>
																															</div>
																															<p>
																																<div id="LBL_EMAIL_ADDRESSES">
																																	<table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
																																		<th scope="row" align="left" colspan="8">
																																			<h4>
																																				Email Address(es)
																																			</h4>
																																		</th>
																																		<tr>
																																			<td valign="top" width='12.5%' scope="row" NOWRAP>
 Email:
																																			</td>
																																			<td valign="top" width='37.5%' class='tabEditViewDF' colspan='3' NOWRAP>
																																				<script type="text/javascript" src='include/SugarEmailAddress/SugarEmailAddress.js?s=7c74ed735ef6055c5337721c01c06cbe&c=1'>
																																				</script>
																																				<script type="text/javascript">
																																					var module = 'Accounts';
																																				</script>
																																				<table cellpadding="0" cellspacing="0" border="0">
																																					<tr>
																																						<td  valign="top" NOWRAP>
																																							<table cellpadding="0" cellspacing="0" border="0" id="emailAddressesTable">
																																								<tbody id="targetBody">
																																								</tbody>
																																								<tr>
																																									<td scope="row" NOWRAP>
																																										<input type=hidden name='emailAddressWidget' value=1>
																																									</td>
																																									<td scope="row" NOWRAP>
 &nbsp;
																																									</td>
																																									<td scope="row" NOWRAP>
 Primary
																																									</td>
																																									<td scope="row" NOWRAP>
 Opted Out
																																									</td>
																																									<td scope="row" NOWRAP>
 Invalid
																																									</td>
																																								</tr>
																																							</table>
																																						</td>
																																					</tr>
																																					<tr>
																																						<td scope="row" valign="top" NOWRAP>
																																							<div>
																																								<a href="javascript:addEmailAddress('','');">
																																									<img src="themes/default/images/plus_inline.gif" border="0" alt=$mod_strings.LBL_EXPAND height="10" width="10" class="img">
																																								</a>&nbsp;
																																								<a href="javascript:addEmailAddress('','');">
																																									Add Address
																																								</a>
																																							</div>
																																						</td>
																																					</tr>
																																				</table>
																																				<input type="hidden" name="useEmailWidget" value="true">
																																				<script type="text/javascript" language="javascript">
																																					emailView = 'EditView';
																																					prefillEmailAddress = 'false';
																																					addDefaultAddress = 'true';
																																					prefillData = new Object();
																																					
																																					
																																					if (prefillEmailAddress == 'true') {
																																						prefillEmailAddresses(prefillData);
																																					} else if (addDefaultAddress == 'true') {
																																						addEmailAddress('');
																																					}
																																				</script>
																																				</tr>
																																				<tr>
																																					<td valign="top" width='12.5%' scope="row" NOWRAP>
																																					</td>
																																					<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																																					</td>
																																					<td valign="top" width='12.5%' scope="row" NOWRAP>
																																					</td>
																																					<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																																					</td>
																																				</tr>
																																			</table>
																																			</div>
																																			<p>
																																				<div id="LBL_DESCRIPTION_INFORMATION">
																																					<table width="100%" border="0" cellspacing="1" cellpadding="0" class="edit view">
																																						<th scope="row" align="left" colspan="8">
																																							<h4>
																																								Description Information
																																							</h4>
																																						</th>
																																						<tr>
																																							<td valign="top" width='12.5%' scope="row" NOWRAP>
 Description:
																																							</td>
																																							<td valign="top" width='37.5%' class='tabEditViewDF' colspan='3' NOWRAP>
																																							<textarea id="description" name="description" rows="6" cols="80" title='' tabindex="6">
																																							</textarea>
																																						</tr>
																																						<tr>
																																							<td valign="top" width='12.5%' scope="row" NOWRAP>
																																							</td>
																																							<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																																							</td>
																																							<td valign="top" width='12.5%' scope="row" NOWRAP>
																																							</td>
																																							<td valign="top" width='37.5%' class='tabEditViewDF' NOWRAP>
																																							</td>
																																						</tr>
																																					</table>
																																				</div>
																																				<p>
																																					<div style="padding-top: 2px">
																																						<input title="Save"  class="button" onclick="this.form.action.value='Save'; return check_form('EditView');" type="submit" name="button" value="Save"><input title="Cancel"  class="button" onclick="this.form.action.value='DetailView'; this.form.module.value='Accounts'; this.form.record.value='ea087e5d-d800-207c-b731-4900d27403a6';" type="submit" name="button" value="Cancel"><input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record=ea087e5d-d800-207c-b731-4900d27403a6&module_name=Accounts", true, false,  { "call_back_function":"set_return","form_name":"EditView","field_to_name_array":[] } ); return false;' type="submit" value="View Change Log">
																																					</div>
																																					</form>{/literal}
{$dependencies}