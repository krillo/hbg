<?php get_header(); ?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <div class="row" id="">
    <div class="col-md-3" id="nav-sidebar">
      <?php if (function_exists('pageHiearachy')) pageHiearachy(); ?>
    </div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-md-7">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </article>
          <?php comments_template(); ?>
        </div>   
        <?php
      endwhile;
    else:
      ?>
      <div class="col-md-7">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      </div>
    <?php endif; ?>  
    <div class="col-md-2" id="second-sidebar">
      tjoho
    </div> 
  </div>
</div>  <!-- end container -->
<?php get_footer(); ?>