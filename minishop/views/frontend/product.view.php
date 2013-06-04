 <?php

 if (Notification::get('success')) Alert::success(Notification::get('success'));

  function percentage($val1, $val2){
    if(!$val2 == 0){
      $res = round( ($val1 / $val2) * 100);
      $rating = substr($res, 0 , 1);
      return $rating;
    }
  }

  if(count($items)>0)

    foreach ($items as $item) {

    $html ='<div id="shopProduct" class="simpleCart_shelfItem media anim ef clearfix">
              <a class="backTo" href="javascript:history.back();" >
                <span class="backTshop"></span>'.Html::nbsp(2).'Back
              </a>
                  <ul class="inline pull-right">
                    <li><b>'.__('Share on','minishop').':</b></li>
                    <li>
                        <a  href="https://www.facebook.com/sharer/sharer.php?s=100&amp;p[url]='.Site::url().'shop/shopitem?id='.$item['id'].'&amp;p[images][0]='.Site::url().'public/shop/large/'.$item['image1'].'&amp;p[title]='.Text::ampEncode($item['title']).'&amp;p[summary]='.Text::ampEncode(__('Only for','minishop').' '.$item['price']).'" target="_blank">Facebook</a>
                      </li>
                      <li>
                        <a target="_blank" class="" href="http://twitter.com/share?text='.Text::ampEncode($item['title'].'  '.__('Only for','minishop').' '.$item['price']).'   '.__('From','minishop').'">Twitter</a>
                      </li>
                  </ul>
              '.Html::br(2).'
              <div class="row-fluid">
              <div class="span8">
                <div class="well-small">
                  <div class="ms_large">
                    <a  href="javascrip:void(0);" title="'.$item['title'].'" >
                      <img onclick="showMe();" id="image" class="item_tumb media-object" src="'.Option::get('siteurl').'public/shop/large/'.$item['image1'].'" width="100%">
                    </a>
                  </div>
                  '.Html::br(1).'
                  <div class="ms_tumbs thumbnails">
                    <ul>
                      <li><a href="javascript:;">
                      <img onclick="changeImage(this);" class="miniTumb thumbnail" src="'.Option::get('siteurl').'public/shop/small/'.$item['image1'].'"></a></li>
                      <li><a href="javascript:;">
                      <img onclick="changeImage(this);" class="miniTumb thumbnail" src="'.Option::get('siteurl').'public/shop/small/'.$item['image2'].'"></a></li>
                      <li><a href="javascript:;">
                      <img onclick="changeImage(this);" class="miniTumb thumbnail" src="'.Option::get('siteurl').'public/shop/small/'.$item['image3'].'"></a></li>
                      <li><a href="javascript:;">
                      <img onclick="changeImage(this);" class="miniTumb thumbnail" src="'.Option::get('siteurl').'public/shop/small/'.$item['image4'].'"></a></li>
                    </ul>
                  </div>
                </div>
              </div>


              <div class="span4">
                <div class="well-small">
                  <h4 class="media-heading item_name">'.$item['title'].'</h4>
                  '.Html::br().'
                  <ul class="shopOptions">
                    <li> <strong>Category:  </strong>'.Html::nbsp().'<span class="">'.$item['product'].'</span></li>
                    <li> <strong>Price:  </strong><span class="item_price">'.$item['price'].'</span></li>
                    <li> <strong>Stock:  </strong><span class="">'.$item['stock'].'</span></li>
                    <li> <strong>Size:  </strong><span class="">'.$item['size'].'</span></li>
                    <li> <strong>Color:  </strong><span class="">'.$item['color'].'</span></li>
                    <li><h5>'.__('Rating of users','minishop').'</h5></li>
                    <li><strong>Bad: </strong><span class="stars">'.percentage($item['bad'],$item['hit']).'</span></li>
                    <li><strong>Good: </strong><span class="stars">'.percentage($item['good'],$item['hit']).'</span></li>
                    <li><strong>Very good: </strong><span class="stars">'.percentage($item['veryGood'],$item['hit']).'</span></li>
                    <li><strong>Amazing: </strong><span class="stars">'.percentage($item['amazing'],$item['hit']).'</span></li>
                    <li>'.miniShop::raTing().Html::nbsp(2).'</li>
                    <li>
                    <a href="javascript:;" class="viewProduct item_add" title="Add to cart">
                    <span class="pay"></span>'.Html::nbsp(2).'Add to cart</a>
                    </li>


                  </ul>

                </div>
              </div>

            </div>
            <div class="clearfix"></div>

            <ul class="nav nav-tabs">
              <li class="active"><a href="#descripttion" data-toggle="tab">'.__('Description','minishop').'</a></li>
              <li><a href="#comments" data-toggle="tab">'.__('Comments','minishop').'</a></li>
              <li><a href="#newComment" data-toggle="tab">'.__('New comment','minishop').'</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="descripttion">'.Html::br().$item['description'].'</div>
              <div class="tab-pane" id="comments">'.Html::br();


    if(count($test) > 0) {
      foreach ($test as $t) {
      $html.='<div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://www.gravatar.com/avatar/'.md5(strtolower($t['ts_gravatar'])).'?s=40"/>
                </a>
                <div class="media-body borderComment">
                  <b class="media-heading">'.$t['ts_name'].Html::nbsp(2).$t['ts_date'].'</b>
                  <p>'.$t['ts_comment'].'</p>
                  <p><b>'.__('Rating','minishop').':</b>'
                  .Html::nbsp(2).'<span class="stars">'.$t['ts_rating'].'</span></p>
              </div>
            </div>';
      };
    }else{ $html.= '<div class="media">'.__('No product reviews','minishop').'</div>';}


          $html .= '</div><div class="tab-pane" id="newComment">'.Html::br().

              Form::open(null ,array('id' =>'ts_form','class' => 'form-horizontal')).
              Form::hidden('ts_product',$id).

              '<div class="control-group">'.
                Form::label('ts_name',__('Name', 'minishop'),array('class'=>'control-label')).
                '<div class="controls">'.
                  Form::input('ts_name','',array('class','span4')).
                '</div>
              </div>'.


              '<div class="control-group">'.
                Form::label('ts_email',__('Email','minishop'),array('class'=>'control-label')).
                '<div class="controls">'.
                Form::input('ts_email','',array('class','span4')).Html::nbsp(2).
                '<span id="ts_error" style="display:none"><br> Error empty fields or wrong email</span>'.
                '</div>
              </div>'.


              '<div class="control-group">'.
                '<span class="control-label">'.__('Your opinion','minishop').':</span>'.
                '<div class="controls">'.
                  '<span class="rating">'.
                      Form::checkbox('r_5',null,false,array('class'=>'rating-input')).
                      Form::label('r_5',null,array('class'=>'rating-star')).
                      Form::checkbox('r_4',null,false,array('class'=>'rating-input')).
                      Form::label('r_4',null,array('class'=>'rating-star')).
                      Form::checkbox('r_3',null,false,array('class'=>'rating-input')).
                      Form::label('r_3',null,array('class'=>'rating-star')).
                      Form::checkbox('r_2',null,false,array('class'=>'rating-input')).
                      Form::label('r_2',null,array('class'=>'rating-star')).
                      Form::checkbox('r_1',null,false,array('class'=>'rating-input')).
                      Form::label('r_1',null,array('class'=>'rating-star')).
                  '</span>
                </div>
              </div>

              <div class="control-group">
              '.Form::label(null,__('Maximum characters:','minishop'),array('class'=>'control-label')).'
                <div class="controls">
                  <input readonly class="counterComment" type="text" name="count" value="200">
                </div>
              </div>

              <div class="control-group">'.
                Form::label('ts_comment',__('Comments','minishop'),array('class'=>'control-label')).
                '<div class="controls">'.
                  Form::textarea('ts_comment','',array(
                    'rows'=>'5',
                    'class'=>'span4',
                    'onKeyDown' => 'return countText(this.form.ts_comment,this.form.count,200);',
                    'onKeyUp' => 'return countText(this.form.ts_comment,this.form.count,200);'
                    )).
                '</div>
              </div>'.


              '<div class="control-group">'.
                '<div class="controls">'.
                  '<label class="checkbox">'.
                    Form::checkbox('imnotarobot').__('Check if are not a robot','minishop').
                  '</label>'.
                  Form::hidden('ts_comentFor',$item['title']).
                  Form::hidden('csrf', Security::token()).
                  Form::submit('ts_send',__('Save', 'minishop'), array('class' => 'btn','onclick' => 'valComment();')).
                '</div>'.
              '</div>'.
              Form::close().
            '</div>
          </div>
        </div>';

    }

    echo $html;
?>


<script>
var thisForm = document.getElementById('ts_form');
if(thisForm){thisForm.onsubmit = function(){return valComment();}};

function changeImage(img) {
    var link = document.getElementById("image");
    link.src =  img.src.replace('small', 'large');
}

function showMe() {
    var img = document.getElementById("image");
    return TINY.box.show({html:'<img src="'+img.src+'"/>',animate:true,close:true})
}


function countText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
      limitField.value = limitField.value.substring(0, limitNum);
  } else {
      limitCount.value = limitNum - limitField.value.length;
  }
}

function valComment(){
    var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var error = document.getElementById('ts_error');
    var thisEmail = document.getElementById('ts_email');
    if (reg.test(thisEmail.value) == '') {thisEmail.focus();error.style.display='inline-block';return false;}
    return true;
}
</script>



