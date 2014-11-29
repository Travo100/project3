<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package mat225-thompson
 */
?>

	</div><!-- #content -->
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="container">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'mat225-thompson' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'mat225-thompson' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'mat225-thompson' ), 'mat225-thompson', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
