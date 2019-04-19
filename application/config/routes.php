<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
header('Access-Control-Allow-Origin: *');
$route['default_controller'] = 'Home';
$route['translate_uri_dashes'] = FALSE;
$route['view/(:any)'] = 'Views/loadview/$1';

$route['logout'] = 'login/logout';


$route['tarifas/update'] = 'Gerenciar_Tarifa_Controller/atualizarValorTarifa';
$route['tarifas/create'] = 'Gerenciar_Tarifa_Controller/catastrarNovaTarifa';
$route['tarifas/changeStatus'] = 'Gerenciar_Tarifa_Controller/mudarStatusTarifa';

$route['trajetos/urbanos/create'] = 'Gerenciar_Trajetos_Urbanos_Controller/createTrajeto';
$route['trajetos/urbanos/edit'] = 'Gerenciar_Trajetos_Urbanos_Controller/editTrajeto';
$route['trajetos/urbanos/changeStatus'] = 'Gerenciar_Trajetos_Urbanos_Controller/changeStatus';

$route['dashboard'] = 'Dashboard';


$route['concessoes/create'] = 'Gerenciar_Concessoes_Controller/createConcessao';
$route['concessoes/update'] = 'Gerenciar_Concessoes_Controller/updateConcessao';


$route['categorias/passageiros/create'] = 'Gerenciar_Categoria_Passageiros_Controller/createCategoria';
$route['categorias/passageiros/edit'] = 'Gerenciar_Categoria_Passageiros_Controller/editCategoria';

$route['dashboard/tarifas/editar'] = 'Gerenciar_Tarifa_Controller/editarTarifa';
$route['dashboard/tarifas'] = 'Gerenciar_Tarifa_Controller';
$route['dashboard/tarifas/cadastrar'] = 'Gerenciar_Tarifa_Controller/cadastrartarifaview';

$route['dashboard/paradas'] = 'Gerenciar_Paradas_Controller';
$route['dashboard/paradas/editar'] = 'Gerenciar_Paradas_Controller/editarParada';


$route['dashboard/concessoes'] = 'Gerenciar_Concessoes_Controller';

$route['dashboard/trajetos/urbanos'] = 'Gerenciar_Trajetos_Urbanos_Controller';
$route['dashboard/trajetos/urbanos/cadastrar'] = 'Gerenciar_Trajetos_Urbanos_Controller/cadastrarnovotrajeto';
$route['dashboard/trajetos/urbanos/editar'] = 'Gerenciar_Trajetos_Urbanos_Controller/editarTrajeto';

$route['dashboard/categorias/passageiros'] = 'Gerenciar_Categoria_Passageiros_Controller';
$route['dashboard/categorias/passageiros/ver-categoria'] = 'Gerenciar_Categoria_Passageiros_Controller/verCategoria';
$route['dashboard/categorias/passageiros/cadastrar'] = 'Gerenciar_Categoria_Passageiros_Controller/cadastrarTela';
$route['dashboard/categorias/passageiros/editar'] = 'Gerenciar_Categoria_Passageiros_Controller/editarCategoriaPassageiro';
// $route['dashboard/tarifas/listar'] = 'Gerenciar_Tarifa_Controller/listartarifasview';
// $route['dashboard/tarifas/listar'] = 'Gerenciar_Tarifa_Controller/listartarifasview';

// cadastrarTarifaView