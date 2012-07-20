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
  'LBL_EDIT_LAYOUT' => 'Editar disseny',
  'LBL_EDIT_ROWS' => 'Editar Files',
  'LBL_EDIT_COLUMNS' => 'Editar Columnes',
  'LBL_EDIT_LABELS' => 'Editar Etiquetes',
  'LBL_EDIT_FIELDS' => 'Editar Camps Personalitzats',
  'LBL_ADD_FIELDS' => 'Agregar Camps Personalitzat',
  'LBL_DISPLAY_HTML' => 'Mostrar Còdig HTML',
  'LBL_SELECT_FILE' => 'Seleccionar Arxiu',
  'LBL_SAVE_LAYOUT' => 'Guardar Disseny',
  'LBL_SELECT_A_SUBPANEL' => 'Seleccionar un Subpanell',
  'LBL_SELECT_SUBPANEL' => 'Seleccionar Subpanell',
  'LBL_MODULE_TITLE' => 'Estudi',
  'LBL_TOOLBOX' => 'Caixa d´Eines',
  'LBL_STAGING_AREA' => 'Àrea de Disseny (arrossegui i deixi anar elements aquí)',
  'LBL_SUGAR_FIELDS_STAGE' => 'Camps Sugar (faci clic en els elements per agregar-los a l´àrea de disseny)',
  'LBL_SUGAR_BIN_STAGE' => 'Paperera Sugar (faci clic en els elements per agregar-los a l´àrea de disseny)',
  'LBL_VIEW_SUGAR_FIELDS' => 'Veure Camps Sugar',
  'LBL_VIEW_SUGAR_BIN' => 'Veure Paperera Sugar',
  'LBL_FAILED_TO_SAVE' => 'Error al Guardar',
  'LBL_CONFIRM_UNSAVE' => 'Els canvis no s´han guardat i es perdran. Està segur de que vol continuar?',
  'LBL_PUBLISHING' => 'Publicant ...',
  'LBL_PUBLISHED' => 'Publicat',
  'LBL_FAILED_PUBLISHED' => 'Error al Publicar',
  'LBL_DROP_HERE' => '[Deixar Anar Aquí]',
  'LBL_NAME' => 'Nom',
  'LBL_LABEL' => 'Etiqueta',
  'LBL_MASS_UPDATE' => 'Actualització Massiva',
  'LBL_AUDITED' => 'Auditat',
  'LBL_CUSTOM_MODULE' => 'Mòdul',
  'LBL_DEFAULT_VALUE' => 'Valor per Defecte',
  'LBL_REQUIRED' => 'Requerit',
  'LBL_DATA_TYPE' => 'Tipus',
  'LBL_HISTORY' => 'Històrial',
  'LBL_SW_WELCOME' => '<h2>Benvingut al Estudi!</h2><br> Què desitja fer avui?<br><b> Si us plau, seleccioni una de les següents opcions.</b>',
  'LBL_SW_EDIT_MODULE' => 'Editar un Mòdul',
  'LBL_SW_EDIT_DROPDOWNS' => 'Editar Llistes Desplegables',
  'LBL_SW_EDIT_TABS' => 'Configurar Pestanyes',
  'LBL_SW_RENAME_TABS' => 'Renombrar Pestanyes',
  'LBL_SW_EDIT_GROUPTABS' => 'Configurar Grups de Pestanyes',
  'LBL_SW_EDIT_PORTAL' => 'Editar Portal',
  'LBL_SW_EDIT_WORKFLOW' => 'Editar Workflow',
  'LBL_SW_REPAIR_CUSTOMFIELDS' => 'Reparar Camps Personalitzats',
  'LBL_SW_MIGRATE_CUSTOMFIELDS' => 'Migrar Camps Personalitzats',
  'LBL_SMW_WELCOME' => '<h2>Benvingut al Estudi!</h2><br><b>Si us plau, seleccioni un dels següents mòduls.',
  'LBL_SMA_WELCOME' => '<h2>Editar un Mòdul</h2>Què dessitja fer amb aquest mòdul?<br><b>Si us plau, seleccioni l´acció que desitja realitzar.',
  'LBL_SMA_EDIT_CUSTOMFIELDS' => 'Editar Camps Personalitzats',
  'LBL_SMA_EDIT_LAYOUT' => 'Editar Disseny',
  'LBL_SMA_EDIT_LABELS' => 'Editar Etiquetes',
  'LBL_MB_PREVIEW' => 'Vista Preliminar',
  'LBL_MB_RESTORE' => 'Restaurar',
  'LBL_MB_DELETE' => 'Esborrar',
  'LBL_MB_COMPARE' => 'Comparar',
  'LBL_MB_WELCOME' => '<h2>Històrial</h2><br> l´Històrial li perment veure edicions publicades anteriorment del fitxer amb el que actualment està treballant. Pot comparar amb i restaurar versions prèvies. Si restaura un arxiu, aquest es convertirà en el seu arxiu de treball. Ho ha de publicar abans que sigui visible per a qualsevol altra persona.<br> Què desitja fer avui?<br><b> Por favor, seleccioni una de les següents opcions.</b>',
  'LBL_ED_CREATE_DROPDOWN' => 'Crea una Llista Desplegable',
  'LBL_ED_WELCOME' => '<h2>Editor de Llistes Desplegables</h2><br><b>Pot editar una llista desplegable existent, o crear una nova.',
  'LBL_DROPDOWN_NAME' => 'Nom de Llista Desplegable:',
  'LBL_DROPDOWN_LANGUAGE' => 'Llenguatge de Llista Desplegable:',
  'LBL_TABGROUP_LANGUAGE' => 'Llenguatge del Grup de Pestanyes:',
  'LBL_EC_WELCOME' => '<h2>Editor de Camps Personalitzats</h2><br><b>Pot veure o editar un camp personalitzat existent, crear un nou camp personalitzat, o netejar la caché de camps personalitzats.',
  'LBL_EC_VIEW_CUSTOMFIELDS' => 'Veure Camps Personalitzats',
  'LBL_EC_CREATE_CUSTOMFIELD' => 'Crear Camp Personalitzat',
  'LBL_EC_CLEAR_CACHE' => 'Netejar Caché',
  'LBL_SM_WELCOME' => '<h2>Històrial</h2><br><b>Si us plau, seleccioni l´arxiu que dessitja visualitzar.</b>',
  'LBL_DD_DISPALYVALUE' => 'Valor de Visualització',
  'LBL_DD_DATABASEVALUE' => 'Valor de Base de dades',
  'LBL_DD_ALL' => 'Tot',
  'LBL_BTN_SAVE' => 'Guardar',
  'LBL_BTN_CANCEL' => 'Cancel·lar',
  'LBL_BTN_SAVEPUBLISH' => 'Guardar i Publicar',
  'LBL_BTN_HISTORY' => 'Històrial',
  'LBL_BTN_NEXT' => 'Següent',
  'LBL_BTN_BACK' => 'Enrere',
  'LBL_BTN_ADDCOLS' => 'Agregar Columnes',
  'LBL_BTN_ADDROWS' => 'Agregar Files',
  'LBL_BTN_UNDO' => 'Desfer',
  'LBL_BTN_REDO' => 'Repetir',
  'LBL_BTN_ADDCUSTOMFIELD' => 'Agregar Camp Personalitzat',
  'LBL_BTN_TABINDEX' => 'Editar Ordre de Pestanyes',
  'LBL_TAB_SUBTABS' => 'Subpestanyes',
  'LBL_MODULES' => 'Mòduls',
  'LBL_MODULE_NAME' => 'Administració',
  'LBL_CONFIGURE_GROUP_TABS' => 'Configurar Grups de Pestanyes',
  'LBL_GROUP_TAB_WELCOME' => 'El disseny dels Grups de Pestanyes s´usarà sempre que un usuari elegeixi utilitzar Grups de Pestanyes en lloc de les Pestanyes de Mòduls habituals en Dc. Compte>Opciones de Presentació.',
  'LBL_RENAME_TAB_WELCOME' => 'Faci clic en el Valor de Visualització de qualsevol pestanya de la següent taula per rebatejar la pestanya.',
  'LBL_DELETE_MODULE' => '&nbsp;Esborrar&nbsp;Mòdul',
  'LBL_DISPLAY_OTHER_TAB_HELP' => 'Seleccioni mostrar la pestanya "Altres" a la barra de navegació. Per defecte, la pestanya "Altres" mostra aquells mòduls qua encara no s&#39;han inclòs en altres grups.',
  'LBL_TAB_GROUP_LANGUAGE_HELP' => 'Per establir les etiquetes dels grups de pestanyes en altre idiomes disponibles, seleccioni un idioma, editi les etiquetes i faci clic a Guardar & Desplegar per a realitzar els canvis per aquest idioma.',
  'LBL_ADD_GROUP' => 'Afegir Grup',
  'LBL_NEW_GROUP' => 'Nou Grup',
  'LBL_RENAME_TABS' => 'Renombrar Pestanyes',
  'LBL_DISPLAY_OTHER_TAB' => 'Mostrar Pestanya &#39;Altres&#39;',
  'LBL_DEFAULT' => 'Per defecte',
  'LBL_ADDITIONAL' => 'Addicional',
  'LBL_AVAILABLE' => 'Disponible',
  'LBL_LISTVIEW_DESCRIPTION' => 'A continuació es mostren tres columnes. La columna "Per defecte" conté els camps que es mostren en una llista per defecte, la columna "Addicional" conté camps que un usuari pot elegir a l´hora de crear una vista personalitzada, i la columna "Disponible" mostra columnes disponibles per a vostè com a administrador per a, o bé afegir-les a les columnes per defecte, o a les addicionals perquè siguin usades per usuaris ja que actualment no estan sent utilitzades.',
  'LBL_LISTVIEW_EDIT' => 'Editor de Llistes',
  'ERROR_ALREADY_EXISTS' => 'Error: Camp Existent',
  'ERROR_INVALID_KEY_VALUE' => 'Error: Valor de Clau No vàlid: [&#39;]',
  'LBL_SW_SUGARPORTAL' => 'Portal de Sugar',
  'LBL_SMP_WELCOME' => 'Si us plau, seleccioni el mòdul que desitja editar de la següent llista',
  'LBL_SP_WELCOME' => 'Benvingut a l´Estudi per al Portal de Sugar. Pot elegir editar mòduls aquí, o realitzar una sincronització amb una instància de portal.<br> Si us plau, seleccioni-ho de la següent llista.',
  'LBL_SP_SYNC' => 'Sincronització de Portal',
  'LBL_SYNCP_WELCOME' => 'Si us plau, introdueixi l´URL de la instància de portal que desitja actualitzar i premi Return/Intro.<br> Després d´això, se li demanarà el seu nom i clau de pas.<br> Si us plau, introdueixi el seu nom i clau de pas de Sugar i faci clic al botó Iniciar Sincronització.',
  'LBL_LISTVIEWP_DESCRIPTION' => 'Té dues columnes a continuació: Per defecte, que inclou els camps que es mostraran, i Disponible, que inclou els camps que no es mostraran, però que estan disponibles per ser mostrats. Simplement ha d´arrossegar els camps entre ambdues columnes. També pot canviar l´ordre dels elements en una columna arrossegant-los i deixant-los anar.',
  'LBL_SP_STYLESHEET' => 'Pujar un Full d´Estil',
  'LBL_SP_UPLOADSTYLE' => 'Faci clic al botó d´exploració i seleccioni el full d´estil que desitja pujar del seu ordinador.<br> La pròxima vegada que realitzi una sincronització al portal, s´inclourà el full d´estils.',
  'LBL_SP_UPLOADED' => 'Pujat',
  'ERROR_SP_UPLOADED' => 'Si us plau, asseguri´s que està pujant un full d´estils CSS.',
  'LBL_SP_PREVIEW' => 'Aquí té una presentació preliminar de l´aparença que tindrà el seu full d´estils',
  'LBL_SAVE' => 'Guardar',
  'LBL_UNDO' => 'Desfer',
  'LBL_REDO' => 'Repetir',
  'LBL_INLINE' => 'En línia',
  'LBL_DELETE' => 'Esborrar',
  'LBL_ADD_FIELD' => 'Afegir camp',
  'LBL_MAXIMIZE' => 'Maximitzar',
  'LBL_MINIMIZE' => 'Minimitzar',
  'LBL_PUBLISH' => 'Publicar',
  'LBL_ADDROWS' => 'Afegir files',
  'LBL_ADDFIELD' => 'Afegir camp',
  'LBL_EDIT' => 'Editar',
  'LBL_LANGUAGE_TOOLTIP' => 'Seleccioneu l&#39;idioma que voleu editar.',
  'LBL_SINGULAR' => 'Etiqueta singular',
  'LBL_PLURAL' => 'Etiqueta plural',
  'LBL_RENAME_MOD_SAVE_HELP' => 'Feu clic a <b>Guardar</b> per aplicar els canvis.',
);

