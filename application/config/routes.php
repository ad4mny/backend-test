<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'RestController';
$route['(:num)'] = 'RestController/index/$1';
$route['search'] = 'SearchController/getSearch';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
