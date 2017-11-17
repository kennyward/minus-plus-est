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
                    	<header>
                <?php if( get_field('vimeo_video') ): // only show video element if Vimeo ID present ?>
                            <div class="item-video">
                    			<iframe id="item-video" class="lazyload" src="https://player.vimeo.com/video/<?php the_field('vimeo_video'); ?>?api=1&player_id=item-video&color=ffffff&byline=0&badge=0&portrait=0&title=0" width="880" height="494" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                            </div>
                <?php endif; ?>
                <?php if ( has_post_thumbnail() ) { ?>
                
                            <figure>
                <?php 
                // check orientation of the_post_thumbnail  
                $post_thumbnail_id = get_post_thumbnail_id();
                $imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
                if ($imgmeta['width'] > $imgmeta['height']) {
                    echo the_post_thumbnail('item-image-huge', array('class' => 'lead-image landscape'));
                } else {
                    echo the_post_thumbnail('item-image-huge', array('class' => 'lead-image portrait'));
                }      
                ?>
                
                            </figure>
                <?php } ?>
                <?php if( get_field('article_text') ): // only show intro if present ?>
                
                            <div class="item-text">
                                <?php the_field('article_text'); ?>
                            </div>
                <?php endif; ?>     
                    	</header>
                
                        <div class="item-images">
                <?php
                // loop through portfolio item images
                $images = array();
                for($x = 1; $x <= 10; $x++) { 
                    $img = get_field('image_' . $x);
                    if($img) {
                        
                    $fullsize_image = wp_get_attachment_image_src($img, 'full');
                    $width = $fullsize_image[1];
                    $height = $fullsize_image[2];
                ?>
                
                            <figure>
                                <a href="<?php echo $fullsize_image[0]; ?>" class="open-viewer">         
                <?php if ($width > $height){ ?>
                
                                    <?php echo wp_get_attachment_image($img, 'item-image-huge', '', array( "class" => "landscape" )); ?>
                                    
                           <?php } else { ?>
                           
                                    <?php echo wp_get_attachment_image($img, 'item-image-huge', '', array( "class" => "portrait" )); ?>
                                    
                           <?php } ?>
                           
                                </a>
                            </figure>
                <?php
                    }
                }
                ?>
                        </div>
                
                	</div><!-- .entry-content -->
                
                	<footer class="entry-footer">
                <?php 
                	// next/prev post links
                    the_post_navigation(array(
                        'prev_text'=>__('&larr; PREV'),
                        'next_text'=>__('NEXT &rarr;'),
                        //'in_same_term' => true,
                        //'taxonomy' => 'category',
                    ));
                ?>
                                    
                	</footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->
