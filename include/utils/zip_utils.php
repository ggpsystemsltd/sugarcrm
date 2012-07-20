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



if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
if(class_exists("ZipArchive")) {
    require_once 'include/utils/php_zip_utils.php';
    return;
} else {
require_once('include/pclzip/pclzip.lib.php');
if ( isset($GLOBALS['log']) && class_implements($GLOBALS['log'],'LoggerTemplate') ) {
    $GLOBALS['log']->deprecated('Use of PCLZip has been deprecated. Please enable the zip extension in your PHP install ( see http://www.php.net/manual/en/zip.installation.php for more details ).');
}
function unzip( $zip_archive, $zip_dir, $forceOverwrite = false ){
    if( !is_dir( $zip_dir ) ){
        if (!defined('SUGAR_PHPUNIT_RUNNER'))
            die( "Specified directory '$zip_dir' for zip file '$zip_archive' extraction does not exist." );
        return false;
    }

    $archive = new PclZip( $zip_archive );

    if ( $forceOverwrite ) {
        if( $archive->extract( PCLZIP_OPT_PATH, $zip_dir, PCLZIP_OPT_REPLACE_NEWER ) == 0 ){
            if (!defined('SUGAR_PHPUNIT_RUNNER'))
                die( "Error: " . $archive->errorInfo(true) );
            return false;
        }
    }
    else {
        if( $archive->extract( PCLZIP_OPT_PATH, $zip_dir ) == 0 ){
            if (!defined('SUGAR_PHPUNIT_RUNNER'))
                die( "Error: " . $archive->errorInfo(true) );
            return false;
        }
    }
}

function unzip_file( $zip_archive, $archive_file, $to_dir, $forceOverwrite = false ){
    if( !is_dir( $to_dir ) ){
        if (!defined('SUGAR_PHPUNIT_RUNNER'))
            die( "Specified directory '$to_dir' for zip file '$zip_archive' extraction does not exist." );
        return false;
    }

    $archive = new PclZip($zip_archive);
    if ( $forceOverwrite ) {
        if( $archive->extract(  PCLZIP_OPT_BY_NAME, $archive_file,
                                PCLZIP_OPT_PATH,    $to_dir,
                                PCLZIP_OPT_REPLACE_NEWER ) == 0 ){
            if (!defined('SUGAR_PHPUNIT_RUNNER'))
                die( "Error: " . $archive->errorInfo(true) );
            return false;
        }
    }
    else {
        if( $archive->extract(  PCLZIP_OPT_BY_NAME, $archive_file,
                                PCLZIP_OPT_PATH,    $to_dir        ) == 0 ){
            if (!defined('SUGAR_PHPUNIT_RUNNER'))
                die( "Error: " . $archive->errorInfo(true) );
            return false;
        }
    }
}

function zip_dir( $zip_dir, $zip_archive ){
    $archive    = new PclZip( $zip_archive );
    $v_list     = $archive->create( $zip_dir );
    if( $v_list == 0 ){
        if (!defined('SUGAR_PHPUNIT_RUNNER'))
            die( "Error: " . $archive->errorInfo(true) );
        return false;
    }
}

/**
 * Zip list of files, optionally stripping prefix
 * @param string $zip_file
 * @param array $file_list
 * @param string $prefix Regular expression for the prefix to strip
 */
function zip_files_list($zip_file, $file_list, $prefix = '')
{
    $archive    = new PclZip( $zip_file );
    foreach($file_list as $file) {
        if(!empty($prefix) && preg_match($prefix, $file, $matches) > 0) {
            $remove_path = $matches[0];
            $archive->add($file, PCLZIP_OPT_REMOVE_PATH, $prefix);
        } else {
            $archive->add($file);
        }
    }
    return true;
}

} // if (ZipArchive exists)