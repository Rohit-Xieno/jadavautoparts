<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>  >

<header id="main">
  <div id="header">
    <h1>
      <a href="<?php echo home_url(); ?>" title="Jadav Auto Exports"><img src="<?= get_template_directory_uri().'/assets/images/jae-logo.png' ?>" alt=""></a>
    </h1>
  </div>
  <div id="right_img"></div>
    <div id="menu">
      <?php
        wp_nav_menu( array(
          'menu'           => 'Main Menu', // Do not fall back to first non-empty menu.
          'theme_location' => 'Header Menu',

        ) );
      ?>
    </div>
</header><!-- end #main --><br clear="all" />
