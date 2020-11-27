<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// routes for customers
// auth routes
$route['login'] = 'customer/auth';
$route['register'] = 'customer/auth/register';
$route['logout'] = 'customer/auth/logout';
// home routes
$route['home'] = 'customer/home';

// categories routes


// items routes
$route['kelola-produk'] = 'product';
$route['kelola-produk/tambah'] = 'product/create';
$route['kelola-produk/ubah/(:num)'] = 'product/edit/$1';
$route['kelola-produk/hapus/(:num)'] = 'product/delete/$1';

// paket grooming route
$route['paket-grooming'] = 'package';


// kelola grooming
$route['kelola-grooming'] = 'grooming';
$route['kelola-grooming/tambah'] = 'grooming/create';
$route['kelola-grooming/ubah-status/(:num)'] = 'grooming/update/$1';
$route['kelola-grooming/detail/(:num)'] = 'grooming/detail/$1';
$route['kelola-grooming/hapus/(:num)'] = 'grooming/delete/$1';


// routes for front office
$route['produk'] = 'main/productpage';
// $route['produk/tambah-keranjang/(:num)'] = 'main/addtocart/$1';
$route['produk/(:any)'] = 'main/detailproduct/$1';
$route['kategori'] = 'main/categorypage';
$route['kategori/(:num)'] = 'main/productbycategorypage/$1';
$route['grooming'] = 'main/groomingpage';
$route['pendaftaran-grooming'] = 'main/registergrooming';
// $route['pendaftaran-grooming/(:any)'] = 'main/registergrooming/$1';
$route['tentang-kami'] = 'main/aboutus';

/**
 * Route untuk admin
 */
// auth
$route['admin'] = 'admin/auth';
$route['admin/logout'] = 'admin/auth/logout';
// dashboard
$route['dashboard'] = 'admin/dashboard';
// kelola customer
$route['kelola-customer'] = 'admin/customer';
$route['kelola-customer/tambah'] = 'admin/customer/create';
$route['kelola-customer/ubah/(:num)'] = 'admin/customer/edit/$1';
$route['kelola-customer/hapus/(:num)'] = 'admin/customer/delete/$1';
$route['kelola-customer/detail/(:num)'] = 'admin/customer/detail/$1';
// kelola admins
$route['kelola-admin'] = 'admin/admin';
$route['kelola-admin/tambah'] = 'admin/admin/create';
$route['kelola-admin/ubah/(:num)'] = 'admin/admin/edit/$1';
$route['kelola-admin/hapus/(:num)'] = 'admin/admin/delete/$1';
// kelola kategori
$route['kelola-kategori'] = 'admin/category';
$route['kelola-kategori/ajaxlist'] = 'admin/category/ajaxlist';
$route['kelola-kategori/ajaxedit/(:num)'] = 'admin/category/ajaxedit/$1';
$route['kelola-kategori/ajaxadd'] = 'admin/category/ajaxadd';
$route['kelola-kategori/ajaxupdate'] = 'admin/category/ajaxupdate';
$route['kelola-kategori/ajaxdelete/(:num)'] = 'admin/category/ajaxdelete/$1';
// kelola products
$route['kelola-produk'] = 'admin/product';
$route['kelola-produk/tambah'] = 'admin/product/create';
$route['kelola-produk/ubah/(:num)'] = 'admin/product/edit/$1';
$route['kelola-produk/hapus/(:num)'] = 'admin/product/delete/$1';
