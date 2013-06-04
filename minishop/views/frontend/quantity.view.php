<?php
$html = '<div id="getQuantity">
          <a class="backTo" href="'.Option::get('siteurl').miniShop::$shop.'" >
            <span class="backTshop"></span>'.Html::nbsp(2).'Back to the shop
          </a>
        '.Html::br(2).'
          <div id="checkCart">
                  <div class="checkCart">
                      <h3><span class="simpleCart_quantity"></span> items</h3>
                      <div class="simpleCart_items" ></div>
                      <br>
                  </div>
              </div>
        </div>';
echo $html;
?>