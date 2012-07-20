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

 * Description: Static class to that is used to get the filenames for the various
 * cache files used
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/

class ImportCacheFiles
{
    /**#@+
     * Cache file names
     */
    const FILE_MISCELLANEOUS      = 'misc';
    const FILE_DUPLICATES         = 'dupes';
    const FILE_DUPLICATES_DISPLAY = 'dupesdisplay';
    const FILE_ERRORS             = 'error';
    const FILE_ERROR_RECORDS      = 'errorrecords';
    const FILE_ERROR_RECORDS_ONLY = 'errorrecordsonly';
    const FILE_STATUS             = 'status';
    /**#@-*/

    /**
     * List of all cache file names
     * 
     * @var array
     */
    protected static $all_files = array(
        self::FILE_MISCELLANEOUS,
        self::FILE_DUPLICATES,
        self::FILE_DUPLICATES_DISPLAY,
        self::FILE_ERRORS,
        self::FILE_ERROR_RECORDS,
        self::FILE_ERROR_RECORDS_ONLY,
        self::FILE_STATUS,
    );

    /**
     * Get import directory name
     * @return string
     */
    public static function getImportDir()
    {
        return "upload://import";
    }


    /**
     * convertFileName
     *
     * This function returns the name of an upload file link converted as a url in e.g. href
     *
     * @param string $file_name String value of the upload file name
     * @return string The converted URL of the file name
     */
    public static function convertFileNameToUrl($file_name)
    {
        require_once('include/upload_file.php');
        $file_name = str_replace('upload://import', UploadStream::getDir() . '/import', $file_name);
        return $file_name;
    }


    /**
     * Returns the filename for a temporary file
     *
     * @param  string $type string to prepend to the filename, typically to indicate the file's use
     * @return string filename
     */
    private static function _createFileName($type = self::FILE_MISCELLANEOUS)
    {
        global $current_user;
        $importdir = self::getImportDir();
        // ensure dir exists and writable
        UploadStream::ensureDir($importdir, true);

        return "$importdir/{$type}_{$current_user->id}.csv";
    }

    /**
     * Ensure that all cache files are writable or can be created
     * 
     * @return bool
     */
    public static function ensureWritable()
    {
        foreach (self::$all_files as $type)
        {
            $filename = self::_createFileName($type);
            if (file_exists($filename) && !is_writable($filename))
            {
                return false;
            }
            elseif (!is_writable(dirname($filename)))
            {
                return false;
            }
        }
        return true;
    }

    /**
     * Returns the duplicates filename (the ones used to download to csv file
     *
     * @return string filename
     */
    public static function getDuplicateFileName()
    {
        return self::_createFileName(self::FILE_DUPLICATES);
    }

    /**
     * Returns the duplicates display filename (the one used for display in html)
     *
     * @return string filename
     */
    public static function getDuplicateFileDisplayName()
    {
        return self::_createFileName(self::FILE_DUPLICATES_DISPLAY);
    }

    /**
     * Returns the error filename
     *
     * @return string filename
     */
    public static function getErrorFileName()
    {
        return self::_createFileName(self::FILE_ERRORS);
    }

    /**
     * Returns the error records filename
     *
     * @return string filename
     */
    public static function getErrorRecordsFileName()
    {
        return self::_createFileName(self::FILE_ERROR_RECORDS);
    }

    /**
     * Returns the error records filename
     *
     * @return string filename
     */
    public static function getErrorRecordsWithoutErrorFileName()
    {
        return self::_createFileName(self::FILE_ERROR_RECORDS_ONLY);
    }

    /**
     * Returns the status filename
     *
     * @return string filename
     */
    public static function getStatusFileName()
    {
        return self::_createFileName(self::FILE_STATUS);
    }

    /**
     * Clears out all cache files in the import directory
     */
    public static function clearCacheFiles()
    {
        global $sugar_config;
        $importdir = self::getImportDir();
        if ( is_dir($importdir) ) {
            $files = dir($importdir);
            while (false !== ($file = $files->read())) {
                if ( !is_dir($file) && stristr($file,'.csv') )
                    unlink("$importdir/$file");
            }
        }
    }
}
