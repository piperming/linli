<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['staff/del/(:num)'] = "staff/del_staff/$1";
$route['staff/new'] = 'staff/staff_add';
$route['staff/add'] = 'staff/staff_save';
$route['task/day'] = 'task/task_day';
$route['task/month'] = 'task/task_month';
$route['custom/new'] = 'custom/custom_add';
$route['custom/add'] = 'custom/custom_save';
$route['default_controller'] = "login";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */