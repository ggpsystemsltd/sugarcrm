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







	
$mod_strings = array (
  'MSG_DUPLICATE' => 'Det salget du er i ferd med å opprette kan være en kopi av et salg som allerede eksisterer. Salg som inneholder lignende navn er listet nedenfor.
Klikk Lagre for å fortsette å lagre det nye salg, eller klikk Avbryt for å gå tilbake til modulen uten å lagre salget.',
  'ERR_DELETE_RECORD' => 'Du må oppgi postens nummer for å slette salget.',
  'LBL_TOP_SALES' => 'Mine topp åpne salg',
  'NTC_REMOVE_OPP_CONFIRMATION' => 'Er du sikker på at du vil fjerne denne kontakten fra det valgte salget?',
  'SALE_REMOVE_PROJECT_CONFIRM' => 'Er du sikker på at du vil fjerne dette salget fra prosjektet?',
  'LBL_RAW_AMOUNT' => 'Råbeløp',
  'LBL_MY_CLOSED_SALES' => 'Mine stengte salg',
  'LBL_TOTAL_SALES' => 'Totale salg',
  'LBL_CLOSED_WON_SALES' => 'Lukkete vunnete salg',
  'LBL_SALE_INFORMATION' => 'Salgsinformasjon',
  'LBL_TEAM_ID' => 'Team ID',
  
  
  
  
  'LBL_TYPE' => 'Type:',
  'LBL_LEADS_SUBPANEL_TITLE' => 'Leads',
  'LBL_MODULE_NAME' => 'Salg',
  'LBL_MODULE_TITLE' => 'Salg: Hjem',
  'LBL_SEARCH_FORM_TITLE' => 'Salg søk',
  'LBL_VIEW_FORM_TITLE' => 'Salg vis',
  'LBL_LIST_FORM_TITLE' => 'Salgsliste',
  'LBL_SALE_NAME' => 'Salgsnavn:',
  'LBL_SALE' => 'Salg:',
  'LBL_NAME' => 'Salgsnavn',
  'LBL_LIST_SALE_NAME' => 'Navn',
  'LBL_LIST_ACCOUNT_NAME' => 'Bedrift navn',
  'LBL_LIST_AMOUNT' => 'Beløp',
  'LBL_LIST_DATE_CLOSED' => 'Lukk',
  'LBL_LIST_SALE_STAGE' => 'Salgsfase',
  'LBL_ACCOUNT_ID' => 'Bedrift ID',
  'LBL_CURRENCY_ID' => 'Valuta ID',
  'UPDATE' => 'Salg - valutaoppdatering',
  'UPDATE_DOLLARAMOUNTS' => 'Oppdater U.S. Dollar-beløp',
  'UPDATE_VERIFY' => 'Bekreft beløp',
  'UPDATE_VERIFY_TXT' => 'Bekrefter at beløpsverdiene i salg er gyldige desimaltall med bare numeriske tegn (0-9) og desimaler (.)',
  'UPDATE_FIX' => 'Fastsette beløp',
  'UPDATE_FIX_TXT' => 'Forsøk på å fikse eventuelle ugyldige beløp ved å opprette en gyldig desimal fra nåværende beløp. Enhver endring av beløpet blir sikkerhetskopiert i "amount_backup" databasfeltet. Hvis du kjører dette og merker bugs, ikke kjør det uten gjenoppretting fra sikkerhetskopien siden det kan overskrive  backup med nye ugyldige data.',
  'UPDATE_DOLLARAMOUNTS_TXT' => 'Oppdater US Dollar beløp for salg basert på gjeldende valutakurser. Denne verdien brukes til å beregne grafer og listevisning av Valutabeløp.',
  'UPDATE_CREATE_CURRENCY' => 'Oppretter ny valuta:',
  'UPDATE_VERIFY_FAIL' => 'Registerkontrollen mislyktes:',
  'UPDATE_VERIFY_CURAMOUNT' => 'Nåværende beløp:',
  'UPDATE_VERIFY_FIX' => 'Kjøre fastsettelsen ville gi',
  'UPDATE_INCLUDE_CLOSE' => 'Inkluderer lukkede poster',
  'UPDATE_VERIFY_NEWAMOUNT' => 'Nytt beløp:',
  'UPDATE_VERIFY_NEWCURRENCY' => 'Ny valuta:',
  'UPDATE_DONE' => 'Ferdig',
  'UPDATE_BUG_COUNT' => 'Bug ble funnet og prøvd løst:',
  'UPDATE_BUGFOUND_COUNT' => 'Bug funnet:',
  'UPDATE_COUNT' => 'Poster ble oppdatert:',
  'UPDATE_RESTORE_COUNT' => 'Registrert beløp ble gjenopprettet:',
  'UPDATE_RESTORE' => 'Gjenopprett beløp',
  'UPDATE_RESTORE_TXT' => 'Gjenoppretter beløpsverdier fra sikkerhetskopier opprettet under reparasjon.',
  'UPDATE_FAIL' => 'Kunne ikke oppdatere -',
  'UPDATE_NULL_VALUE' => 'Beløpet er NULL som gir 0 -',
  'UPDATE_MERGE' => 'Flett valutaer',
  'UPDATE_MERGE_TXT' => 'Flett flere valutaer i en enkelt valuta. Hvis det er flere valutaposter for samme valuta, fletter du dem sammen. Dette vil også flette valutaene for alle andre moduler.',
  'LBL_ACCOUNT_NAME' => 'Bedriftnavn:',
  'LBL_AMOUNT' => 'Beløp:',
  'LBL_AMOUNT_USDOLLAR' => 'Beløp USD:',
  'LBL_CURRENCY' => 'Valuta:',
  'LBL_DATE_CLOSED' => 'Forventet avslutningsdato:',
  'LBL_CAMPAIGN' => 'Kampanje:',
  'LBL_PROJECTS_SUBPANEL_TITLE' => 'Prosjekter',
  'LBL_NEXT_STEP' => 'Neste skritt:',
  'LBL_LEAD_SOURCE' => 'Lead-kilde:',
  'LBL_SALES_STAGE' => 'Salgsfase:',
  'LBL_PROBABILITY' => 'Sannsynlighet (%):',
  'LBL_DESCRIPTION' => 'Beskrivelse:',
  'LBL_DUPLICATE' => 'Mulig dobbelt tilbud',
  'LBL_NEW_FORM_TITLE' => 'Opprett salg',
  'LNK_NEW_SALE' => 'Opprett salg',
  'LNK_SALE_LIST' => 'Salg',
  'LBL_DEFAULT_SUBPANEL_TITLE' => 'Salg',
  'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Aktiviteter',
  'LBL_HISTORY_SUBPANEL_TITLE' => 'Historikk',
  'LBL_CONTACTS_SUBPANEL_TITLE' => 'Kontakter',
  'LBL_ASSIGNED_TO_NAME' => 'Bruker:',
  'LBL_LIST_ASSIGNED_TO_NAME' => 'Tildelt bruker',
  'LBL_ASSIGNED_TO_ID' => 'Tildelt til ID:',
  'LBL_CREATED_ID' => 'Opprettet av ID',
  'LBL_MODIFIED_ID' => 'Endret av ID',
  'LBL_MODIFIED_NAME' => 'Endret av brukernavn',
  'LBL_CURRENCY_NAME' => 'Valutaens navn',
  'LBL_CURRENCY_SYMBOL' => 'Valutategn',
);

