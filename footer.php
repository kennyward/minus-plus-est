<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Minus_Plus_Est
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
            <a href="mailto:<?php echo get_option('mpe_settings')['mpe_text_field_8']; ?>" class="send-email">Contact</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!--
    Minus Plus Est - A simple WordPress portfolio
    Designed and developed by Kenny Ward (http://kennyward.co.uk)
-->
</body>
</html>
