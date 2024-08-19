<?php

use App\Controllers\Contact;
use App\Controllers\Dashboard;
use App\Controllers\DeptUserChart;
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

$routes->get('employees', [Employee::class, 'index'], ['filter' => 'authGuard']);
$routes->get('employees/create', [Employee::class, 'create'], ['filter' => 'authGuard']);
$routes->post('employees', [Employee::class, 'store'], ['filter' => 'authGuard']);
$routes->get('employees/(:segment)', [Employee::class, 'show'], ['filter' => 'authGuard']);
$routes->get('employees/edit/(:segment)', [Employee::class, 'edit'], ['filter' => 'authGuard']);
$routes->post('employees/update/(:segment)', [Employee::class, 'update'], ['filter' => 'authGuard']);
$routes->post('employees/delete/(:segment)', [Employee::class, 'destroy'], ['filter' => 'authGuard']);

$routes->get('users', [User::class, 'index'], ['filter' => 'authGuard']);
$routes->get('searchuser', [User::class, 'searchuser'], ['filter' => 'authGuard']);
$routes->get('users/create', [User::class, 'create'], ['filter' => 'authGuard']);
$routes->post('users', [User::class, 'store']);
$routes->get('users/edit/(:segment)', [User::class, 'edit'], ['filter' => 'authGuard']);
$routes->post('users/update/(:segment)', [User::class, 'update']);
$routes->get('users/(:segment)', [User::class, 'show'], ['filter' => 'authGuard']);
$routes->get('departments/(:segment)', [User::class, 'showdept'], ['filter' => 'authGuard']);
$routes->get('skills/(:segment)', [User::class, 'showskill'], ['filter' => 'authGuard']);
$routes->post('users/delete/(:segment)', [User::class, 'destroy']);
$routes->get('users/deptuserchart', [DeptUserChart::class, 'index'], ['filter' => 'authGuard']);
$routes->get('users/deptuserchart/showchart', [DeptUserChart::class, 'showchart'], ['filter' => 'authGuard']);

$routes->get('auth/register', [User::class, 'register']);
$routes->post('auth/registeruser', [User::class, 'registerUser']);
$routes->get('auth/login', [User::class, 'login']);
$routes->post('auth/loginuser', [User::class, 'loginUser']);
$routes->get('auth/dashboard', [Dashboard::class, 'index'], ['filter' => 'authGuard']);
$routes->get('auth/logout', [User::class, 'logoutUser']);
