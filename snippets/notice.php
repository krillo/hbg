<?php 
$type = get_field('notice_type');
$text = get_field('notice');
$link = '';
if (get_field('notice_link')){
  $post_obj = get_field('notice_link');
  $link = '<a class="alert-link" target="_blank" href="'.$post_obj->guid.'" title="'.$post_obj->post_title.'">'.$post_obj->post_title.'</a>';
}
?>
<?php if($type == 'info'): ?>
<div class="alert alert-warning"><i class="fa fa-info-circle"></i> <?php echo $text. ' '.$link; ?></div>
<?php elseif($type == 'warning'): ?>
<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> <?php echo $text. ' '.$link; ?></div>
<?php endif; ?>