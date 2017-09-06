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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['inicio']= 'login/index';
$route['404_override'] = '';
$route['translatione_uri_dashes'] = FALSE;
/*
| ---------- URL Sucursal -----------
*/
$route['sucursal']= 'sucursal/listar';
/*
| ---------- URL Sucursal -----------
*/
/*
| ---------- URL Empleados -----------
*/
$route['empleados']= 'login/listar';
$route['salir']= 'login/salir';
$route['EditarEmpleado/(:any)']= 'login/editar/$1';
/*
| --------- FIN URL Empleados ---------
*/
/*
| --------- URL Motos -------------
*/
$route['motos']= 'moto/listar';
$route['EditarMoto/(:any)']= 'moto/editar/$1';
/*
| --------- FIN URL Motos ---------
*/
/*
| --------- URL Clientes -------------
*/
$route['clientes']= 'cliente/listar';
$route['EditarCliente/(:any)']= 'cliente/editar/$1';
/*
| --------- FIN URL Clientes ---------
*/
/*
| --------- URL Pedidos -------------
*/
$route['pedidos']= 'pedido/listar';
/*
| --------- FIN URL Pedidos ---------
*/
/*
| --------- URL Catalogo -------------
*/
$route['catalogos']= 'catalogo/listar';
/*
| --------- FIN URL Pedidos ---------
*/
/*
| --------- URL Cocina -------------
*/
$route['cocina']= 'cocina/listar';
/*
| --------- FIN URL Cocina ---------
*/
/*
| --------- URL Reportes -------------
*/
$route['pedidosatendidos']= 'pedido/listarpedidosatendidos';
$route['pedidosdevueltos']= 'pedido/listarpedidosdevueltos';
$route['platosmasvendidos']= 'catalogo/platosmasvendidos';
$route['ventasdelmes']= 'ventas/listar';
$route['filtropedidos']= 'pedido/listarpedidos';
/*
| --------- FIN URL Reportes ---------
*/
/*
| ---------- URL CLientes -----------
*/
$route['cliente']= 'cliente/listar';
$route['salir']= 'login/salir';
$route['registrarse']= 'login/registrarse';
/*
| --------- FIN URL Empleados ---------
*/
/*
 ---------- URL Carta -----------
*/
$route['Carta']= 'Catalogo/ListarCarta';
$route['Carta1']= 'index.php/Carta';
/*
| --------- FIN URL Carta ---------
*/
/*
| ---------- URL Carrito -----------
*/
$route['Carrito']= 'Catalogo/MostrarCarrito';
/*
| --------- FIN URL Carrito ---------
*/

/*
| --------- URL Caja-------------
*/
$route['cajero']= 'Caja/ListarPedidos';

$route['cajeroanu']= 'Caja/ListaPedidosAnulados';
/*$route['VerDocumento']= 'Caja/VerDocumento';*/
$route['VerDocumento/(:any)']= 'Caja/VerDocumento/$1';
$route['Documento/(:any)']= 'Caja/Documento/$1';


$route['anular']= 'Caja/ListarDocuAnulados';
/*
| --------- FIN URL Reportes ---------
*/


/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
