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


// List of Windows TZ names and their CLDR counterparts
// Source: http://unicode.org/repos/cldr/trunk/common/supplemental/windowsZones.xml
$windowsZones = array (
  'AUS Central Standard Time' => 'Australia/Darwin',
  'AUS Eastern Standard Time' => 'Australia/Sydney',
  'Afghanistan Standard Time' => 'Asia/Kabul',
  'Alaskan Standard Time' => 'America/Anchorage',
  'Arab Standard Time' => 'Asia/Riyadh',
  'Arabian Standard Time' => 'Asia/Dubai',
  'Arabic Standard Time' => 'Asia/Baghdad',
  'Argentina Standard Time' => 'America/Buenos_Aires',
  'Armenian Standard Time' => 'Asia/Yerevan',
  'Atlantic Standard Time' => 'America/Halifax',
  'Azerbaijan Standard Time' => 'Asia/Baku',
  'Azores Standard Time' => 'Atlantic/Azores',
  'Bangladesh Standard Time' => 'Asia/Dhaka',
  'Canada Central Standard Time' => 'America/Regina',
  'Cape Verde Standard Time' => 'Atlantic/Cape_Verde',
  'Caucasus Standard Time' => 'Asia/Yerevan',
  'Cen. Australia Standard Time' => 'Australia/Adelaide',
  'Central America Standard Time' => 'America/Guatemala',
  'Central Asia Standard Time' => 'Asia/Almaty',
  'Central Brazilian Standard Time' => 'America/Cuiaba',
  'Central Europe Standard Time' => 'Europe/Budapest',
  'Central European Standard Time' => 'Europe/Warsaw',
  'Central Pacific Standard Time' => 'Pacific/Guadalcanal',
  'Central Standard Time' => 'America/Chicago',
  'Central Standard Time (Mexico)' => 'America/Mexico_City',
  'China Standard Time' => 'Asia/Shanghai',
  'Dateline Standard Time' => 'Etc/GMT+12',
  'E. Africa Standard Time' => 'Africa/Nairobi',
  'E. Australia Standard Time' => 'Australia/Brisbane',
  'E. Europe Standard Time' => 'Europe/Minsk',
  'E. South America Standard Time' => 'America/Sao_Paulo',
  'Eastern Standard Time' => 'America/New_York',
  'Egypt Standard Time' => 'Africa/Cairo',
  'Ekaterinburg Standard Time' => 'Asia/Yekaterinburg',
  'FLE Standard Time' => 'Europe/Kiev',
  'Fiji Standard Time' => 'Pacific/Fiji',
  'GMT Standard Time' => 'Europe/London',
  'GTB Standard Time' => 'Europe/Istanbul',
  'Georgian Standard Time' => 'Asia/Tbilisi',
  'Greenland Standard Time' => 'America/Godthab',
  'Greenwich Standard Time' => 'Atlantic/Reykjavik',
  'Hawaiian Standard Time' => 'Pacific/Honolulu',
  'India Standard Time' => 'Asia/Calcutta',
  'Iran Standard Time' => 'Asia/Tehran',
  'Israel Standard Time' => 'Asia/Jerusalem',
  'Jordan Standard Time' => 'Asia/Amman',
  'Kamchatka Standard Time' => 'Asia/Kamchatka',
  'Korea Standard Time' => 'Asia/Seoul',
  'Mauritius Standard Time' => 'Indian/Mauritius',
  'Mexico Standard Time' => 'America/Mexico_City',
  'Mexico Standard Time 2' => 'America/Chihuahua',
  'Mid-Atlantic Standard Time' => 'Etc/GMT+2',
  'Middle East Standard Time' => 'Asia/Beirut',
  'Montevideo Standard Time' => 'America/Montevideo',
  'Morocco Standard Time' => 'Africa/Casablanca',
  'Mountain Standard Time' => 'America/Denver',
  'Mountain Standard Time (Mexico)' => 'America/Chihuahua',
  'Myanmar Standard Time' => 'Asia/Rangoon',
  'N. Central Asia Standard Time' => 'Asia/Novosibirsk',
  'Namibia Standard Time' => 'Africa/Windhoek',
  'Nepal Standard Time' => 'Asia/Katmandu',
  'New Zealand Standard Time' => 'Pacific/Auckland',
  'Newfoundland Standard Time' => 'America/St_Johns',
  'North Asia East Standard Time' => 'Asia/Irkutsk',
  'North Asia Standard Time' => 'Asia/Krasnoyarsk',
  'Pacific SA Standard Time' => 'America/Santiago',
  'Pacific Standard Time' => 'America/Los_Angeles',
  'Pacific Standard Time (Mexico)' => 'America/Santa_Isabel',
  'Pakistan Standard Time' => 'Asia/Karachi',
  'Paraguay Standard Time' => 'America/Asuncion',
  'Romance Standard Time' => 'Europe/Paris',
  'Russian Standard Time' => 'Europe/Moscow',
  'SA Eastern Standard Time' => 'America/Cayenne',
  'SA Pacific Standard Time' => 'America/Bogota',
  'SA Western Standard Time' => 'America/La_Paz',
  'SE Asia Standard Time' => 'Asia/Bangkok',
  'Samoa Standard Time' => 'Pacific/Apia',
  'Singapore Standard Time' => 'Asia/Singapore',
  'South Africa Standard Time' => 'Africa/Johannesburg',
  'Sri Lanka Standard Time' => 'Asia/Colombo',
  'Syria Standard Time' => 'Asia/Damascus',
  'Taipei Standard Time' => 'Asia/Taipei',
  'Tasmania Standard Time' => 'Australia/Hobart',
  'Tokyo Standard Time' => 'Asia/Tokyo',
  'Tonga Standard Time' => 'Pacific/Tongatapu',
  'US Eastern Standard Time' => 'Etc/GMT+5',
  'US Mountain Standard Time' => 'America/Phoenix',
  'UTC' => 'Etc/GMT',
  'UTC+12' => 'Etc/GMT-12',
  'UTC-02' => 'Etc/GMT+2',
  'UTC-11' => 'Etc/GMT+11',
  'Ulaanbaatar Standard Time' => 'Asia/Ulaanbaatar',
  'Venezuela Standard Time' => 'America/Caracas',
  'Vladivostok Standard Time' => 'Asia/Vladivostok',
  'W. Australia Standard Time' => 'Australia/Perth',
  'W. Central Africa Standard Time' => 'Africa/Lagos',
  'W. Europe Standard Time' => 'Europe/Berlin',
  'West Asia Standard Time' => 'Asia/Tashkent',
  'West Pacific Standard Time' => 'Pacific/Port_Moresby',
  'Yakutsk Standard Time' => 'Asia/Yakutsk',
);