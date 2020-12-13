<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array('session', 'form_validation', 'database', 'parser');
$autoload['drivers'] = array();
$autoload['helper'] = array('url', 'form');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('LoginModel', 'DaftarModel', 'UserModel', 'PencarianModel', 'FasilitasModel', 'TempatModel');
