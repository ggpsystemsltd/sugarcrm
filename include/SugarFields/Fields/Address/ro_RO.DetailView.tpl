{*
/*********************************************************************************
 * Conţinutul acestui fişier sunt supuse la subscrierea de vizitare SugarCRM
 * Acord ("licenţă"), care pot fi vizualizate la
 * http://www.sugarcrm.com/crm/products/sugar-enterprise-eula.html
 * Prin instalarea sau folosirea acestui fişier, Tu ai fost de acord să necondiţionat
 * Termenii şi condiţiile de licenţă, si nu puteti folosi acest dosar, cu excepţia cazurilor
 * In care este in conformitate cu licenţa. Potrivit termenilor licenţei, Tu nu vei,
 * : 1) sublicenţia, revinde, chirie, leasing, redistribui, atribuiţi
 * Sau altfel transfera drepturile dvs. de a Software-ului, şi 2) utiliza Software-ul
 * Pentru timesharing sau în scopuri de birou de servicii, cum ar fi ce gazduieste Software pentru
 * Câştig comercial şi / sau în beneficiul unui terţ. Utilizarea Software-ului
 * Pot fi supuse taxelor aplicabile şi orice utilizare a Software-ului fără a
 * Plata taxelor aplicabile este strict interzisă. Nu aveţi dreptul de a
 * Elimina drepturile de autor SugarCRM de codul sursă sau interfaţa cu utilizatorul.
 *
 * Toate exemplarele din Codul Acoperit trebuie să fie inclus pe fiecare ecran de interfaţă a utilizatorului:
 * (I) Realizat "de SugarCRM" şi logo-ul
 * (Ii) dreptul de autor SugarCRM
 * În aceeaşi formă în care apar în distribuţie. A se vedea licenţa completă pentru
 * Cerinţe.
 *
 * Garantia, limitele de răspundere şi despăgubirile sunt declarate în mod expres
 * În licenţă. Vă rugăm să consultaţi licenţa pentru limba specifica
 * Care guvernează aceste drepturi şi limitările sub licenţă. Portiuni create
 * De SugarCRM sunt Copyright (C) 2004-2011 SugarCRM, Inc; Toate drepturile rezervate.
  ********************************************************************************/
*}
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td width='99%' >
{$fields.{{$displayParams.key}}_address_street.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br>
{$fields.{{$displayParams.key}}_address_city.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br} {$fields.{{$displayParams.key}}_address_state.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}&nbsp;&nbsp;{$fields.{{$displayParams.key}}_address_postalcode.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}<br>
{$fields.{{$displayParams.key}}_address_country.value|escape:'htmlentitydecode'|strip_tags|url2html|nl2br}
</td>
{{if !empty($displayParams.enableConnectors)}}
<td class="dataField">
{{sugarvar_connector view='DetailView'}} 
</td>
{{/if}}
<td class='dataField' width='1%'>
{{* 
This is custom code that you may set to show on the second column of the address
table.  An example would be the "Copy" button present from the Accounts detailview.
See modules/Accounts/views/view.detail.php to see the value being set 
*}}
{$custom_code_{{$displayParams.key}}}
</td>
</tr>
</table>

