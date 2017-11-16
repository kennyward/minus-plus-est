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
        
    // args    
    $sizeFull = 'full'; // full size image
    $sizeHuge = 'item-image-huge'; // scaled image
    

    
    
    $images = array(); // img array
    
    
    
    for($x = 1; $x <= 10; $x++) { 
        
            $img = get_field('image_' . $x);
            $image_array = wp_get_attachment_image_src($img, $sizeFull);
            $link = $image_array[0];                
    
       if($img) {
           
            $images[] = $img; 
                 
       } else {
           
            break;
            
       }
       
     }
    
     ?>

    <?php foreach($images as $image) { ?>
    
            <figure>
                <a href="<?php echo $link; ?>" class="open-viewer">
                    <?php echo wp_get_attachment_image( $image, $sizeHuge ); ?>
                </a>
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
