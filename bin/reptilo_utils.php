<?php
/*
 * Description: The file contains functions commonly used by Reptilo 
 * Author: Kristian Erendi
 * Author URI: http://reptilo.se
 * Date: 2012-12-06
 * License: GNU General Public License version 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Version: 1.0
 */




add_action('wp_enqueue_scripts', 'reptilo_scripts');

/**
 * Enqueue some java scripts, only on front page
 * 
 * Author: Kristian Erendi 
 * URI: http://reptilo.se 
 * Date: 2013-10-22
 */
function reptilo_scripts() {
  wp_register_style('font_awesome', get_bloginfo('stylesheet_directory') . '/fonts/font-awesome/css/font-awesome.min.css', array(), '20120208', 'all');
  wp_enqueue_style('font_awesome');  


  
  //wp_register_style('custom-style', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css', array(), '20120208', 'all');
  //wp_enqueue_style('custom-style');
  //wp_register_style('feedback_form', get_bloginfo('stylesheet_directory') . '/hbg/feedback/form.css', array(), '20120208', 'all');
  //wp_enqueue_style('feedback_form');
//wp_register_style('feedback_window', get_bloginfo('stylesheet_directory') . '/hbg/feedback/window.css', array(), '20120208', 'all');
//wp_enqueue_style('feedback_window');


  //wp_register_style('hbg.css', get_bloginfo('stylesheet_directory') . '/hbg/css/hbg.css', array(), '20120208', 'all');
  //wp_enqueue_style('hbg.css');
  //wp_enqueue_script('jquery-ui', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js', array('jquery'));
  //wp_enqueue_script('jquery.placeholder', get_bloginfo('stylesheet_directory') . '/hbg/js/jquery.placeholder.js', array('jquery'));
}


        
function printPostsPerCat($category = 'aktuellt', $nbr = 1) {
  global $post;
  $args = array('category_name' => $category, 'posts_per_page' => $nbr);
  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    while ($loop->have_posts()) : $loop->the_post();
      $content = get_the_content();
      $title = get_the_title();
      $guid = get_the_guid();
      $readingbox .= <<<RB
<div class="reading-box-container" id="reading-box-container-1">
  <section class="reading-box tagline-shadow" style="background-color:#f6f6f6 !important;border-width:1px;border-color:#f6f6f6!important;border-left-width:3px !important;border-left-color:#d62a1e!important;border-style:solid;">
    <a href="$guid" target="" class="continue button large darkgray">LÄS MER HÄR</a>
    <h2>Aktuellt just nu: $title</h2>
    <p> $content </p>
    <a href="$guid" target="" class="continue mobile-button button large darkgray">LÄS MER HÄR</a>
  </section>
</div>
RB;
    endwhile;
  endif;
  wp_reset_query();
  echo $readingbox;
}