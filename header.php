<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Minus_Plus_Est
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,600" rel="stylesheet">
    <?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
    	<div class="content-area">
    		<div class="site-branding">
<?php
the_custom_logo();
if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
<?php
endif;

$description = get_bloginfo( 'description', 'display' );
if ( $description || is_customize_preview() ) : ?>
	            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
<?php
endif; ?>
    		</div><!-- .site-branding -->
<?php if ( is_singular('portfolio') ) { ?>    		
    		<div class="item-info">
    <?php
    if ( is_singular() ) :
    	the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    	
    	<span><?php the_field( 'subtitle' ); ?></span>
    <?php else :
    	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    	
    	<span><?php the_field( 'subtitle' ); ?></span>
    <?php endif; ?>
                <p><?php the_field( 'about_text' ); ?></p>
                <ul>
                    <li>
                        <a href="<?php the_field( 'project_url' ); ?>"><?php the_field( 'project_url_text' ); ?></a>
                    </li>
                </ul>		
    		</div> 	
 <?php  } ?>   		
    	</div>	
	</header><!-- #masthead -->

	<div id="content" class="site-content">