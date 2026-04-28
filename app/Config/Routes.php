<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// Variabel Filter
$authFilter = ['filter' => 'auth'];

// Variabel Role
$admin = ['filter' => 'role:admin'];
$user = ['filter' => 'role:user'];
$intRole = ['filter' => 'role:admin'];
$allRole = ['filter' => 'role:admin, user'];


// Login
$routes->get('/login', 'Auth::login');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// Halaman utama
$routes->get('/', 'Home::index', $authFilter);
$routes->get('/dashboard', 'Home::index', $authFilter);

$routes->get('/users/create', 'Users::create'); // form tambah user
$routes->post('/users/store', 'Users::store'); // aksi simpan user

$routes->get('/users', 'Users::index', $intRole); // menampilkan data user
$routes->get('/users/edit/(:num)', 'Users::edit/$1', $allRole); // form edit user
$routes->post('/users/update/(:num)', 'Users::update/$1', $allRole); // aksi update user
$routes->get('/users/delete/(:num)', 'Users::delete/$1', $allRole); // aksi hapus user

$routes->get('/buku', 'Buku::index');
$routes->get('/buku/create', 'Buku::create', $intRole);
$routes->post('/buku/store', 'Buku::store', $intRole);
$routes->get('/buku/edit/(:num)', 'Buku::edit/$1', $intRole);
$routes->post('/buku/update/(:num)', 'Buku::update/$1', $intRole);
$routes->get('/buku/delete/(:num)', 'Buku::delete/$1', $intRole);

$routes->get('/peminjaman', 'Peminjaman::index');
$routes->get('/peminjaman/create', 'Peminjaman::create');
$routes->post('/peminjaman/store', 'Peminjaman::store');
$routes->get('/peminjaman/kembali/(:num)', 'Peminjaman::kembali/$1');