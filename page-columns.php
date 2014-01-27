<?php
/**
 * Template Name: Sida med kolumner
 * This is a page with max 5 tabs at the bottom
 *
 * @author Kristian Erendi
 */
//decide what number of columns to show and set the grids
$grid = 0;
if (get_field('rubrik2') != '') {
  $grid = 6;  //two cols
}
if (get_field('rubrik3') != '') {
  $grid = 4;  //three cols
}
if (get_field('rubrik4') != '') {
  $grid = 3;  //four cols
}
get_header();
?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="row">
        <div class="col-md-12">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </article>
        </div>
      </div>  
      <?php if ($grid != 0): ?>
        <div class="row top-buffer" id="column-container">
          <?php if (get_field('rubrik1')): ?>
            <div class="col-md-<?php echo $grid; ?>">
              <div class="column" id="col1">
                <h2><i class="fa fa-rocket"></i> <?php the_field('rubrik1'); ?></h2>
                <p><?php the_field('text1'); ?></p>
                <a href="<?php $post_obj = get_field('lank1'); echo $post_obj->guid;?>">Läs mer...</a>
              </div>
            </div>  
          <?php endif; ?>
          <?php if (get_field('rubrik2')): ?>
            <div class="col-md-<?php echo $grid; ?>">
              <div class="column" id="col2">
                <h2><i class="fa fa-rocket"></i> <?php the_field('rubrik2'); ?></h2>
                <p><?php the_field('text2'); ?></p>
                <a href="<?php $post_obj = get_field('lank2'); echo $post_obj->guid;?>">Läs mer...</a>
              </div>
            </div>    
          <?php endif; ?>
          <?php if (get_field('rubrik3')): ?>
            <div class="col-md-<?php echo $grid; ?>">
              <div class="column" id="col3">
                <h2><i class="fa fa-rocket"></i> <?php the_field('rubrik3'); ?></h2>
                <p><?php the_field('text3'); ?></p>
                <a href="<?php $post_obj = get_field('lank3'); echo $post_obj->guid;?>">Läs mer...</a>
              </div>
            </div>
          <?php endif; ?>
          <?php if (get_field('rubrik4')): ?>
            <div class="col-md-<?php echo $grid; ?>">
              <div class="column" id="col4">
                <h2><i class="fa fa-rocket"></i> <?php the_field('rubrik4'); ?></h2>
                <p><?php the_field('text4'); ?></p>
                <a href="<?php $post_obj = get_field('lank4'); echo $post_obj->guid;?>">Läs mer...</a>
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
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