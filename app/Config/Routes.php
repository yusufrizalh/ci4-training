<?php

use App\Controllers\Contact;
use App\Controllers\Employee;
use App\Controllers\Profile;
use App\Controllers\User;
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
$routes->get('employees/create', [Employee::class, 'create']);
$routes->post('employees', [Employee::class, 'store']);
$routes->get('employees/(:segment)', [Employee::class, 'show']);
$routes->get('employees/edit/(:segment)', [Employee::class, 'edit']);
$routes->post('employees/update/(:segment)', [Employee::class, 'update']);
$routes->post('employees/delete/(:segment)', [Employee::class, 'destroy']);

$routes->get('users', [User::class, 'index']);
// $routes->get('users', [User::class, 'indexRelation']);
$routes->get('users/create', [User::class, 'create']);
$routes->post('users', [User::class, 'store']);
$routes->get('users/edit/(:segment)', [User::class, 'edit']);
$routes->post('users/update/(:segment)', [User::class, 'update']);
$routes->get('users/(:segment)', [User::class, 'show']);
$routes->get('departments/(:segment)', [User::class, 'showdept']);
$routes->get('skills/(:segment)', [User::class, 'showskill']);
$routes->post('users/delete/(:segment)', [User::class, 'destroy']);
