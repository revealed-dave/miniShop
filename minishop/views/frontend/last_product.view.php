<?php
      $html = '<div id="blockProduct">';
    if(count($last)>0) {   foreach ($last as $item){
         $html.= '<div class="ms_blockImage">
                    <a href="'.Option::get('siteurl').miniShop::$shop.'/shopitem?id='.$item['id'].'" title="'.$item['title'].'" >
                      <img class="item_tumb" src="'.Option::get('siteurl').'public/shop/large/'.$item['image1'].'">
                    </a>
                  </div>
                  <div class="ms_blockPrice">'.$item['price'].'</div>';}
      $html.= '</div>';

      echo $html;
    }else{ echo '<div id="blockProduct">'.__('Still not have products','minishop').'</div>';}
?>
