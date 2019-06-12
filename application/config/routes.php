<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// header('Access-Control-Allow-Origin: *');
$route['default_controller'] = 'home';
$route['translate_uri_dashes'] = FALSE;
$route['view/(:any)'] = 'views/loadview/$1';
$route['view/(:any)/(:any)'] = 'views/loadviewwithfolder/$1/$2';

$route['logout'] = 'login/logout';

/*Rotas para métodos de controller que funcionam com ajax*/

$route['ajax/cidades/por_estado'] = 'data_only/cidade_controller/ajax_db_getCidadesPorEstado';
$route['ajax/rodoviarias/existe_na_cidade'] = 'gerenciar_rodoviaria_controller/ajax_db_verificarExistenciaRodoviariaCidade';
$route['ajax/rodoviarias/create'] = 'gerenciar_rodoviaria_controller/ajax_db_insertRodoviaria';
$route['ajax/rodoviarias/edit'] = 'gerenciar_rodoviaria_controller/ajax_db_updateRodoviaria';
$route['ajax/rodoviarias/get'] = 'gerenciar_rodoviaria_controller/ajax_db_getRodoviarias';
$route['ajax/rodoviarias/getSingle'] = 'gerenciar_rodoviaria_controller/ajax_db_getRodoviariaEspecifica';

$route['ajax/onibus/create'] = 'gerenciar_frota_controller/ajax_db_insertOnibus';
$route['ajax/onibus/edit'] = 'gerenciar_frota_controller/ajax_db_updateOnibus';
$route['ajax/onibus/get'] = 'gerenciar_frota_controller/ajax_db_getOnibus';
$route['ajax/onibus/getSingle'] = 'gerenciar_frota_controller/ajax_db_getOnibusEspecifico';

$route['ajax/manutencao/create'] = 'gerenciar_manutencoes_controller/ajax_db_createManutencao';
$route['ajax/manutencao/getUnica'] = 'gerenciar_manutencoes_controller/ajax_db_getManutencaoUnica';
$route['ajax/manutencao/get'] = 'gerenciar_manutencoes_controller/ajax_db_getManutencoes';
$route['ajax/manutencao/edit'] = 'gerenciar_manutencoes_controller/ajax_db_updateManutencao';

$route['ajax/comprar_passagem/onibus'] = 'Venda_passagens_online_controller/ajax_db_getAlocacoesPorCidade';
$route['ajax/comprar_passagem/comprar'] = 'Venda_passagens_online_controller/ajax_db_comprarPassagem';

$route['ajax/venda/passagem/alocacao'] = 'Venda_passagem_rodoviaria_controller/ajax_db_getAlocacoesPorCidade';
$route['ajax/venda/passagem/vender'] = 'Venda_passagem_rodoviaria_controller/ajax_db_comprarPassagem';


/*Rotas para métodos de controller que apenas inserem/atualizam algo no banco de dados. */
$route['formas_pagamentos/save']= 'Gerenciar_formas_pagamento_controller/updatePayments';


$route['tarifas/update'] = 'gerenciar_tarifa_controller/atualizarValorTarifa';
$route['tarifas/create'] = 'gerenciar_tarifa_controller/catastrarNovaTarifa';
$route['tarifas/changeStatus'] = 'gerenciar_tarifa_controller/mudarStatusTarifa';

$route['trajetos/urbanos/create'] = 'gerenciar_trajetos_urbanos_controller/createTrajeto';
$route['trajetos/urbanos/edit'] = 'gerenciar_trajetos_urbanos_controller/editTrajeto';
$route['trajetos/urbanos/changeStatus'] = 'gerenciar_trajetos_urbanos_controller/changeStatus';


$route['rodoviarias/create'] = 'gerenciar_rodoviaria_controller/db_insert';
$route['rodoviarias/edit'] = 'gerenciar_rodoviaria_controller/db_update';
$route['rodoviarias/changeStatus'] = 'gerenciar_rodoviaria_controller/db_changeStatus';


$route['concessoes/create'] = 'gerenciar_concessoes_controller/createConcessao';
$route['concessoes/update'] = 'gerenciar_concessoes_controller/updateConcessao';


$route['categorias/passageiros/create'] = 'gerenciar_categoria_passageiros_Controller/createCategoria';
$route['categorias/passageiros/edit'] = 'gerenciar_categoria_passageiros_Controller/editCategoria';

$route['categorias/onibus/create'] = 'gerenciar_categoria_onibus_controller/_insertCategoriaOnibus';
$route['categorias/onibus/changeStatus'] = 'gerenciar_categoria_onibus_controller/db_updateStatusCategoriaOnibus';
$route['categorias/onibus/update'] = 'gerenciar_categoria_onibus_controller/_updateCategoriaOnibus';


//aquiiii
//Rotas para o visualizar passagens vendidas
$route['ajax/passagens/vendidas/getSingle'] = 'visualizar_passagens_controller/ajax_db_getPassagensTrajetoEspecifico';

/*Rotas métodos de controller que exibem alguma tela, sem necessáriamente inserir/atualizar algo no banco de dados*/
$route['dashboard'] = 'Dashboard';

$route['dashboard/categorias/onibus'] = 'gerenciar_categoria_onibus_controller';
$route['dashboard/categorias/onibus/editar'] = 'gerenciar_categoria_onibus_controller/editarCategoriaOnibus';

$route['dashboard/tarifas/editar'] = 'gerenciar_tarifa_controller/editarTarifa';
$route['dashboard/tarifas'] = 'gerenciar_tarifa_controller';
$route['dashboard/tarifas/cadastrar'] = 'gerenciar_tarifa_controller/cadastrartarifaview';

$route['dashboard/paradas'] = 'gerenciar_paradas_controller';
$route['dashboard/paradas/editar'] = 'gerenciar_paradas_controller/editarParada';


$route['dashboard/concessoes'] = 'gerenciar_concessoes_controller';

$route['dashboard/trajetos/urbanos'] = 'gerenciar_trajetos_urbanos_controller';
$route['dashboard/trajetos/urbanos/cadastrar'] = 'gerenciar_trajetos_urbanos_controller/cadastrarnovotrajeto';
$route['dashboard/trajetos/urbanos/editar'] = 'gerenciar_trajetos_urbanos_controller/editarTrajeto';

$route['dashboard/categorias/passageiros'] = 'gerenciar_categoria_passageiros_Controller';
$route['dashboard/categorias/passageiros/ver-categoria'] = 'gerenciar_categoria_passageiros_Controller/verCategoria';
$route['dashboard/categorias/passageiros/cadastrar'] = 'gerenciar_categoria_passageiros_Controller/cadastrarTela';
$route['dashboard/categorias/passageiros/editar'] = 'gerenciar_categoria_passageiros_Controller/editarCategoriaPassageiro';
// $route['dashboard/tarifas/listar'] = 'gerenciar_tarifa_controller/listartarifasview';
// $route['dashboard/tarifas/listar'] = 'gerenciar_tarifa_controller/listartarifasview';

$route['dashboard/rodoviarias'] = 'gerenciar_rodoviaria_controller';
// cadastrarTarifaView

$route['dashboard/frotas']  = 'gerenciar_frota_controller';
$route['dashboard/manutencoes'] = 'gerenciar_manutencoes_controller';


$route['dashboard/ver_passagens'] = 'visualizar_passagens_controller';


$route['dashboard/venda/passagens'] = 'venda_passagem_rodoviaria_controller';
$route['dashboard/venda/passagens/acentos'] = 'venda_passagem_rodoviaria_controller/selecionarAcento';

// Gerenciar venda de passagens online

$route['dashboard/passagens/onibus'] = 'Venda_passagens_online_controller';
//$route['dashboard/passagens/venda'] =

$route['dashboard/formas_pagamentos']= 'Gerenciar_formas_pagamento_controller';

/* Rotas para clientes */
$route['clientes'] = 'dashboard_clientes';
$route['clientes/meus_pontos'] = 'dashboard_clientes/pontos';
$route['clientes/minhas_passagens'] = 'dashboard_clientes/minhasPassagens';
$route['clientes/compra_passagem/selecao_acento']= 'Venda_passagens_online_controller/selecionarAcento';
$route['clientes/compra_passagem']= 'Venda_passagens_online_controller';
