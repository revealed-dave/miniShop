<?php

/**
 *  Minishop plugin
 *
 *  @package Monstra
 *  @subpackage Plugins
 *  @author Moncho Varela / Nakome
 *  @copyright 2013-2014 Moncho Varela / Nakome
 *  @version 1.0.0
 *
 */

  // Register plugin
  Plugin::register( __FILE__,
                __('Minishop', 'minishop'),
                __('Mini shop module ', 'minishop'),
                '1.0.0',
                'Nakome',
                'http://nakome.com/','minishop');

  // Load Stock Admin for Editor and Admin
  if (Session::exists('user_role') && in_array(Session::get('user_role'), array('admin', 'editor'))) {
      Plugin::admin('minishop');
  }


  /**
   * Add styles and javascript in frontend
   */
  Javascript::add('plugins/minishop/lib/js/simplecart.min.js','frontend',2);
  Javascript::add('plugins/minishop/lib/js/minishop.js','frontend',3);
  Stylesheet::add('plugins/minishop/lib/css/minishop.css','frontend',2);
  Action::add('theme_footer','minishop::getJs');

/**
 * miniShop Class
 */
class miniShop extends Frontend{

    /*
    * Add javascript for shop  to theme footer
    */
    public static function getJs(){
      return view::factory('minishop/views/backend/script')->display();
    }


    /**
     * Page name
     *
     * @var string
     */
    public static  $shop = 'shop';


    /**
    * Get Products
    *
    *  <code>
    *      echo miniShop::getProducts(num);
    *  </code>
    *
    * @return string
    */
    public static function getProducts($num = 6){
      // Get table
      $table = new Table('miniShop');
      // Get categories
      $category = Request::get('cat');
      // Make pagination
      $total =  count($table->select(null,'all'));
       // Get Pages Count
      $pager = ceil($total/$num);
      // First page
      $lpag = 1;
      // last page
      $rpag = $pager;
      // Get pag +
      $pg = Request::get('pg');
      // fix bug
      $result ='';

      if ($pg < 1) {$pg = 1;} elseif ($pg > $pager) {$pg = $pager;}

      // if isset category select all products on xml file
      if(isset($category)) {
          $items = $table->select('[product="'.$category.'"]','all');
        // if isset pg (pagination)
        }else if(isset($pg)) {
          // page x num
          $pg = ($pg-1)*$num;
          // Select page and num
          $items  = $table->select(null,$num, $pg);
          // Rendew new view
          $result = new View('minishop/views/frontend/pag');
          $result->assign('pager', $pager)
                  ->assign('pg',$pg)
                  ->assign('lpag',$lpag)
                  ->assign('rpag',$rpag)
                  ->render();
        }else{
          // Select all
          $items  = $table->select(null,'all');
          // Rendew new view
          $result = new View('minishop/views/frontend/pag');
          $result->assign('pager', $pager)
                  ->assign('pg',$pg)
                  ->assign('lpag',$lpag)
                  ->assign('rpag',$rpag)
                  ->render();
        }
        // View layout
        return  View::factory('minishop/views/frontend/products')
                ->assign('shop', miniShop::$shop)
                ->assign('items',$items)
                // Display render view here
                ->assign('result',$result)
                ->display();
     }








    /**
    * Get Categories
    *
    *  <code>
    *      echo miniShop::getCategories();
    *  </code>
    *
    * @return string
    */
     public static function getCategories(){
        $url = Option::get('siteurl').miniShop::$shop.'?cat=';
        $table = new Table('miniShop');
        $items = $table->select(null, 'all');
        $tags = array();
        $category = '';
        // Select all categorys and make unique
        foreach($items as $item) {$category .= $item['product'].',';}
        $category = substr($category, 0, strlen($category)-1);
        $tags = explode(',', $category);
        foreach ($tags as $key => $value) {
            if ($tags[$key] == '') {
                unset($tags[$key]);
            }
        }
        array_walk($tags, create_function('&$val', '$val = trim($val);'));
        $tags = array_unique($tags);
        // View layout
        return View::factory('minishop/views/frontend/categories')
          ->assign('tags', $tags)
          ->assign('url', $url)
          ->render();
     }







    /**
    * Get Product
    *
    *  <code>
    *      echo Minishop::getProduct();
    *  </code>
    *
    * @return string
    */
    public static function getProduct(){
      // Product id
      $id       = Request::get('id');

      // Select tables  id
      $table    = new Table('miniShop');
      $items    = $table->select('[id="'.$id.'"]');

      $testimonials = new Table('testimonials');
      $test = $testimonials->select('[ts_product="'.$id.'"]','all');


      // Init vars
      $rating     = '';
      $mymail     = Option::get('system_email');
      $product    = Request::post('ts_product');
      $name       = Request::post('ts_name');
      $email      = Request::post('ts_email');
      $comment    = Request::post('ts_comment');
      $commentFor = Request::post('ts_comentFor');
      $checked    = Request::post('imnotarobot');
      $date       = date("Y/m/d");


      //  If request insert number on database xml
      if(Request::post('r_1') == true)$rating   = 1;
      if(Request::post('r_2') == true)$rating   = 2;
      if(Request::post('r_3') == true)$rating   = 3;
      if(Request::post('r_4') == true)$rating   = 4;
      if(Request::post('r_5') == true)$rating   = 5;

        // Write comments
        if (isset($id)) {
            if (Request::post('ts_send')) {
                if (Security::check(Request::post('csrf'))) {
                  // If not checked show ( You are a robot ?)
                  if($checked == true){
                      $testimonials = new Table('testimonials');
                      $testimonials->insert(array(
                          'ts_product'  => $id,
                          'ts_name'     => strip_tags($name),
                          'ts_email'    => strip_tags($email),
                          'ts_comment'  => strip_tags($comment),
                          'ts_gravatar' => $email,
                          'ts_date'     => $date,
                          'ts_rating'   => $rating,
                          'ts_comentFor'=>  $commentFor
                      ));
                      // Send mail
                      $mail = new PHPMailer();
                      $mail->CharSet = 'utf-8';
                      $mail->ContentType = 'text/plain';
                      $mail->AddAddress($mymail );
                      $mail->From = $email;
                      $mail->FromName = $name;
                      $mail->Subject = __('Comment product added','minishop');
                      $mail->MsgHTML($comment, $commentFor,$date);

                      if(!$mail->Send()) {
                          Notification::set('error', __('A Letter was not sent!', 'mycontact'));
                      }
                      Notification::set('success', __('A Comment has been save!', 'mycontact'));
                      Request::redirect('?id='.$id);
                    }else{die('You are a robot?');}
                } else { die('csrf detected!'); }
            }
            // View layout
            return  View::factory('minishop/views/frontend/product')
              ->assign('id',$id)
              ->assign('items',$items)
              ->assign('product',$product)
              ->assign('name', $name)
              ->assign('email', $email)
              ->assign('comment',$comment)
              ->assign('items',$items)
              ->assign('test',$test)
              ->assign('rating',$rating)
              ->display();
        }else{ Response::status(404);}
    }




    /**
    * Get Last  product
    * same category
    *  <code>
    *      echo miniShop::getLastProduct();
    *  </code>
    *
    * @return string
    */
    public static function getLastProduct(){
      $table = new Table('miniShop');
      $last = $table->select(null,1);
      return  View::factory('minishop/views/frontend/last_product')
              ->assign('last', $last)
              ->display();
    }


    /**
    * Get Slide
    * for home or any page
    *  <code>
    *      echo miniShop::getSlide();
    *  </code>
    *
    * @return string
    */
    public static function getSlide(){
      $table = new Table('miniShop');
      $items = $table->select(null,1);
      return  View::factory('minishop/views/frontend/slide')
              ->assign('items', $items)
              ->display();
    }



    /**
    * Get New items only last 4
    * for home or any page
    *  <code>
    *      echo miniShop::getNewItems(num or all);
    *  </code>
    *
    * @return string
    */
    public static function getNewItems($num){
      $table = new Table('miniShop');
      if(!count($num) > 0){$items = $table->select(null,4,null);}
      else{$items = $table->select(null,$num,null);}
      return  View::factory('minishop/views/frontend/new_items')
              ->assign('items', $items)
              ->display();
    }



    /**
    * Get Other products
    * same category
    *  <code>
    *      echo miniShop::getOthers();
    *  </code>
    *
    * @return string
    */
    public static function getOthers(){
      $id = Request::get('id');
      $table = new Table('miniShop');
      $item = $table->select('[id='.$id.']',null);
      $other = $item['product'];
        if (isset($id)) {
            $items = $table->select('[product="'.$other.'"]',3);
            return  View::factory('minishop/views/frontend/other')
              ->assign('items', $items)
              ->display();
        }
    }






    /**
    * Get Info
    *
    *  <code>
    *      echo miniShop::getInfo();
    *  </code>
    *
    * @return string
    */
     public static function getInfo(){
      return  View::factory('minishop/views/frontend/info')
              ->assign('shop', miniShop::$shop)
              ->display();
     }










    /**
    * Get Quantity
    *
    *  <code>
    *      echo miniShop::getQuantity();
    *  </code>
    *
    * @return string
    */
     public static function getQuantity(){
      $view =  Request::get('v');
      if(isset($view)) {
        // request options same equal to switch
        if($view == 'ck'){
          // Init vars
          $mymail     = Option::get('system_email');
          $name       = Html::toText(Request::post('ms_name'));
          $email      = Html::toText(Request::post('ms_email'));
          $adress1    = Html::toText(Request::post('ms_adress1'));
          $adress2    = Html::toText(Request::post('ms_adress2'));
          $locality   = Html::toText(Request::post('ms_locality'));
          $country    = Html::toText(Request::post('ms_country'));
          $phone      = Html::toText(Request::post('ms_phone'));
          $purchased  = Html::toText(Request::post('ms_purchased'));
          $comment    = Html::toText(Request::post('ms_comment'));
          $date       = Html::toText(Request::post('ms_date'));
          $total      = Html::toText(Request::post('ms_total'));
          $checked    = Request::post('imnotarobot');

          if (Request::post('ms_submit')) {
              if (Security::check(Request::post('csrf'))) {
                // You are a robot ?
                if($checked == true){
                  $sales = new Table('sales');
                  $sales->insert(array(
                      's_name'      => strip_tags($name),
                      's_email'     => strip_tags($email),
                      's_adress1'   => strip_tags($adress1),
                      's_adress2'   => strip_tags($adress2),
                      's_locality'  => strip_tags($locality),
                      's_country'   => strip_tags($country),
                      's_phone'     => strip_tags($phone),
                      's_comments'  => strip_tags($comment),
                      's_purchased' => strip_tags($purchased),
                      's_total'     => strip_tags($total),
                      's_pstate'    =>  __('Pending','minishop'),
                      's_date'      => date("d/m/Y")
                  ));

                  // Send mail to adminstrator
                  $mail = new PHPMailer();
                  $mail->CharSet = 'utf-8';
                  $mail->ContentType = 'text/plain';
                  $mail->AddAddress($mymail );
                  $mail->From = $email;
                  $mail->FromName = $name;
                  $mail->Subject = __('Shop item purchase','minishop');
                  $mail->MsgHTML(View::factory('minishop/views/backend/layout_email')
                      ->assign('name', $name)
                      ->assign('email', $email)
                      ->assign('adress1', $adress1)
                      ->assign('adress2', $adress2)
                      ->assign('locality', $locality)
                      ->assign('country', $country)
                      ->assign('phone', $phone)
                      ->assign('comment',$comment)
                      ->assign('purchased',$purchased)
                      ->assign('total',$total)
                      ->render());

                  if(!$mail->Send()) {
                      Notification::set('error', __('A Letter was not sent!', 'mycontact'));
                  }

                  Request::redirect('?v=py');

                }else{die('You are a robot?');}
              } else { die('csrf detected!'); }
          }
          // View layout
          return View::factory('minishop/views/frontend/form')
            ->assign('name', $name)
            ->assign('email', $email)
            ->assign('adress1', $adress1)
            ->assign('adress2', $adress2)
            ->assign('locality', $locality)
            ->assign('country', $country)
            ->assign('phone', $phone)
            ->assign('date', $date)
            ->assign('comment',$comment)
            ->assign('total', $total)
            ->render();
          }
          // View paid buttom and info
          else if($view == 'py'){
            echo
            Option::get('ms_befchk').
            Html::br(2).
            '<a href="javascript:void(0);" class="ms_checkout simpleCart_checkout">
              <span class="pay"></span>'.__('Go to Paypal','minishop').
            '</a>';
          }
        }else{
          // View layout
          return  View::factory('minishop/views/frontend/quantity')
            ->assign('shop', miniShop::$shop)
            ->display();
        }
     }










    /**
    * Get Last comments
    *
    *  <code>
    *      echo miniShop::getlastComment();
    *  </code>
    *
    * @return string
    */
     public static function getlastComment($num=1){
      $table = new Table('testimonials');
      $testimonial = $table->select(null,$num);
      return  View::factory('minishop/views/frontend/last_comments')
      ->assign('testimonial',$testimonial)
      ->display();
     }









    /**
    * Get Checkout
    *
    *  <code>
    *      echo miniShop::getCheckout();
    *  </code>
    *
    * @return string
    */
     public static function getCheckout(){
      return  View::factory('minishop/views/frontend/checkout')->display();
     }










    /**
    * Get Total
    *
    *  <code>
    *      echo miniShop::getTotal();
    *  </code>
    *
    * @return string
    */
     public static function getTotal(){
      return  View::factory('minishop/views/frontend/total')->display();
     }










    /**
    * Get Rating
    *
    *  <code>
    *      echo miniShop::raTing();
    *  </code>
    *
    * @return string
    */
     public static function raTing(){
        $rated = Request::get('rated');
        $id = Request::get('id');
        $url = Option::get('siteurl').minishop::$shop.'/shopitem?id='.$id;
        $table = new Table('miniShop');

        // Select content of this id
        $item = $table->select('[id='.$id.']',null);
        $lk = $item['hit'];
        $b  = $item['bad'];
        $g  = $item['good'];
        $vg = $item['veryGood'];
        $a  = $item['amazing'];
        // If get same id on cookie not show
        if(Cookie::get($item['id']) == $item['uid']){
          if(isset($rated)) {
            Notification::set('success', __('Sorry one vote for user', 'minishop'));
            Request::redirect($url);
          }
        }else{
          if(isset($rated)) {
            // Rating set
            if($rated == 'bd'){
              $table->updateWhere('[id='.$id.']',array('rating' => 'What is this..'));}
            else if ($rated == 'nb'){
              $table->updateWhere('[id='.$id.']',array('rating' => 'bad','hit' => ++$lk,'bad' => ++$b));}
            else if ($rated == 'go'){
              $table->updateWhere('[id='.$id.']',array('rating' => 'Good','hit' => ++$lk,'good' =>  ++$g));}
            else if ($rated == 'vg'){
              $table->updateWhere('[id='.$id.']',array('rating' => 'Very Good','hit' => ++$lk,'veryGood' =>  ++$vg));}
            else if ($rated == 'am'){
              $table->updateWhere('[id='.$id.']',array('rating' => 'Amazing','hit' => ++$lk,'amazing' => ++$a));}
            $table->select(null, 'all');
            // On rating set cookie
            Cookie::set($item['id'],$item['uid']);
            Notification::set('success', __('Thanks for rating ', 'minishop'));
            Request::redirect($url);
          }
        // Return (not echo) to view
        return Html::br().
			'<div id="rateMe" title="Rating">
				<a href="'.$url.'&rated=bd"onclick="rateIt(this)" id="_1" title="What is this.." onmouseover="rating(this)" onmouseout="off(this)"></a>
				<a href="'.$url.'&rated=nb"onclick="rateIt(this)" id="_2" title="Bad" onmouseover="rating(this)" onmouseout="off(this)"></a>
				<a href="'.$url.'&rated=go"onclick="rateIt(this)" id="_3" title="Good" onmouseover="rating(this)" onmouseout="off(this)"></a>
				<a href="'.$url.'&rated=vg"onclick="rateIt(this)" id="_4" title="Very good" onmouseover="rating(this)" onmouseout="off(this)"></a>
				<a href="'.$url.'&rated=am"onclick="rateIt(this)" id="_5" title="Amazing" onmouseover="rating(this)" onmouseout="off(this)"></a>
			</div>'.Html::nbsp(1).'
			<div id="rateStatus" class="label label-important">'.__('Rating this','minishop').'</div>
			<div id="ratingSaved">Saved!</div>';
      }
    }









    /**
    * Get Actions
    * Success or Cancel after pay
    *  <code>
    *      echo Minishop::getActions();
    *  </code>
    *
    * @return string
    */
    public static function getActions(){
        $get = Request::get('gt');
        $successTitle = __('Success','minishop');
        $successText =  Option::get('ms_success');
        $errorTitle = __('Canceled','minishop');
        $errorText = Option::get('ms_cancel');
        if (isset($get)) {
          // If get sc show success shop?gt=sc to view success
          if($get == 'sc'){
            return  View::factory('minishop/views/frontend/success')->assign('successTitle', $successTitle)->assign('successText', $successText)->display();
          // If get cn show cancel shop?gt=cn  to view cancel
          }else if ($get == 'cn') {
            return  View::factory('minishop/views/frontend/cancel')->assign('errorTitle', $errorTitle)->assign('errorText', $errorText)->display();
          }
        }

    }




}
