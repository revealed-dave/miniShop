<div id="sucessCheckout" class="modal">
    <div class="modal-header">
        <h3><?php echo $successTitle;?></h3>
    </div>
    <div class="modal-body">
        <?php echo $successText;?>
    </div>
    <div class="modal-footer">
        <a class="backTo" href="<?php echo Option::get('siteurl').miniShop::$shop;?>" >
            <span class="backTshop"></span><?php echo Html::nbsp(2).__('Back to the shop','minishop');?></a>
    </div>
</div>

<script>localStorage.removeItem('simpleCart_items');</script>