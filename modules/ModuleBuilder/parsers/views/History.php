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


require_once 'modules/ModuleBuilder/parsers/constants.php' ;
require_once 'modules/ModuleBuilder/parsers/views/HistoryInterface.php' ;

class History implements HistoryInterface
{

    private $_dirname ; // base directory for the history files
    private $_basename ; // base name for a history file, for example, listviewdef.php
    private $_list ; // the history - a list of history files

    private $_previewFilename ; // the location of a file for preview

    /*
     * Constructor
     * @param string $previewFilename The filename which the caller expects for a preview file
     */
    public function __construct ( $previewFilename )
    {
        $GLOBALS [ 'log' ]->debug ( get_class ( $this ) . "->__construct( {$previewFilename} )" ) ;
        $this->_previewFilename = $previewFilename ;
        $this->_list = array ( ) ;

        $this->_basename = basename ( $this->_previewFilename ) ;
        $this->_dirname = dirname ( $this->_previewFilename );
 	    $this->_historyLimit = isset ( $GLOBALS [ 'sugar_config' ] [ 'studio_max_history' ] ) ? $GLOBALS [ 'sugar_config' ] [ 'studio_max_history' ] : 50 ;

        // create the history directory if it does not already exist
        if (!is_dir($this->_dirname)) {
           mkdir_recursive($this->_dirname);
         }
        else
        {
            // Reconstruct the history from the saved files
            $filenameList = glob($this->getFileByTimestamp('*'));
            if (!empty($filenameList))
            {
                foreach ($filenameList as $filename)
                {
                    if(preg_match('/(\d+)$/', $filename, $match))
                    {
                        $this->_list [] = $match[1];
                    }
                }
            }
        }
        // now sort the files, oldest first
        if (count ( $this->_list ) > 0)
        {
            sort ( $this->_list ) ;
        }
    }


 /*
     * Get the most recent item in the history
     * @return timestamp of the first item
     */
    public function getCount ()
    {
        return count ( $this->_list ) ;
    }

    /*
     * Get the most recent item in the history
     * @return timestamp of the first item
     */
    public function getFirst ()
    {
        return end ( $this->_list ) ;
    }

/*
     * Get the oldest item in the history (the default layout)
     * @return timestamp of the last item
     */
    public function getLast ()
    {
        return reset ( $this->_list ) ;
    }

    /*
     * Get the next oldest item in the history
     * @return timestamp of the next item
     */
    public function getNext ()
    {
        return prev ( $this->_list ) ;
    }

    /*
     * Get the nth item in the history (where the zeroeth record is the most recent)
     * @return timestamp of the nth item
     */
     public function getNth ( $index )
    {
        $value = end ( $this->_list ) ;
        $i = 0 ;
        while ( $i < $index )
        {
            $value = prev ( $this->_list ) ;
            $i ++ ;
        }
        return $value ;
    }

    /*
     * Add an item to the history
     * @return String   A GMT Unix timestamp for this newly added item
     */
    public function append ($path)
    {
        // make sure we don't have a duplicate filename - highly unusual as two people should not be using Studio/MB concurrently, but when testing quite possible to do two appends within one second...
        // because so unlikely in normal use we handle this the naive way by waiting a second so our naming scheme doesn't get overelaborated
        $retries = 0 ;

        $now = TimeDate::getInstance()->getNow();
        $new_file = null;
        for($retries = 0; !file_exists($new_file) && $retries < 5; $retries ++)
        {
            $now->modify("+1 second");
            $time = $now->__get('ts');
            $new_file = $this->getFileByTimestamp( $time );
        }
        // now we have a unique filename, copy the file into the history
        copy ( $path, $new_file ) ;
 	    $this->_list [ ] = $time ;

        // finally, trim the number of files we're holding in the history to that specified in the configuration
       // truncate the oldest files, keeping only the most recent $GLOBALS['sugar_config']['studio_max_history'] files (zero=keep them all)
        $to_delete = $this->getCount() - $this->_historyLimit;
        if ($this->_historyLimit != 0 && $to_delete)
        {
            // most recent files are at the end of the list, so we strip out the first count-max_history records
            // can't just use array_shift because it renumbers numeric keys (our timestamp keys) to start from zero...
            for ( $i = 0 ; $i < $to_delete ; $i ++ )
            {
               $timestamp = array_shift( $this->_list ) ;
               if (! unlink ( $this->getFileByTimestamp( $timestamp ) ))
                {
                    $GLOBALS [ 'log' ]->warn ( "History.php: unable to remove history file {$timestamp} from directory {$this->_dirname} - permissions problem?" ) ;                }
            }
        }

        // finally, remove any history preview file that might be lurking around - as soon as we append a new record it supercedes any old preview, so that must be removed (bug 20130)
        if (file_exists($this->_previewFilename))
        {
            $GLOBALS [ 'log' ]->debug( get_class($this)."->append(): removing old history file at {$this->_previewFilename}");
            unlink ( $this->_previewFilename);
        }

        return $time ;
    }

    /*
     * Restore the historical layout identified by timestamp
     * @param Unix timestamp $timestamp GMT Timestamp of the layout to recover
     * @return GMT Timestamp if successful, null if failure (if the file could not be copied for some reason)
     */
   public function restoreByTimestamp ($timestamp)
    {
         $filename = $this->getFileByTimestamp( $timestamp );
        $GLOBALS [ 'log' ]->debug ( get_class ( $this ) . ": restoring from $filename to {$this->_previewFilename}" ) ;

        if (file_exists ( $filename ))
        {
            copy ( $filename, $this->_previewFilename ) ;
            return $timestamp ;
        }
        return null ;
    }

    /*
     * Undo the restore - revert back to the layout before the restore
     */
    public function undoRestore ()
    {
        if (file_exists ( $this->_previewFilename ))
        {
            unlink ( $this->_previewFilename ) ;
        }
    }

    /**
     * Returns full path to history file by timestamp. This function returns file path even if file doesn't exist
     * @param  $timestamp
     * @return string
     */
    public function getFileByTimestamp($timestamp)
    {
        return $this->_dirname . DIRECTORY_SEPARATOR . $this->_basename . '_' . $timestamp ;
    }


}
