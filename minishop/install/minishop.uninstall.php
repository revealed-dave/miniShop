<?php defined('MONSTRA_ACCESS') or die('No direct script access.');

// Delete Options
Table::drop('miniShop');
Table::drop('sales');
Table::drop('Testimonials');

// Delete Options photos
Option::delete('ms_width');
Option::delete('ms_height');
Option::delete('ms_wmax');
Option::delete('ms_hmax');
Option::delete('ms_resize');

// Delete Options shop
Option::delete('ms_mail');
Option::delete('ms_currency');
Option::delete('ms_tax');
Option::delete('ms_afadd');
Option::delete('ms_chkfail');
Option::delete('ms_befchk');
Option::delete('ms_success');
Option::delete('ms_cancel');