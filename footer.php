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
		<?php dynamic_sidebar( 'footer-sidebar' ); ?>
		<div class="site-info">
			<div class="container">
				<div class="social-media">
					<a href="https://www.facebook.com/travis.thompson.7311" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/Travo100" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="http://instagram.com/travo100/" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="https://github.com/Travo100" target="_blank"><i class="fa fa-github"></i></a>
				</div>
				<div class="name">
					<p>&copy;<?php echo date ('Y'); ?> <a href="mailto: Travo100@gmail.com">Travis Thompson</a></p>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
