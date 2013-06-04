<?php defined('MONSTRA_ACCESS') or die('No direct script access.');

// Table of products
Table::create('miniShop',array(
    'product',
    'title',
    'description',
    'price',
    'size',
    'color',
    'rating',
    'hit',
    'bad',
    'good',
    'veryGood',
    'amazing',
    'new',
    'best',
    'on_sale',
    'stock',
    'image1',
    'image2',
    'image3',
    'image4',
    ));

// Testimonials
Table::create('testimonials',array(
    'ts_product',
    'ts_comentFor',
    'ts_name',
    'ts_email',
    'ts_comment',
    'ts_gravatar',
    'ts_date',
    'ts_rating'
));

// Sales
Table::create('sales',array(
    's_name',
    's_email',
    's_adress1',
    's_adress2',
    's_locality',
    's_country',
    's_phone',
    's_purchased ',
    's_comments',
    's_total',
    's_pstate',
    's_date'
));

// Options photos
Option::add('ms_width', 52);
Option::add('ms_height', 52);
Option::add('ms_wmax', 600);
Option::add('ms_hmax', 500);
Option::add('ms_resize', 'stretch');


// Folders
$dir    = ROOT.DS.'public' . DS . 'shop'. DS;
$small  = $dir . 'small' . DS;
$large  = $dir . 'large' . DS;



// Create folders if is dir
Dir::create($dir);
Dir::create($small);
Dir::create($large);

// Settings
Option::add('ms_mail', 'demo@demo.com');
Option::add('ms_currency', 'EUR');
Option::add('ms_tax', '0.16');
Option::add('ms_afadd', 'Thanks for Shopping');
Option::add('ms_chkfail', 'Ups have a error');
Option::add('ms_befchk', 'thanks for buying, you will now be moved to the platform paypal, once payment is confirmed we will send the product');
Option::add('ms_cancel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
Option::add('ms_success', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

