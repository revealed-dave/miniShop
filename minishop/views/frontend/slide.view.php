<div id="myNewitem" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        if(count($items) > 0)
            foreach ($items as $item) {
                $html = '<div class="item active">
                <div class="carousel-caption">
                <h3><a href="shop/shopitem?id='.$item['id'].'">'.$item['title'].'</a></h3>
                <p>'.$item['description'].'</p>
                </div>
                <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image1'].'">
                </div>

                <div class="item">
                <div class="carousel-caption">
                <h3><a href="shop/shopitem?id='.$item['id'].'">'.$item['title'].'</a></h3>
                <p>'.$item['description'].'</p>
                </div>
                <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image2'].'">
                </div>

                <div class="item">
                <div class="carousel-caption">
                <h3><a href="shop/shopitem?id='.$item['id'].'">'.$item['title'].'</a></h3>
                <p>'.$item['description'].'</p>
                </div>
                <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image3'].'">
                </div>

                <div class="item">
                <div class="carousel-caption">
                <h3><a href="shop/shopitem?id='.$item['id'].'">'.$item['title'].'</a></h3>
                <p>'.$item['description'].'</p>
                </div>
                <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image4'].'">
                </div>';
            }
            echo $html;
            ?>
    </div><!--/.carousel-inner -->
</div>

