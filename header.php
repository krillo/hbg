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
    <link rel="shortcut icon" href="http://getbootstrap.com/docs-assets/ico/favicon.png" >
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    
    
    
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?> >
    <?php include_once "bin/reptilo_overlay_feedback.php"; ?>
    <div id="hbg-top">
      <div class="container">
        <div id="hbg-top-text">
          <a href="" class="" data-toggle="modal" data-target="#myModal">Skicka in dina synpunkter och kommentarer</a>
        </div>
      </div>
    </div>

    <div class="container">
      <div id="hbg-logo-area">
        <img class="" alt="Helsingborgs logo" src="/wp-content/themes/helsingborg/img/hbg-logo.png" >
      </div>
    </div>

    <nav class="navbar navbar-default" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
            <?php bloginfo('name'); ?>
          </a>
        </div>

        <?php
        wp_nav_menu(array(
            'menu' => 'primary',
            'theme_location' => 'primary',
            'depth' => 2,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
            'menu_class' => 'nav navbar-nav',
            'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
            'walker' => new wp_bootstrap_navwalker())
        );
        ?>

        <form action="/" method="get" role="search" id="hbg-search">
          <label><span class="hidden">Sök</span> <input autocomplete="off" type="text" name="s" value="" accesskey="4" title="Fyll i sökord" tabindex="-1"></label>
          <button class="btn-search" tabindex="-1">Sök</button>
        </form>
      </div>
    </nav>
