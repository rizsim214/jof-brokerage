<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'MainController';
// LANDING PAGE ROUTES
$route['home'] ='MainController/dynamic_view/home';
$route['login'] = 'MainController/dynamic_view/login';
$route['about'] = 'MainController/dynamic_view/about';
$route['feedbacks'] = 'MainController/dynamic_view/feedback';
$route['contacts'] = 'MainController/dynamic_view/contact';
$route['support'] = 'MainController/dynamic_view/support';
$route['login_account'] = 'MainController/login';
$route['Appointment'] = 'MainController/setAppointment';
$route['logout'] = 'MainController/logout';
// ADMIN PAGE ROUTES
$route['admin'] = 'AdminController/dynamic_view';
$route['users'] = 'AdminController/dynamic_view/users';
$route['finances'] = 'AdminController/dynamic_view/accounting';
$route['feedbacks'] = 'AdminController/dynamic_view/feedbacks';
$route['managements'] = 'AdminController/dynamic_view/managements';
$route['transactions'] = 'AdminController/dynamic_view/transactions';
$route['appointments'] = 'AdminController/dynamic_view/appointments/0';
$route['appointments/(:num)'] = 'AdminController/dynamic_view/appointments/$1';
$route['transactions'] = 'AdminController/dynamic_view/transactions';

// BROKER PAGE ROUTES
$route['broker'] = 'BrokerController/dynamic_view';
// ACCOUNTING PAGE ROUTES
$route['accounting'] = 'AccountingController/dynamic_view';
// CONSIGNEE PAGE ROUTES
$route['consignee'] = 'ConsigneeController/dynamic_view';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
