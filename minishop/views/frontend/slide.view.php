<div id="myCarousel" class="carousel slide">
    <div class="carousel-inner">
        <?php
        
        if(count($items) > 0)
        
        foreach ($items as $item) {

            $html = '<div class="item active">
            <div class="carousel-caption">
            <h1><a href="#fakelink">'.$item['title'].'</a></h1>
            </div>
            <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image1'].'">
            </div>

            <div class="item">
            <div class="carousel-caption">
            <h1><a href="#fakelink">'.$item['title'].'</a></h1>
            </div>
            <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image2'].'">
            </div>

            <div class="item">
            <div class="carousel-caption">
            <h1><a href="#fakelink">'.$item['title'].'</a></h1>
            </div>
            <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image3'].'">
            </div>

            <div class="item">
            <div class="carousel-caption">
            <h1><a href="#fakelink">'.$item['title'].'</a></h1>
            </div>
            <img src="'.Option::get('siteurl').'public/shop/large/'.$item['image4'].'">
            </div>';
        }
        echo $html;
        ?>


    </div><!--/.carousel-inner -->
    <nav>
        <ul class="menu-control">
            <li><a href="#myCarousel" data-slide="prev"><i class="icon-chevron-left"></i></a></li>
            <li><a href="#myCarousel" data-slide="next"><i class="icon-chevron-right"></i></a></li>
        </ul>
    </nav>
</div>
