<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('&raquo;', 'true', 'right'); ?><?php if (is_single()) { ?> Blog Archive &raquo; <?php } ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?= get_bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <?php wp_head(); ?>
</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<nav id="main_nav" class="navbar navbar-default" role="navigation">
    <div class="container-fluid">

        <div class="row">
            
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="<?php bloginfo('wpurl'); ?>">
                    <img alt="<?php bloginfo('name'); ?>" src="<?php echo get_field('logo', 'option')['url']; ?>" class="desktop_logo img-responsive">
                </a>
            </div>




            <?php
            wp_nav_menu(array(
                    'menu' => 'Primary Menu',
                    'theme_location' => 'primary',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'bs-example-navbar-collapse-1',
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                    'walker' => new wp_bootstrap_navwalker())
            );
            ?>
          
        </div>
    </div>
</nav>

<div id="popup_form"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo get_field('popup_form_button_cta', 'option'); ?></div>