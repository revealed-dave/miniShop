<?php
  if(count($testimonial)>0){
    $data = '';
    foreach ($testimonial as $t) {
      $data .= '<div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://www.gravatar.com/avatar/'.md5(strtolower($t['ts_gravatar'])).'?s=40"/>
                </a>
                <div class="media-body">
                  <b class="media-heading">'.$t['ts_name'].Html::nbsp(2).$t['ts_date'].'</b>
                  <p>'.$t['ts_comment'].'</p>
                  <small><b>'.__('Comment for','minishop').':</b>'.Html::nbsp(2).
                    '<a href="'.Option::get('siteurl').miniShop::$shop.'/shopitem?id='.$t['ts_product'].'"
                        title="'.$t['ts_comentFor'].'" >'.$t['ts_comentFor'].'</a>
                  </small>'.Html::br().'
                  <small><b>'.__('Rating','minishop').':</b></small>'.Html::nbsp(2).'<span class="stars">'.$t['ts_rating'].'</span>
              </div>
            </div>';
    };
    echo $data;
  }else{ echo '<div class="media">'.__('Still no product reviews','minishop').'</div>';}
?>