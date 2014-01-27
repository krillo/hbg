<?php
/**
 * The Header for Theme Helsingborg.
 * WordPress theme based on Bootstrap 3.0.3, http://getbootstrap.com/
 *
 * @package WordPress
 * @subpackage Helsingborg intranet
 * @since 2013-12
 */
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png" -->
    <title><?php wp_title('|', true, 'right'); ?></title>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> > 
    <div id="hbg-top">
      <div class="container">
        <div id="hbg-logo-area">
          <img class="" alt="Helsingborgs logo" src="/wp-content/themes/helsingborg/img/hbg-logo.png" >
        </div>
        <div id="hbg-top-text">
          <?php the_field('text_top'); ?>
        </div>
      </div>
    </div>

