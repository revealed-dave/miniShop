<?php
      $html = '<div id="shopProducts">
                <ul class="products clearfix ">';
    if(count($items)>0) {   foreach ($items as $item){
         $html.= '<li id="'.$item['product'].'-'.$item['id'].'" class="simpleCart_shelfItem product anim ef">

                      <p class="item_name">'.$item['title'].'</p>
                      <div class="ms_image">
                        <a href="'.Option::get('siteurl').miniShop::$shop.'/shopitem?id='.$item['id'].'" title="'.$item['title'].'" >
                          <img class="item_tumb" src="'.Option::get('siteurl').'public/shop/large/'.$item['image1'].'">
                        </a>
                      </div>
                      <div class="ms_buttons"
                      <strong>Price:</strong>
                      <span class="item_price">'.Html::nbsp(2).$item['price'].'</span>
                      '.Html::nbsp().'
                      <a class="viewProduct" href="'.Option::get('siteurl').miniShop::$shop.'/shopitem?id='.$item['id'].'" ><span class="viewThis"></span>  View details</a>
                      </div>
                      </li>';}
      $html.= '</ul></div>';

      echo $html;
      echo $result;
      miniShop::getActions();
    }else{ echo '<div class="media">'.__('Still not have products','minishop').'</div>';}
?>
