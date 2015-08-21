<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'user/index';
$route['404_override'] = '';

/*admin*/
// $route['admin'] = 'user/index';
// $route['admin/signup'] = 'user/signup';
// $route['admin/create_member'] = 'user/create_member';
// $route['admin/login'] = 'user/index';
// $route['admin/logout'] = 'user/logout';
// $route['admin/login/validate_credentials'] = 'user/validate_credentials';

// $route['admin/sensors'] = 'admin_sensors/index';
// $route['admin/sensors/add'] = 'admin_sensors/add';
// $route['admin/sensors/update'] = 'admin_sensors/update';
// $route['admin/sensors/update/(:any)'] = 'admin_sensors/update/$1';
// $route['admin/sensors/delete/(:any)'] = 'admin_sensors/delete/$1';
// $route['admin/sensors/(:any)'] = 'admin_sensors/index/$1'; //$1 = page number

// $route['admin/sensorobjects'] = 'admin_sensorobjects/index';
// $route['admin/sensorobjects/add'] = 'admin_sensorobjects/add';
// $route['admin/sensorobjects/update'] = 'admin_sensorobjects/update';
// $route['admin/sensorobjects/update/(:any)'] = 'admin_sensorobjects/update/$1';
// $route['admin/sensorobjects/delete/(:any)'] = 'admin_sensorobjects/delete/$1';
// $route['admin/sensorobjects/(:any)'] = 'admin_sensorobjects/index/$1'; //$1 = page number

// $route['admin/sensortype'] = 'admin_sensortype/index';
// $route['admin/sensortype/add'] = 'admin_sensortype/add';
// $route['admin/sensortype/update'] = 'admin_sensortype/update';
// $route['admin/sensortype/update/(:any)'] = 'admin_sensortype/update/$1';
// $route['admin/sensortype/delete/(:any)'] = 'admin_sensortype/delete/$1';
// $route['admin/sensortype/(:any)'] = 'admin_sensortype/index/$1'; //$1 = page number



/* End of file routes.php */
/* Location: ./application/config/routes.php */