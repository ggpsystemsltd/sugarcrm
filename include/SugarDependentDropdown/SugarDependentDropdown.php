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

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/

class SugarDependentDropdown {
	/*
	 * Holds processed metadata, ready for JSON
	 */
	var $metadata;
	
	/*
	 * Flag to suppress errors and/or log more heavily
	 */
	var $debugMode = false;
	
	/*
	 * Default metadata array that will be merged with any passed fields to
	 * ensure uniformity
	 */
	var $defaults = array(
		'name'		=> '',
		'id'		=> '',
		'type'		=> 'none',	// form element, valid "select", "input", "checkbox", "none"
		'label_pos'	=> 'left',		// valid: 'left', 'right', 'top', 'bottom', 'none' (none)
		'hidden'	=> array(),		// metadata to create hidden fields with values you choose
	);
	
	/*
	 * Fields that must exist in an element (single dropdown/field) metadata
	 * array.
	 */
	var $elementRequired = array(
		'name',
		'id',
		//'values',
		//'onchange',
		//'force_render',
	);
	
	/**
	 * Fields that will be merged down into individual elements and handlers
	 */
	var $alwaysMerge = array(
		'force_render',
	);
	
	/*
	 * Valid 'types' for a dependent dropdown
	 */
	var $validTypes = array(
		"select", 	// select dropdown
		"input", 	// text input field
		"checkbox",	// checkbox (radio buttons will not be supported)
		"none", 	// blank
		"multiple"	// custom functionality
	);

	/**
	 * Sole constructor
	 * @param string $metadata Path to metadata file to consume
	 */
	function SugarDependentDropdown($metadata='') {
		if(!empty($metadata)) {
			$this->init($metadata);
		}
	}
	
	/**
	 * Prepares an instance of SDD for use with a given set
	 * @param string $metadata Path to metadata file to consume
	 */
	function init($metadata) {
		if(is_string($metadata)) {
			if($this->debugMode) {
				$this->debugOutput("Got metadata file [ {$metadata} ]");
			}
			if(file_exists($metadata)) {
				$sugarDependentDropdown = array();
				/*
				 * The metadata file should be prepped in an associative array.
				 * The array should be named "$sugarDependentDropdown".
				 * 
				 * Examine:
				 * "include/SugarDependentDropdown/metadata/dependentDropdown.
				 * php" for a commented example.
				 */
				include($metadata); // provides $sugarDependentDropdown
				
				foreach($sugarDependentDropdown as $key => $type) {
					if(is_array($type)) {
						foreach($type as $k => $v) {
							if($k == 'elements') {
								ksort($v); // order elements
								foreach($v as $index => $element) {
									$v[$index] = $this->initElement($element, $type['always_merge']);
								}
							} // end Work with elements block
							$type[$k] = $v;
						}

						if(!$this->verifyMetadata($type)) {
							if($this->debugMode) {
								$this->debugOutput("SugarRouting: metadata initialization failed.  Please check your metadata source.");
							}
						}
					}
					$sugarDependentDropdown[$key] = $type;
				} // end foreach of metadata
				
				/* we made it through all checks so assign this to the output attribute */
				$this->metadata = $sugarDependentDropdown;
			} // end file_exists();
			else {
				if($this->debugMode) $this->debugOutput("SugarRouting could not find file [ {$metadata} ]");
			}
		} // end is_string();
	} // end init()
	
	
	///////////////////////////////////////////////////////////////////////////
	////	PRIVATE UTILS
	/**
	 * Verifies that an element is valid and has all the required info.
	 */
	function isValidElement($element) {
		if(is_array($element)) {
			foreach($this->elementRequired as $k => $req) {
				if(!array_key_exists($req, $element) && !isset($element['handlers'])) {
					if($this->debugMode) {
						$this->debugOutput("Element is missing required field: [ $req ]");
						$this->debugOutput($element);
					}
					return false;
				}
			}
			return true;
		}
		
		if($this->debugMode) {
			$this->debugOutput("isValidElement is returning false.  Passed the following as an argument:");
			$this->debugOutput($element);
		}
		return false;
	}

	/**
	 * Initializes an element for processing
	 * @param array $element Element metadata
	 * @return array
	 */
	function initElement($element, $alwaysMerge) {
		if($this->isValidElement($element)) {
			$mergedElement = sugarArrayMerge($this->defaults, $element);
			
			foreach($alwaysMerge as $key => $val) {
				if(!isset($mergedElement[$key]))
					$mergedElement[$key] = $val;
			}

			if($this->debugMode) {
				foreach($this->elementRequired as $k => $v) {
					if(!array_key_exists($v, $mergedElement) && !isset($mergedElement['handlers'])) {
						$this->debugOutput("Element is missing required field after initialization: [ $v ].");
					}
				}
			}
			
			// iterate through "handlers - mini-elements"
			if(isset($mergedElement['handlers'])) {
				if(is_array($mergedElement['handlers']) && !empty($mergedElement['handlers'])) {
					foreach($mergedElement['handlers'] as $miniKey => $miniElement) {
						// apply parent element's properties to mini-element
						foreach($mergedElement as $key => $el) {
							if($key != 'handlers' && (!isset($miniElement[$key]))) {// || empty($miniElement[$key])
								$miniElement[$key] = $mergedElement[$key];
							}
						}
						
						$miniElement = $this->initElement($miniElement, $alwaysMerge);
						$mergedElement['handlers'][$miniKey] = $miniElement;
					}
				} else {
					if($this->debugMode) {
						$this->debugOutput("SugarRouting: element contains 'handlers' but is not an array:");
						$this->debugOutput($mergedElement);
					}
				}
			}
			
			return $mergedElement;
		} else {
			if($this->debugMode) {
				$this->debugOutput("SugarRouting is trying to initialize a non-element:");
				$this->debugOutput($element);
			}
		}
	}
	
	/**
	 * Verifies that required metadata is present for all dependencies. Called after all metadata defaults are merged
	 * and the final array is created.
	 * @param array $metadata
	 * @return bool
	 */
	function verifyMetadata($metadata) {
		if(isset($metadata['elements']) && !empty($metadata['elements']) && is_array($metadata['elements'])) {
			$elements = $metadata['elements'];
			
			foreach($elements as $indexName => $element) {
				/* confirm each element has a valid type */
				if(!isset($element['type']) && in_array($element['type'], $this->validTypes)) {
					if($this->debugMode) {
						$this->debugOutput("SugarRouting: valid 'type' not found:"); $this->debugOutput($element);
					}
					return false;
				}
				
				/************************************************
				 * Check based on "type"
				 */
				switch($element['type']) {
					case "select":
						if(isset($element['values'])) {
							$index = substr($indexName, 7, strlen($indexName));
							
							
							/* if we have an array to iterate through - this is not the case with lazy-loaded values */
							if(is_array($element['values']) && !empty($element['values'])) {
								$index++; // string to int conversion, i know, sucks
								$nextElementKey = "element".$index;
								$nextElement = $elements[$nextElementKey];
								
								foreach($element['values'] as $key => $value) {
									if(!array_key_exists($key, $nextElement['handlers'])) {
										if($this->debugMode) {
											$this->debugOutput("SugarRouting: next-order element is missing a handler for value: [ {$key} ]");
											$this->debugOutput($elements);
											$this->debugOutput($nextElement);
										}
										return false;
									}
								}
							}
						} else {
							if($this->debugMode) {
								$this->debugOutput("SugarRouting: 'select' element found, no 'values' defined."); $this->debugOutput($element);
							}
							return false;
						}
					break; // end "select" check
				}
				
				/*
				 * Handler "handlers" mini-element metadata definition verification
				 */
				if(isset($element['handlers']) && !empty($element['handlers'])) {
					// fake metadata container
					$fakeMetadata = array('elements' => null);
					$fakeMetadata['elements'] = $element['handlers'];
					$result = $this->verifyMetadata($fakeMetadata);
					
					if(!$result) {
						if($this->debugMode) {
							$this->debugOutput("SugarRouting: metadata verification for 'handlers' failed: "); $this->debugOutput($fakeMetadata);
						}
						return false;
					}
				}
			}
			
			if($this->debugMode) {
				$this->debugOutput((count($metadata) > 1) ? "SugarRouting: all checks passed, valid metadata confirmed" : "SugarRouting: 'handlers' checks passed, valid metadata confirmed.");
			}
			return true;
		} else {
			if($this->debugMode) {
				$this->debugOutput("SugarRouting: Your metadata does not contain a valid 'elements' array:");$this->debugOutput($metadata);
			}
		}
		return false;
	}
	
	/**
	 * Prints debug messages to the screen
	 * @param mixed
	 */
	function debugOutput($v) {
		echo "\n<pre>\n";
		print_r($v);
		echo "\n</pre>\n";
	}
	////	END PRIVATE UTILS
	///////////////////////////////////////////////////////////////////////////
} // end Class def