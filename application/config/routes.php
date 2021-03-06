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
$route['feedbacks'] = 'MainController/view_feedback_landing/0';
$route['feedbacks/(:num)'] = 'MainController/view_feedback_landing/$1';
$route['contacts'] = 'MainController/get_all_questions';
$route['support'] = 'MainController/view_glossary_landing/0';
$route['support/(:num)'] = 'MainController/view_glossary_landing/$1';
$route['login_account'] = 'MainController/login';
$route['set_appointment'] = 'MainController/setAppointment';
$route['register_client'] = 'MainController/dynamic_view/register';
$route['landing_client_registration'] = 'MainController/landing_client_registration';
$route['logout'] = 'MainController/logout';
$route['document_process'] = 'MainController/cargoDoc';
$route['customs_inquiry'] = 'MainController/customsInq';
$route['cargo_monitoring'] = 'MainController/cargoMon';
$route['import_export'] = 'MainController/imExp';
$route['boc_registration'] = 'MainController/dynamic_view/cargoBocReg';
$route['freight_forwarding'] = 'MainController/dynamic_view/cargoForwarding';
$route['insurance_services'] = 'MainController/dynamic_view/cargoInsurance';
$route['cargo_quotation'] = 'MainController/dynamic_view/cargoQuote';
$route['term_of_use'] = 'MainController/dynamic_view/termOfuse';
// ADMIN PAGE ROUTES
$route['admin'] = 'AdminController/dynamic_view';
$route['question_manager'] = 'AdminController/dynamic_view/question_manager';
$route['client_accounts'] = 'AdminController/client_accounts';
$route['employee_accounts'] = 'AdminController/employee_accounts';
$route['financial_transaction'] = 'AdminController/dynamic_view/accounting';
$route['admin_feedback'] = 'AdminController/view_feedbacks';
$route['admin_feedback/(:num)'] = 'AdminController/view_feedbacks/$1';
$route['glossary_management'] = 'AdminController/glossary_management/0';
$route['glossary_management/(:num)'] = 'AdminController/glossary_management/$1';
$route['transactions'] = 'AdminController/dynamic_view/transactions';
$route['client_transaction/(:num)'] = 'AdminController/client_transaction/$1';
$route['appointments'] = 'AdminController/dynamic_view/appointments/0';
$route['appointments/(:num)'] = 'AdminController/dynamic_view/appointments/$1';
$route['back_to_appointments'] = 'AdminController/back_to_appointments';
$route['register'] = 'AdminController/register';
$route['delete_appointment/(:num)'] = 'AdminController/delete_appointments/$1';
$route['activate_account/(:num)'] = 'AdminController/activate_account/$1';
$route['delete_account/(:num)'] = 'AdminController/delete_account/$1';
$route['view_account/(:num)'] = 'AdminController/view_account/$1';
$route['manage_account/(:num)'] = 'AdminController/manage_account/$1';
$route['delete_feedback/(:num)'] = 'AdminController/delete_feedback/$1';
$route['create_glossary'] = 'AdminController/create_glossary';
$route['fetch_glossary/(:num)'] = 'AdminController/fetch_glossary/$1';
$route['fetch_question/(:num)'] = 'AdminController/fetch_question/$1';
$route['update_question/(:num)'] = 'AdminController/update_question/$1';
$route['delete_question/(:num)'] = 'AdminController/delete_question/$1';
$route['update_glossary/(:num)'] = 'AdminController/update_glossary/$1';
$route['delete_glossary/(:num)'] = 'AdminController/delete_glossary/$1';
$route['view_message/(:num)'] = 'AdminController/view_message/$1';
$route['register'] = 'AdminController/register';
$route['post_feedback/(:num)'] = 'AdminController/post_feedback/$1';
$route['view_this_account/(:num)'] = 'AdminController/view_this_account/$1';
$route['accept_registration/(:num)'] = 'AdminController/accept_account/$1'; 
$route['decline/(:num)'] = 'AdminController/decline_account/$1'; 
$route['update_this_account/(:num)'] = 'AdminController/update_this_account/$1'; 
$route['create_question'] = 'AdminController/create_question';
$route['accounting_form'] = 'AdminController/dynamic_view/view_bill_form';
$route['add_billing_item'] = 'AdminController/add_billing_item';
$route['view_this_bill/(:num)'] = 'AdminController/view_this_bill/$1';
$route['update_this_bill/(:num)'] = 'AdminController/update_this_bill/$1';
$route['delete_billing_item/(:num)'] = 'AdminController/delete_billing_item/$1';
$route['update_log'] = 'AdminController/dynamic_view/update_log';
$route['terms'] = 'MainController/openTerms';

// BROKER PAGE ROUTES
$route['broker'] = 'BrokerController/dynamic_view';
$route['editAccount/(:any)'] = 'BrokerController/get_edit_accounts/$1';
$route['viewAccount/(:any)'] = 'BrokerController/view_accounts/$1';
$route['reportLog'] = 'BrokerController/repLog';
$route['clientRep/(:num)'] = 'BrokerController/clientRep/$1';

// ACCOUNTING PAGE ROUTES
$route['accounting'] = 'AccountingController/dynamic_view';
// CONSIGNEE PAGE ROUTES
$route['consignee'] = 'ConsigneeController/dynamic_view';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
