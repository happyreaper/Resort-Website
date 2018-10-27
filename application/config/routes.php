<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['(yurts)']='yc/view/$1';
$route['default_controller'] = 'pages/view';
$route['(index)']='pages/view/$1';
$route['(activities)']='ac/view/$1';
$route['(reservation)']='resc/view/$1';
$route['(myreservations)']='mresc/view/$1';

$route['(shop)']='sc/view/$1';
$route['(cart)']='cc/view/$1';
$route['(placeyourorder)'] = 'oc/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
