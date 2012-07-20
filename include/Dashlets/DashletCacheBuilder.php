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

/*********************************************************************************

 * Description: Handles Generic Widgets 
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/




class DashletCacheBuilder {
    
    /**
     * Builds the cache of Dashlets by scanning the system
     */
    function buildCache() {
        global $beanList;
        $dashletFiles = array();
        $dashletFilesCustom = array();
        
        getFiles($dashletFiles, 'modules', '/^.*\/Dashlets\/[^\.]*\.php$/');
        getFiles($dashletFilesCustom, 'custom/modules', '/^.*\/Dashlets\/[^\.]*\.php$/');
        $cacheDir = create_cache_directory('dashlets/');
        $allDashlets = array_merge($dashletFiles, $dashletFilesCustom);
        $dashletFiles = array();
        foreach($allDashlets as $num => $file) {
            if(substr_count($file, '.meta') == 0) { // ignore meta data files
                $class = substr($file, strrpos($file, '/') + 1, -4);
                $dashletFiles[$class] = array();
                $dashletFiles[$class]['file'] = $file;
                $dashletFiles[$class]['class'] = $class;
                if(is_file(preg_replace('/(.*\/.*)(\.php)/Uis', '$1.meta$2', $file))) { // is there an associated meta data file?
                    $dashletFiles[$class]['meta'] = preg_replace('/(.*\/.*)(\.php)/Uis', '$1.meta$2', $file);
                    require($dashletFiles[$class]['meta']);
                    if ( isset($dashletMeta[$class]['module']) )
                        $dashletFiles[$class]['module'] = $dashletMeta[$class]['module'];
                }
                
                $filesInDirectory = array();
                getFiles($filesInDirectory, substr($file, 0, strrpos($file, '/')), '/^.*\/Dashlets\/[^\.]*\.icon\.(jpg|jpeg|gif|png)$/i');
                if(!empty($filesInDirectory)) {
                    $dashletFiles[$class]['icon'] = $filesInDirectory[0]; // take the first icon we see
                }
            }
        }
        
        write_array_to_file('dashletsFiles', $dashletFiles, $cacheDir . 'dashlets.php');
    }
}
?>