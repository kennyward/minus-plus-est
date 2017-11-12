<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Minus_Plus_Est
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
<?php if( get_field('vimeo_video') ): // only show video element if Vimeo ID present ?>
        <div class="item-video">
			<iframe id="item-video" class="lazyload" src="https://player.vimeo.com/video/<?php the_field('vimeo_video'); ?>?api=1&player_id=item-video&color=ffffff&byline=0&badge=0&portrait=0&title=0" width="880" height="494" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>
<?php endif; ?>
        <div class="item-images">
         
    <?php 
    $args = array( 'post_type' => 'attachment', 'numberposts' => 10, 'post_status' => 'any', 'orderby' => 'menu_order', 'post_parent' => $post->ID );
    $attachments = get_posts( $args );
    if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
            $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full' );
            echo '<figure><a class="open-viewer" href="';
            echo $image_attributes[0];
            echo '">';
            echo wp_get_attachment_image( $attachment->ID, 'item-image-huge' );
            echo '</a></figure>'; ?>
        <?php } ?>

    <?php } ?>         
         
            
         

        </div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php 
    		
            the_post_navigation(array(
                'prev_text'=>__('&larr; Previous project'),
                'next_text'=>__('Next project &rarr;'),
                //'in_same_term' => true,
                //'taxonomy' => 'category',
            ));
        ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
