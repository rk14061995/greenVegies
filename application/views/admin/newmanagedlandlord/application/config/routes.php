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
// $route['default_controller'] = 'PropertTrack';
 $route['default_controller'] = 'home';

$route['admin'] = 'login';
$route['Login-Page'] = 'login';
$route['404_override'] = 'PropertTrack/error404';
$route['translate_uri_dashes'] = FALSE;
$route['admin/add-owner'] = 'Owner/owner_section';
$route['admin/add-building'] = 'Building/addBuildingSection';
$route['Get-Owners'] = 'Api_contoller/fetchOwners';
$route['Add-Owners'] = 'Api_contoller/addOwner';
$route['Edit-Owners']= 'Api_contoller/editOwner';
$route['Get-Building'] = 'Api_contoller/fetchBuilding';
$route['Add-Building'] = 'Api_contoller/addBuilding';
$route['Edit-Building'] = 'Api_contoller/editBuilding';
$route['Get-Tenant'] = 'Api_contoller/fetchTenant';
$route['Add-Tenant'] = 'Api_contoller/addTenant';
$route['Edit-Tenant'] = 'Api_contoller/editTenant';
$route['Get-Vendor'] = 'Api_contoller/fetchVendor'; 
$route['Add-Vendor'] = 'Api_contoller/addVendor';
$route['Edit-Vendor'] = 'Api_contoller/editVendor';
$route['Get-Email-Template'] = 'Api_contoller/fetchEmailTemplate';


// API FOR WEBSITE

$route['owner/sale-property']='Building/ViewBuildingSection';



