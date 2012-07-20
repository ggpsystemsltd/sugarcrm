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


class FeedLinkHandlerLink {
    function getDisplay(&$data) {
        return '<div style="padding-left:10px"><a href="' . $data['LINK_URL'] . '" target="_blank">' .$data['LINK_URL'] .'</a></div>';
    }

    function handleInput($feed, $link_type, $link_url) {
        $feed->link_type = $link_type;

        // 
        if ( $link_url{0} != '.' || $link_url{0} != '/' ) {
            // Automatically add http:// in front of the link_url if it doesn't already have it
            if ( strncmp($link_url,'http://',7) != 0 && strncmp($link_url,'https://',8) != 0 ) {
                $link_url = 'http://'.$link_url;
            }
        }
        // Make sure they aren't trying to do something nasty like break out of a quote or something
        $link_url = str_replace(array('<','>','"',"'"),array('&lt;','&gt;','&quot;','&apos;'),$link_url);

        $feed->link_url = $link_url;	
    }
}