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


/**
 * Class for parsing title from RSS feed, and keep default encoding (UTF-8)
 * Created: Sep 12, 2011
 */
class DashletRssFeedTitle {
	public $defaultEncoding = "UTF-8";
	public $readBytes = 8192;
	public $url;
	public $cut = 70;
	public $contents = "";
	public $title = "";
	public $endWith = "...";
	public $xmlEncoding = false;
	public $fileOpen = false;

	public function __construct($url) {
		$this->url = $url;
	}

	public function generateTitle() {
		if ($this->readFeed()) {
			$this->getTitle();
			if (!empty($this->title)) {
				$this->convertEncoding();
				$this->cutLength();
			}
		}
		return $this->title;
	}

	/**
	 * @todo use curl with waiting timeout instead of fopen
	 */
	public function readFeed() {
		if ($this->url) {
			$fileOpen = @fopen($this->url, 'r');
			if ($fileOpen) {
				$this->fileOpen = true;
				$this->contents = fread($fileOpen, $this->readBytes);
				fclose($fileOpen);
				return true;
			}
		}
		return false;
	}

	/**
	 *
	 */
	public function getTitle() {
		$matches = array ();
		preg_match("/<title>.*?<\/title>/i", $this->contents, $matches);
		if (isset($matches[0])) {
			$this->title = str_replace(array('<![CDATA[', '<title>', '</title>', ']]>'), '', $matches[0]);
		}
	}

	public function cutLength() {
		if (mb_strlen(trim($this->title), $this->defaultEncoding) > $this->cut) {
			$this->title = mb_substr($this->title, 0, $this->cut, $this->defaultEncoding) . $this->endWith;
		}
	}

	private function _identifyXmlEncoding() {
		$matches = array ();
		preg_match('/encoding\=*\".*?\"/', $this->contents, $matches);
		if (isset($matches[0])) {
			$this->xmlEncoding = trim(str_replace('encoding="', '"', $matches[0]), '"');
		}
	}

	public function convertEncoding() {
		$this->_identifyXmlEncoding();
		if ($this->xmlEncoding && $this->xmlEncoding != $this->defaultEncoding) {
			$this->title = iconv($this->xmlEncoding, $this->defaultEncoding, $this->title);
		}
	}
}