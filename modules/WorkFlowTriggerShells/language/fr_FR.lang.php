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
	'LBL_MODULE_NAME'										=> 'Conditions',
	'LBL_MODULE_TITLE'										=> 'Déclencheurs de Workflow',
	'LBL_MODULE_SECTION_TITLE'								=> 'Quand ces conditions sont rencontrées',
	'LBL_SEARCH_FORM_TITLE'									=> 'Rechercher',
	'LBL_LIST_FORM_TITLE'									=> 'Liste des Déclencheurs',
	'LBL_NEW_FORM_TITLE'									=> 'Créer un Déclencheur',
	'LBL_LIST_NAME'											=> 'Description:',
	'LBL_LIST_VALUE'										=> 'Valeur:',
	'LBL_LIST_TYPE'											=> 'Type:',
	'LBL_LIST_EVAL'											=> 'Eval:',
	'LBL_LIST_FIELD'										=> 'Champ:',
	'LBL_NAME'												=> 'Nom du Déclencheur:',
	'LBL_TYPE'												=> 'Type:',
	'LBL_EVAL'												=> 'Evaluation du Déclencheur:',
	'LBL_SHOW_PAST'											=> 'Modifier Ancienne Valeur:',
	'LBL_SHOW'												=> 'Voir',
	'LNK_NEW_TRIGGER'										=> 'Créer un Déclencheur',
	'LNK_TRIGGER'											=> 'Déclencheurs de Workflow ',
	'LBL_LIST_STATEMEMT'									=> 'Déclencher un évenement basé sur: ',
	'LBL_FILTER_LIST_STATEMEMT'								=> 'Filtrer les objets basés sur: ',
	'NTC_REMOVE_TRIGGER'									=> 'Etes vous sûr de vouloir supprimer ce déclencheur?',
	'LNK_NEW_WORKFLOW'										=> 'Créer un Workflow',
	'LNK_WORKFLOW'											=> 'Objets du Workflow',
	'LBL_ALERT_TEMPLATES'									=> 'Modèles d&#39;Alerte',
	'LBL_TRIGGER'											=> 'Quand',
	'LBL_FIELD'												=> 'champ',
	'LBL_VALUE'												=> 'valeur',
	'LBL_RECORD'											=> 'choix du module',
	'LBL_COMPARE_SPECIFIC_TITLE'							=> 'Quand un champ du module cible est modifié pour ou vers une valeur spécifiée',
	'LBL_COMPARE_SPECIFIC_PART'								=> 'est modifié pour ou vers une valeur spécifiée',
	'LBL_COMPARE_SPECIFIC_PART_TIME'						=> ' ',
	'LBL_COMPARE_CHANGE_TITLE'								=> 'Quand un champ du module cible est modifié',
	'LBL_COMPARE_CHANGE_PART'								=> 'est modifié',
	'LBL_COMPARE_COUNT_TITLE'								=> 'Déclencheur sur calcul sécifique',
	'LBL_COMPARE_ANY_TIME_TITLE'							=> 'Le champ n&#39;est pas modifié pour une durée spécifiée',
	'LBL_COMPARE_ANY_TIME_PART2'							=> 'ne change pas pour ',
	'LBL_COMPARE_ANY_TIME_PART3'							=> 'une durée spécifiée',
	'LBL_FILTER_FIELD_TITLE'								=> 'Quand un champ du module cible contient une valeur spécifiée',
	'LBL_FILTER_FIELD_PART1'								=> 'Filtré par ',
	'LBL_FILTER_REL_FIELD_TITLE'							=> 'Quand le module spécifié change et un champ du module associé contient une valeur spécifiée',
	'LBL_FILTER_REL_FIELD_PART1'							=> 'valeur pour le champ du module',
	'LBL_TRIGGER_RECORD_CHANGE_TITLE'						=> 'Quand le module cible change',
	'LBL_FUTURE_TRIGGER'									=> 'Spécifier la nouvelle valeur de ',
	'LBL_PAST_TRIGGER'										=> 'Spécifier l&#39;ancienne valeur de ',
	'LBL_COUNT_TRIGGER1'									=> 'Total',
	'LBL_COUNT_TRIGGER1_2'									=> 'Comparé à cette valeur',
	'LBL_MODULE'											=> 'module',
	'LBL_COUNT_TRIGGER2'									=> 'filtrer par (related)',
	'LBL_COUNT_TRIGGER2_2'									=> 'seulement',
	'LBL_COUNT_TRIGGER3'									=> 'filtrer spécifiquement par',
	'LBL_COUNT_TRIGGER4'									=> 'filtrer par un autre',
	'LBL_NEW_FILTER_BUTTON_KEY'								=> 'F',
	'LBL_NEW_FILTER_BUTTON_TITLE'							=> 'Créer un filtre [Alt+F]',
	'LBL_NEW_FILTER_BUTTON_LABEL'							=> 'Créer un filtre',
	'LBL_NEW_TRIGGER_BUTTON_KEY'							=> 'T',
	'LBL_NEW_TRIGGER_BUTTON_TITLE'							=> 'Créer un Trigger [Alt+T]',
	'LBL_NEW_TRIGGER_BUTTON_LABEL'							=> 'Créer un Déclencheur',
	'LBL_LIST_FRAME_SEC'									=> 'Filtre: ',
	'LBL_LIST_FRAME_PRI'									=> 'Déclencheur: ',
	'LBL_TRIGGER_FILTER_TITLE'								=> 'Filtres Déclencheurs',
	'LBL_TRIGGER_FORM_TITLE'								=> 'Définir la condition pour l&#39;exécution du Workflow',
	'LBL_FILTER_FORM_TITLE'									=> 'Définir une condition de Workflow',
	'LBL_SPECIFIC_FIELD'									=> 'champ spécifique',
	'LBL_APOSTROPHE_S'										=> 's ',
	'LBL_WHEN_VALUE1'										=> 'Lorsque la valeur du champ est ',
	'LBL_WHEN_VALUE2'										=> 'Lorsque la valeur est  ',
	'LBL_SELECT_OPTION'										=> 'Merci de choisir une option.',
	'LBL_SELECT_TARGET_FIELD'								=> 'Merci de sélectionner un champ cible.',
	'LBL_SELECT_TARGET_MOD'									=> 'Merci de sélectionner un module lié cible.',
	'LBL_SPECIFIC_FIELD_LNK'								=> 'Champ spécifique',
	'LBL_MUST_SELECT_VALUE'									=> 'Vous devez choisir une valeur pour ce champ',
	'LBL_SELECT_AMOUNT'										=> 'Vous devez choisir le montant',
	'LBL_SELECT_1ST_FILTER'									=> 'Le champ du premier filtre doit être valide',
	'LBL_SELECT_2ND_FILTER'									=> 'Le champ du deuxieme filtre doit être valide'
);

$mod_process_order_strings = array(

	'compare_specific'										=> array('1','2','3'),
	'compare_change'										=> array('1','2','3'),
	'compare_count'											=> array('1','2','3')

);

?>