
<?php
if (Page::Slug() == 'shopitems') {
echo'<script type="text/javascript">simpleCart({cartColumns: [{attr:"name",label:"'.__('Name','minishop').'"},{attr:"price",label:"'.__('Price','minishop').'",view: "currency"},{view:"input",attr:"quantity",label:"'.__('Qty','minishop').'"},{attr:"total",label:"'.__('Subtotal','minishop').'",view:"currency" },{view:"remove", text:"Remove",label:"'.__('Options','minishop').'"},{view:"image",attr:"tumb", label:"'.__('thubnail','minishop').'"}],cartStyle:"table",checkout:{type:"PayPal",email:"'.Option::get('ms_mail').'",method: "GET",success:"'.Option::get('siteurl').'shop?gt=cs",excludeFromCheckout:"thumb",cancel:"'.Option::get('siteurl').'shop?gt=cn"},currency:"'.Option::get('ms_currency').'",taxRate:'.Option::get('ms_tax').',taxShipping:false,afterAdd:function(){TINY.box.show({html:"'.Option::get('ms_afadd').'",animate:true,close:false,autohide:"2"})},checkoutFail:function(){TINY.box.show({html:"'.Option::get('ms_chkfail').'",animate:true,close:false,boxid:"error",autohide:"2"})}});</script>';
}else if (Page::Slug() == 'shop'){
  echo'<script type="text/javascript">simpleCart({afterAdd:function(){TINY.box.show({html:"'.Option::get('ms_afadd').'",animate:true,close:false,autohide:"2"})},checkoutFail:function(){TINY.box.show({html:"'.Option::get('ms_chkfail').'",animate:true,close:false,boxid:"error",autohide:"2"})},beforeCheckout:function(){TINY.box.show({html:"'.Option::get('ms_befchk').'",animate:true,close:false,autohide:"10"})},});
  </script>';
}else if (Page::Slug() == 'shopitem'){
  echo'<script type="text/javascript">simpleCart({afterAdd:function(){TINY.box.show({html:"'.Option::get('ms_afadd').'",animate:true,close:false,autohide:"2"})},checkoutFail:function(){TINY.box.show({html:"'.Option::get('ms_chkfail').'",animate:true,close:false,boxid:"error",autohide:"2"})},beforeCheckout:function(){TINY.box.show({html:"'.Option::get('ms_befchk').'",animate:true,close:false,autohide:"10"})},});
  </script>';
}


?>