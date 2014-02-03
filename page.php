<?php get_header();
?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <div class="col-md-3" id="nav-sidebar">
    <?php if (function_exists('pageHiearachy')) pageHiearachy(); ?>
  </div>
  
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="col-md-7">
        <?php include "snippets/notice.php"; ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("rep-article"); ?>>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </article>
        <div class="rep-updated">
          <span>Senast uppdaterad: </span>  <?php the_modified_date(); ?><br/>
          <span>Sidansvarig: </span>  <?php the_field('sidansvarig'); ?><br/>
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

  <div class="col-md-2" id="second-sidebar">
    tjoho
  </div>     
</div>  <!-- end container -->
<?php get_footer(); ?>