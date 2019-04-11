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
$route['default_controller'] = 'home';
$route['translate_uri_dashes'] = FALSE;
$route['view/(:any)'] = 'views/loadview/$1';

$route['logout'] = 'login/logout';


$route['tarifas/update'] = 'gerenciar_tarifa_controller/atualizarValorTarifa';
$route['tarifas/create'] = 'gerenciar_tarifa_controller/catastrarNovaTarifa';
$route['tarifas/changeStatus'] = 'gerenciar_tarifa_controller/mudarStatusTarifa';

$route['trajetos/urbanos/create'] = 'gerenciar_trajetos_urbanos_controller/createTrajeto';

$route['dashboard'] = 'dashboard';

$route['dashboard/tarifas/editar'] = 'gerenciar_tarifa_controller/editarTarifa';
$route['dashboard/tarifas'] = 'gerenciar_tarifa_controller';
$route['dashboard/tarifas/cadastrar'] = 'gerenciar_tarifa_controller/cadastrartarifaview';

$route['dashboard/paradas'] = 'gerenciar_paradas_controller';
$route['dashboard/paradas/editar'] = 'gerenciar_paradas_controller/editarParada';

$route['dashboard/trajetos/urbanos'] = 'gerenciar_trajetos_urbanos_controller';
$route['dashboard/trajetos/urbanos/cadastrar'] = 'gerenciar_trajetos_urbanos_controller/cadastrarnovotrajeto';
$route['dashboard/trajetos/urbanos/editar'] = 'gerenciar_trajetos_urbanos_controller/editarTrajeto';

// $route['dashboard/tarifas/listar'] = 'gerenciar_tarifa_controller/listartarifasview';
// $route['dashboard/tarifas/listar'] = 'gerenciar_tarifa_controller/listartarifasview';

// cadastrarTarifaView