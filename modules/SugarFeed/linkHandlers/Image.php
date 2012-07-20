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

class FeedLinkHandlerImage extends FeedLinkHandlerLink {
    function getDisplay(&$data) {
        $imageData = unserialize(base64_decode($data['LINK_URL']));
        if ( $imageData['width'] != 0 ) {
            $image_style = 'width: '.$imageData['width'].'px; height: '.$imageData['height'].'px; border: 0px;';
        } else {
            // Unknown width/height
            // Set it to a max width of 425 px, and include a tweak so that IE 6 can actually handle it.
            $image_style = 'width: expression(this.scrollWidth > 425 ? \'425px\':\'auto\'); max-width: 425px;';
        }
        return '<div style="padding-left:10px"><!--not_in_theme!--><img src="'. $imageData['url']. '" style="'.$image_style.'"></div>';
    }

    function handleInput($feed, $link_type, $link_url) {
        parent::handleInput($feed, $link_type, $link_url);

        // The FeedLinkHandlerLink class will help sort this url out for us
        $link_url = $feed->link_url;

        $imageData = @getimagesize($link_url);

        if ( ! isset($imageData) ) {
            // The image didn't pull down properly, could be a link and allow_url_fopen could be disabled
            $imageData[0] = 0;
            $imageData[1] = 0;
        } else {
            if ( max($imageData[0],$imageData[1]) > 425 ) {
                // This is a large image, we need to set some specific width/height properties so that the browser can scale it.
                $scale = 425 / max($imageData[0],$imageData[1]);
                $imageData[0] = floor($imageData[0]*$scale);
                $imageData[1] = floor($imageData[1]*$scale);
            }
        }

        $feed->link_url = base64_encode(serialize(array('url'=>$link_url,'width'=>$imageData[0],'height'=>$imageData[1])));
    }
}