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

















if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



$mod_strings = array (

    'LBL_MODULE_NAME' => 'Prognosen',
  'LNK_NEW_OPPORTUNITY' => 'Neue Verkaufschance',
  'LBL_MODULE_TITLE' => 'Prognosen',
  'LBL_LIST_FORM_TITLE' => 'Festgelegte Prognosen',
  'LNK_UPD_FORECAST' => 'Prognose Arbeitsblatt',
  'LNK_QUOTA' => 'Vorgaben',
  'LNK_FORECAST_LIST' => 'Prognose Verlauf',
  'LBL_FORECAST_HISTORY' => 'Prognosen: Verlauf',
  'LBL_FORECAST_HISTORY_TITLE' => 'Prognosen: Verlauf',
  
    'LBL_TIMEPERIOD_NAME' => 'Zeitraum',
  'LBL_USER_NAME' => 'Benutzername',
  'LBL_REPORTS_TO_USER_NAME' => 'Berichtet an',
  
    'LBL_FORECAST_ID' => 'ID',
  'LBL_FORECAST_TIME_ID' => 'Zeitraum ID',
  'LBL_FORECAST_TYPE' => 'Prognosetyp',
  'LBL_FORECAST_OPP_COUNT' => 'Verkaufschancen',
  'LBL_FORECAST_OPP_WEIGH'=> 'Gewichteter Betrag',
  'LBL_FORECAST_OPP_COMMIT' => 'Wahrscheinlicher Fall',
  'LBL_FORECAST_OPP_BEST_CASE'=>'Bester Fall',
  'LBL_FORECAST_OPP_WORST'=>'Schlechtester Fall',
  'LBL_FORECAST_USER' => 'Benutzer',
  'LBL_DATE_COMMITTED'=> 'Festgelegtes Datum',
  'LBL_DATE_ENTERED' => 'Datum erstellt',
  'LBL_DATE_MODIFIED' => 'Geändert am',
  'LBL_CREATED_BY' => 'Erstellt von:',
  'LBL_DELETED' => 'Gelöscht',
  'LBL_MODIFIED_USER_ID'=>'Geändert von',

     'LBL_QC_TIME_PERIOD' => 'Zeitraum:',
  'LBL_QC_OPPORTUNITY_COUNT' => 'Verkaufschancen Zähler:',
  'LBL_QC_WEIGHT_VALUE' => 'Gewichteter Betrag:',
  'LBL_QC_COMMIT_VALUE' => 'Festgelegter Betrag:',
  'LBL_QC_COMMIT_BUTTON' => 'Durchführen',
  'LBL_QC_WORKSHEET_BUTTON' => 'Arbeitsblatt',
  'LBL_QC_ROLL_COMMIT_VALUE' => 'Rollup festgelegter Betrag:',
  'LBL_QC_DIRECT_FORECAST' => 'Mein direkte Prognose:',
  'LBL_QC_ROLLUP_FORECAST' => 'Meine Gruppenprognose:',
  'LBL_QC_UPCOMING_FORECASTS' => 'Meine Prognosen',
  'LBL_QC_LAST_DATE_COMMITTED' => 'Letztes Verpflichtungsdatum:',
  'LBL_QC_LAST_COMMIT_VALUE' => 'Letzter festgelegter Betrag:',
  'LBL_QC_HEADER_DELIM'=> 'An',
  
    'LBL_OW_OPPORTUNITIES' => "Verkaufschance",
  'LBL_OW_ACCOUNTNAME' => "Firma",
  'LBL_OW_REVENUE' => "Betrag",
  'LBL_OW_WEIGHTED' => "Gewichteter Betrag",
  'LBL_OW_MODULE_TITLE'=> 'Verkaufschancen Arbeitsblatt',
  'LBL_OW_PROBABILITY'=>'Wahrscheinlichkeit',
  'LBL_OW_NEXT_STEP'=>'Nächster Schritt',
  'LBL_OW_DESCRIPTION'=>'Beschreibung',
  'LBL_OW_TYPE'=>'Typ:',

    'LNK_NEW_TIMEPERIOD' => 'Zeitraum erstellen',
  'LNK_TIMEPERIOD_LIST' => 'Zeiträume',
  
    'LBL_SVFS_FORECASTDATE' => 'Startdatum terminieren',
  'LBL_SVFS_STATUS' => 'Status',
  'LBL_SVFS_USER' => 'Für',
  'LBL_SVFS_CASCADE' => 'Auf Berichte kaskardieren?',
  'LBL_SVFS_HEADER' => 'Prognoseplan:',
  
     'LB_FS_KEY' => 'ID',
   'LBL_FS_TIMEPERIOD_ID' => 'Zeitraum ID',
   'LBL_FS_USER_ID' => 'User ID',
   'LBL_FS_TIMEPERIOD' => 'Zeitraum',   
   'LBL_FS_START_DATE' => 'Startdatum',
   'LBL_FS_END_DATE' => 'Enddatum',
   'LBL_FS_FORECAST_START_DATE' => "Prognose Startdatum",
   'LBL_FS_STATUS' => 'Status',
   'LBL_FS_FORECAST_FOR' => 'Zeitplan für:',
   'LBL_FS_CASCADE' =>'Kaskardieren?',  
   'LBL_FS_MODULE_NAME' => 'Prognoseplan',
   'LBL_FS_CREATED_BY' =>'Erstellt von:',
   'LBL_FS_DATE_ENTERED' => 'Datum erstellt',
   'LBL_FS_DATE_MODIFIED' => 'Geändert am',
   'LBL_FS_DELETED' => 'Gelöscht',
    
    'LBL_FDR_USER_NAME'=>'Direktbericht',
  'LBL_FDR_OPPORTUNITIES'=>'Verkaufschancen in Prognose:',
  'LBL_FDR_WEIGH'=>'Gewichteter Betrag der Verkaufschancen:',
  'LBL_FDR_COMMIT'=>'Festgelegter Betrag',
  'LBL_FDR_DATE_COMMIT'=>'Festlegungsdatum',
  
    'LBL_DV_HEADER' => 'Prognosen: Arbeitsblatt',
  'LBL_DV_MY_FORECASTS' => 'Meine Prognosen',
  'LBL_DV_MY_TEAM' => "Meine Team Prognosen" ,
  'LBL_DV_TIMEPERIODS' => 'Zeiträume:',
  'LBL_DV_FORECAST_PERIOD' => 'Prognosezeitraum',
  'LBL_DV_FORECAST_OPPORTUNITY' => 'Prognose Verkaufschancen',
  'LBL_SEARCH' => 'Auswählen',
  'LBL_SEARCH_LABEL' => 'Auswählen',
  'LBL_COMMIT_HEADER' => 'Prognose Festlegung',
  'LBL_DV_LAST_COMMIT_DATE' =>'Letztes Verpflichtungsdatum:',
  'LBL_DV_LAST_COMMIT_AMOUNT' =>'Letzten festgelegten Beträge:',
  'LBL_DV_FORECAST_ROLLUP' => 'Rollup Prognose',
  'LBL_DV_TIMEPERIOD' => 'Zeitraum:',
  'LBL_DV_TIMPERIOD_DATES' => 'Datumsbereich:',
  
    'LBL_LV_TIMPERIOD'=> 'Zeitraum',
  'LBL_LV_TIMPERIOD_START_DATE'=> 'Startdatum',
  'LBL_LV_TIMPERIOD_END_DATE'=> 'Enddatum',
  'LBL_LV_TYPE'=> 'Prognosetyp',
  'LBL_LV_COMMIT_DATE'=> 'Festgelegtes Datum',  
  'LBL_LV_OPPORTUNITIES'=> 'Verkaufschancen',
  'LBL_LV_WEIGH'=> 'Gewichteter Betrag',
  'LBL_LV_COMMIT'=> 'Festgelegter Betrag',
  
  'LBL_COMMIT_NOTE'=> 'Geben Sie Beträge ein, für die Sie sich im gewählten Zeitraum festlegen:',
  
  'LBL_COMMIT_MESSAGE'=> 'Wollen Sie sich für diese Beträge festlegen?',
  'ERR_FORECAST_AMOUNT' => 'Der festgelegte Betrag wird benötigt und muss eine Zahl sein.',

    'LBL_FC_START_DATE' => 'Startdatum',
  'LBL_FC_USER' => 'Zeitplan für',
  
  'LBL_NO_ACTIVE_TIMEPERIOD'=>'Keine aktiven Zeiträume für Prognostizierung.',
  'LBL_FDR_ADJ_AMOUNT'=>'Angepasster Betrag',
  'LBL_SAVE_WOKSHEET'=>'Arbeitsblatt speichern',
  'LBL_RESET_WOKSHEET'=>'Arbeitsblatt zurücksetzen',
  'LBL_SHOW_CHART'=>'Chart anzeigen',
  'LBL_RESET_CHECK'=>'Alle Arbeitsblattdaten für den gewählten Zeitraum und den angemeldeten Benutzer werden entfernt. Fortsetzen?',
  
  'LB_FS_LIKELY_CASE'=>'Wahrscheinlicher Fall',
  'LB_FS_WORST_CASE'=>'Schlechtester Fall',
  'LB_FS_BEST_CASE'=>'Bester Fall',
  'LBL_FDR_WK_LIKELY_CASE'=>'Gesch. wahrsch. Fall',
  'LBL_FDR_WK_BEST_CASE'=> 'Gesch. bester Fall',
  'LBL_FDR_WK_WORST_CASE'=>'Gesch. schlechtester Fall',
  'LBL_BEST_CASE'=>'Bester Fall:',
  'LBL_LIKELY_CASE'=>'Wahrscheinlicher Fall:',
  'LBL_WORST_CASE'=>'Schlechtester Fall:',
  'LBL_FDR_C_BEST_CASE'=>'Bester Fall',
  'LBL_FDR_C_WORST_CASE'=>'Schlechtester Fall',
  'LBL_FDR_C_LIKELY_CASE'=>'Wahrscheinlicher Fall',
  'LBL_QC_LAST_BEST_CASE'=>'Letzter festgelegter Betrag (Bester Fall):',
  'LBL_QC_LAST_LIKELY_CASE'=>'Letzter festgelegter Betrag (Wahrscheinlicher Fall):',
  'LBL_QC_LAST_WORST_CASE'=>'Letzter festgelegter Betrag (Schechtester Fall):',
  'LBL_QC_ROLL_BEST_VALUE'=>'Rollup festgelegter Betrag (Bester Fall):',
  'LBL_QC_ROLL_LIKELY_VALUE'=>'Rollup festgelegter Betrag (Wahrscheinlicher Fall):',
  'LBL_QC_ROLL_WORST_VALUE'=>'Rollup festgelegter Betrag (Schechtester Fall):',  
  'LBL_QC_COMMIT_BEST_CASE'=>'Festgelegter Betrag (Bester Fall):',
  'LBL_QC_COMMIT_LIKELY_CASE'=>'Festgelegter Betrag (Wahrscheinlicher Fall):',
  'LBL_QC_COMMIT_WORST_CASE'=>'Festgelegter Betrag (Schlechtester Fall):',
  
  'LBL_FORECAST_FOR'=>'Prognose Arbeitsblatt für:',
  'LBL_FMT_ROLLUP_FORECAST'=>'(Rollup)',
  'LBL_FMT_DIRECT_FORECAST'=>'(Direkt)',

    'LBL_GRAPH_TITLE'=>'Prognose Verlauf',
  'LBL_GRAPH_QUOTA_ALTTEXT'=>'Vorgabe für %s',
  'LBL_GRAPH_COMMIT_ALTTEXT'=>'Festgelegter Betrag für %s',
  'LBL_GRAPH_OPPS_ALTTEXT'=>'Wert der Verkaufschancen abgeschlossen in %s',

  'LBL_GRAPH_QUOTA_LEGEND'=>'Vorgabe',
  'LBL_GRAPH_COMMIT_LEGEND'=>'Festgelegte Prognose',
  'LBL_GRAPH_OPPS_LEGEND'=>'Abgeschlossene Verkaufschancen',
  'LBL_TP_QUOTA'=>'Vorgabe:',
  'LBL_CHART_FOOTER'=>'Prognose Verlauf<br/>Vorgabe vs prognostizierter Betrag vs Wert abgeschlossener Verkaufschancen',
  'LBL_TOTAL_VALUE'=>'Summen:',
  'LBL_COPY_AMOUNT'=>'Gesamtsumme',
  'LBL_COPY_WEIGH_AMOUNT'=>'Gewichtete Summe',
  'LBL_WORKSHEET_AMOUNT'=>'Gesamtsumme geschätzt',
  'LBL_COPY'=>'Werte kopieren',  
  'LBL_COMMIT_AMOUNT'=>'Summe festgelegter Werte.',
  'LBL_COPY_FROM'=>'Wert kopieren von:',
    
  'LBL_CHART_TITLE'=>'Vorgabe vs. Festgelegt vs. Tatsächlich',
);


?>
