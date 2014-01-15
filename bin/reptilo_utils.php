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