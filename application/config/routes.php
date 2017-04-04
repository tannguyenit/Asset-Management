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
$route['default_controller'] = 'Public_index';
$route['admin'] = '/admin/admin_index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['trang-chu.html'] = 'admin/admin_index';
$route['dang-nhap.html'] = 'admin/admin_login';
$route['quan-ly-nguoi-dung'] = 'admin/admin_user';
$route['(:any)-(:num)'] = 'admin/admin_khoa/index/$2';
$route['Lop-(:any)-(:num).html'] = 'admin/admin_lop/index/$2';
$route['trang-ca-nhan/(:num)'] = 'admin/admin_user/profile/$1';
$route['quan-ly-danh-muc'] = 'admin/admin_cat/index';
$route['nguon-kinh-phi'] = 'admin/admin_kinhphi';
$route['nha-cung-cap'] = 'admin/admin_ncc';
$route['nuoc'] = 'admin/admin_nuoc';
$route['lien-he-nguoi-dung'] = 'admin/admin_contact';
$route['lien-he-nguoi-dung/(:num)'] = 'admin/admin_contact/index/2';
$route['lien-he-khoa'] = 'admin/admin_contact/mail';
$route['read-mail/(:num)'] = 'admin/admin_contact/read/$1';
$route['quan-ly-tai-san.html'] = 'admin/admin_assets/index';
$route['danh-muc/(:any)-(:num)'] = 'admin/admin_cat/cat/$2';
$route['dieu-chuyen-tai-san.html'] = 'admin/admin_assets/translate_assets';
$route['dieu-chuyen-tai-san/(:num)'] = 'admin/admin_assets/translate/$1';
$route['tai-san/(:num)'] = 'admin/admin_assets/detail/$1';
$route['thanh-ly/(:num)'] = 'admin/admin_assets/thanhlytaisan/$1';
$route['thanh-ly-tai-san.html'] = 'admin/admin_assets/thanhly';
$route['thong-ke-tai-san.html'] = 'admin/admin_assets/thongke';
$route['danh-gia-tai-san.html'] = 'admin/admin_assets/danhgia';
$route['danh-gia-lai-tai-san.html'] = 'admin/admin_assets/danhgialai';
$route['danh-gia-lai-tai-san/(:num)'] = 'admin/admin_assets/detail_danhgialai/$1';
$route['tim-kiem'] = 'admin/admin_search';
$route['chi-tiet-nguoi-dung/(:num)'] = 'admin/admin_user/detail_edit/$1';

