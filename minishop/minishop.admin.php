<?php

// Admin Navigation: add new item
Navigation::add(__('Minishop', 'minishop'), 'content', 'minishop', 10);

// Add styles and scripts in Backend
Javascript::add('plugins/minishop/lib/js/minishop_backend.js','backend',11);
Stylesheet::add('plugins/minishop/lib/css/minishop_backend.css','backend',2);

/**
 * Minishop admin class
 */
class minishopAdmin extends Backend{


    public static $shop = null;


    /**
     * Main minishop admin function
     */
    public static function main(){

        // Options resize
        $Resize = array(
            'width'   => __('Same width', 'minishop'),
            'height'  => __('Same height', 'minishop'),
            'crop'    => __('Crop images', 'minishop'),
            'stretch' => __('Stretch images','minishop'),
        );


        // Get url
        $siteurl = Option::get('siteurl');
        // Get Dir
        $dir = ROOT . DS . 'public' . DS . 'shop'. DS;
        // Get dir of small folder
        $small = $dir . 'small' . DS;
        // Get dir of small folder
        $large = $dir . 'large' . DS;
        // Scan images
        $files = File::scan($small, 'jpg');
        // Get menu table
        minishopAdmin::$shop = new Table('miniShop');


        // Create Table
        $shop = new Table('miniShop');
        $sales = new Table('sales');
        $testimonials = new Table('testimonials');


        // Select all in tables
        $ms = $shop->select(null, 'all');
        $ts = $testimonials->select(null, 'all');
        $sl = $sales->select(null, 'all');


        // Check for get actions
        // -------------------------------------
        if (Request::get('action')) {
            switch (Request::get('action')) {
                // Add product
                case "add":
                    if(Request::post('addProdct')){
                        if (Security::check(Request::post('csrf'))) {

                        if (Request::post('title')) $title = Request::post('title'); else $title = '--';
                        if (Request::post('description'))$description = Request::post('description'); else $description = '--';
                        if (Request::post('price')) $price = Request::post('price'); else $price = '--';
                        if (Request::post('size'))   $size  = Request::post('size');  else $size = '--';
                        if (Request::post('color'))  $color = Request::post('color'); else $color = '--';
                        if (Request::post('product'))$product = Request::post('product'); else $product = '--';
                        if (Request::post('stock'))  $stock = Request::post('stock'); else $stock = '--';

                            // Random text for images
                            $name1 = 'img1_'.Text::random('hexdec').'.jpg';
                            $name2 = 'img2_'.Text::random('hexdec').'.jpg';
                            $name3 = 'img3_'.Text::random('hexdec').'.jpg';
                            $name4 = 'img4_'.Text::random('hexdec').'.jpg';

                            // Get function convert and apply
                            minishopAdmin::conVert('image1',$name1);
                            minishopAdmin::conVert('image2',$name2);
                            minishopAdmin::conVert('image3',$name3);
                            minishopAdmin::conVert('image4',$name4);


                            // Insert in table minishop.xml
                            $shop->insert(array(
                                'product'     => Html::toText($product),
                                'title'       => Html::toText($title),
                                'description' => $description,
                                'price'       => Html::toText($price),
                                'size'        => Html::toText($size),
                                'color'       => Html::toText($color),
                                'stock'       => Html::toText($stock),
                                'image1'      => $name1,
                                'image2'      => $name2,
                                'image3'      => $name3,
                                'image4'      => $name4
                            ));
                            // Select all
                            $ms = $shop->select(null, 'all');
                            Notification::set('success', __('Your item has been added ', 'minishop'));
                            Request::redirect('index.php?id=minishop&action=add');
                        } else { die('csrf detected!'); }
                    }
                    // View layout add
                    View::factory('minishop/views/backend/add')->assign('tags', minishopAdmin::getTags())->display();
                break;




                // Edit product
                case "edit":

                    // Init vars
                    $item = minishopAdmin::$shop->select('[uid="'.Request::get('uid').'"]', null);
                    $product        = $item['product'];
                    $title          = $item['title'];
                    $description    = $item['description'];
                    $price          = $item['price'];
                    $size           = $item['size'];
                    $color          = $item['color'];
                    $stock          = $item['stock'];
                    $image1         = $item['image1'];
                    $image2         = $item['image2'];
                    $image3         = $item['image3'];
                    $image4         = $item['image4'];


                    // Request
                    if(Request::post('editProdct')){
                        if (Security::check(Request::post('csrf'))) {

                        if (Request::post('title')) $title = Request::post('title');else $title = '--';
                        if (Request::post('description')) $description = Request::post('description');else $description = '--';
                        if (Request::post('price')) $price = Request::post('price');else $price = '--';
                        if (Request::post('size'))  $size = Request::post('size');else $size = '--';
                        if (Request::post('color')) $color = Request::post('color');else $color = '--';
                        if (Request::post('product')) $product = Request::post('product');else $product = '--';
                        if (Request::post('stock')) $stock = Request::post('stock'); else $stock = '--';

                        // Not rename name
                        // only change photo
                        $name1 = $image1;
                        $name2 = $image2;
                        $name3 = $image3;
                        $name4 = $image4;

                        // Use updateConvert to not show image no preview
                        minishopAdmin::updateConvert('image1',$name1);
                        minishopAdmin::updateConvert('image2',$name2);
                        minishopAdmin::updateConvert('image3',$name3);
                        minishopAdmin::updateConvert('image4',$name4);


                        // Update database
                        $shop->updateWhere('[uid="'.Request::get('uid').'"]',
                                array(
                                    'product'     => Html::toText($product),
                                    'title'       => Html::toText($title),
                                    'description' => $description,
                                    'price'       => Html::toText($price),
                                    'size'        => Html::toText($size),
                                    'color'       => Html::toText($color),
                                    'stock'       => Html::toText($stock),
                                    'image1'      => $name1,
                                    'image2'      => $name2,
                                    'image3'      => $name3,
                                    'image4'      => $name4
                                ));
                        $ms = $shop->select(null, 'all');
                        Notification::set('success', __('Your item has been edit ', 'minishop'));
                        Request::redirect('index.php?id=minishop');
                        } else { die('csrf detected!'); }
                    }
                    // View layout
                    View::factory('minishop/views/backend/edit')
                        ->assign('product', $product)
                        ->assign('tags', minishopAdmin::getTags())
                        ->assign('title', $title)
                        ->assign('description', $description)
                        ->assign('price', $price)
                        ->assign('size', $size)
                        ->assign('color', $color)
                        ->assign('stock', $stock)
                        ->assign('image1', $image1)
                        ->assign('image2', $image2)
                        ->assign('image3', $image3)
                        ->assign('image4', $image4)
                        ->assign('ms', $ms)
                        ->display();
                break;

                // resize
                case 'resize':
                    if(Request::post('resizephotos')) {
                        $largeFiles = File::scan($large,'jpg');
                        $smallFiles = File::scan($small,'jpg');
                        // Update options
                        Option::update(array(
                                'ms_width'  => Request::post('wsmall'),
                                'ms_height' => Request::post('hsmall'),
                                'ms_wmax'   => Request::post('wlarge'),
                                'ms_hmax'   => Request::post('hlarge'),
                                'ms_resize' => Request::post('Resize')));
                        // If get images resize with ReSize function
                        if (count($largeFiles) > 0){
                            foreach($largeFiles as $item){
                                minishopAdmin::ReSize($large.$item,$small.$item);
                            }
                            Notification::set('success', __('Your settings has been edit ', 'minishop'));
                            Request::redirect('index.php?id=minishop&action=resize');
                        }
                    }
                    // View layout
                    View::factory('minishop/views/backend/resize')->assign('Resize', $Resize)->display();
                break;




                // Get Sellers
                case 'sales':
                    // Get details of contact
                    if (Request::get('details')) {
                        $id = Request::get('details');
                        $details = $sales->select('[id="'.Request::get('details').'"]');
                        return View::factory('minishop/views/backend/details')->assign('details',$details)->display();
                    }

                    // Change state to paid
                    if (Request::get('state')) {
                        $id = Request::get('state');
                        $sales->updateWhere('[id="'.Request::get('state').'"]',
                            array(
                            's_pstate' => __('Paid','minishop')
                        ));
                        Notification::set('success', __('The state has change ', 'minishop'));
                        Request::redirect('index.php?id=minishop&action=sales');
                    }

                    // Delete seller
                    if (Request::get('delSale')) {
                        $id = Request::get('delSale');
                        $sales->delete((int)Request::get('delSale'));
                        Notification::set('success', __('Your item has been delete ', 'minishop'));
                        Request::redirect('index.php?id=minishop&action=sales');
                    }
                    // View layout
                    View::factory('minishop/views/backend/sales')->assign('sl',$sl)->display();
                break;




                // Get comments
                case 'comments':
                    // If is spam clear comment and put clean for spam
                    if (Request::get('isSpam')) {
                        $id = Request::get('isSpam');
                        $testimonials->updateWhere('[id="'.Request::get('isSpam').'"]',
                            array(
                            'ts_comment' => __('Clean for span','minishop')
                        ));
                        Notification::set('success', __('Span has been cleam ', 'minishop'));
                        Request::redirect('index.php?id=minishop&action=comments');
                    }
                    // Delete comment
                    if (Request::get('delComment')) {
                        $id = Request::get('delComment');
                        $testimonials->delete((int)Request::get('delComment'));
                        Notification::set('success', __('Your item has been delete ', 'minishop'));
                        Request::redirect('index.php?id=minishop&action=comments');
                    }
                    // View layout
                    View::factory('minishop/views/backend/comments')->assign('ts',$ts)->display();
                break;





                // Get Settings file
                case 'Js':
                    // Currencies supported
                    $currencies = array(
                        'USD' => 'US Dollar',
                        'AUD' => 'Australian Dollar',
                        'BRL' => 'Brazilian Real',
                        'CAD' => 'Canadian Dollar',
                        'CZK' => 'Czech Koruna',
                        'DKK' => 'Danish Krone',
                        'EUR' => 'Euro',
                        'HKD' => 'Hong Kong Dollar',
                        'HUF' => 'Hungarian Forint',
                        'ILS' => 'Israeli New Sheqel',
                        'JPY' => 'Japanese Yen',
                        'MXN' => 'Mexican Peso',
                        'NOK' => 'Norwegian Krone',
                        'NZD' => 'New Zealand Dollar',
                        'PLN' => 'Polish Zloty',
                        'RUR' => 'Pубль rubl',
                        'GBP' => 'Pound Sterling',
                        'SGD' => 'Singapore Dollar',
                        'SEK' => 'Swedish Krona',
                        'CHF' => 'Swiss Franc',
                        'THB' => 'Thai Baht',
                        'BTC' => 'Bitcoin'
                        );
                    // Loop currencies to show in select tag
                    $current = null;
                    foreach ($currencies as $key => $value) {
                       $current .= '<option value="'.$key.'">'.$value.'</option>';
                    };


                    if (Request::post('editJs')) {
                        if (Security::check(Request::post('csrf'))) {

                            if(Request::post('ms_mail'))$ms_mail = Request::post('ms_mail');
                            else $ms_mail = Option::get('ms_mail');
                            if(Request::post('ms_currency'))$ms_currency = Request::post('ms_currency');
                            else $ms_currency = Option::get('ms_currency');
                            if(Request::post('ms_tax'))$ms_tax = Request::post('ms_tax');
                            else $ms_tax = Option::get('ms_tax');
                            if(Request::post('ms_afadd'))$ms_afadd = Request::post('ms_afadd');
                            else $ms_afadd = Option::get('ms_afadd');
                            if(Request::post('ms_chkfail'))$ms_chkfail = Request::post('ms_chkfail');
                            else $ms_chkfail = Option::get('ms_chkfail');
                            if(Request::post('ms_befchk'))$ms_befchk = Request::post('ms_befchk');
                            else $ms_befchk = Option::get('ms_befchk');
                            if(Request::post('ms_success'))$ms_success = Request::post('ms_success');
                            else $ms_success = Option::get('ms_success');
                            if(Request::post('ms_cancel'))$ms_cancel = Request::post('ms_cancel');
                            else $ms_cancel = Option::get('ms_cancel');

                            // update options
                            Option::update(array(
                                'ms_mail' => $ms_mail,
                                'ms_currency' => $ms_currency,
                                'ms_tax' => $ms_tax,
                                'ms_afadd' => $ms_afadd,
                                'ms_chkfail' => $ms_chkfail,
                                'ms_befchk' => $ms_befchk,
                                'ms_success' => $ms_success,
                                'ms_cancel' => $ms_cancel,
                            ));


                            Notification::set('success', __('Your settings has been save ', 'minishop'));
                            Request::redirect('index.php?id=minishop&action=Js');
                        } else { die('csrf detected!'); }
                    }
                    // View layout
                    View::factory('minishop/views/backend/settings')->assign('current', $current)->display();
                break;


            }
        } else {
                // Delete product database item and images from folder
                if (Request::get('delProdct')) {
                    $id = Request::get('delProdct');
                    $delete = minishopAdmin::$shop->select('[id='.$id.']',null);
                    File::delete($small.$delete['image1']);
                    File::delete($small.$delete['image2']);
                    File::delete($small.$delete['image3']);
                    File::delete($small.$delete['image4']);
                    File::delete($large.$delete['image1']);
                    File::delete($large.$delete['image2']);
                    File::delete($large.$delete['image3']);
                    File::delete($large.$delete['image4']);
                    minishopAdmin::$shop->delete((int)Request::get('delProdct'));
                    Notification::set('success', __('Your item has been delete ', 'minishop'));
                    Request::redirect('index.php?id=minishop');
                }
            // Display view
            View::factory('minishop/views/backend/index')->assign('ms', $ms)->display();
        }

    }



    /**
     *  function to get Tags
     * minishopAdmin::getTags();
     */
    public static function getTags(){
        $table = new Table('miniShop');
        $items = $table->select(null, 'all');
        $tags = array();
        if($items > 0){
            $category = '';
            foreach($items as $item) {
                $category .= $item['product'].',';
            }
            $category = substr($category, 0, strlen($category)-1);
            $tags = explode(',', $category);
            foreach ($tags as $key => $value) {
                if ($tags[$key] == '') {
                    unset($tags[$key]); }}
            array_walk($tags, create_function('&$val', '$val = trim($val);'));
            $tags = array_unique($tags);
        }
        return $tags;
    }



    /**
     * function to convert
     * minishopAdmin::conVert('file','name');
     * If not get image from folder get image no-preview
     * and resize this
     * @param  string $image, $name
     */
    private static function conVert($image, $name){

        $dir = ROOT . DS . 'public' . DS . 'shop'. DS;
        $small = $dir . 'small' . DS;
        $large = $dir . 'large' . DS;

        // File dir from image no-preview
        $noFile = PLUGINS.DS.'minishop'.DS.'lib'.DS.'img'.DS.'nopreview.jpg';

        if ($_FILES[$image]['name']) {
            if($_FILES[$image]['type'] == 'image/jpeg' ||
                $_FILES[$image]['type'] == 'image/png' ||
                $_FILES[$image]['type'] == 'image/gif') {
                $wx  = Option::get('ms_wmax');
                $hx  = Option::get('ms_hmax');
                $w   = Option::get('ms_width');
                $h   = Option::get('ms_height');
                $re  = Option::get('ms_resize');
                $ra  = $w/$h;
                $img  = Image::factory($_FILES[$image]['tmp_name']);
                if ($img->width > $wx or $img->height > $hx) {
                    if ($img->height > $img->width) {$img->resize($wx, $hx, Image::HEIGHT);}
                    else {$img->resize($wx, $hx, Image::WIDTH);}}
                $img->save($large . $name);
                switch ($re) {
                    case 'width' :$img->resize($w, $h, Image::WIDTH);break;
                    case 'height' :$img->resize($w, $h, Image::HEIGHT);break;
                    case 'stretch' :$img->resize($w, $h);break;
                    case 'crop':
                        if (($img->width/$img->height) > $ra) {
                            $img->resize($w, $h, Image::HEIGHT)->crop($w, $h, round(($img->width-$w)/2),0);
                        } else { $img->resize($w, $h, Image::WIDTH)->crop($w, $h, 0, 0);}
                    break;
                }
                $img->save($small . $name);
            }

        }else {
            $wx  = Option::get('ms_wmax');
            $hx  = Option::get('ms_hmax');
            $w   = Option::get('ms_width');
            $h   = Option::get('ms_height');
            $re  = Option::get('ms_resize');
            $ra  = $w/$h;
            $img  = Image::factory($noFile);
            if ($img->width > $wx or $img->height > $hx) {
                if ($img->height > $img->width) {$img->resize($wx, $hx, Image::HEIGHT);}
                else {$img->resize($wx, $hx, Image::WIDTH);}}
            $img->save($large . $name);
            switch ($re) {
                case 'width' :$img->resize($w, $h, Image::WIDTH);break;
                case 'height' :$img->resize($w, $h, Image::HEIGHT);break;
                case 'stretch' :$img->resize($w, $h);break;
                case 'crop':
                    if (($img->width/$img->height) > $ra) {
                        $img->resize($w, $h, Image::HEIGHT)->crop($w, $h, round(($img->width-$w)/2),0);
                    } else { $img->resize($w, $h, Image::WIDTH)->crop($w, $h, 0, 0);}
                break;
            }
            $img->save($small . $name);
        }
    }


    /**
     * function to convert
     * minishopAdmin::updateConvert('file','name');
     * @param  string $image, $name
     */
    private static function updateConvert($image, $name){
        $dir = ROOT . DS . 'public' . DS . 'shop'. DS;
        $small = $dir . 'small' . DS;
        $large = $dir . 'large' . DS;
        if ($_FILES[$image]['name']) {
            if($_FILES[$image]['type'] == 'image/jpeg' ||
            $_FILES[$image]['type'] == 'image/png' ||
            $_FILES[$image]['type'] == 'image/gif') {
                $wx  = Option::get('ms_wmax');
                $hx  = Option::get('ms_hmax');
                $w   = Option::get('ms_width');
                $h   = Option::get('ms_height');
                $re  = Option::get('ms_resize');
                $ra  = $w/$h;
                $img  = Image::factory($_FILES[$image]['tmp_name']);
                if ($img->width > $wx or $img->height > $hx) {
                    if ($img->height > $img->width) {$img->resize($wx, $hx, Image::HEIGHT);}
                    else {$img->resize($wx, $hx, Image::WIDTH);}}
                $img->save($large . $name);
                switch ($re) {
                    case 'width' :$img->resize($w, $h, Image::WIDTH);break;
                    case 'height' :$img->resize($w, $h, Image::HEIGHT);break;
                    case 'stretch' :$img->resize($w, $h);break;
                    case 'crop':
                        if (($img->width/$img->height) > $ra) {
                            $img->resize($w, $h, Image::HEIGHT)->crop($w, $h, round(($img->width-$w)/2),0);
                        } else { $img->resize($w, $h, Image::WIDTH)->crop($w, $h, 0, 0);}
                    break;
                }
                $img->save($small . $name);
            }
        }
    }





    /**
     * function to resize
     * minishopAdmin::ReSize('largeImages','smallImages');
     * @param  string $largeImages, $smallImages
     */
    private static function ReSize($largeImages,$smallImages){
        $img = Image::factory($largeImages);
        $wx  = Option::get('ms_wmax');
        $hx  = Option::get('ms_hmax');
        $w   = Option::get('ms_width');
        $h   = Option::get('ms_height');
        $re  = Option::get('ms_resize');
        $ra  = $w/$h;
        if ($img->width > $wx or $img->height > $hx) {
            if ($img->height > $img->width) {
                $img->resize($wx, $hx, Image::HEIGHT);
            } else {
                $img->resize($wx, $hx, Image::WIDTH);
            }
        }
        $img->save($largeImages);
        switch ($re) {
            case 'width' :   $img->resize($w, $h, Image::WIDTH);  break;
            case 'height' :  $img->resize($w, $h, Image::HEIGHT); break;
            case 'stretch' : $img->resize($w, $h); break;
            case 'crop':
                if (($img->width/$img->height) > $ra) {
                    $img->resize($w, $h, Image::HEIGHT)->crop($w, $h, round(($img->width-$w)/2),0);
                } else {
                    $img->resize($w, $h, Image::WIDTH)->crop($w, $h, 0, 0);
                }
            break;
        }
        $img->save($smallImages);
    }


}
