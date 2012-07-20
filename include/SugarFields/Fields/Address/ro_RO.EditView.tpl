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
<script type="text/javascript" src='{sugar_getjspath file="include/SugarFields/Fields/Address/SugarFieldAddress.js"}'></script>
{{assign var="key" value=$displayParams.key|upper}}
{{assign var="street" value=$displayParams.key|cat:'_address_street'}}
{{assign var="city" value=$displayParams.key|cat:'_address_city'}}
{{assign var="state" value=$displayParams.key|cat:'_address_state'}}
{{assign var="country" value=$displayParams.key|cat:'_address_country'}}
{{assign var="postalcode" value=$displayParams.key|cat:'_address_postalcode'}}
<fieldset id='{{$key}}_address_fieldset'>
<legend>{sugar_translate label='LBL_{{$key}}_ADDRESS' module='{{$module}}'}</legend>
<table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
<tr>
<td valign="top" id="{{$street}}_label" width='25%' scope='row' >
{sugar_translate label='LBL_STREET' module='{{$module}}'}:
{if $fields.{{$street}}.required || {{if $street|lower|in_array:$displayParams.required}}true{{else}}false{{/if}}}
<span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
{/if}
</td>
<td width="*">
{{if $displayParams.maxlength}}
<textarea id="{{$street}}" name="{{$street}}" maxlength="{{$displayParams.maxlength}}" rows="{{$displayParams.rows|default:4}}" cols="{{$displayParams.cols|default:60}}" tabindex="{{$tabindex}}">{$fields.{{$street}}.value}
