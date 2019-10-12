<?php
/**
 *  Wordpress header
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Theme</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <?php wp_nav_menu(array('theme_location' => 'header', 'menu_class' => 'nav-menu', 'menu_id' => 'primary-menu')); ?>
    </header>
    
    
       
