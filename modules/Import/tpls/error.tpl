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
<script type="text/javascript" src="{sugar_getjspath file='include/javascript/sugar_grp_yui_widgets.js'}"></script>
<script>

    //set the variables
    var modalBod = "{$MESSAGE}";
    var cnfgtitle = '{$MOD.LBL_ERROR}';
    var startOverLBL = '{$MOD.LBL_TRY_AGAIN}';
    var cancelLBL = '{$MOD.LBL_CANCEL}';
    var actionVAR = '{$ACTION}';
    var importModuleVAR = '{$IMPORT_MODULE}';
    var sourceVAR = '{$SOURCE}';
    var showCancelVAR = '{$SHOWCANCEL}';
    {if !empty($CANCELLABEL)}
        cancelLBL = '{$CANCELLABEL}';
    {/if}

{literal}
    //function called when 'start over' button is pressed
    var chooseToStartOver = function() {
        //hide the modal and redirect window to previous step
        this.hide();
        document.location.href='index.php?module=Import&action='+actionVAR+'&import_module='+importModuleVAR+'&source='+sourceVAR;
        //SUGAR.importWizard.renderDialog(importModuleVAR,actionVAR,sourceVAR);
    };
    var chooseToCancel = function() {
        //do nothing, just hide the modal
        this.hide();
    };

    //define the buttons to be used in modal popup
    var importButtons = '';
    if(showCancelVAR){
        importButtons = [{ text: startOverLBL, handler: chooseToStartOver, isDefault:true },{ text:cancelLBL, handler: chooseToCancel}];
    }else{
        importButtons = [{ text: startOverLBL, handler: chooseToStartOver, isDefault:true }];
    }

    //define import error modal window
    ImportErrorBox = new YAHOO.widget.SimpleDialog('importMsgWindow', {
        type : 'alert',
        modal: true,
        width: '350px',
        id: 'importMsgWindow',
        close: true,
        visible: true,
        fixedcenter: true,
        constraintoviewport: true,
        draggable: true,
        buttons: importButtons
    });
{/literal}
    //display the window
    ImportErrorBox.setHeader(cnfgtitle);
    ImportErrorBox.setBody(modalBod);
    ImportErrorBox.render(document.body);
    ImportErrorBox.show();

</script>