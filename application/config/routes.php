<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// auth routes
$route['login'] = 'auth';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

// user routes
$route['kelola-user'] = 'user';
$route['kelola-user/tambah'] = 'user/create';
$route['kelola-user/ubah/(:num)'] = 'user/edit/$1';
$route['kelola-user/hapus/(:num)'] = 'user/delete/$1';

// categories routes
$route['kelola-kategori'] = 'category';

// items routes
$route['kelola-produk'] = 'product';
$route['kelola-produk/tambah'] = 'product/create';
$route['kelola-produk/ubah/(:num)'] = 'product/edit/$1';
$route['kelola-produk/hapus/(:num)'] = 'product/delete/$1';

// paket grooming route
$route['paket-grooming'] = 'package';

// Custom nama routing
$route['produk'] = 'main/productpage';
$route["detail"] = 'main/detailproduct';


// routes for front office
$route['produk'] = 'main/productpage';
$route['produk/(:any)'] = 'main/detailproduct/$1';
