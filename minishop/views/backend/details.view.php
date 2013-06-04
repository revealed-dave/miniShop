<?php echo  '<div class="btn-group">'.
                Html::anchor( __('Back', 'minishop'),'index.php?id=minishop&action=sales',array('class' => 'btn btn-small')).
            '</div>'.Html::br(2);
?>

<?php if (count($details) > 0) foreach ($details as $detail) { ?>
  <h3><?php echo __('Contact details of :name','minishop',array('name' => Html::nbsp(2).$detail['s_name']));?></h3>
  <p><b> <?php echo __('Name','minishop'); ?>: </b> <?php echo $detail['s_name'];?> </p>
  <p><b> <?php echo __('Email','minishop'); ?>: </b> <?php echo $detail['s_email'];?> </p>
  <p><b> <?php echo __('Adress 1','minishop'); ?>: </b> <?php echo $detail['s_adress1'];?> </p>
  <p><b> <?php echo __('Adress 2','minishop'); ?>: </b> <?php echo $detail['s_adress2'];?> </p>
  <p><b> <?php echo __('Locality','minishop'); ?>: </b> <?php echo $detail['s_locality'];?> </p>
  <p><b> <?php echo __('Country','minishop'); ?>: </b> <?php echo $detail['s_country'];?> </p>
  <p><b> <?php echo __('Phone','minishop'); ?>: </b> <?php echo $detail['s_phone'];?> </p>
  <p><b> <?php echo __('Comments','minishop'); ?>: </b> <?php echo Html::br().$detail['s_comments'];?> </p>
  <p><b> <?php echo __('Items purchased','minishop'); ?>: </b> <?php echo $detail['s_purchased'];?> </p>
  <p><b> <?php echo __('Total','minishop'); ?>: </b> <?php echo $detail['s_total'];?> </p>
  <p><b> <?php echo __('State','minishop'); ?>: </b> <?php echo $detail['s_pstate'];?> </p>
<?php } ?>