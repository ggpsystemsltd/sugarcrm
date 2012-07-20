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



require_once('include/JSON.php');
require_once('modules/KBDocuments/SearchUtils.php');


    $paramdata = ' ';
    $lvso = ' ';
    $n_id = ' ';
    $sortCol = ' ';
    $offset = 0;
    $json = getJSONobj();
    
    //process request parameters
    $paramdata = $json->decode(html_entity_decode($_REQUEST['params']));
    $paramdata = $paramdata['jsonObject'];

    //paramdata contains request object from treedata, lets process it
    $params = explode('&',$paramdata);
    
    //tree data params start with certain key words, all parameters are prefixed with PARAM,
    //PARAMT_ are tree level parameters, and PARAMN_ are node level parameters.  So we need to look
    // for node id, which will have the key 'PARAMN_id_0', as well as the regular non tree param, lvso.
    
    $param_arr = array();
    $node_depth = 0;
    $zero_node = '';
    //iterate through passed in params
    foreach($params as $key=>$val){
        //parse through and recreate params array from passed in url
        $vals = explode('=', $val);
        if(isset($vals[0])){
        $param_arr[$vals[0]] = ' ';
            if(isset($vals[1])){
                $param_arr[$vals[0]] = $vals[1];
            }
        }

        //while iterating through array, check to see if node depth is passed in
        if($vals[0] == 'PARAMT_depth'){
            //depth of tree node selected
            if(isset($vals[1])){
                $node_depth = $vals[1];
            }                 
        }
        
        //while iterating through array, check to see if a node id is passed in
        if($vals[0] == 'PARAMN_id_'.$node_depth){
            //id of tree node (KBTag) we are on
            if(isset($vals[1])){
                $n_id = $vals[1];
            }                 
        }
        
        //while iterating through array, check to see if listview sort order has been set
        if($vals[0] == 'lvso'){
            //value of List View Sort Order
            if(isset($vals[1])){
                $lvso = $vals[1];
            }                 
        }
        
        //while iterating through array, check to see if an offset has been specified (from pagination)
        if($vals[0] == 'KBDocuments2_KBDOCUMENT_offset'){
            //value of List View Sort Order
            if(isset($vals[1])){
                $offset = $vals[1];
            }                 
        }
        
        //while iterating through array, check to see if an order by value has been passed in
        if($vals[0] == 'KBDocuments2_KBDOCUMENT_ORDER_BY'){
            //value of List View Order
            if(isset($vals[1])){
                $sortCol = $vals[1];
            }                 
        }
        
        //retrieve the zero depth node name, to see if this is from admin screen
        if($vals[0] == 'PARAMN_id_0'){
            //id of tree node (KBTag) we are on
            if(isset($vals[1])){
                        $zero_node = $vals[1];
            }                 
        }
        
         
    }

    //time to recreate url so we can reset the params element in the request object.  If this is not done, then
    //each sort/pagination will add on  new set of params (even if they are repeated)to the request object.
    //As the object gets bloated it will become to big for an http request call and ajax calls will fail
    $paramurl= 'index.php?';
     foreach($param_arr as $parkey => $parval){
                if(is_array($parval)) {
                    foreach($parval as $pv) {
                        $paramurl .= $parkey.urlencode('[]').'='.urlencode($pv) . '&';
                    }
                }
                else {
                    $paramurl .= $parkey.'='.urlencode($parval) . '&';
                }            
     }
     $_REQUEST['params'] = $paramurl;
     $_POST['params'] = $paramurl;
     $_GET['params'] = $paramurl;


    //if we do not get the node id, then cancel this call, we cannot proceed
    if(empty($n_id )){
        return;   
    }
    
    $search_str = ' kbdocuments.deleted =0';
    //if node id is untagged, then create query for all untagged articles
    if($n_id == 'UNTAGGED_NODE_ID'){
    $search_str .= " and kbdocuments.id NOT IN
                                (select kbdocument_id from kbdocuments_kbtags where deleted = 0)";      
        
    }else{
        //create query for articles under this tag
    $search_str .= " and kbdocuments.id
                        IN (
                            SELECT kbd.id
                            FROM kbdocuments kbd, kbdocuments_kbtags kbd_kt
                            WHERE kbd.id = kbd_kt.kbdocument_id
                            AND kbd.deleted = 0
                            AND kbd_kt.deleted = 0
                            AND kbd_kt.kbtag_id = '$n_id'
                        )";        
    
    }
    
    //check to see if sortCol has been specified
    if( isset($_REQUEST['sortCol']) && !empty($_REQUEST['sortCol'])) {
        //if sorcol has been set to PAGINATE, then this is a pagination and requires
        //reversing the sort order so listview data can process correctly
        if($_REQUEST['sortCol']=='PAGINATE'){
            if(isset($lvso) && !empty($lvso)){
                $lvso = (strcmp(strtolower($lvso), 'asc') == 0)?'DESC':'ASC';
            }
        }else{
            //this is a normal sort column command, override sort order 
            //with currently selected column (if this call is from sort event)
            $sortCol = $_REQUEST['sortCol'];
        }
    }
   //Set Request Object parameter so that Sort order will happen in get_fts_list method
   $_REQUEST['lvso'] = $lvso;
   $_REQUEST['KBDocuments2_KBDOCUMENT_ORDER_BY'] = $sortCol;
   $_REQUEST['KBDocuments2_KBDOCUMENT_offset'] = $offset;   
    

       
   //if set to 'all tags', pass in query 'where' clause into method that returns list for admins
   if(!empty($zero_node) && strtolower($zero_node) == 'all_tags'){
   		$results = get_admin_fts_list($search_str,false,true);
   }else{   
        $results = get_fts_list($search_str,false,true);
   }

echo $results;

?>
