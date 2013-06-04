<ul class="nav inline">
<?php if($tags > 0){
  foreach($tags as $tag) { ?>
    <li><a class="label label-important" href="<?php echo $url.$tag;?>" ><?php echo $tag; ?> </a></li>
<?php }}else{echo __('No tags yet','minishop');}?>
</ul>