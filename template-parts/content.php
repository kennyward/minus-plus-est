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
    $image_1 = get_field( 'image_1' );
    $image_2 = get_field( 'image_2' );
    $image_3 = get_field( 'image_3' );
    $image_4 = get_field( 'image_4' );
    $image_5 = get_field( 'image_5' );
    $image_6 = get_field( 'image_6' );
    $image_7 = get_field( 'image_7' );
    $image_8 = get_field( 'image_8' );
    $image_9 = get_field( 'image_9' );
    $image_10 = get_field( 'image_10' );
    ?>
<?php if ( $image_1 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_1, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_2 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_2, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_3 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_3, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_4 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_4, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_5 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_5, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_6 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_6, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_7 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_7, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_8 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_8, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_9 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_9, 'item-image-huge' ); ?>
</figure>
<?php } ?>            
<?php if ( $image_10 ) { ?>
<figure>
    <?php echo wp_get_attachment_image( $image_10, 'item-image-huge' ); ?>
</figure>
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
