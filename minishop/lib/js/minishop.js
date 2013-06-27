/*
Author: Addam M. Driver
Date: 10/31/2006
*/

var sMax;var holder;var preSet;var rated;function rating(num){sMax=0;for(n=0;n<num.parentNode.childNodes.length;n++)if(num.parentNode.childNodes[n].nodeName=="A")sMax++;if(!rated){s=num.id.replace("_","");a=0;for(i=1;i<=sMax;i++)if(i<=s){document.getElementById("_"+i).className="on";document.getElementById("rateStatus").innerHTML=num.title;holder=a+1;a++}else document.getElementById("_"+i).className=""}}
function off(me){if(!rated)if(!preSet)for(i=1;i<=sMax;i++){document.getElementById("_"+i).className="";document.getElementById("rateStatus").innerHTML=me.parentNode.title}else{rating(preSet);document.getElementById("rateStatus").innerHTML=document.getElementById("ratingSaved").innerHTML}}function rateIt(me){if(!rated){document.getElementById("rateStatus").innerHTML=document.getElementById("ratingSaved").innerHTML+" :: "+me.title;preSet=me;rated=1;sendRate(me);rating(me)}};


/*
Show porcentage with stars
*/
(function($){
$.fn.stars = function() {return $(this).each(function() {$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));});}
$(function() {$('span.stars').stars();});
})(jQuery);


/*
* Author: Nakome
* Date: 27/06/2013
*/
;(function($){
  $(function(){

    $.js = function(el){
      return $('[data-js=' + el + ']');
    };

    /*
    *-------------------------------------
    * Data-text
    * Example:
    * <a data-js="img" data-img="image.jpg">get</a>
    *
    *-------------------------------------
    */
    $.js('img').on('click', function() {
      img = $(this).data('img');
      // Append data in div id data
      $('#data').html('<img src="'+ img +'"/>');
      // Show Modal
      $('#modal').modal();
    });

    /*
    *-------------------------------------
    * Data-text
    * Example:
    * <a data-js="text" data-text="hello world">get</a>
    *
    *-------------------------------------
    */
    $.js('text').on('click', function() {
      text = $(this).data('text');
      // Append data in div id data
      $('#data').html('<p>'+ text +'</p>');
      // Show Modal
      $('#modal').modal();
    });
  });
})(jQuery);

// Carousel
$(function(){$('#myNewitem').carousel({interval: 5000});});
