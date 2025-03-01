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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller']                    = 'Zoolandia';

/*rutas de inicio*/
$route['inicio']                              = 'Zoolandia/inicio';

/*rutas de animales*/
$route['animales']                              = 'Zoolandia/animales';


/*rutas de boletos*/

$route['boletos']                             = 'Zoolandia/boletos';

$route['reservas']                             = 'Zoolandia/reservas';

/*rutas de mapa*/

$route['mapa']                            = 'Zoolandia/mapa';

/*rutas de donaciones*/
$route['donaciones']                                = 'Zoolandia/donaciones';

/*rutas de nosotros*/
$route['nosotros']                                 = 'Zoolandia/nosotros';

/*rutas de agradecimiento*/
$route['agradecimientoCompra']                                 = 'Zoolandia/agradecimientoCompra';
$route['agradecimientoDonaciones']                                 = 'Zoolandia/agradecimientoDonaciones';


/*rutas de administradores*/
$route['loginAdmin']                              = 'Zoolandia/loginAdmin';

$route["interfazAdministrativo"]              = 'Zoolandia/interfazAdministrativo';
$route['Zoolandia/cerrarSesion'] = 'Zoolandia/cerrarSesion';

$route['interfazAdministrativo/FormularioAdministradores']              = 'Zoolandia/FormularioAdministradores';
$route['interfazAdministrativo/FormularioAnimales']              = 'Zoolandia/FormularioAnimales';
$route['interfazAdministrativo/baseAdministradores']              = 'Zoolandia/baseAdministradores';
$route['interfazAdministrativo/baseBoletos']              = 'Zoolandia/baseBoletos';
$route['interfazAdministrativo/baseComprador']              = 'Zoolandia/baseComprador';
$route['interfazAdministrativo/basePaquetes']              = 'Zoolandia/basePaquetes';
$route['interfazAdministrativo/baseGuias']              = 'Zoolandia/baseGuias';
$route['interfazAdministrativo/baseRutas']              = 'Zoolandia/baseRutas';
$route['interfazAdministrativo/baseReservas']              = 'Zoolandia/baseReservas';
$route['interfazAdministrativo/baseAnimales']              = 'Zoolandia/baseAnimales';
$route['interfazAdministrativo/baseClasificacion']              = 'Zoolandia/baseClasificacion';
$route['interfazAdministrativo/baseEstado']              = 'Zoolandia/baseEstado';
$route['interfazAdministrativo/baseDonaciones']              = 'Zoolandia/baseDonaciones';











$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;


























