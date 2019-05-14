<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'C_admin/index';
$route['login'] = 'C_admin/login';
$route['obat'] = 'C_admin/obat';
$route['pemakaian'] = 'C_admin/pemakaian';
$route['permintaan'] = 'C_admin/permintaan';
$route['penerimaan'] = 'C_admin/penerimaan';
$route['stock']='c_admin/index/stock';
$route['expired']='c_admin/index/expired';
$route['laporanPemakaian'] = 'C_admin/laporanPemakaian';
$route['laporanPenerimaan'] = 'C_admin/laporanPenerimaan';
$route['laporanPermintaan'] = 'C_admin/laporanPermintaan';
$route['laporanKeseluruhan'] = 'C_admin/laporanKeseluruhan';
$route['laporanKeseluruhanBulan'] = 'C_admin/laporanKeseluruhanBulan';
$route['laporanStok'] = 'C_admin/laporanStok';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


