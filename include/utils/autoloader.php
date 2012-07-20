<?php
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

class SugarAutoLoader{

	public static $map = array(
		'XTemplate'=>'XTemplate/xtpl.php',
		'ListView'=>'include/ListView/ListView.php',
		'Sugar_Smarty'=>'include/Sugar_Smarty.php',
		'Javascript'=>'include/javascript/javascript.php',

	);

	public static $noAutoLoad = array(
		'Tracker'=>true,
	);

	public static $moduleMap = array();

    public static function autoload($class)
	{
		$uclass = ucfirst($class);
		if(!empty(SugarAutoLoader::$noAutoLoad[$class])){
			return false;
		}
		if(!empty(SugarAutoLoader::$map[$uclass])){
			require_once(SugarAutoLoader::$map[$uclass]);
			return true;
		}

		if(empty(SugarAutoLoader::$moduleMap)){
			if(isset($GLOBALS['beanFiles'])){
				SugarAutoLoader::$moduleMap = $GLOBALS['beanFiles'];
			}else{
				include('include/modules.php');
				SugarAutoLoader::$moduleMap = $beanFiles;
			}
		}
		if(!empty(SugarAutoLoader::$moduleMap[$class])){
			require_once(SugarAutoLoader::$moduleMap[$class]);
			return true;
		}
        $viewPath = self::getFilenameForViewClass($class);
        if (!empty($viewPath))
        {
            require_once($viewPath);
            return true;
        }
        $reportWidget = self::getFilenameForSugarWidget($class);
        if (!empty($reportWidget))
        {
            require_once($reportWidget);
            return true;
        }

  		return false;
	}

    protected static function getFilenameForViewClass($class)
    {
        $module = false;
        if (!empty($_REQUEST['module']) && substr($class, 0, strlen($_REQUEST['module'])) == $_REQUEST['module'])
        {
            //This is a module view
            $module = $_REQUEST['module'];
            $class = substr($class, strlen($module));
        }

        if (substr($class, 0, 4) == "View")
        {
            $view = strtolower(substr($class, 4));
            if ($module)
            {
                $modulepath = "modules/$module/views/view.$view.php";
                if (file_exists("custom/$modulepath"))
                    return "custom/$modulepath";
                if (file_exists($modulepath))
                    return $modulepath;
            } else {
                $basepath = "include/MVC/View/views/view.$view.php";
                if (file_exists("custom/$basepath")){
                    return "custom/$basepath";
                }
                if (file_exists($basepath)) {
                    return $basepath;
                }
            }
        }
    }

    /**
     * getFilenameForSugarWidget
     * This method attempts to autoload classes starting with name "SugarWidget".  It first checks for the file
     * in custom/include/generic/SugarWidgets directory and if not found defaults to include/generic/SugarWidgets.
     * This method is used so that we can easily customize and extend these SugarWidget classes.
     *
     * @static
     * @param $class String name of the class to load
     * @return String file of the SugarWidget class; false if none found
     */
    protected static function getFilenameForSugarWidget($class)
    {
        //Only bother to check if the class name starts with SugarWidget
        if(strpos($class, 'SugarWidget') !== false)
        {
            if(strpos($class, 'SugarWidgetField') !== false)
            {
                //We need to lowercase the portion after SugarWidgetField
                $name = substr($class, 16);
                if(!empty($name))
                {
                    $class = 'SugarWidgetField' . strtolower($name);
                }
            }

            $file = get_custom_file_if_exists("include/generic/SugarWidgets/{$class}.php");
            if(file_exists($file))
            {
               return $file;
            }
        }
        return false;
    }

	public static function loadAll(){
		foreach(SugarAutoLoader::$map as $class=>$file){
			require_once($file);
		}

		if(isset($GLOBALS['beanFiles'])){
			$files = $GLOBALS['beanFiles'];
		}else{
			include('include/modules.php');
			$files = $beanList;
		}
		foreach(SugarAutoLoader::$map as $class=>$file){
			require_once($file);
		}

	}
}
?>
