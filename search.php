<?php get_header(); ?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <div class="row" id="">
    <div class="col-md-3" id="nav-sidebar">
      <?php if (function_exists('pageHiearachy')) pageHiearachy(); ?>
    </div>
    <?php if (have_posts()) : ?>
      <div class="col-md-7">
        <h1><?php single_cat_title(); ?></h1>
        <?php while (have_posts()) : the_post(); ?>
          <div class="row">
            <article id="post-<?php the_ID(); ?>" class="col-md-12">
              <header>
                <h2><?php the_title(); ?></h2>
                <div class="pub-info"><i class="fa fa-calendar"></i><time pubdate="pubdate"><?php the_modified_date(); ?></time> | <?php the_category(', '); ?></div>
              </header>
              <div class="archive-content"><?php /* echo mb_substr(get_the_content(), 0, 400) . '...'; */ the_excerpt(); ?>
                <a href="<?php the_guid(); ?>"> Läs mer &raquo;</a>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
        <?php
        if (function_exists('bootstrap3_pagination')) {
          bootstrap3_pagination();
        }
        ?>        
      </div>
    <?php else: ?>
      <div class="row">
        <div class="col-md-7">
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        </div>
      </div>
    <?php endif; ?>  
    <div class="col-md-2" id="second-sidebar">
      tjoho
    </div> 
  </div>
</div>  <!-- end container -->
<?php get_footer(); ?>