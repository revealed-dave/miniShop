<div id="mainshop" class="clearfix">
    <?php if (Notification::get('success')) Alert::success(Notification::get('success')); ?>
    <?php
      echo  Html::br(2).
    '<div class="btn-group">'.
         Html::anchor( __('Back', 'minishop'),'index.php?id=minishop',array('class' => 'btn btn-small')).
    '</div>'.Html::br(2);
     ?>

    <!-- Filter -->
    <div class="input-prepend">
        <span class="add-on">Filter:</span>
        <input type="search" name="filt" id="Filter" placeholder="enter filter terms" onkeyup="filter(this, 'ProcessBody', '1')"  />
    </div>

    <table  id="miniShop"  class="table table-bordered">
    <thead>
        <tr>
            <th><?php echo __('Product','minishop'); ?></th>
            <th><?php echo __('Name','minishop'); ?></th>
            <th><?php echo __('Email','minishop'); ?></th>
            <th><?php echo __('Comment','minishop'); ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody  id="ProcessBody">
        <?php if (count($ts) > 0) foreach ($ts as $row) { ?>
                <tr>
                    <td><?php echo $row['ts_product']; ?></td>
                    <td><?php echo $row['ts_name']; ?></td>
                    <td><?php echo $row['ts_email']; ?></td>
                    <td><?php echo $row['ts_comment']; ?></td>

                <td>
                <div class="pull-right">
                    <div class="btn-group">
                        <?php echo
                            Html::anchor(__('Is spam', 'minishop'),
                                'index.php?id=minishop&action=comments&isSpam='.$row['id'],
                                array('class' => 'btn btn-small', 'onClick'=>'return confirmDelete(\''.
                                    __('Are you sure', 'minishop').'\')')).
                            Html::anchor(__('Delete', 'minishop'),
                                'index.php?id=minishop&action=comments&delComment='.$row['id'],
                                array('class' => 'btn btn-small', 'onClick'=>'return confirmDelete(\''.
                                    __('Are you sure', 'minishop').'\')'));
                        ?>
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
            // Get product
            &lt;?php echo miniShop::getProduct(); ?&gt;
            // Get products
            &lt;?php echo miniShop::getProducts(); ?&gt;
            // Get info
            &lt;?php echo miniShop::getInfo(); ?&gt;
            // Get Categories (tags)
            &lt;?php echo miniShop::getCategories(); ?&gt;
            // Get others categories
            &lt;?php echo miniShop::getOthers(); ?&gt;
            // Get Last comment
            &lt;?php echo miniShop::getLastComment(); ?&gt;
            // Get Quantity ( Table )
            &lt;?php echo miniShop::getQuantity(); ?&gt;
            // Get Total
            &lt;?php echo miniShop::getTotal(); ?&gt;
            // Get Checkout buttoms
            &lt;?php echo miniShop::getCheckout(); ?&gt;
        </code>
        <br>
        <h3><?php echo __('Shortcode','minishop');?></h3>
        <code>// Not for now</code>
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