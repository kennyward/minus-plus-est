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
      
    <?php          
        $customSubtitle = get_option('mpe_settings')['mpe_text_field_0'];
         if (empty($customSubtitle)) {} else { ?>
                <aside>
                    <h2><?php echo get_option('mpe_settings')['mpe_text_field_0']; ?></h2>
                    <p><?php echo get_option('mpe_settings')['mpe_textarea_field_1']; ?></p>
                </aside>
    <?php } ?>      
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
                            <a href="<?php echo get_option('mpe_settings')['mpe_text_field_2']; ?>"><?php echo str_replace( 'http://', '', get_option('mpe_settings')['mpe_text_field_3'] ); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo get_option('mpe_settings')['mpe_text_field_4']; ?>"><?php echo str_replace( 'http://', '', get_option('mpe_settings')['mpe_text_field_5'] ); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo get_option('mpe_settings')['mpe_text_field_6']; ?>"><?php echo str_replace( 'http://', '', get_option('mpe_settings')['mpe_text_field_7'] ); ?></a>
                        </li>
                    </ul>
                </nav>
            
            
            </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
