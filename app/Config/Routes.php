<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
//$routes->setDefaultController('Home');
//$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

//$routes->get('/', 'Home::index');

//INDEX
$routes->get('/','IndexController::index');
$routes->post('NuevaAsistencia','IndexController::nuevaAsistencia');
$routes->post('Validar','IndexController::validarUsr');
$routes->get('Salir','IndexController::salir');

//$routes->presenter();

//Dasboard
$routes->get('Dashboard','DashboardController::index');
$routes->get('Dashboard/Pendientes','DashboardController::pendientes');
$routes->get('Dashboard/Dictamen','DashboardController::dictamenRealizado');
$routes->get('Dashboard/Completado','DashboardController::sinDictamen');
$routes->get('Dashboard/Usuarios','DashboardController::usuariosRegistrados');
//$routes->presenter('Dashboard');

//Usuarios
//$routes->presenter('Usuarios');
$routes->get('Usuarios','UsuariosController::index');
$routes->get('Usuarios/getAll','UsuariosController::getAll');
$routes->get('Usuarios/getId/(:num)','UsuariosController::getId/$1');
$routes->post('Usuarios/nuevo','UsuariosController::new');
$routes->post('Usuarios/actualizar','UsuariosController::update');
$routes->post('Usuarios/actDes','UsuariosController::actDes');

//Asistencias
$routes->get('Asistencias','AsistenciasController::index');
$routes->get('Asistencias/getAll','AsistenciasController::getAll');
$routes->get('Asistencias/getId/(:num)','AsistenciasController::getId/$1');
$routes->post('Asistencias/completado','AsistenciasController::completado');
$routes->post('Asistencias/dictamen','AsistenciasController::dictamen');

//Historial
$routes->get('Historial','HistorialController::index');
$routes->get('Historial/getAll','HistorialController::getAll');
$routes->get('Historial/getCompletado/(:num)','HistorialController::getCompletado/$1');
$routes->get('Historial/getDictamen/(:num)','HistorialController::getDictamen/$1');

//Error
$routes->get('Error','ErrorController::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
