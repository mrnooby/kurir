<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'manage';
$route['404_override'] = '';
$route['tentang']='manage/tentang';
$route['widget']='manage/widget';
$route['contact']='manage/contact';
$route['widgetongkir'] = 'manage/cekongkir';
$route['widgetresi'] = 'manage/cekresi';
$route['cekongkir'] = 'manage/cekongkirwidget';
$route['cekresi'] = 'manage/cekresiwidget';
$route['translate_uri_dashes'] = FALSE;

