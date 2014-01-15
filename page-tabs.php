<?php
/**
 * Template Name: Sida med tabbar
 * This is a page with max 5 tabs at the bottom
 *
 * @author Kristian Erendi
 * @subpackage Template
 */
get_header();
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
          </article>

          <div class="row top-buffer">
            <div class="col-md-12">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <?php if (get_field('rubrik1')): ?><li  class="active"><a href="#tabs-1" data-toggle="tab"><?php the_field('rubrik1'); ?> <span class="glyphicon glyphicon-chevron-right"></span></a></li><?php endif; ?>
                <?php if (get_field('rubrik2')): ?><li><a href="#tabs-2" data-toggle="tab"><?php the_field('rubrik2'); ?> <span class="glyphicon glyphicon-chevron-right"></span></a></li><?php endif; ?>
                <?php if (get_field('rubrik3')): ?><li><a href="#tabs-3" data-toggle="tab"><?php the_field('rubrik3'); ?> <span class="glyphicon glyphicon-chevron-right"></span></a></li><?php endif; ?>
                <?php if (get_field('rubrik4')): ?><li><a href="#tabs-4" data-toggle="tab"><?php the_field('rubrik4'); ?> <span class="glyphicon glyphicon-chevron-right"></span></a></li><?php endif; ?>
                <?php if (get_field('rubrik5')): ?><li><a href="#tabs-5" data-toggle="tab"><?php the_field('rubrik5'); ?> <span class="glyphicon glyphicon-chevron-right"></span></a></li><?php endif; ?>                
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <?php if (get_field('rubrik1')): ?>
                  <div id="tabs-1" class="tab-pane fade in active">
                    <p><?php the_field('text1'); ?></p>
                  </div>
                <?php endif; ?>
                <?php if (get_field('rubrik2')): ?>
                  <div id="tabs-2" class="tab-pane fade">
                    <p><?php the_field('text2'); ?></p>
                  </div>
                <?php endif; ?>
                <?php if (get_field('rubrik3')): ?>
                  <div id="tabs-3" class="tab-pane fade">
                    <p><?php the_field('text3'); ?></p>
                  </div>
                <?php endif; ?>
                <?php if (get_field('rubrik4')): ?>
                  <div id="tabs-4" class="tab-pane fade">
                    <p><?php the_field('text4'); ?></p>
                  </div>
                <?php endif; ?>
                <?php if (get_field('rubrik5')): ?>
                  <div id="tabs-5" class="tab-pane fade">
                    <p><?php the_field('text5'); ?></p>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>

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