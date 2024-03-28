<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    
    <link href="<?php echo get_template_directory_uri(); ?>/css/fontawesome.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/brands.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/solid.css" rel="stylesheet" />
    <script defer src="https://analy.choe.vip/script.js" data-website-id="c70ef865-3fe3-4e9e-850d-55bc6fcdc0cd"></script>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header id="site-header" class="header-footer-group" role="banner">
        <div class="header-inner section-inner">
            <div class="header-titles-wrapper">
                <div class="header-titles">
                    <p class="site-title">
                        <?php bloginfo('name'); ?>
                    </p>
                </div>
                <div class="header-links">
                    <div class="header-links-item">
                        <a href="/">首页</a>
                    </div>
                    <?php
                    $pages = get_pages();
                    foreach ($pages as $page) {
                        $page_url = get_permalink($page->ID);
                        echo '<div  class="header-links-item"><a href="' . esc_url($page_url) . '">' . $page->post_title . '</a></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>
