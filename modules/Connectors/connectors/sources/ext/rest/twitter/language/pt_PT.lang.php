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

	

$connector_strings = array (
  'oauth_consumer_key' => 'Chave do Consumidor',
  'oauth_consumer_secret' => 'Segredo do Consumidor',
  'company_url' => 'URL',
  'LBL_NAME' => 'Nome de Utilizador Twitter',
  'LBL_ID' => 'Nome de Utilizador Twitter',
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Obter uma Chave e um Segredo do Consumidor através do Twitter&#169; registando a instância do seu Sugar como nova aplicação.<br/><br>Passos para registar a sua instância:<br/><br/><ol><li>Ir ao site Twitter&#169; Developers: <a href=\'http://dev.twitter.com/apps/new.\' target=\'_blank\'>http://dev.twitter.com/apps/new.</a>.</li><li>Autentique-se usando a conta do Twitter com a qual deseja registar a aplicação.</li><li>Dentro do formulário de registo, insira um nome para a aplicação. Este é o nome que os utilizadores irão ver quando estes autenticarem as suas contas do Twitter dentro do Sugar.</li><li>Insira uma Descrição.</li><li>Insira o URL do Website da Aplicação (poderá ser qualquer coisa).</li><li>Escolha "Browser" para Tipo de Aplicação.</li><li>Depois de escolher "Browser" como Tipo de Aplicação, inserir o URL de Callback (poderá ser qualquer coisa, já que o Sugar ignora isto na autenticação. Exemplo: Inserir o URL da raiz do seu Sugar).</li><li>Inserir as palavras de segurança.</li><li>Carregar em "Registar aplicação".</li><li>Aceite os Termos de Serviço da API do Twitter.</li><li>Na página da aplicação, procure a Chave do Consumidor e o Segredo do Consumidor. Inserir a Chave e o Segredo em baixo.</li></ol></td></tr></table>'
);


