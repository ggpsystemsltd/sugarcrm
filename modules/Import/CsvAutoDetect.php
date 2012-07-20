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
 * Description: Class to detect csv file settings (delimiter, enclosure, etc)
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/

/* sample usage

    $auto = new CsvAutoDetect('/tmp/_books.csv', 10);

    $delimiter = $enclosure = $heading = false;

    $ret = $auto->getCsvSettings($delimiter, $enclosure);
    if ($ret) {
        echo "found delimiter = ".$delimiter."<br>";
        echo "found enclosure = ".$enclosure."<br>";
    } else {
        echo "couldn't find settings<br>";
    }

    $ret = $auto->hasHeader($heading);
    if ($ret) {
        $header = $heading?'true':'false';
        echo "found heading = ".$header."<br>";
    } else {
        echo "couldn't determine header info<br>";
    }

    $date_format = $auto->getDateFormat();
    if ($date_format) {
        echo "found date format=".$date_format."<br>";
    } else {
        echo "couldn't find date format<br>";
    }

    $time_format = $auto->getTimeFormat();
    if ($time_format) {
        echo "found time format=".$time_format."<br>";
    } else {
        echo "couldn't find time format<br>";
    }

*/

require_once('include/parsecsv.lib.php');

class CsvAutoDetect {

    protected $_parser = null;

    protected $_csv_file = null;

    protected $_max_depth = 15;

    protected $_parsed = false;

    static protected $_date_formats = array(
        'm/d/Y' => "/^(0?[1-9]|1[012])\/(0?[1-9]|[12][0-9]|3[01])\/\d\d\d\d/", // 12/23/2010 or 3/23/2010
        'd/m/Y' => "/^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[012])\/\d\d\d\d/", // 23/12/2010 or 23/3/2010
        'Y/m/d' => "/^\d\d\d\d\/(0?[1-9]|1[012])\/(0?[1-9]|[12][0-9]|3[01])/", // 2010/12/23 or 2010/3/23
        'm-d-Y' => "/^(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])-\d\d\d\d/", // 12-23-2010 or 3-23-2010
        'd-m-Y' => "/^(0?[1-9]|[12][0-9]|3[01])-(0?[1-9]|1[012])-\d\d\d\d/", // 23-12-2010 or 23-3-2010
        'Y-m-d' => "/^\d\d\d\d-(0?[1-9]|1[012])-(0?[1-9]|[12][0-9]|3[01])/", // 2010-12-23 or 2010-3-23
        'm.d.Y' => "/^(0?[1-9]|1[012])\.(0?[1-9]|[12][0-9]|3[01])\.\d\d\d\d/", // 12.23.2010 or 3.23.2010
        'd.m.Y' => "/^(0?[1-9]|[12][0-9]|3[01])\.(0?[1-9]|1[012])\.\d\d\d\d/", // 23.12.2010 or 23.3.2010
        'Y.m.d' => "/^\d\d\d\d\.(0?[1-9]|1[012])\.(0?[1-9]|[12][0-9]|3[01])/", // 2010.12.23 or 2010.3.23
    );

    static protected $_time_formats =  array(
        'h:ia' => "/(^| )(0?[0-9]|1[0-2]):(0?[0-9]|[1-5][0-9])(:0?[0-9]|[1-5][0-9])?[am|pm]/", // 11:00pm or 11:00:00pm or 9:3pm
        'h:iA' => "/(^| )(0?[0-9]|1[0-2]):(0?[0-9]|[1-5][0-9])(:0?[0-9]|[1-5][0-9])?[AM|PM]/", // 11:00PM or 11:00:00PM or 9:3PM
        'h:i a' => "/(^| )(0?[0-9]|1[0-2]):(0?[0-9]|[1-5][0-9])(:0?[0-9]|[1-5][0-9])? [am|pm]/", // 11:00 pm or 11:00:00 pm or 9:3 pm
        'h:i A' => "/(^| )(0?[0-9]|1[0-2]):(0?[0-9]|[1-5][0-9])(:0?[0-9]|[1-5][0-9])? [AM|PM]/", // 11:00 PM or 11:00:00 PM or 9:3 PM
        'H:i' => "/(^| )(0?[0-9]|1[0-9]|2[0-4]):(0?[0-9]|[1-5][0-9])(:0?[0-9]|[1-5][0-9])?/", // 23:00 or 23:00:00 or 9:3
        'h.ia' => "/(^| )(0?[0-9]|1[0-2])\.(0?[0-9]|[1-5][0-9])(\.0?[0-9]|[1-5][0-9])?[am|pm]/", // 11.00pm or 11.00.00pm or 9.3pm
        'h.iA' => "/(^| )(0?[0-9]|1[0-2])\.(0?[0-9]|[1-5][0-9])(\.0?[0-9]|[1-5][0-9])?[AM|PM]/", // 11.00PM or 11.00.00PM or 9.3PM
        'h.i a' => "/(^| )(0?[0-9]|1[0-2])\.(0?[0-9]|[1-5][0-9])(\.0?[0-9]|[1-5][0-9])? [am|pm]/", // 11.00 pm or 11.00.00 pm or 9.3 pm
        'h.i A' => "/(^| )(0?[0-9]|1[0-2])\.(0?[0-9]|[1-5][0-9])(\.0?[0-9]|[1-5][0-9])? [AM|PM]/", // 11.00 PM or 11.00.00 PM or 9.3 PM
        'H.i' => "/(^| )(0?[0-9]|1[0-9]|2[0-4])\.(0?[0-9]|[1-5][0-9])(\.0?[0-9]|[1-5][0-9])?/", // 23.00 or 23.00.00 or 9.3
    );


    /**
     * Constructor
     *
     * @param string $csv_filename
     * @param int $max_depth
     */
    public function __construct($csv_filename, $max_depth = 2) {
        $this->_csv_file = $csv_filename;

        $this->_parser = new parseCSV();

        $this->_parser->auto_depth = $max_depth;

        $this->_max_depth = $max_depth;
    }



    /**
     * To get the possible csv settings (delimiter, enclosure).
     * This function causes CSV to be parsed.
     * So call this function before calling others.
     *
     * @param string $delimiter
     * @param string $enclosure
     * @return bool true if settings are found, false otherwise
     */
    public function getCsvSettings(&$delimiter, &$enclosure) {
        // try parsing the file to find possible delimiter and enclosure
        $this->_parser->heading = false;

        $found_setting = false;

        $singleQuoteParsedOK = $doubleQuoteParsedOK = false;
        $beginEndWithSingle = $beginEndWithDouble = false;

        // check double quotes first
        $depth = 1;
        $enclosure = "\"";
        $delimiter1 = $this->_parser->auto($this->_csv_file, true, null, null, $enclosure);
        if (strlen($delimiter1) == 1) { // this means parsing ok
            $doubleQuoteParsedOK = true;
            // sometimes it parses ok with either single quote or double quote as enclosure
            // so we need to make sure the data do not begin and end with the other enclosure
            foreach ($this->_parser->data as &$row) {
                foreach ($row as &$data) {
                    $len = strlen($data);
                    // check if it begins and ends with single quotes
                    // if it does, then it double quotes may not be the enclosure
                    if ($len>=2 && $data[0] == "'" && $data[$len-1] == "'") {
                        $beginEndWithSingle = true;
                        break;
                    }
                }
                if ($beginEndWithSingle) {
                    break;
                }
                $depth++;
                if ($depth > $this->_max_depth) {
                    break;
                }
            }
            if (!$beginEndWithSingle) {
                $delimiter = $delimiter1;
                $found_setting = true;
            }
        }

        // check single quotes
        if (!$found_setting) {
            $depth = 1;
            $enclosure = "'";
            $delimiter2 = $this->_parser->auto($this->_csv_file, true, null, null, $enclosure);
            if (strlen($delimiter2) == 1) { // this means parsing ok
                $singleQuoteParsedOK = true;
                foreach ($this->_parser->data as &$row) {
                    foreach ($row as &$data) {
                        $len = strlen($data);
                        // check if it begins and ends with double quotes
                        // if it does, then it single quotes may not be the enclosure
                        if ($len>=2 && $data[0] == "\"" && $data[$len-1] == "\"") {
                            $beginEndWithDouble = true;
                            break;
                        }
                    }
                    if ($beginEndWithDouble) {
                        break;
                    }
                    $depth++;
                    if ($depth > $this->_max_depth) {
                        break;
                    }
                }
                if (!$beginEndWithDouble) {
                    $delimiter = $delimiter2;
                    $found_setting = true;
                }
            }
        }

        if (!$found_setting) {
            // we don't seem to have a perfect enclosure candidate
            // let's pick one of the possible candidates
            if ($doubleQuoteParsedOK) {
                // if double quotes parsed ok, let's take that
                $delimiter = $delimiter1;
                $enclosure = "\"";
                $found_setting = true;
            } else if ($singleQuoteParsedOK) {
                // otherwise, if single quote parsed ok, let's use it
                $delimiter = $delimiter2;
                $enclosure = "'";
                $found_setting = true;
            }
        }

        if (!$found_setting) {
            return false;
        }

        $this->_parsed = true;

        return true;
    }

    /**
     * To check CSV heading
     *
     * @param bool $heading true of it has header, false if not
     * @return bool true if header is found, false if error
     */
    public function hasHeader(&$heading, $module) {

        if (!$this->_parsed) {
            return false;
        }

        $total_count = count($this->_parser->data[0]);
        if ($total_count == 0) {
            return false;
        }

        if (!isset($GLOBALS['beanList'][$module])) {
            return false;
        }

        $bean = new $GLOBALS['beanList'][$module]();

        $match_count = 0;

        $mod_strings = return_module_language($GLOBALS['current_language'], $module);

        // process only the first row
        foreach ($this->_parser->data[0] as $val) {

            // bug51433 - everything relies on $val having a value so if it's empty,
            // we can skip this iteration and not get warnings
            if( !empty( $val ) )
            {
                foreach ($bean->field_defs as $field_name=>$defs) {

                    // check if the CSV item matches field name
                    if (!strcasecmp($val, $field_name)) {
                        $match_count++;
                        break;
                    }
                    // check if the CSV item is part of the label or vice versa
                    else if (isset($defs['vname']) && isset($mod_strings[$defs['vname']])) {
                        if (stripos(trim($mod_strings[$defs['vname']],':'), $val) !== false || stripos($val, trim($mod_strings[$defs['vname']],':')) !== false) {
                            $match_count++;
                            break;
                        }
                    }
                    else if (isset($defs['vname']) && isset($GLOBALS['app_strings'][$defs['vname']])) {
                        if (stripos(trim($GLOBALS['app_strings'][$defs['vname']],':'), $val) !== false || stripos($val, trim($GLOBALS['app_strings'][$defs['vname']],':')) !== false) {
                            $match_count++;
                            break;
                        }
                    }
                }
            }
        }

        // if more than 50% matched, consider it a header
        if ($match_count/$total_count >= 0.5) {
            $heading = true;
        } else {
            $heading = false;
        }

        return true;
    }


    /**
     * To get the possible format (for date or time)
     *
     * @param array $formats
     * @return mixed possible format if found, false otherwise
     */
    protected function getFormat(&$formats) {

        if (!$this->_parsed) {
            return false;
        }

        $depth = 1;

        foreach ($this->_parser->data as $row) {

            foreach ($row as $val) {

                foreach ($formats as $format=>$regex) {

                    $ret = preg_match($regex, $val);
                    if ($ret) {
                        return $format;
                    }
                }
            }

            // give up if reaching max depth
            $depth++;
            if ($depth > $this->_max_depth) {
                break;
            }
        }

        return false;
    }


    /**
     * To get the possible date format used in the csv file
     *
     * @return mixed possible date format if found, false otherwise
     */
    public function getDateFormat() {

        $format = $this->getFormat(self::$_date_formats);

        return $format;
    }


    /**
     * To get the possible time format used in the csv file
     *
     * @return mixed possible time format if found, false otherwise
     */
    public function getTimeFormat() {

        $format = $this->getFormat(self::$_time_formats);

        return $format;
    }

}
?>
