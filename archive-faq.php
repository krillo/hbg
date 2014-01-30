<?php get_header(); ?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <?php if (have_posts()) : ?>
    <h1 >Vanliga frågor och svar</h1>
    <div class="panel-group" id="accordion">
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("panel panel-default"); ?>>
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse-post-<?php the_ID(); ?>">
                <?php $icon = get_field('icon') == 'exc' ? 'fa-exclamation' : 'fa-question'; ?>
                <i class="fa <?php echo $icon; ?> fa-lg"></i></span><?php the_title(); ?>
              </a>
            </h4>
          </div>
          <div id="collapse-post-<?php the_ID(); ?>" class="panel-collapse collapse">
            <div class="panel-body">
              <?php the_content(); ?><?php edit_post_link(); ?>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
      <?php if (function_exists('bootstrap3_pagination')) {
        bootstrap3_pagination();
      } ?>      
    </div>  
<?php else: ?>
    <div class="col-md-12">
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
<?php endif; ?>  
</div>  <!-- end container -->
<?php get_footer(); ?>