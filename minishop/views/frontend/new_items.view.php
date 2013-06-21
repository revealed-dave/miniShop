<div id="shopProducts">
    <ul class="products clearfix">
        <?php
        $html = '';
        if(count($items)>0) foreach ($items as $item) {
            $html.='<li id="Themes-1" class="simpleCart_shelfItem product ef">
            <div class="padding-prod">
            <div class="ms_image">
            <a href="'.Option::get('siteurl').'shop/shopitem?id='.$item['id'].' " title="'.$item['title'].'">
            <img class="item_tumb" src="'.Option::get('siteurl').'/public/shop/large/'.$item['image1'].'">
            </a>
            </div>
            <h4>'.$item['title'].'</h4>
            <p class="desc-price">Price:<span class="item_price">'.$item['price'].'</span></p>
            </div><!--/.padding-prod -->
            <div class="ms_buttons">
            <a href="'.Option::get('siteurl').'shop/shopitem?id='.$item['id'].' "><i class="icon-eye-open"></i> View Details</a>
            </div>
            </li>';
        }
        echo $html;
        ?>
    </ul>
</div>
