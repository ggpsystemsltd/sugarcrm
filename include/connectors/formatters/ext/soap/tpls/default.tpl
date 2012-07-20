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
<div style="visibility:hidden;" id="{{$source}}_popup_div"></div>
<script type="text/javascript">
function show_{{$source}}(event) 
{literal}
{

		var callback =	{
			success: function(data) {
				eval('result = ' + data.responseText);
				if(typeof result != 'Undefined') {
				    names = new Array();
				    output = '';
				    count = 0;
                    for(var i in result) {
                        if(count == 0) {
	                        detail = 'Showing first result <p>';
	                        for(var field in result[i]) {
	                            detail += '<b>' + field + ':</b> ' + result[i][field] + '<br>';
	                        }
	                        output += detail + '<p>';
                        } 
                        count++;
                    }
                {/literal}
					cd = new CompanyDetailsDialog("{{$source}}_popup_div", output, event.clientX, event.clientY);
			    {literal}
					cd.setHeader("Found " + count + (count == 1 ? " result" : " results"));
					cd.display();                    
				} else {
				    alert("Unable to retrieve information for record");
				}
			},
			
			failure: function(data) {
				
			}		  
		}

{/literal}

url = 'index.php?module=Connectors&action=DefaultSoapPopup&source_id={{$source}}&module_id={{$module}}&record_id={$fields.id.value}&mapping={{$mapping}}';
var cObj = YAHOO.util.Connect.asyncRequest('POST', url, callback);
			   
{literal}
}
{/literal}
</script>