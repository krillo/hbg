<?php get_header();
?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
      ?>
      <div class="row">
        <?php
        if (get_field('notice')) {
          include 'snippets/notice.php';
        }
        ?>
        <div class="col-md-12">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>

            <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">
              Popover on left
            </button>

            <script>
              jQuery(document).ready(function($) {
                $(function() {
                  $('#right').tooltip();
                  $("#left").tooltip({
                    placement: "left",
                    title: "tooltip on left"
                  });
                });

              });
            </script>



            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="right" id="right" title="" data-original-title="Tooltip on right">Tooltip on right</button>

            <button type="button" data-toggle="tooltip" id="left" class="btn btn-default">Tooltip on left</button>






          </article>
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

