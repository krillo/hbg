<?php
/**
 * Template Name: Förstasidan
 * @author Kristain Erendi
 * @subpackage Template
 */
include 'header-home.php';
?>
<div class="container">
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="row search-area-large">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Vad söker du?">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Sök!</button>
              </span>
            </div><!-- /input-group -->
        </div>
        <div class="col-md-4">&nbsp;</div>
      </div> 


      <div class="row">
        <div class="col-md-12">
          <!--?php include "snippets/fontawsome_dropdown.php"; ?-->
          <?php printPostsPerCat('aktuellt', 1, 250); ?>
        </div>  
      </div> 
      <div class="row" id="puff-container">
        <div class="col-md-3 ">
          <div class="puff" id="puff1">
            <img class="" alt="" src="<?php the_field('bild_1'); ?>" >
            <h3 class="less-top-margin"><?php the_field('rubrik1'); ?></h3>
            <p><?php echo mb_substr(get_field('text_1'), 0, 100) . '...'; ?></p><a href="<?php
            $post_obj = get_field('lank_1');
            echo $post_obj->guid;
            ?>">Läs mer...</a>
          </div>
        </div>  
        <div class="col-md-3">
          <div class="puff" id="puff2">
            <img class="" alt="" src="<?php the_field('bild_2'); ?>" >
            <p><?php echo mb_substr(get_field('text_2'), 0, 100) . '...'; ?></p><a href="<?php
            $post_obj = get_field('lank_2');
            echo $post_obj->guid;
            ?>">Läs mer...</a>
          </div>
        </div>  
        <div class="col-md-3">
          <div class="puff" id="puff3">
            <img class="" alt="" src="<?php the_field('bild_3'); ?>" >
            <p><?php echo mb_substr(get_field('text_3'), 0, 100) . '...'; ?></p><a href="<?php
            $post_obj = get_field('lank_3');
            echo $post_obj->guid;
            ?>">Läs mer...</a>
          </div>
        </div>  
        <div class="col-md-3">
          <div class="puff" id="puff4">
            <img class="" alt="" src="<?php the_field('bild_4'); ?>" >
            <p><?php echo mb_substr(get_field('text_4'), 0, 100) . '...'; ?></p><a href="<?php
            $post_obj = get_field('lank_4');
            echo $post_obj->guid;
            ?>">Läs mer...</a>
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

