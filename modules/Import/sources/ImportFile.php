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

 * Description: Class to handle processing an import file
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/

require_once('modules/Import/CsvAutoDetect.php');
require_once('modules/Import/sources/ImportDataSource.php');

class ImportFile extends ImportDataSource
{
    /**
     * Stores whether or not we are deleting the import file in the destructor
     */
    private $_deleteFile;

    /**
     * File pointer returned from fopen() call
     */
    private $_fp = FALSE;

    /**
     * True if the csv file has a header row.
     */
    private $_hasHeader = FALSE;

    /**
     * True if the csv file has a header row.
     */
    private $_detector = null;

    /**
     * CSV date format
     */
    private $_date_format = false;

    /**
     * CSV time format
     */
    private $_time_format = false;

    /**
     * The import file map that this import file inherits properties from.
     */
    private $_importFile = null;

    /**
     * Delimiter string we are using (i.e. , or ;)
     */
    private $_delimiter;

    /**
     * Enclosure string we are using (i.e. ' or ")
     */
    private $_enclosure;


    /**
     * Constructor
     *
     * @param string $filename
     * @param string $delimiter
     * @param string $enclosure
     * @param bool   $deleteFile
     */
    public function __construct( $filename, $delimiter  = ',', $enclosure  = '',$deleteFile = true, $checkUploadPath = TRUE )
    {
        if ( !is_file($filename) || !is_readable($filename) ) {
            return false;
        }

        if ( $checkUploadPath && UploadStream::path($filename) == null )
        {
            $GLOBALS['log']->fatal("ImportFile detected attempt to access to the following file not within the sugar upload dir: $filename");
            return null;
        }

        // turn on auto-detection of line endings to fix bug #10770
        ini_set('auto_detect_line_endings', '1');

        $this->_fp         = sugar_fopen($filename,'r');
        $this->_sourcename   = $filename;
        $this->_deleteFile = $deleteFile;
        $this->_delimiter  = ( empty($delimiter) ? ',' : $delimiter );
        if ($this->_delimiter == '\t') {
            $this->_delimiter = "\t";
        }
        $this->_enclosure  = ( empty($enclosure) ? '' : trim($enclosure) );
        $this->setFpAfterBOM();
    }

    /**
     * Remove the BOM (Byte Order Mark) from the beginning of the import row if it exists
     * @return void
     */
    private function setFpAfterBOM()
    {
        if($this->_fp === FALSE)
            return;

        rewind($this->_fp);
        $bomCheck = fread($this->_fp, 3);
        if($bomCheck != pack("CCC",0xef,0xbb,0xbf)) {
            rewind($this->_fp);
        }
    }
    /**
     * Destructor
     *
     * Deletes $_importFile if $_deleteFile is true
     */
    public function __destruct()
    {
        if ( $this->_deleteFile && $this->fileExists() ) {
            fclose($this->_fp);
            //Make sure the file exists before unlinking
            if(file_exists($this->_sourcename)) {
               unlink($this->_sourcename);
            }
        }

        ini_restore('auto_detect_line_endings');
    }

    /**
	 * This is needed to prevent unserialize vulnerability
     */
    public function __wakeup()
    {
        // clean all properties
        foreach(get_object_vars($this) as $k => $v) {
            $this->$k = null;
        }
        throw new Exception("Not a serializable object");
    }

    /**
     * Returns true if the filename given exists and is readable
     *
     * @return bool
     */
    public function fileExists()
    {
    	return !$this->_fp ? false : true;
    }

    /**
     * Gets the next row from $_importFile
     *
     * @return array current row of file
     */
    public function getNextRow()
    {
        $this->_currentRow = FALSE;

        if (!$this->fileExists())
            return false;

        // explode on delimiter instead if enclosure is an empty string
        if ( empty($this->_enclosure) ) {
            $row = explode($this->_delimiter,rtrim(fgets($this->_fp, 8192),"\r\n"));
            if ($row !== false && !( count($row) == 1 && trim($row[0]) == '') )
                $this->_currentRow = $row;
            else
                return false;
        }
        else {
            $row = fgetcsv($this->_fp, 8192, $this->_delimiter, $this->_enclosure);
            if ($row !== false && $row != array(null))
                $this->_currentRow = $row;
            else
                return false;
        }

        // Bug 26219 - Convert all line endings to the same style as PHP_EOL
        foreach ( $this->_currentRow as $key => $value ) {
            // use preg_replace instead of str_replace as str_replace may cause extra lines on Windows
            $this->_currentRow[$key] = preg_replace("[\r\n|\n|\r]", PHP_EOL, $value);
        }

        $this->_rowsCount++;

        return $this->_currentRow;
    }

    /**
     * Returns the number of fields in the current row
     *
     * @return int count of fiels in the current row
     */
    public function getFieldCount()
    {
        return count($this->_currentRow);
    }

    /**
     * Determine the number of lines in this file.
     *
     * @return int
     */
    public function getNumberOfLinesInfile()
    {
        $lineCount = 0;

        if ($this->_fp )
        {
            rewind($this->_fp);
            while( !feof($this->_fp) )
            {
                if( fgets($this->_fp) !== FALSE)
                    $lineCount++;
            }
            //Reset the fp to after the bom if applicable.
            $this->setFpAfterBOM();
        }

        return $lineCount;
    }

    //TODO: Add auto detection for field delim and qualifier properteis.
    public function autoDetectCSVProperties()
    {
        // defaults
        $this->_delimiter  = ",";
        $this->_enclosure  = '"';

        $this->_detector = new CsvAutoDetect($this->_sourcename);

        $delimiter = $enclosure = false;

        $ret = $this->_detector->getCsvSettings($delimiter, $enclosure);
        if ($ret)
        {
            $this->_delimiter = $delimiter;
            $this->_enclosure = $enclosure;
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function getFieldDelimeter()
    {
        return $this->_delimiter;
    }

    public function getFieldEnclosure()
    {
        return $this->_enclosure;
    }

    public function autoDetectCharacterSet()
    {
        global $locale;

        $this->setFpAfterBOM();

        //Retrieve a sample set of data
        $rows = array();

        $user_charset = $locale->getExportCharset();
        $system_charset = $locale->default_export_charset;
        $other_charsets = 'UTF-8, UTF-7, ASCII, CP1252, EUC-JP, SJIS, eucJP-win, SJIS-win, JIS, ISO-2022-JP';
        $detectable_charsets = "UTF-8, {$user_charset}, {$system_charset}, {$other_charsets}";
        // Bug 26824 - mb_detect_encoding() thinks CP1252 is IS0-8859-1, so use that instead in the encoding list passed to the function
        $detectable_charsets = str_replace('CP1252','ISO-8859-1',$detectable_charsets);
        $charset_for_import = $user_charset; //We will set the default import charset option by user's preference.
        $able_to_detect = function_exists('mb_detect_encoding');
        for ( $i = 0; $i < 3; $i++ )
        {
            $rows[$i] = $this->getNextRow();
            if(!empty($rows[$i]) && $able_to_detect)
            {
                foreach($rows[$i] as & $temp_value)
                {
                    $current_charset = mb_detect_encoding($temp_value, $detectable_charsets);
                    if(!empty($current_charset) && $current_charset != "UTF-8")
                    {
                        $temp_value = $locale->translateCharset($temp_value, $current_charset);// we will use utf-8 for displaying the data on the page.
                        $charset_for_import = $current_charset;
                        //set the default import charset option according to the current_charset.
                        //If it is not utf-8, tt may be overwritten by the later one. So the uploaded file should not contain two types of charset($user_charset, $system_charset), and I think this situation will not occur.
                    }
                }
            }
        }

        //Reset the fp to after the bom if applicable.
        $this->setFpAfterBOM();

        return $charset_for_import;

    }

    public function getDateFormat()
    {
        if ($this->_detector) {
            $this->_date_format = $this->_detector->getDateFormat();
        }

        return $this->_date_format;
    }

    public function getTimeFormat()
    {
        if ($this->_detector) {
            $this->_time_format = $this->_detector->getTimeFormat();
        }

        return $this->_time_format;
    }

    public function setHeaderRow($hasHeader)
    {
        $this->_hasHeader = $hasHeader;
    }

    public function hasHeaderRow($autoDetect = TRUE)
    {
        if($autoDetect)
        {
            if (!isset($_REQUEST['import_module']))
                return FALSE;

            $module = $_REQUEST['import_module'];

            $ret = FALSE;
            $heading = FALSE;

            if ($this->_detector)
                $ret = $this->_detector->hasHeader($heading, $module);

            if ($ret)
                $this->_hasHeader = $heading;
        }
        return $this->_hasHeader;
    }

    public function setImportFileMap($map)
    {
        $this->_importFile = $map;
        $importMapProperties = array('_delimiter' => 'delimiter','_enclosure' => 'enclosure', '_hasHeader' => 'has_header');
        //Inject properties from the import map
        foreach($importMapProperties as $k => $v)
        {
            $this->$k = $map->$v;
        }
    }

    //Begin Implementation for SPL's Iterator interface
    public function key()
    {
        return $this->_rowsCount;
    }

    public function current()
    {
        return $this->_currentRow;
    }

    public function next()
    {
        $this->getNextRow();
    }

    public function valid()
    {
        return $this->_currentRow !== FALSE;
    }

    public function rewind()
    {
        $this->setFpAfterBOM();
        //Load our first row
        $this->getNextRow();
    }

    public function getTotalRecordCount()
    {
        $totalCount = $this->getNumberOfLinesInfile();
        if($this->hasHeaderRow(FALSE) && $totalCount > 0)
        {
            $totalCount--;
        }
        return $totalCount;
    }

    public function loadDataSet($totalItems = 0)
    {
        $currentLine = 0;
        $this->_dataSet = array();
        $this->rewind();
        //If there's a header don't include it.
        if( $this->hasHeaderRow(FALSE) )
            $this->next();

        while( $this->valid() &&  $totalItems > count($this->_dataSet) )
        {
            if($currentLine >= $this->_offset)
            {
                $this->_dataSet[] = $this->_currentRow;
            }
            $this->next();
            $currentLine++;
        }

        return $this;
    }

    public function getHeaderColumns()
    {
        $this->rewind();
        if($this->hasHeaderRow(FALSE))
            return $this->_currentRow;
        else
            return FALSE;
    }

}
