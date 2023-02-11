<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name');?> | <?php bloginfo('description');?></title>

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/scss/main.css">
  <?php wp_head(); ?>
</head>
<body>
  <header id="header">
    <div class="header container">
      <a href="/" class="header-image_logo">
        <img src="https://www.olivas.digital/wp-content/themes/olivasdigital/dist/img/logotipo.svg" alt="logo-olivas_digital">
      </a>

      <nav class="header-menu-nav">
        <?php
          $args = [
            'menu' => 'Primary Menu',
            'container' => false
          ];
          wp_nav_menu( $args );
        ?>
      </nav>
    </div>
  </header>