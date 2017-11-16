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

$images = array();
for($x = 1; $x <= 10; $x++) { 
    $img = get_field('image_' . $x);
    if($img) {
        $fullsize_image = wp_get_attachment_image_src($img, 'full');
        ?>
        
            <figure>
                <a href="<?php echo $fullsize_image[0]; ?>" class="open-viewer">
                    <?php echo wp_get_attachment_image($img, 'item-image-huge'); ?>
                </a>
            </figure>
        <?php
    }
}
    
?>

        </div>



<?php if( get_field('item_text') ): // only show video element if Vimeo ID present ?>
        <div class="item-text">
            <?php the_field('item_text'); ?>
        </div>
<?php endif; ?>
            

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
