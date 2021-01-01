<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']    = 'login';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;
$route['daftar']                = 'daftar';
$route['editProfile']           = 'user/editProfile';
$route['pencarian']             = 'pencarian';
$route['detail/(:num)']         = 'tempat/detail/$1';
$route['review/(:num)']         = 'tempat/review/$1';
$route['lupaPassword']          = 'login/lupaPassword';
$route['edit_tempat/(:any)']    = 'tempat/edit/$1';
$route['hapus_tempat/(:any)']   = 'tempat/hapus/$1';
$route['tambah_tempat']         = 'tempat/tambah';
$route['rekomendasi']           = 'rekomendasi';
$route['ganti_password']        = 'login/gantiPassword/$1';