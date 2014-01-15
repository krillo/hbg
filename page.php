<?php get_header();
?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();?>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="row">
        <div class="col-md-12">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php edit_post_link(); ?>
            <i class="fa fa-lightbulb-o fa-3x"></i> fa-camera-retro
          </article>
        </div>  
      </div>  
    <?php endwhile;
  else: ?>
    <div class="span12">  
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
<?php endif; ?>  
</div>  <!-- end container -->
<?php get_footer(); ?>

