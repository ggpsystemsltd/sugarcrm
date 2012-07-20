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



class ModuleBuilderParser
{
	
	var $_defMap; // private - mapping from view to variable name inside the viewdef file
	var $_variables = array(); // private - set of additional variables (other than the viewdefs) found in the viewdef file that need to be added to the file again when it is saved - used by ModuleBuilder
	
	function ModuleBuilderParser()
	{
		$this->_defMap = array('listview'=>'listViewDefs','searchview'=>'searchdefs','editview'=>'viewdefs','detailview'=>'viewdefs','quickcreate'=>'viewdefs');
	}
	/*
	 * Initialize this parser
	 */
	function init ()
	{
	}
	
	/*
	 * Dummy function used to ease the transition to the new parser structure
	 */
	function populateFromPost()
	{
	}
	
	function _loadFromFile($view,$file,$moduleName)
	{
		
		$variables = array();
	    if (! file_exists($file))
        {
            $this->_fatalError("ModuleBuilderParser: required viewdef file {$file} does not exist");
        }
        $GLOBALS['log']->info('ModuleBuilderParser->_loadFromFile(): file='.$file);        
        require ($file); // loads in a $viewdefs

        // Check to see if we have the module name set as a variable rather than embedded in the $viewdef array
        // If we do, then we have to preserve the module variable when we write the file back out
        // This is a format used by ModuleBuilder templated modules to speed the renaming of modules
        // Traditional Sugar modules don't use this format
        // We must do this in ParserModifyLayout (rather than just in ParserBuildLayout) because we might be editing the layout of a MB created module in Studio after it has been deployed
        $moduleVariables = array('module_name','_module_name', 'OBJECT_NAME', '_object_name');
        foreach ($moduleVariables as $name)
        {
            if (isset($$name)) {
            	$variables[$name] = $$name;
            }
        }
        $viewVariable = $this->_defMap[strtolower($view)];
        // Now tidy up the module name in the viewdef array
        // MB created definitions store the defs under packagename_modulename and later methods that expect to find them under modulename will fail
        $defs = $$viewVariable;

        if (isset($variables['module_name']))
        {
        	$mbName = $variables['module_name'];
        	if ($mbName != $moduleName)
        	{
	        	$GLOBALS['log']->debug('ModuleBuilderParser->_loadFromFile(): tidying module names from '.$mbName.' to '.$moduleName);
	        	$defs[$moduleName] = $defs[$mbName];
	        	unset($defs[$mbName]);
        	}
        }
//	    $GLOBALS['log']->debug('ModuleBuilderParser->_loadFromFile(): '.print_r($defs,true));
        return (array('viewdefs' => $defs, 'variables' => $variables));
	}
	
	function handleSave ($file,$view,$moduleName,$defs)
	{
	}
	
	
	/*
	 * Save the new layout
	 */
	function _writeToFile ($file,$view,$moduleName,$defs,$variables)
	{
	        if(file_exists($file))
	            unlink($file);
	        
	        mkdir_recursive ( dirname ( $file ) ) ;
	        $GLOBALS['log']->debug("ModuleBuilderParser->_writeFile(): file=".$file);
            $useVariables = (count($variables)>0);
            if( $fh = @sugar_fopen( $file, 'w' ) )
            {
                $out = "<?php\n";    
                if ($useVariables)
                {
                    // write out the $<variable>=<modulename> lines
                    foreach($variables as $key=>$value)
                    {
                    	$out .= "\$$key = '".$value."';\n";
                    }
                }
                
                // write out the defs array itself
                switch (strtolower($view))
                {
                	case 'editview':
                	case 'detailview':
                	case 'quickcreate':
                		$defs = array($view => $defs);
                		break;
                	default:
                		break;
                }
                $viewVariable = $this->_defMap[strtolower($view)];
                $out .= "\$$viewVariable = ";
                $out .= ($useVariables) ? "array (\n\$module_name =>\n".var_export_helper($defs) : var_export_helper( array($moduleName => $defs) );
                
                // tidy up the parenthesis
                if ($useVariables)
                {
                	$out .= "\n)"; 
                }
                $out .= ";\n?>\n";
                
//           $GLOBALS['log']->debug("parser.modifylayout.php->_writeFile(): out=".print_r($out,true));
            fputs( $fh, $out);
            fclose( $fh );
            }
            else
            {
                $GLOBALS['log']->fatal("ModuleBuilderParser->_writeFile() Could not write new viewdef file ".$file);
            }
	}


    function _fatalError ($msg)
    {
        $GLOBALS ['log']->fatal($msg);
        echo $msg;
        sugar_cleanup();
        die();
    }
    
}

?>
