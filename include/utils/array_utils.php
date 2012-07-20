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



//to_string methods to get strings for values

 // var_export gets rid of the empty values that we use to display None
 // thishelper function fixes that
 // *This is no longer the case in php 5. var_export will now preserve empty keys.
function var_export_helper($tempArray) {
		return var_export($tempArray, true);
	}



/*
 * this function is used to overide a value in an array and returns the string code to write
 * @params : $array_name - a String containing the name of an array.
 * @params : $value_name - a String containing the name of a variable in the array.
 * @params : $value      - a String containing the associated value with $value_name.
 * 
 * @returns: String. Example - override_value_to_string($name, 'b', 1) = '$name['b'] = 1;'
 */

function override_value_to_string($array_name, $value_name, $value){
	$string = "\${$array_name}[". var_export($value_name, true). "] = ";
	$string .= var_export_helper($value,true);
	return $string . ";";
}

function add_blank_option($options){
 	if(is_array($options)) {
 		if(!isset($options['']) && !isset($options['0'])) {
		$options = array_merge(array(''=>''), $options);
 		}
 	} else {
 		$options = array(''=>'');
 	}
	return $options;
}

/*
 * Given an array and key names, return a string in the form of $array_name[$key_name[0]][$key_name[1]]... = $value recursively.
 * @params : $key_names - array of keys
 * 			 $array_name- name of the array
 * 			 $value -value of the array
 * 			 $eval - evals the generated string if true, note that the array name must be in the global space!
 * @return : example - string $array_name['a']['b']['c'][.] = 'hello'
 */
function override_value_to_string_recursive($key_names, $array_name, $value, $eval=false){
	if ($eval) return eval( "\${$array_name}". override_recursive_helper($key_names, $array_name, $value));
	else return "\${$array_name}". override_recursive_helper($key_names, $array_name, $value);
}

function override_recursive_helper($key_names, $array_name, $value){
	if( empty( $key_names ) )
		return "=".var_export_helper($value,true).";";
	else{
		$key = array_shift($key_names);
		return "[".var_export($key,true)."]". override_recursive_helper($key_names, $array_name,$value);
	}
}

function override_value_to_string_recursive2($array_name, $value_name, $value, $save_empty = true) {
	if (is_array($value)) {
		$str = '';
		$newArrayName = $array_name . "['$value_name']";
		foreach($value as $key=>$val) {
			$str.= override_value_to_string_recursive2($newArrayName, $key, $val, $save_empty);
		}
		return $str;
	} else {
		if(!$save_empty && empty($value)){
			return;
		}else{
			return "\$$array_name" . "['$value_name'] = " . var_export($value, true) . ";\n";
		}
	}
}

/**
 * This function will attempt to convert an object to an array.
 * Loops are not checked for so this function should be used with caution.
 * 
 * @param $obj
 * @return array representation of $obj
 */
function object_to_array_recursive($obj)
{
	if (!is_object($obj))
	   return $obj;

	$ret = get_object_vars($obj);
	foreach($ret as $key => $val)
	{
		if (is_object($val)) {
			$ret[$key] = object_to_array_recursive($val);
		}
		
	}
	return $ret;
}
/**
	 * This function returns an array of all the key=>value pairs in $array1 
	 * that are wither not present, or different in $array2.
	 * If a key exists in $array2 but not $array1, it will not be reported.
	 * Values which are arrays are traced further and reported only if thier is a difference
	 * in one or more of thier children.
	 * 
	 * @param array $array1, the array which contains all the key=>values you wish to check againts
	 * @param array $array2, the array which 
	 * @param array $allowEmpty, will return the value if it is empty in $array1 and not in $array2,
	 * otherwise empty values in $array1 are ignored.
	 * @return array containing the differences between the two arrays
	 */
	function deepArrayDiff($array1, $array2, $allowEmpty = false) {
		$diff = array();
		foreach($array1 as $key=>$value) {
			if (is_array($value)) {
				if ((!isset($array2[$key]) || !is_array($array2[$key])) && (isset($value) || $allowEmpty)) {
					$diff[$key] = $value;
				} else {
					$value = deepArrayDiff($array1[$key], $array2[$key], $allowEmpty);
					if (!empty($value) || $allowEmpty)
						$diff[$key] = $value;
				}
			} else if ((!isset($array2[$key]) || $value != $array2[$key]) && (isset($value) || $allowEmpty)){
				$diff[$key] = $value;
			}
		}
		return $diff;
	}
	
	/**
	 * Recursivly set a value in an array, creating sub arrays as necessary
	 *
	 * @param unknown_type $array
	 * @param unknown_type $key
	 */
	function setDeepArrayValue(&$array, $key, $value) {
		//if _ is at position zero, that is invalid.
		if (strrpos($key, "_")) {
		list ($key, $remkey) = explode('_', $key, 2);
			if (!isset($array[$key]) || !is_array($array[$key])) {
				$array[$key] = array();
			}
			setDeepArrayValue($array[$key], $remkey, $value);
		}
		else {
			$array[$key] = $value;
		}
	}


// This function iterates through the given arrays and combines the values of each key, to form one array
// Returns FALSE if number of elements in the arrays do not match; otherwise, returns merged array
// Example: array("a", "b", "c") and array("x", "y", "z") are passed in; array("ax", "by", "cz") is returned
function array_merge_values($arr1, $arr2) {
	if (count($arr1) != count($arr2)) {
		return FALSE;
	}

	for ($i = 0; $i < count($arr1); $i++) {
		$arr1[$i] .= $arr2[$i];
	}

	return $arr1;
}

/**
 * Search an array for a given value ignorning case sensitivity
 *
 * @param unknown_type $key
 * @param unknown_type $haystack
 */
function array_search_insensitive($key, $haystack)
{
    if(!is_array($haystack))
        return FALSE;

    $found = FALSE;
    foreach($haystack as $k => $v)
    {
        if(strtolower($v) == strtolower($key))
        {
            $found = TRUE;
            break;
        }
    }

    return $found;
}

/**
 * Wrapper around PHP's ArrayObject class that provides dot-notation recursive searching
 * for multi-dimensional arrays
 */
class SugarArray extends ArrayObject
{
    /**
     * Return the value matching $key if exists, otherwise $default value
     *
     * This method uses dot notation to look through multi-dimensional arrays
     *
     * @param string $key key to look up
     * @param mixed $default value to return if $key does not exist
     * @return mixed
     */
    public function get($key, $default = null) {
        return $this->_getFromSource($key, $default);
    }

    /**
     * Provided as a convinience method for fetching a value within an existing
     * array without instantiating a SugarArray
     *
     * NOTE: This should only used where refactoring an array into a SugarArray
     *       is unfeasible.  This operation is more expensive than a direct
     *       SugarArray as each time it creates and throws away a new instance
     *
     * @param array $haystack haystack
     * @param string $needle needle
     * @param mixed $default default value to return
     * @return mixed
     */
    static public function staticGet($haystack, $needle, $default = null) {
        if (empty($haystack)) {
            return $default;
        }
        $array = new self($haystack);
        return $array->get($needle, $default);
    }

    private function _getFromSource($key, $default) {
        if (strpos($key, '.') === false) {
            return isset($this[$key]) ? $this[$key] : $default;
        }

        $exploded = explode('.', $key);
        $current_key = array_shift($exploded);
        return $this->_getRecursive($this->_getFromSource($current_key, $default), $exploded, $default);
    }

    private function _getRecursive($raw_config, $children, $default) {
        if ($raw_config === $default) {
            return $default;
        } elseif (count($children) == 0) {
            return $raw_config;
        } else {
            $next_key = array_shift($children);
            return isset($raw_config[$next_key]) ?
                $this->_getRecursive($raw_config[$next_key], $children, $default) :
                $default;
        }
    }
}

?>
