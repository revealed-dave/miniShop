<?php
$html = '<div id="getInfo">
            <div class="product-Info">
              <span class="cart"></span>
              <span class="simpleCart_quantity"></span> items
              <a href="'.Option::get('siteurl').miniShop::$shop.'/shopitems" class="product-view">View cart</a>
            </div>
        </div>';
echo $html;
?>