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


require_once('include/export_utils.php');

function template_handle_export(&$reporter)
{
    ini_set('zlib.output_compression', 'Off');
$reporter->plain_text_output = true;
//disable paging so we get all results in one pass
$reporter->enable_paging = false;
$reporter->run_query();
$reporter->_load_currency();
$header_arr = array();
$header_row = $reporter->get_header_row();
$content = '';
        foreach ($header_row as $cell)
        {
                array_push($header_arr, $cell);
        }
        $header = implode("\"".getDelimiter() ."\"",array_values($header_arr));
        $header = "\"" .$header;
        $header .= "\"\r\n";
        $content .= $header;

        while (( $row = $reporter->get_next_row('result', 'display_columns', false, true) ) != 0 )
        {
                $new_arr = array();

                for($i=0;$i < count($row['cells']);$i++)
                {
                        array_push($new_arr, preg_replace("/\"/","\"\"", from_html($row['cells'][$i])));
                }

                $line = implode("\"".getDelimiter() ."\"",$new_arr);
                $line = "\"" .$line;
                $line .= "\"\r\n";

                $content .= $line;
        }
global $locale;

ob_clean();
header("Pragma: cache");
header("Content-type: application/octet-stream; charset=".$locale->getExportCharset());
header("Content-Disposition: attachment; filename={$_REQUEST['module']}.csv");
header("Content-transfer-encoding: binary");
header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header( "Last-Modified: " . TimeDate::httpTime() );
header( "Cache-Control: post-check=0, pre-check=0", false );
header("Content-Length: ".mb_strlen($GLOBALS['locale']->translateCharset($content, 'UTF-8', $GLOBALS['locale']->getExportCharset())));

print $GLOBALS['locale']->translateCharset($content, 'UTF-8', $locale->getExportCharset());

}

?>