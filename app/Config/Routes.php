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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/acerca_de', 'Home::acerca_de');

$routes->get('/tienda_view', 'Home::tienda_view');
$routes->get('contacto', 'Home::contacto');
$routes->get('/terminos', 'Home::terminos');
$routes->get('/comercializacion', 'Home::comercializacion');

//rutas del registro de usuario
$routes->get('/registro', 'Usuario_controller::registrarse');
$routes->post('/enviar-form', 'Usuario_controller::formValidation');


// rutas de login (usuarios)
$routes->get('/login', 'Login_controller::index');
$routes->post('/enviarlogin', 'Login_controller::auth');
$routes->get('/logout', 'Login_controller::logout');
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);


//rutas crud usuarios(admin)
$routes->get('/usuarios', 'Usuario_controller::index', ['filter' => 'auth']);
$routes->get('/dar_baja/(:num)', 'Usuario_controller::darBaja/$1');
$routes->get('/editar_usuario/(:num)', 'Usuario_controller::editar/$1', ['filter' => 'auth']);
$routes->post('/actualizar_usuario/(:num)', 'Usuario_controller::actualizar/$1');
$routes->get('usuarios_baja', 'Usuario_controller::usuarios_baja', ['filter' => 'auth']);
$routes->get('dar_alta/(:num)', 'Usuario_controller::darAlta/$1');
$routes->get('nuevo_usuario', 'Usuario_controller::formNuevoUsuario');
$routes->post('guardar_usuario', 'Usuario_controller::guardarUsuario');


// Rutas crud de Productos(admin)
$routes->get('/producto', 'producto_controller::index', ['filter' => 'auth']); // Mostrar listado
$routes->get('/crear', 'producto_controller::creaproducto', ['filter' => 'auth']); // formulario de alta 
$routes->post('/enviar-prod', 'producto_controller::store',); // Acción de alta
$routes->get('/editar/(:num)', 'producto_controller::singleproducto/$1', ['filter' => 'auth']); // Formulario de edición
$routes->post('/modifica/(:num)', 'producto_controller::modifica/$1'); // Acción de edición
$routes->get('/borrar/(:num)', 'producto_controller::deleteproducto/$1', ['filter' => 'auth']); // Eliminado lógico
$routes->get('/eliminados', 'producto_controller::eliminados', ['filter' => 'auth']); // Ver eliminados
$routes->get('/activar_pro/(:num)', 'producto_controller::activarproducto/$1'); // Reactivar producto

// Rutas para el carrito
$routes->get('carrito', 'carrito_controller::index');
$routes->post('carrito/agregar/(:num)', 'carrito_controller::agregar/$1');
$routes->get('carrito/eliminar/(:any)', 'carrito_controller::elimina/$1');
$routes->get('carrito/confirmar', 'carrito_controller::comprar');

// Rutas para ver las compras del usuario logueado
$routes->get('mis_compras', 'carrito_controller::mis_compras');

//rutas venta
$routes->get('ventas', 'VentasController::index');
$routes->post('ventas/registrar', 'VentasController::registrarVenta');
$routes->get('ventas/detalle/(:num)', 'VentasController::detalle/$1', ['filter' => 'auth']);


//rutas de consulta
    
$routes->get('consulta/listar', 'Consultas_controller::listar', ['filter' => 'auth']);
$routes->post('consulta/guardar', 'Consultas_controller::guardar', ['filter' => 'auth']);
$routes->get('consulta/responder/(:num)', 'Consultas_controller::responder/$1', ['filter' => 'auth']);
$routes->get('consulta/eliminar/(:num)', 'Consultas_controller::eliminar/$1', ['filter' => 'auth']);



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
$routes->setAutoRoute(true);
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}