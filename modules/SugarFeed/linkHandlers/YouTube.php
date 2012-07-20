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

require_once('modules/SugarFeed/linkHandlers/Link.php');

class FeedLinkHandlerYoutube extends FeedLinkHandlerLink {
    function getDisplay(&$data) {
        return '<div style="padding-left:10px"><object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/' . $data['LINK_URL'] . '&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><param name="wmode" value="opaque" /><embed src="http://www.youtube.com/v/' . $data['LINK_URL'] . '&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="false" wmode="opaque" width="425" height="344"></embed></object></div>';
    }
    
    function handleInput($feed, $link_type, $link_url) {
        $match = array();
        preg_match('/v=([^\&]+)/', $link_url, $match);
		
        if(!empty($match[1])){
            $feed->link_type = $link_type;
            $feed->link_url = $match[1];
        }
    }
}