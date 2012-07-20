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

 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
 

define ( 'MB_PACKAGE_PATH', 'custom/modulebuilder/packages' ) ;
define ( 'MB_PACKAGE_BUILD', 'custom/modulebuilder/builds' ) ;
require_once ('modules/ModuleBuilder/MB/MBPackage.php') ;

class ModuleBuilder
{
    var $packages = array ( ) ;

    function getPackageList ()
    {
        static $list = array ( ) ;
        if (! empty ( $list ) || ! file_exists ( MB_PACKAGE_PATH ))
            return $list ;
        $d = dir ( MB_PACKAGE_PATH ) ;
        while ( $e = $d->read () )
        {
            if (file_exists ( MB_PACKAGE_PATH . '/' . $e . '/manifest.php' ))
            {
                $list [] = $e ;
            }
        }
        sort ( $list ) ; // order important as generate_nodes_array in Tree.php later loops over this by foreach to generate the package list
        return $list ;
    
    }

    function getPackage ($name)
    {
        if (! empty ( $this->packages [ $name ] ))
            return $this->packages [ $name ] ;
        $this->packages [ $name ] = new MBPackage ( $name ) ;
    }
    
    function getPackageKey ($name)
    {
        $manifestPath = MB_PACKAGE_PATH . '/' . $name . '/manifest.php' ;
        if (file_exists ( $manifestPath ))
        {
            require( $manifestPath ) ;
            if(!empty($manifest))
                return $manifest['key'];
        }
        return false ;
    }

    function &getPackageModule ($package , $module)
    {
        $this->getPackage ( $package ) ;
        $this->packages [ $package ]->getModule ( $module ) ;
        return $this->packages [ $package ]->modules [ $module ] ;
    }

    function save ()
    {
        $packages = array_keys ( $this->packages ) ;
        foreach ( $packages as $package )
        {
            $this->packages [ $package ]->save () ;
        }
    }

    function build ()
    {
        $packages = array_keys ( $this->packages ) ;
        foreach ( $packages as $package )
        {
            if (count ( $packages ) == 1)
            {
                $this->packages [ $package ]->build ( true ) ;
            } else
            {
                $this->packages [ $package ]->build ( false ) ;
            }
        }
    }

    function getPackages ()
    {
        if (empty ( $this->packages ))
        {
            $list = $this->getPackageList () ;
            foreach ( $list as $package )
            {
                if (! empty ( $this->packages [ $package ] ))
                    continue ;
                $this->packages [ $package ] = new MBPackage ( $package ) ;
            }
        }
    }

    function getNodes ()
    {
        $this->getPackages () ;
        $nodes = array ( ) ;
        foreach ( array_keys ( $this->packages ) as $name )
        {
            $nodes [] = $this->packages [ $name ]->getNodes () ;
        }
        return $nodes ;
    }

}
?>