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
 */
function reptilo_scripts() {
  //wp_register_style('custom-style', 'http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css', array(), '20120208', 'all');
  //wp_enqueue_style('custom-style');
  //wp_register_style('feedback_form', get_bloginfo('stylesheet_directory') . '/hbg/feedback/form.css', array(), '20120208', 'all');
  //wp_enqueue_style('feedback_form');
  //wp_register_style('feedback_window', get_bloginfo('stylesheet_directory') . '/hbg/feedback/window.css', array(), '20120208', 'all');
  //wp_enqueue_style('feedback_window');
  //wp_register_style('hbg.css', get_bloginfo('stylesheet_directory') . '/hbg/css/hbg.css', array(), '20120208', 'all');
  //wp_enqueue_style('hbg.css');
  //wp_enqueue_script('jquery-ui', 'http://code.jquery.com/ui/1.10.3/jquery-ui.js', array('jquery'));
  wp_enqueue_script('jquery.placeholder', get_bloginfo('stylesheet_directory') . '/js/jquery.placeholder.js', array('jquery'));
}

/**
 * Shortcode for a tooltip
 * Use like this: 
 * [tooltip text="apa" tip="Vardagligt utryck för primater"]
 * 
 * This is not a standalone function, it has dependencies to:
 * 1. bootstrap.min.js
 * 2. reptilo.js for initialization 
 */
function rep_tooltip($atts) {
  extract(shortcode_atts(array(
      'text' => '',
      'tip' => '',
                  ), $atts));
  return '<a href="#" data-toggle="tooltip" class="rep-tooltip" title="' . $tip . '" data-placement="top">' . $text . '</a>';
}

add_shortcode('tooltip', 'rep_tooltip');

/**
 * Display posts from a category.
 * Bootstrap 3 style
 * 
 * @global type $post
 * @param type $category  - the slug
 * @param type $nbr - nbr of posts to show
 */
function printPostsPerCat($category = 'aktuellt', $nbr = 1, $nbrDigits = 100) {
  global $post;
  $args = array('category_name' => $category, 'posts_per_page' => $nbr);
  $loop = new WP_Query($args);
  if ($loop->have_posts()):
    while ($loop->have_posts()) : $loop->the_post();
      $content = mb_substr(get_the_content(), 0, $nbrDigits) . '...';
      $title = get_the_title();
      $guid = get_the_guid();
      $readingbox .= <<<RB
<div class="cat-container">
  <section>
    <h2>Aktuellt just nu: $title</h2>
    <p>$content</p>
    <a href="$guid" target="" class="btn btn-default btn-xs">Läs mer</a>
  </section>
</div>
RB;
    endwhile;
  endif;
  wp_reset_query();
  echo $readingbox;
}

/* * ** Reptilo feedback callback function *** */
add_action('wp_ajax_rep_feedback', 'rep_feedback_callback');
add_action('wp_ajax_nopriv_rep_feedback', 'rep_feedback_callback');

function rep_feedback_callback() {
  !empty($_REQUEST['pagename']) ? $pagename = addslashes($_REQUEST['pagename']) : $pagename = '';
  !empty($_REQUEST['guid']) ? $guid = addslashes($_REQUEST['guid']) : $guid = '';
  !empty($_REQUEST['type']) ? $type = addslashes($_REQUEST['type']) : $type = '';
  !empty($_REQUEST['msg']) ? $msg = addslashes($_REQUEST['msg']) : $msg = '';
  !empty($_REQUEST['email']) ? $email = addslashes($_REQUEST['email']) : $email = '';
//!empty($_REQUEST['to_email']) ? $to_email = addslashes($_REQUEST['to_email']) : $to_email = 'hravdelningen@helsingborg.se';
  !empty($_REQUEST['to_email']) ? $to_email = addslashes($_REQUEST['to_email']) : $to_email = 'krillo@gmail.com';

  $subject = "Feedback på intranätet";
  $message = <<<MSG
Feedback

Sidanamn: $pagename
Länk: $guid
Typ: $type
Email: $email
          
  
$msg

MSG;

  $success = wp_mail($to_email, $subject, $message);
  $response = json_encode(array('success' => $success, 'guid' => $guid));
  header('Cache-Control: no-cache, must-revalidate');
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
  header('Content-type: application/json');
  echo $response;
  die(); // this is required to return a proper result
}

/**
 * Custom post type - FAQ 
 */
function create_faq() {
  $labels = array(
      'name' => 'FAQ',
      'singular_name' => 'FAQ',
      'add_new' => 'Lägg till ny FAQ',
      'add_new_item' => 'Lägg till ny FAQ',
      'edit_item' => 'Redigera FAQ',
      'new_item' => 'Ny FAQ',
      'all_items' => 'Alla FAQn',
      'view_item' => 'Visa FAQ',
      'search_items' => 'Sök FAQ',
      'not_found' => 'Inga FAQn hittade',
      'not_found_in_trash' => 'Inga FAQn hittade i soptunnan',
      'parent_item_colon' => '',
      'menu_name' => 'FAQ'
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'faq'),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => null,
      'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt') //, 'comments' )
  );
  register_post_type('faq', $args);
}

add_action('init', 'create_faq');

