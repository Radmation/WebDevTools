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


<nav id="top_bar" class="">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center" style="margin: 0;">
            <div class="col-4">
                <ul class="list-inline social_wrap">
                    <?php if (get_field('facebook_page_url', 'option')) : ?>
                        <li class="list-inline-item"><a target="_blank" href="<?php the_field('facebook_page_url', 'option'); ?>"><i
                                    class="fab fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php if (get_field('twitter_page_url', 'option')) : ?>
                        <li class="list-inline-item"><a target="_blank" href="<?php the_field('twitter_page_url', 'option'); ?>"><i class="fab fa-twitter"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_field('feedburner_rss_url', 'option')) : ?>
                        <li class="list-inline-item"><a target="_blank" href="<?php the_field('feedburner_rss_url', 'option'); ?>"><i
                                    class="fas fa-rss"></i></a></li>
                    <?php endif; ?>
                    <?php if (get_field('youtube_page_url', 'option')) : ?>
                        <li class="list-inline-item"><a target="_blank" href="<?php the_field('youtube_page_url', 'option'); ?>"><i class="fab fa-youtube"></i></a>
                        </li>
                    <?php endif; ?>
                    <?php if (get_field('instagram_page_url', 'option')) : ?>
                        <li class="list-inline-item"><a target="_blank" href="<?php the_field('instagram_page_url', 'option'); ?>"><i
                                    class="fab fa-instagram"></i></a></li>
                    <?php endif; ?>
                    <?php if (get_field('flickr_url', 'option')) : ?>
                        <li class="list-inline-item"><a target="_blank" href="<?php the_field('flickr_url', 'option'); ?>">
                                <i class="fab fa-flickr"></i>
                            </a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <ul class="list-inline text-right" id="top_links">
                    <?php if (have_rows('top_bar_links', 'option')): ?>
                        <?php while (have_rows('top_bar_links', 'option')): the_row();
                            // vars
                            $link_text = get_sub_field('link_text');
                            $link_url = get_sub_field('link_url');
                            ?>
                            <li class="list-inline-item">
                                <a class="bord_bottom" href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <li class="list-inline-item">
                        <a id="search_wrap_top" href="<?php the_field('search_page_url', 'option'); ?>"><i class="fas fa-search"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a id="donate_link" class="btn btn-primary"
                           href="<?php the_field('donate_link_url', 'option'); ?>"><?php the_field('donate_link_text', 'option'); ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<?php
$custom_logo = get_field('header_logo', 'option');
?>
<nav id="main_nav" class="navbar navbar-light bg-light navbar-expand-lg justify-content-between">

    <a class="navbar-brand" href="<?php echo home_url() ?>">
        <img src="<?php echo $custom_logo['url'] ;?>" alt="<?php echo $custom_logo['alt'] ;?>" class="img-fluid">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <?php
        wp_nav_menu( array(
            'theme_location'  => 'primary',
            'depth'           => 2,
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse',
            'menu_class'      => 'nav navbar-nav ml-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker()
        ) );
        ?>
    </div>
</nav>

<div id="popup_form"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo get_field('popup_form_button_cta', 'option'); ?></div>