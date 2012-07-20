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


abstract class AbstractMetaDataParser
{

	//Make these properties public for now until we can create some usefull accessors
	public $_fielddefs ;
	public $_viewdefs ;
	protected $_moduleName ;
    protected $implementation ; // the DeployedMetaDataImplementation or UndeployedMetaDataImplementation object to handle the reading and writing of files and field data

    function getLayoutAsArray ()
    {
        $viewdefs = $this->_panels ;
    }

    function getLanguage ()
    {
        return $this->implementation->getLanguage () ;
    }

    function getHistory ()
    {
        return $this->implementation->getHistory () ;
    }

    public function getFieldDefs()
    {
        return $this->_fielddefs;
    }
    
    function removeField ($fieldName)
    {
    	return false;
    }

    /*
     * Is this field something we wish to show in Studio/ModuleBuilder layout editors?
     * @param array $def    Field definition in the standard SugarBean field definition format - name, vname, type and so on
     * @return boolean      True if ok to show, false otherwise
     */
    static function validField ( $def, $view = "")
    {
        //Studio invisible fields should always be hidden
        if (isset ($def[ 'studio' ] ) )
        {
            if (is_array($def [ 'studio' ]))
            {
                if (!empty($view) && isset($def [ 'studio' ][$view]))
                   return $def [ 'studio' ][$view] !== false && $def [ 'studio' ][$view] !== 'false' && $def [ 'studio' ][$view] !== 'hidden';
                if (isset($def [ 'studio' ]['visible']))
                   return $def [ 'studio' ]['visible'];
            } else {
                return ($def [ 'studio' ] != 'false' && $def [ 'studio' ] != 'hidden' && $def [ 'studio' ] !== false) ;
			}
        }

        // bug 19656: this test changed after 5.0.0b - we now remove all ID type fields - whether set as type, or dbtype, from the fielddefs
        return 
		( 
		  ( 
		    (empty ( $def [ 'source' ] ) || $def [ 'source' ] == 'db' || $def [ 'source' ] == 'custom_fields') 
			&& isset($def [ 'type' ]) && $def [ 'type' ] != 'id' && $def [ 'type' ] != 'parent_type'
			&& (empty ( $def [ 'dbType' ] ) || $def [ 'dbType' ] != 'id') 
			&& ( isset ( $def [ 'name' ] ) && strcmp ( $def [ 'name' ] , 'deleted' ) != 0 ) 
		  ) // db and custom fields that aren't ID fields
          ||
		  // exclude fields named *_name regardless of their type...just convention
          (isset ( $def [ 'name' ] ) && substr ( $def [ 'name' ], -5 ) === '_name' ) ) ;
    }

	protected function _standardizeFieldLabels ( &$fielddefs )
	{
		foreach ( $fielddefs as $key => $def )
		{
			if ( !isset ($def [ 'label' ] ) )
			{
				$fielddefs [ $key ] [ 'label'] = ( isset ( $def [ 'vname' ] ) ) ? $def [ 'vname' ] : $key ;
			}
		}
	}

	abstract static function _trimFieldDefs ( $def ) ;
	
	public function getRequiredFields(){
	    $fieldDefs = $this->implementation->getFielddefs();
	    $newAry = array();
	    foreach($fieldDefs as $field){
	        if(isset($field['required']) && $field['required'] && isset($field['name']) && empty( $field['readonly'])) {
	            array_push($newAry , '"'.$field['name'].'"');
            }
        }
        return $newAry;
	}

    /**
     * Used to determine if a field property is true or false given that it could be
     * the boolean value or a string value such use 'false' or '0'
     * @static
     * @param $val
     * @return bool
     */
    protected static function isTrue($val)
    {
        if (is_string($val))
        {
            $str = strtolower($val);
            return ($str != '0' && $str != 'false' && $str != "");
        }
        //For non-string types, juse use PHP's normal boolean conversion
        else{
            return ($val == true);
        }

        return true;
    }

}
?>