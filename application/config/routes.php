<?php

defined('BASEPATH') OR exit('No direct script access allowed');



$route['(:any).html'] = "home/index/$1";

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

