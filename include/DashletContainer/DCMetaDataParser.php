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

/**
 * DCMetaDataParser handles both the loading and saving of meta-data for Dashlet Containers.
 * It also provides the API for adding and removing Dashlets from a layout.
 * Since all Dashlet Containers use the same Meta-Data it is in the interest of uniformity to keep this class seperate. Think of this meta-data as the master list.
 * This meta-data DOES NOT handle specifics on layout positioning of Dashlets. It just handles which Dashlets should be rendered.
 * Layout Positioning is handled by each Dashlet Container Layout on an individual basis and is not common between Dashlet Container Layouts.
 *
 * @author mitani
 * @api
 */
class DCMetaDataParser
{
	/**
	 * should the save occur
	 *
	 * @var bool $isDirty
	 */
	private $isDirty = false;

	/**
	 * file path to the original meta-data loaded
	 *
	 * @var string $filePath
	 */
	private $filePath = null;

	/**
	 * Constructor takes in a file path and loads the appropriate meta-data
	 *
	 * @throws FileNotFound and InvalidMetaData errors
	 * @param string $filePath
	 */
	public function __construct(
	    $filePath
	    )
	{
		$this->load($filePath);
	}

	/**
	 * This function will load the meta-data based on a given file path
	 *
	 * Dashlet Meta Data Loading Process
	 * 1. Check if a user customized version exists in user preferences (convert the file path to a guid) and load that one if availble
	 * 2. Check if a system customized version exists in custom/$dashletMetaDataFile and load that one
	 * 3. Otherwise load the provided file path
	 *
	 * If the file path is not found or if the meta-data is invalid it will throw an error and return false
	 *
	 * @throws FileNotFound and InvalidMetaData errors
	 * @param $filePath - path to the meta data
	 * @return bool - success or failure of load
	 */
	public function load(
	    $filePath
	    )
	{
		if(file_exists('custom/'. $filePath))
		    $filePath = 'custom/'. $filePath;

		$dashletdefs = array();
		include($filePath);
		$this->dashletdefs = $dashletdefs;
	}

	/**
	 * Returns the pages defined in the meta data
	 *
	 * @return array
	 */
	public function getPages()
	{
		return $this->dashletdefs['pages'];
	}

	/**
	 * Returns the metadata of the dashlets defined
	 *
	 * @return unknown_type
	 */
	public function getDashlets()
	{
		return $this->dashletdefs['dashlets'];
	}

	/**
	 * This function will add a dashlet to the provided files meta-data based given a dashlet id specifiying the dashlet to add,
	 * the group id specifying the group to add it to, and the position within the group to place it in.
	 *
	 * This function will be called in conjunction with addDashlet in the Dashlet Container Layout (DCL) with the DCL handling
	 * layout specific positioning of a dashlet.
	 *
	 * @param $dashletID - id of the dashlet (not the instance id of the dashlet)
	 * @param $group - group it should be added to
	 * @param $position - position in the group
	 * @return bool - success or failure of add
	 */
	public function addDashlet(
	    $dashletID,
	    $group,
	    $position
	    )
	{
	}

	/**
	 * Handles the removing of a dashlet from the meta-data based on an instance id of a dashlet
	 *
	 * @param $id - instance id of a dashlet
	 * @return bool - success or failure of remove
	 */
	public function removeDashlet(
	    $id
	    )
	{
	}

	/**
	 * Allows for moving a dashlet to either a new position in the same group or a new group entirely
	 *
	 * @param $id - instance id of a dashlet
	 * @param $group - group it should be added to
	 * @param $position - position in the group
	 * @return bool - success or failure
	 */
	public function moveDashlet(
	    $id,
	    $group,
	    $position
	    )
	{
	}

	/**
	 * Handles the saving of a Dashlet Containers Meta Data. This is useful when either an administrator or end user
	 * changes a given layout.Depending on the type it will save the meta-data accordingly.
	 * if $type == 'SYSTEM'
	 * 		it will save to the custom directory
	 * if $type == 'USER'
	 * 		it will save to the user preferences of the current user
	 *
	 * @param string $type
	 * @return bool - on success or failure of save
	 */
	public function save(
	    $type = 'SYSTEM'
	    )
	{
	}
}