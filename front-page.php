<?php
/**
 * The homepage file
 *
 * @package Minus_Plus_Est
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="portfolio-navigation">
                <aside>
                    <h2>Lorem ispum dolar</h2><?php  $theme_options = get_option( 'theme_option_name' ); $homepage_title_0 = $theme_options['homepage_title_0']; ?>
                    <p>Duis consequat consequat lorem eu pulvinar. Nullam hendrerit tortor augue, ut euismod eros facilisis ut. Duis posuere urna nec gravida ornare. Cras dignissim, odio at varius rutrum, lacus odio fringilla nisa.</p>
                </aside>
<?php

$custom_terms = get_terms('category');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'portfolio', // loop for portfolio items
    'posts_per_page' => 6, // only show the latest 6 posts from each category
        'tax_query' => array(
            array(
                'taxonomy' => 'category', // sort by category
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<nav class="'.$custom_term->slug.'">';
        echo '<h3>'.$custom_term->name.'</h3>';
        echo '<ul>';
        while($loop->have_posts()) : $loop->the_post();
            echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
        endwhile;
        echo '</ul>';
        echo '</nav>';        
     }
}
?>
                <a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>" class="view-all-items">View all</a>


                <nav class="other-links">
                    <h2>More</h2>
                    <ul>
                        <li>
                            <a href="#">Github</a>
                        </li>
                        <li>
                            <a href="#">Twitter</a>
                        </li>
                        <li>
                            <a href="#">Slack</a>
                        </li>
                    </ul>
                </nav>
            
            
            </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
