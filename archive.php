<?php get_header(); ?>
<div class="container">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <?php if (have_posts()) : ?>
    <div class="row" id="">
      <div class="col-md-12">
        <h1><?php single_cat_title(); ?></h1>
      </div>   
    </div>   
    <?php while (have_posts()) : the_post(); ?>
      <div class="row">
        <article id="post-<?php the_ID(); ?>" class="col-md-12">
          <header>
            <h2><?php the_title(); ?></h2>
            <div class="pub-info"><i class="fa fa-calendar"></i><time pubdate="pubdate"><?php the_modified_date(); ?></time> | <?php single_cat_title(); ?></div>
          </header>
          <p><?php echo mb_substr(get_the_content(), 0, 400) . '...'; ?>
            <a href="<?php
            $post_obj = get_field('lank_1');
            echo $post_obj->guid;
            ?>"> Läs mer &raquo;</a>
          </p>
        </article>
      </div>
    <?php endwhile; ?>
    <?php
    if (function_exists('bootstrap3_pagination')) {
      bootstrap3_pagination();
    }
    ?>        
  <?php else: ?>
    <div class="row">
      <div class="col-md-12">
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      </div>
    </div>
  <?php endif; ?>  
</div>  <!-- end container -->
<?php get_footer(); ?>