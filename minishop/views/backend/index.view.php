<div id="mainshop" class="clearfix">

    <div class="btn-group">
        <?php echo Html::anchor(__('Add product', 'minishop'), 'index.php?id=minishop&action=add',array('class' => 'btn btn-small'));?>
        <a href="#snippet" data-toggle="modal" class="btn btn-small"><?php echo __('Codes','minishop');?></a>
        <?php echo Html::anchor( __('Settings', 'minishop'),'index.php?id=minishop&action=Js',array('class' => 'btn btn-small')); ?>
        <?php echo Html::anchor( __('Photo settings', 'minishop'),'index.php?id=minishop&action=resize',array('class' => 'btn btn-small')); ?>
        <?php echo Html::anchor( __('Sellers', 'minishop'),'index.php?id=minishop&action=sales',array('class' => 'btn btn-small')); ?>
        <?php echo Html::anchor( __('Comments', 'minishop'),'index.php?id=minishop&action=comments',array('class' => 'btn btn-small')); ?>
    </div>
    <?php echo Html::br(2); ?>
    <?php if (Notification::get('success')) Alert::success(Notification::get('success')); ?>

    <!-- Filter -->
    <div class="input-prepend">
        <span class="add-on">Filter:</span>
        <input type="search" name="filt" id="Filter" placeholder="enter filter terms" onkeyup="filter(this, 'ProcessBody', '1')"  />
    </div>

    <table  id="miniShop"  class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo __('Image','minishop'); ?></th>
            <th><?php echo __('Product','minishop'); ?></th>
            <th class="hidden-phone"><?php echo __('Title','minishop'); ?></th>
            <th class="hidden-phone"><?php echo __('Price','minishop'); ?></th>
            <th><?php echo __('Description','minishop'); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody  id="ProcessBody">
        <?php if (count($ms) > 0) foreach ($ms as $row) { ?>
                <tr>
                    <td  class="image">
                        <img width="64" src="<?php echo Option::get('siteurl').'public/shop/small/'.$row['image1']; ?>" alt="<?php echo $row['title']; ?>"/>
                    </td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <?php
                            $str = $row['description'];
                            $count = preg_replace('[^\s]', '', $str);
                            if(strlen($count) > 200){echo Text::cut($count, 200 , '.....');}
                            else{echo $row['description'];};
                        ?>
                    </td>
                    <td></td>

                <td>
                <div class="pull-right">
                    <div class="btn-group">
            <?php echo Html::anchor(__('Edit', 'minishop'), 'index.php?id=minishop&action=edit&uid='.$row['uid'], array('class' => 'btn btn-small')); ?>
            <?php echo Html::anchor(__('Delete', 'minishop'), 'index.php?id=minishop&delProdct='.$row['id'], array('class' => 'btn btn-small', 'onClick'=>'return confirmDelete(\''.__('Are you sure', 'minishop').'\')')); ?>
                    </div>
                </div>
            </td>
         </tr>
        <?php } ?>
    </tbody>
    </table>
     <div id="pageNavPosition"></div>
</div>







<div class="modal fade hide" id="snippet">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3><?php echo __('minishop','minishop');?></h3>
    </div>
    <div class="modal-body">
        <h3><?php echo __('Php','minishop');?></h3>
        <code>
            // Get product  <br>
            &lt;?php echo miniShop::getProduct(); ?&gt;
            <br><br>
            // Get products  <br>
            &lt;?php echo miniShop::getProducts(); ?&gt;
            <br><br>
            // Get info (view items and go to ckeckout)<br>
            &lt;?php echo miniShop::getInfo(); ?&gt;
            <br><br>
            // Get categories (tags)  <br>
            &lt;?php echo miniShop::getCategories(); ?&gt;
            <br><br>
            // Get last comment  <br>
            &lt;?php echo miniShop::getLastComment(); ?&gt;
            <br><br>
            // Get quantity  <br>
            &lt;?php echo miniShop::getQuantity(); ?&gt;
            <br><br>
            // Get total  <br>
            &lt;?php echo miniShop::getTotal(); ?&gt;
            <br><br>
            // Get checkout buttoms  <br>
            &lt;?php echo miniShop::getCheckout(); ?&gt;
            <br><br>
            // Get new items  <br>
            &lt;?php echo miniShop::getNewItems(number or all); ?&gt;
            <br><br>
            // Get slide <br>
            &lt;?php echo miniShop::getSlide(); ?&gt;
            <br><br>
        </code>
        <br>
        <h3><?php echo __('Shortcode','minishop');?></h3>
        <code>Not yet</code>
    </div>
</div>



<!-- To prevend change others styles in admin theme -->
<style type="text/css" media="screen">
@media only screen and (max-width: 800px) {
.cf:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0;}* html .cf{zoom:1;}*:first-child+html .cf{zoom:1;}table{width:100%;border-collapse:collapse;border-spacing:0;}th,td{margin:0;vertical-align:top;}th{text-align:left;}table{display:block;position:relative;width:100%;}thead{display:block;float:left;}tbody{display:block;width:auto;position:relative;overflow-x:auto;white-space:nowrap;}thead tr{display:block;}th{display:block;text-align:right;}tbody tr{display:inline-block;vertical-align:top;}td{display:block;min-height:1.25em;text-align:left;}th{border-bottom:0;border-left:0;}td{border-left:0;border-right:0;border-bottom:0;}tbody tr{border-left:1px solid #babcbf;}th:last-child,td:last-child{border-bottom:1px solid #babcbf;}
}
</style>


<script type="text/javascript"><!--
    // Paginate function
    var pager = new Pager('miniShop', 5);
    pager.init();
    pager.showPageNav('pager', 'pageNavPosition');
    pager.showPage(1);
//--></script>