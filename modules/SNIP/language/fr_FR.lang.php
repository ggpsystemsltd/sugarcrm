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

	

$mod_strings = array (
  'LBL_SNIP_SUMMARY' => 'Sugar Ease est un service d&#39;import automatique des emails qui permet aux utilisateurs d&#39;importer des emails dans SugarCRM simplement en les envoyant depuis n&#39;importe quel client mail vers un adresse email gérée par SugarCRM. Chaque instance SugarCRM possède une et une seule boite mail Sugar Ease. Pour importer des emails, les utilisateurs doivent envoyer un email à cette adresse email Sugar Ease en utilisant l&#39;un des champs TO, CC ou BCC. Le service Sugar Ease importera automatiquement cet email dans l&#39;instance SugarCRM. Le service importe l&#39;email avec ses pièces jointes, ses images, les évènements de type Calendrier dans SugarCRM en le liant aux enregistrements ayant comme email l&#39;un des destinataire de l&#39;email original.<br /><br /><br /><br />Exemple :  En tant qu&#39;utilisateur, quand je visionne un compte, je vais être capable de voir l&#39;historique de tous les emails qui sont associés a ce compte en se basant sur l&#39;adresse email renseignée dans la fiche compte. Je vais aussi être capable de voir l&#39;historique des emails qui sont associés à des contacts liés a ce compte.<br /><br /><br /><br />Acceptez les termes ci-dessous et cliquez sur Activer pour commencer à utiliser le service. Vous serez en mesure de désactiver le service à tout moment. Une fois le service activé, l&#39;adresse email à utiliser pour le service sera affichée.',
  'LBL_REGISTER_SNIP_FAIL' => 'Echec lors de la tentative d&#39;accès au service Sugar Ease : %s !',
  'LBL_CONFIGURE_SNIP' => 'Sugar Ease',
  'LBL_DISABLE_SNIP' => 'Désactiver',
  'LBL_SNIP_APPLICATION_UNIQUE_KEY' => 'Clé unique de l&#39;application',
  'LBL_SNIP_USER' => 'Utilisateur Sugar Ease',
  'LBL_SNIP_PWD' => 'Mot de passe Sugar Ease',
  'LBL_SNIP_SUGAR_URL' => 'URL de l&#39;instance SugarCRM actuelle',
  'LBL_SNIP_CALLBACK_URL' => 'URL du service Sugar Ease',
  'LBL_SNIP_USER_DESC' => 'Utilisateur d&#39;archivage Sugar Ease',
  'LBL_SNIP_STATUS_OK' => 'Activé',
  'LBL_SNIP_STATUS_OK_SUMMARY' => 'Cette instance SugarCRM s&#39;est connecté avec succès au serveur Sugar Ease.',
  'LBL_SNIP_STATUS_ERROR' => 'Erreur',
  'LBL_SNIP_STATUS_ERROR_SUMMARY' => 'Cette instance a une licence Sugar Ease valide, cependant le serveur a retourné le message d&#39;erreur suivant :',
  'LBL_SNIP_STATUS_FAIL' => 'Impossible de s&#39;enregistrer auprès du serveur Sugar Ease',
  'LBL_SNIP_STATUS_FAIL_SUMMARY' => 'Le service Sugar Ease est actuellement inaccessible. Le service peut actuellement arrête ou la connexion réseau de cette instance SugarCRM est défectueuse.',
  'LBL_SNIP_GENERIC_ERROR' => 'Le service Sugar Ease est actuellement inaccessible. Le service peut actuellement arrête ou la connexion réseau de cette instance SugarCRM est défectueuse.',
  'LBL_SNIP_STATUS_RESET' => 'Non démarré',
  'LBL_SNIP_STATUS_PROBLEM' => 'Problème : %s',
  'LBL_SNIP_NEVER' => 'Jamais',
  'LBL_SNIP_STATUS_SUMMARY' => 'Statut de l&#39;archivage Sugar Ease :',
  'LBL_SNIP_ACCOUNT' => 'Compte',
  'LBL_SNIP_STATUS' => 'Statut',
  'LBL_SNIP_LAST_SUCCESS' => 'Dernière exécution réussie',
  'LBL_SNIP_DESCRIPTION' => 'Sugar Ease est un service d&#39;archivage automatique des emails',
  'LBL_SNIP_DESCRIPTION_SUMMARY' => 'Il vous permet de voir les emails qui ont été envoyés vers ou à partir de vos contacts à l&#39;intérieur de SugarCRM, sans avoir à importer manuellement ces emails et de les liées à vos données',
  'LBL_SNIP_PURCHASE_SUMMARY' => 'Afin d&#39;utiliser Sugar Ease, vous devez acheter une licence pour votre instance SugarCRM',
  'LBL_SNIP_PURCHASE' => 'Cliquez ici pour acheter',
  'LBL_SNIP_EMAIL' => 'Email Sugar Ease',
  'LBL_SNIP_AGREE' => 'J&#39;accepte les termes ci-dessus et l&#39;<a href="http://www.sugarcrm.com/crm/TRUSTe/privacy.html" target="_blank">accord de confidentialité</a>.',
  'LBL_SNIP_PRIVACY' => 'accord de confidentialité',
  'LBL_SNIP_STATUS_PINGBACK_FAIL' => 'Echec du pingback',
  'LBL_SNIP_STATUS_PINGBACK_FAIL_SUMMARY' => 'Le serveur Sugar Ease ne peut pas établir de connexion avec votre instance de SugarCRM. Veuillez réessayer ou <a href="http://www.sugarcrm.com/crm/case-tracker/submit.html?lsd=supportportal&tmpl=" target="_blank">contacter le support client</a>',
  'LBL_SNIP_BUTTON_ENABLE' => 'Activer Sugar Ease',
  'LBL_SNIP_BUTTON_DISABLE' => 'Désactiver Sugar Ease',
  'LBL_SNIP_BUTTON_RETRY' => 'Tenter une nouvelle connexion',
  'LBL_SNIP_ERROR_DISABLING' => 'Une erreur s&#39;est produite en essayant de communiquer avec le serveur Sugar Ease, et le service n&#39;a pas été désactivé',
  'LBL_SNIP_ERROR_ENABLING' => 'Une erreur s&#39;est produite en essayant de communiquer avec le serveur Sugar Ease, et le service n&#39;a pas été activé',
  'LBL_CONTACT_SUPPORT' => 'Veuillez réessayer ou contacter le support SugarCRM',
  'LBL_SNIP_SUPPORT' => 'Veuillez contacter le support SugarCRM pour obtenir de l&#39;assistance',
  'ERROR_BAD_RESULT' => 'Un mauvais résultat a été retourné par le service.',
  'ERROR_NO_CURL' => 'L&#39;extension PHP cURL est requise pour ce service mais elle n&#39;est apparemment pas disponible sur votre hébergement.',
  'ERROR_REQUEST_FAILED' => 'Impossible de contacter le serveur',
  'LBL_CANCEL_BUTTON_TITLE' => 'Annuler',
  'LBL_SNIP_MOUSEOVER_STATUS' => 'Ceci est le statut du service Sugar Ease pour votre instance. Ce statut indique si la connexion est active entre le serveur Sugar Ease et votre instance de SugarCRM.',
  'LBL_SNIP_MOUSEOVER_EMAIL' => 'Ceci est l&#39;adresse email Sugar Ease a utiliser dans les champs CC, BC ou BSS afin d&#39;importer automatiquement vos emails dans SugarCRM.',
  'LBL_SNIP_MOUSEOVER_SERVICE_URL' => 'Ceci est l&#39;URL du serveur Sugar Ease. Toutes les opérations comme l&#39;activation ou la désactivation du service Sugar Ease utilisent cette URL.',
  'LBL_SNIP_MOUSEOVER_INSTANCE_URL' => 'Ceci est l&#39;URL d&#39;accès aux Web Services de votre instance SugarCRM. Le serveur Sugar Ease communique avec votre serveur au travers de cette URL.',
);