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
  'LBL_LICENSING_INFO' => '<table border="0" cellspacing="1"><tr><td valign="top" width="35%" class="dataLabel">Obter uma Chave API e um Segredo da App através do Facebook&#169; criando uma aplicação para a sua instância do Sugar.<br/><br>Passos para criar uma aplicação para a sua instância:<br/><br/><ol><li>Ir ao seguinte Facebook&#169; para criar a aplicação: <a href=\'http://www.facebook.com/developers/createapp.php\' target=\'_blank\'>http://www.facebook.com/developers/createapp.php</a>.</li><li>Autenticar-se no Facebook&#169; utilizando a conta sob a qual será para criar a aplicação.</li><li>Dentro da página "Criar Aplicação", inserir um nome para a aplicação. Este é o nome que os utilizadores irão ver quando se autenticarem nas suas contas do Facebook de dentro do Sugar.</li><li>Seleccionar "Aceito" para aceitar os Termos do Facebook&#169;.</li><li>Clicar em "Criar App"</li><li>Inserir e submeter as palavras de segurança para passar na Verificação de Segurança.</li><li>Dentro da página da aplicação, ir à área "Web Site" (link no menu da esquerda) e inserir o URL local da instância do Sugar para "Site URL".</li><li>Carregar "Gravar Alterações"</li><li>Ir à página "Integração do Facebook" (link no menu da esquerda) e encontrar a Chave API e o Segredo da App. Inserir o ID da Aplicação e o Segredo da Aplicação em baixo.</li></ol></td></tr></table>',
  'oauth_consumer_key' => 'Chave API',
  'oauth_consumer_secret' => 'Segredo da App',
);


