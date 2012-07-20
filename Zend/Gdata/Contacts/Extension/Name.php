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



require_once 'Zend/Gdata/Extension.php';


class Zend_Gdata_Contacts_Extension_Name extends Zend_Gdata_Extension
{

    protected $_rootNamespace = 'gd';
    protected $_rootElement = 'name';
    protected $_names = array('first_name' => '', 'last_name' => '', 'full_name' => '');
    /**
     * Constructs a new Zend_Gdata_Contacts_Extension_Name object.
     * @param string $value (optional) The text content of the element.
     */
    public function __construct($value = null)
    {
        $this->registerAllNamespaces(Zend_Gdata_Contacts::$namespaces);
        parent::__construct();
    }

    protected function takeChildFromDOM($child)
    {
        $absoluteNodeName = $child->namespaceURI . ':' . $child->localName;
        switch ($absoluteNodeName)
        {
            case $this->lookupNamespace('gd') . ':' . 'fullName';
                $entry = new Zend_Gdata_Entry();
                $entry->transferFromDOM($child);
                $this->_names['full_name'] = $entry->getText();
                break;

            case $this->lookupNamespace('gd') . ':' . 'givenName';
                $entry = new Zend_Gdata_Entry();
                $entry->transferFromDOM($child);
                $this->_names['first_name'] = $entry->getText();
                break;

             case $this->lookupNamespace('gd') . ':' . 'familyName';
                $entry = new Zend_Gdata_Entry();
                $entry->transferFromDOM($child);
                $this->_names['last_name'] = $entry->getText();
                break;
            default:
                parent::takeChildFromDOM($child);
                break;
        }
    }

    public function toArray()
    {
        return $this->_names;
    }
}
 
