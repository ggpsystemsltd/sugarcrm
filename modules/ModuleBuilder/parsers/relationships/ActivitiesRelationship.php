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


require_once 'modules/ModuleBuilder/parsers/relationships/OneToManyRelationship.php' ;

/*
 * Class to manage the metadata for a One-To-Many Relationship
 * The One-To-Many relationships created by this class are a combination of a subpanel and a custom relate field
 * The LHS (One) module will receive a new subpanel for the RHS module. The subpanel gets its data ('get_subpanel_data') from a link field that references a new Relationship
 * The RHS (Many) module will receive a new relate field to point back to the LHS
 *
 * OOB modules implement One-To-Many relationships as:
 *
 * On the LHS (One) side:
 * A Relationship of type one-to-many in the rhs modules vardefs.php
 * A link field in the same vardefs.php with 'relationship'= the relationship name and 'source'='non-db'
 * A subpanel which gets its data (get_subpanel_data) from the link field
 *
 * On the RHS (Many) side:
 * A Relate field in the vardefs, formatted as in this example, which references a link field:
 * 'name' => 'account_name',
 * 'rname' => 'name',
 * 'id_name' => 'account_id',
 * 'vname' => 'LBL_ACCOUNT_NAME',
 * 'join_name'=>'accounts',
 * 'type' => 'relate',
 * 'link' => 'accounts',
 * 'table' => 'accounts',
 * 'module' => 'Accounts',
 * 'source' => 'non-db'
 * A link field which references the shared Relationship
 */

class ActivitiesRelationship extends OneToManyRelationship
{

	protected static $subpanelsAdded = array();
	protected static $labelsAdded = array();

	/*
     * Constructor
     * @param array $definition Parameters passed in as array defined in parent::$definitionKeys
     * The lhs_module value is for the One side; the rhs_module value is for the Many
     */
    function __construct ($definition)
    {
        parent::__construct ( $definition ) ;
    }

    /*
     * BUILD methods called during the build
     */

	/*
     * Define the labels to be added to the module for the new relationships
     * @return array    An array of system value => display value
     */
    function buildLabels ()
    {
        $labelDefinitions = array ( ) ;
        if (!$this->relationship_only )
        {
            if (!isset(ActivitiesRelationship::$labelsAdded[$this->lhs_module])) {
	        	$labelDefinitions [] = array (
	            	'module' => 'application' ,
	            	'system_label' => 'parent_type_display',
	            	'display_label' => array(
                        $this->lhs_module => $this->lhs_label ? $this->lhs_label : ucfirst($this->lhs_module)
                    )
	            ) ;

	            $labelDefinitions [] = array (
	            	'module' => 'application' ,
	            	'system_label' => 'record_type_display',
	            	'display_label' => array(
                        $this->lhs_module => $this->lhs_label ? $this->lhs_label : ucfirst($this->lhs_module)
                    )
	            ) ;

	            $labelDefinitions [] = array (
	            	'module' => 'application' ,
	            	'system_label' => 'record_type_display_notes',
	            	'display_label' => array(
                        $this->lhs_module => $this->lhs_label ? $this->lhs_label : ucfirst($this->lhs_module)
                    )
	            ) ;
            }
            
            $labelDefinitions [] = array ( 
            	'module' => $this->lhs_module , 
            	'system_label' => 'LBL_' . strtoupper ( $this->relationship_name . '_FROM_' . $this->getRightModuleSystemLabel() ) . '_TITLE' , 
            	'display_label' => $this->lhs_label ? $this->lhs_label : ucfirst($this->lhs_module)
            ) ;
            ActivitiesRelationship::$labelsAdded[$this->lhs_module] = true;
        }
        return $labelDefinitions ;
    }


	/*
     * @return array    An array of field definitions, ready for the vardefs, keyed by module
     */
    function buildVardefs ( )
    {
        $vardefs = array ( ) ;

        $vardefs [ $this->rhs_module ] [] = $this->getLinkFieldDefinition ( $this->lhs_module, $this->relationship_name ) ;
        $vardefs [ $this->lhs_module ] [] = $this->getLinkFieldDefinition ( $this->rhs_module, $this->relationship_name ) ;


        return $vardefs ;
    }

	protected function getLinkFieldDefinition ($sourceModule , $relationshipName)
    {
        $vardef = array ( ) ;
        $vardef [ 'name' ] = $relationshipName;
        $vardef [ 'type' ] = 'link' ;
        $vardef [ 'relationship' ] = $relationshipName ;
        $vardef [ 'source' ] = 'non-db' ;
        $vardef [ 'vname' ] = strtoupper("LBL_{$relationshipName}_FROM_{$sourceModule}_TITLE");
        return $vardef ;
    }

    /*
     * Define what fields to add to which modules layouts
     * @return array    An array of module => fieldname
     */
    function buildFieldsToLayouts ()
    {
        if ($this->relationship_only)
            return array () ;

        return array( $this->rhs_module => $this->relationship_name . "_name" ) ; // this must match the name of the relate field from buildVardefs
    }

 	function buildSubpanelDefinitions ()
    {
        if ($this->relationship_only || isset(ActivitiesRelationship::$subpanelsAdded[$this->lhs_module]))
            return array () ;

        ActivitiesRelationship::$subpanelsAdded[$this->lhs_module] = true;
        $relationshipName = substr($this->relationship_name, 0, strrpos($this->relationship_name, '_'));
        return array( $this->lhs_module => array (
        			  'activities' => $this->buildActivitiesSubpanelDefinition ( $relationshipName ),
        			  'history' => $this->buildHistorySubpanelDefinition ( $relationshipName ) ,
        			));
    }

    /*
     * @return array    An array of relationship metadata definitions
     */
    function buildRelationshipMetaData ()
    {
        $relationshipName = $this->definition [ 'relationship_name' ];
        $relMetadata = array ( ) ;
        $relMetadata [ 'lhs_module' ] = $this->definition [ 'lhs_module' ] ;
        $relMetadata [ 'lhs_table' ] = $this->getTablename($this->definition [ 'lhs_module' ]) ;
        $relMetadata [ 'lhs_key' ] = 'id' ;
        $relMetadata [ 'rhs_module' ] = $this->definition [ 'rhs_module' ] ;
        $relMetadata [ 'rhs_table' ] = $this->getTablename($this->definition [ 'rhs_module' ]) ;
        $relMetadata ['rhs_key'] = 'parent_id';
        $relMetadata ['relationship_type'] = 'one-to-many';
        $relMetadata ['relationship_role_column'] = 'parent_type';
        $relMetadata ['relationship_role_column_value'] = $this->definition [ 'lhs_module' ] ;

    	return array( $this->lhs_module => array(
    		'relationships' => array ($relationshipName => $relMetadata),
    		'fields' => '', 'indices' => '', 'table' => '')
    	) ;
    }

/*
     * Shortcut to construct an Activities collection subpanel
     * @param AbstractRelationship $relationship    Source relationship to Activities module
     */
    protected function buildActivitiesSubpanelDefinition ( $relationshipName )
    {
		return array (
            'order' => 10 ,
            'sort_order' => 'desc' ,
            'sort_by' => 'date_start' ,
            'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE' ,
            'type' => 'collection' ,
            'subpanel_name' => 'activities' , //this value is not associated with a physical file
            'module' => 'Activities' ,
            'top_buttons' => array (
                array ( 'widget_class' => 'SubPanelTopCreateTaskButton' ) ,
                array ( 'widget_class' => 'SubPanelTopScheduleMeetingButton' ) ,
                array ( 'widget_class' => 'SubPanelTopScheduleCallButton' ) ,
                array ( 'widget_class' => 'SubPanelTopComposeEmailButton' ) ) ,
                'collection_list' => array (
                    'meetings' => array (
                        'module' => 'Meetings' ,
                        'subpanel_name' => 'ForActivities' ,
                        'get_subpanel_data' => $relationshipName. '_meetings' ) ,
                    'tasks' => array (
                        'module' => 'Tasks' ,
                        'subpanel_name' => 'ForActivities' ,
                        'get_subpanel_data' => $relationshipName. '_tasks' ) ,
                    'calls' => array (
                        'module' => 'Calls' ,
                        'subpanel_name' => 'ForActivities' ,
                        'get_subpanel_data' => $relationshipName. '_calls' ) ) ) ;
    }

    /*
     * Shortcut to construct a History collection subpanel
     * @param AbstractRelationship $relationship    Source relationship to Activities module
     */
    protected function buildHistorySubpanelDefinition ( $relationshipName )
    {
        return array (
            'order' => 20 ,
            'sort_order' => 'desc' ,
            'sort_by' => 'date_modified' ,
            'title_key' => 'LBL_HISTORY' ,
            'type' => 'collection' ,
            'subpanel_name' => 'history' , //this values is not associated with a physical file.
            'module' => 'History' ,
            'top_buttons' => array (
                array ( 'widget_class' => 'SubPanelTopCreateNoteButton' ) ,
				array ( 'widget_class' => 'SubPanelTopArchiveEmailButton'),
                array ( 'widget_class' => 'SubPanelTopSummaryButton' ) ) ,
                'collection_list' => array (
                    'meetings' => array (
                        'module' => 'Meetings' ,
                        'subpanel_name' => 'ForHistory' ,
                        'get_subpanel_data' => $relationshipName. '_meetings' ) ,
                    'tasks' => array (
                        'module' => 'Tasks' ,
                        'subpanel_name' => 'ForHistory' ,
                        'get_subpanel_data' => $relationshipName. '_tasks' ) ,
                    'calls' => array (
                        'module' => 'Calls' ,
                        'subpanel_name' => 'ForHistory' ,
                        'get_subpanel_data' => $relationshipName. '_calls' ) ,
                    'notes' => array (
                        'module' => 'Notes' ,
                        'subpanel_name' => 'ForHistory' ,
                        'get_subpanel_data' => $relationshipName. '_notes' ) ,
                    'emails' => array (
                        'module' => 'Emails' ,
                        'subpanel_name' => 'ForHistory' ,
                        'get_subpanel_data' => $relationshipName. '_emails' ) ) )  ;
    }
}
?>