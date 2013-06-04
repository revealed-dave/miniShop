<div class="modal">
    <div class="modal-header">
        <h3><?php echo $errorTitle;?></h3>
    </div>
    <div class="modal-body">
        <?php echo $errorText;?>
    </div>
    <div class="modal-footer">
        <a class="backTo" href="<?php echo Option::get('siteurl').miniShop::$shop;?>" >
            <span class="backTshop"></span><?php echo Html::nbsp(2).__('Back to the shop','minishop');?></a>
    </div>
</div>
