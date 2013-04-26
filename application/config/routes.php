<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['staff/del/(:num)'] = "staff/del_staff/$1";
$route['staff/add'] = "staff/add_staff";
$route['default_controller'] = "login";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */