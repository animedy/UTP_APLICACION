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
//$route['EditarEmpleado/(:any)']= 'login/editar/$1';
$route['EditarEmpleado']= 'login/editar';
/*
| --------- FIN URL Empleados ---------
*/
/*
| --------- URL Motos -------------
*/
$route['motos']= 'moto/listar';
//$route['EditarMoto/(:any)']= 'moto/editar/$1';
$route['EditarMoto']= 'moto/editar';
/*
| --------- FIN URL Motos ---------
*/
/*
| --------- URL Clientes -------------
*/
$route['clientes']= 'cliente/listar';
//$route['EditarCliente/(:any)']= 'cliente/editar/$1';
$route['EditarCliente']= 'cliente/editar/';
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
$route['productos']= 'producto/listar';

$route['categoria']= 'Categoria/listar';
/*
| --------- FIN URL Catalogo ---------
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
$route['platosmasvendidos']= 'Producto/platosmasvendidos';
$route['ventasdeldia']= 'ventas/listar';
$route['ventasdelmes']= 'ventas/ListarVentasDelMes';
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
$route['recuperar']= 'cliente/Contrasena';
/*
| --------- FIN URL Empleados ---------
*/
/*
 ---------- URL Catalogo o Carta -----------
*/
$route['Carta']= 'Producto/ListarCarta';

$route['Carta1']= 'index.php/Catalogo';
/*
| --------- FIN URL Carta ---------
*/
/*
| ---------- URL Carrito -----------
*/
$route['Carrito']= 'Carrito/MostrarCarrito';
$route['Mensaje']= 'Producto/MostrarSeguimiento';

/*
| --------- FIN URL Carrito ---------
*/
/*
| --------- URL Caja-------------
*/
$route['cajero']= 'Documento/ListarPedidos';
$route['docupagados']= 'Documento/ListaDcumentosPagados';
$route['docuanulados']= 'Documento/ListaDocumentosAnulados';
$route['VerDocumento/(:any)']= 'Documento/VerDocumento/$1';
/*
| --------- FIN URL Caja ---------
*/
