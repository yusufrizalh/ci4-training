<?php

use App\Controllers\Contact;
use App\Controllers\Employee;
use App\Controllers\Profile;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'Home::index');

$routes->get('/', function () {
    return view('home');
});

$routes->get('/about', function () {
    // $name = $_GET['name'];   //* method GET dari PHP
    $request = request();       //* method request dari CI
    $name = $request->getGet('name');
    return view('about', ['name' => $name]);
});

$routes->get('/contact', [Contact::class, 'index']);
$routes->post('/contact', [Contact::class, 'store']);

$routes->get('/profile/(:segment)', function ($myname) {
    return view('profile', ['myname' => $myname]);
});

$routes->get('employees', [Employee::class, 'index']);
$routes->get('employees/(:segment)', [Employee::class, 'show']);
$routes->get('employees/edit/(:segment)', [Employee::class, 'edit']);
$routes->post('employees/update/(:segment)', [Employee::class, 'update']);
