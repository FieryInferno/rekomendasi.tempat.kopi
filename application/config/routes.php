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