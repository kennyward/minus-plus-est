<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Minus_Plus_Est
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main portfolio-archive-page">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">All <?php echo post_type_archive_title( '', false ); ?> Items</h1>
			</header><!-- .page-header -->

			<?php
            echo '<ul>';    			
			/* Start the Loop */
			while ( have_posts() ) : the_post();

            echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';

			endwhile;
			
            echo '</ul>';
            
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
