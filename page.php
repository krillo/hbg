<?php get_header();
?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="row">
        <div class="col-md-12">
          <?php include "snippets/notice.php"; ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </article>
        </div>  
      </div>
      <div class="row">
        <div class="col-md-12 rep-uppdated">
          <span class="">Senast uppdaterad:</span>  <?php the_modified_date(); ?><br/>
          <span class="">Sidansvarig:</span>  <?php the_field('sidansvarig'); ?><br/>
        </div>
      </div>
      <?php
    endwhile;
  else:
    ?>
    <div class="span12">  
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
  <?php endif; ?>  
</div>  <!-- end container -->
<?php get_footer(); ?>