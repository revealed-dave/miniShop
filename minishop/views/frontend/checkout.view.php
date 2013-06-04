<?php
$html = '<div id="getCheckout">
          <a href="javascript:;" class="simpleCart_empty"><span class="trash"></span>'.Html::nbsp(2).'Empty</a>
          <a href="'.Option::get('siteurl').'shop/shopitems?v=ck" class="ms_checkout"><span class="pay"></span>'.Html::nbsp(2).'Checkout</a>
        </div>';
echo $html;
?>