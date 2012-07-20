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




$mod_strings= array (
'LBL_MODULE_NAME'                                  => 'Gruppemeldinger',
'LBL_MODULE_TITLE'                                 => 'Gruppemeldinger: Hjem',
'LBL_SEARCH_FORM_TITLE'                            => 'Søk gruppemeldinger',
'LBL_LIST_FORM_TITLE'                              => 'Liste over gruppemeldinger',
'LBL_PRODUCTTYPE'                                  => 'Gruppemelding',
'LBL_NOTICES'                                      => 'Gruppemeldinger',
'LBL_LIST_NAME'                                    => 'Tittel',
'LBL_URL'                                          => 'URL',
'LBL_URL_TITLE'                                    => 'URL-tittel',
'LBL_LIST_DESCRIPTION'                             => 'Beskrivelse',
'LBL_NAME'                                         => 'Tittel',
'LBL_DESCRIPTION'                                  => 'Beskrivelse',
'LBL_LIST_LIST_ORDER'                              => 'Ordre',
'LBL_LIST_ORDER'                                   => 'Ordre',
'LBL_DATE_START'                                   => 'Startdato',
'LBL_DATE_END'                                     => 'Sluttdato',
'LBL_STATUS'                                       => 'Status',
'LNK_NEW_TEAM'                                     => 'Opprett gruppe',
'LNK_NEW_TEAM_NOTICE'                              => 'Opprett gruppemeldinger',
'LNK_LIST_TEAM'                                    => 'Grupper',
'LNK_LIST_TEAMNOTICE'                              => 'Gruppemeldinger',
'LNK_PRODUCT_LIST'                                 => 'Produktprisliste',
'LNK_NEW_PRODUCT'                                  => 'Opprett produkt',
'LNK_NEW_MANUFACTURER'                             => 'Produsenter',
'LNK_NEW_SHIPPER'                                  => 'Avsenderleverandører',
'LNK_NEW_PRODUCT_CATEGORY'                         => 'Produktkategorier',
'LNK_NEW_PRODUCT_TYPE'                             => 'Produkttypeliste',
'NTC_DELETE_CONFIRMATION'                          => 'Er du sikker på at du vil slette denne oppføringen?',
'ERR_DELETE_RECORD'                                => 'Du må oppgi et registernummer for å slette denne produkttypen.',
'NTC_LIST_ORDER'                                   => 'Velg rekkefølgen for hvordan denne typen skal vises i Produkttype-rullelisten. ',
'LBL_TEAM_NOTICE_FEATURES'                         => 'Features: * Forbedret brukergrensesnitt og ny veiviser kombinerer et enkelt, intuitivt design med en prosessguid  som hjelper brukeren gjennom opprettelse av rapport.* Komplekse rapporteringssett tillater brukere å opprette rapporter på tvers av flere moduler ved bruk av kompleks logikk. Matriserapporter gir muligheten til å gruppere med flere attributter i et fleksibelt grid-oppsett. Brukere kan opprette komplekse pivottabeller med evnen til å vise operasjoner som for eksempel sum, gjennomsnitt, antall og prosent. * Run- Time Filtere tillater brukere å endre attributtene til en rapport i real-time.',
'LBL_TEAM_NOTICE_WIRELESS'                         => 'Ny mobil visning for programmet SugarCRM bryter konflikten mellom anvendelighet og mobilitet. Features:* Forbedret brukergrensesnitt gir brukere utsikt til redigering, detaljer, listevisninger og beslektede poster, så vel som tilgang på ansattkataloger, lagring av preferanser, og visninger av siste elementer.* Enhets uavhengighet tillater brukere å vise SugarCRM data fra PDA eller smart phone, inkludert Blackberry og iPhone. Rich HTML Client leverer ren presentasjon av SugarCRM data via en standard nettleser. *Nye søkermuligheter gjør det mulig for brukerne å raskt finne informasjon.',
'LBL_TEAM_NOTICE_DATA_IMPORT'                      => 'Ekstrautstyr for importering av data gjør det enda lettere å flytte data fra programmer som Excel, Act!, Microsoft Outlook, og Salesforce.com inn til SugarCRM. Enhancements: * Forbedret brukergrensesnitt for mapping gir flere alternativer for å sikre at dataoverføringen skjer jevnt og presist inn i SugarCRM. Kontroller av datakvaliteten tillater administrator å spesifisere om dataimporteringen skal opprette nye poster, eller oppdatere eksisterende poster ved å duplisere informasjon.* Import til alle moduler gir muligheten til å hente informasjon fra andre CRM programmer inn til en annen modul, ved å redusere data re-entry.',
'LBL_TEAM_NOTICE_MODULE_BUILDER'                   => 'Modul bygger tillater deg å utvide SugarCRM på nye og innovative måter. Enhancements: *Nye forbindelser tillater nye og eksisterende moduler å bli relatert på nye måter. Revisjon gir en fullstendig historie av moduloppretting og modifikasjoner for å holde rede på tilpasninger.* Dashlet Support tillater  selvvalgt objekt og modulfunksjonalitet å bli vist i AJAX containere på hjemmesiden. *Nye maler gir muligheten til å lettere spore filer og informasjon.',
'LBL_TEAM_NOTICE_TRACKER'                          => 'Tracker gir nå en utvidet utsikt inn til SugarCRM bruk og ytelse. Features: * Trackerrapporter gir "snapshot" inn i systembruk for å øke brukeradopsjon og synlighet i CRM- utnyttelsen. Brukere kan se rapporter på ukentlige CRM aktiviteter, poster og viste moduler, samt kumulative innloggingstider og online- statuser til andre medlemmer. * Systemovervåkning gir administratorer informasjon om hvordan systemet blit tatt i brukt og potensielle stresspunkter for programmet.',


'dom_status' => array(
'Visible'                                          => 'Synlig',
'Hidden'                                           => 'Skjult',
),
);?>
