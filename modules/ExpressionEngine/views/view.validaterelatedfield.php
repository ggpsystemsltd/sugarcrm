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

require_once('include/MVC/View/views/view.ajax.php');
require_once("data/BeanFactory.php");

class ViewValidateRelatedField extends ViewAjax
{
    var $vars = array("tmodule", "link", "related");

    function __construct()
    {
        parent::ViewAjax();
        foreach($this->vars as $var)
        {
            if (empty($_REQUEST[$var]))
                sugar_die("Required paramter $var not set in ViewRelFields");
            $this->$var = $_REQUEST[$var];
        }

    }

    function display() {
        //First, create a dummy bean to access the relationship info
        $focus = BeanFactory::newBean($this->tmodule);
        $focus->id = create_guid();
        //Next, figure out what the related module is
        $linkName = $this->link;
        if(!$focus->load_relationship($linkName)){
            echo "invalid link";
            return;
        }
        $relModule = $focus->$linkName->getRelatedModuleName();
        //Now get the field info for the related field
        $relBean = BeanFactory::newBean($relModule);

        //First check if the field exists
        if(!isset($relBean->field_defs[$this->related]) || !is_array($relBean->field_defs[$this->related]))
        {
            echo(json_encode("unknown field"));
        }
        //Otherwise, send it to the formula builder to evaluate further
        else
        {
            echo json_encode($relBean->field_defs[$this->related]);
        }
    }
}