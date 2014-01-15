<?php
/**
 * Template Name: Förstasidan
 * This is a page
 *
 * @author Kristain Erendi
 * @subpackage Template
 */
include 'header-home.php';
?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs();?>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="row">
        <div class="col-md-12">
          <form action="/" method="get" role="search" id="hbg-search-large">
            <label><span class="hidden">Sök</span> <input autocomplete="off" type="text" name="s" value="" accesskey="4" title="Fyll i sökord" tabindex="-1"></label>
            <button class="btn-search" tabindex="-1">Sök</button>
          </form>
        </div>  
      </div> 
      <div class="row">
        <div class="col-md-12">
          <?php printPostsPerCat('aktuellt', 1); ?>
        </div>  
      </div> 
      <div class="row" id="puff-container">
        <div class="col-md-3 ">
          <div class="puff" id="puff1">
            <img class="" alt="" src="<?php the_field('bild_1'); ?>" >
            <p><?php the_field('text_1'); ?></p><a href="<?php $post_obj = get_field('lank_1'); echo $post_obj->guid;?>">Läs mer...</a>
          </div>
        </div>  
        <div class="col-md-3">
          <div class="puff" id="puff2">
            <img class="" alt="" src="<?php the_field('bild_2'); ?>" >
            <p><?php the_field('text_2'); ?></p><a href="<?php $post_obj = get_field('lank_2'); echo $post_obj->guid;?>">Läs mer...</a>
          </div>
        </div>  
        <div class="col-md-3">
          <div class="puff" id="puff3">
            <img class="" alt="" src="<?php the_field('bild_3'); ?>" >
            <p><?php the_field('text_3'); ?></p><a href="<?php $post_obj = get_field('lank_3'); echo $post_obj->guid;?>">Läs mer...</a>
          </div>
        </div>  
        <div class="col-md-3">
          <div class="puff" id="puff4">
            <img class="" alt="" src="<?php the_field('bild_4'); ?>" >
            <p><?php the_field('text_4'); ?></p><a href="<?php $post_obj = get_field('lank_4'); echo $post_obj->guid;?>">Läs mer...</a>
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

