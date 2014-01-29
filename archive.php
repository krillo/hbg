<?php get_header(); ?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <?php if (have_posts()) : ?>
    <div class="row" id="">
      <div class="col-md-12">
        <?php single_cat_title(); ?>
      </div>   
    </div>   
    <?php while (have_posts()) : the_post(); ?>
      <div class="row">
        <article id="post-<?php the_ID(); ?>" class="col-md-12">
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        </article>
      </div>
    <?php endwhile; ?>
    <?php if (function_exists('bootstrap3_pagination')) {bootstrap3_pagination();} ?>        
    <?php else: ?>
    <div class="row">
      <div class="col-md-12">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      </div>
    </div>
  <?php endif; ?>  
</div>  <!-- end container -->
<?php get_footer(); ?>