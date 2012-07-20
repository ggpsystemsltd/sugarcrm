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


class ViewBackups extends SugarView
{
    /**
	 * @see SugarView::_getModuleTitleParams()
	 */
	protected function _getModuleTitleParams($browserTitle = false)
	{
	    global $mod_strings;
	    
    	return array(
    	   "<a href='index.php?module=Administration&action=index'>".$mod_strings['LBL_MODULE_NAME']."</a>",
    	   $mod_strings['LBL_BACKUPS_TITLE']
    	   );
    }
    
    /**
	 * @see SugarView::preDisplay()
	 */
	public function preDisplay()
	{
	    global $current_user;
        
	    if (!is_admin($current_user)) {
	        sugar_die("Unauthorized access to administration.");
        }
	}
    
    /**
	 * @see SugarView::display()
	 */
	public function display()
	{
        require_once('include/utils/zip_utils.php');

        $form_action = "index.php?module=Administration&action=Backups";
        
        $backup_dir = "";
        $backup_zip = "";
        $run        = "confirm";
        $input_disabled = "";
        global $mod_strings;
        $errors = array();
        
        // process "run" commands
        if( isset( $_REQUEST['run'] ) && ($_REQUEST['run'] != "") ){
            $run = $_REQUEST['run'];
        
            $backup_dir = $_REQUEST['backup_dir'];
            $backup_zip = $_REQUEST['backup_zip'];
        
            if( $run == "confirm" ){
                if( $backup_dir == "" ){
                    $errors[] = $mod_strings['LBL_BACKUP_DIRECTORY_ERROR'];
                }
                if( $backup_zip == "" ){
                    $errors[] = $mod_strings['LBL_BACKUP_FILENAME_ERROR'];
                }
        
                if( sizeof($errors) > 0 ){
                    return( $errors );
                }
        
                if( !is_dir( $backup_dir ) ){
                    if( !mkdir_recursive( $backup_dir ) ){
                        $errors[] = $mod_strings['LBL_BACKUP_DIRECTORY_EXISTS'];
                    }
                }
        
                if( !is_writable( $backup_dir ) ){
                    $errors[] = $mod_strings['LBL_BACKUP_DIRECTORY_NOT_WRITABLE'];
                }
        
                if( is_file( "$backup_dir/$backup_zip" ) ){
                    $errors[] = $mod_strings['LBL_BACKUP_FILE_EXISTS'];
                }
                if( is_dir( "$backup_dir/$backup_zip" ) ){
                    $errors[] = $mod_strings['LBL_BACKUP_FILE_AS_SUB'];
                }
                if( sizeof( $errors ) == 0 ){
                    $run = "confirmed";
                    $input_disabled = "readonly";
                }
            }
            else if( $run == "confirmed" ){
                ini_set( "memory_limit", "-1" );
                ini_set( "max_execution_time", "0" );
                zip_dir( ".", "$backup_dir/$backup_zip" );
                $run = "done";
            }
        }
        if( sizeof($errors) > 0 ){
            foreach( $errors as $error ){
                print( "<font color=\"red\">$error</font><br>" );
            }
        }
        if( $run == "done" ){
            $size = filesize( "$backup_dir/$backup_zip" );
            print( $mod_strings['LBL_BACKUP_FILE_STORED'] . " $backup_dir/$backup_zip ($size bytes).<br>\n" );
            print( "<a href=\"index.php?module=Administration&action=index\">" . $mod_strings['LBL_BACKUP_BACK_HOME']. "</a>\n" );
        }
        else{
        ?>
        
            <?php 
            echo getClassicModuleTitle(
                "Administration", 
                array(
                    "<a href='index.php?module=Administration&action=index'>".translate('LBL_MODULE_NAME','Administration')."</a>",
                   $mod_strings['LBL_BACKUPS_TITLE'],
                   ), 
                false
                );
            echo $mod_strings['LBL_BACKUP_INSTRUCTIONS_1']; ?>
            <br>
            <?php echo $mod_strings['LBL_BACKUP_INSTRUCTIONS_2']; ?><br>
            <form action="<?php print( $form_action );?>" method="post">
            <table>
            <tr>
                <td><?php echo $mod_strings['LBL_BACKUP_DIRECTORY']; ?><br><i><?php echo $mod_strings['LBL_BACKUP_DIRECTORY_WRITABLE']; ?></i></td>
                <td><input size="100" type="input" name="backup_dir" <?php print( $input_disabled );?> value="<?php print( $backup_dir );?>"/></td>
            </tr>
            <tr>
                <td><?php echo $mod_strings['LBL_BACKUP_FILENAME']; ?></td>
                <td><input type="input" name="backup_zip" <?php print( $input_disabled );?> value="<?php print( $backup_zip );?>"/></td>
            </tr>
            </table>
            <input type=hidden name="run" value="<?php print( $run );?>" />
        
        <?php
            switch( $run ){
                case "confirm":
        ?>
                    <input type="submit" value="<?php echo $mod_strings['LBL_BACKUP_CONFIRM']; ?>" />
        <?php
                    break;
                case "confirmed":
        ?>
                    <?php echo $mod_strings['LBL_BACKUP_CONFIRMED']; ?><br>
                    <input type="submit" value="<?php echo $mod_strings['LBL_BACKUP_RUN_BACKUP']; ?>" />
        <?php
                    break;
            }
        ?>
        
            </form>
        
        <?php
        }   // end if/else of $run options
        $GLOBALS['log']->info( "Backups" );
    }
}
