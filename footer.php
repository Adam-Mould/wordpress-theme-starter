		</div><!-- #content -->

		<footer class="site-footer">
			<div><?php the_company_address(); ?></div>
			<div><?php the_company_email(); ?></div>
			<div><?php the_company_telephone(); ?></div>

			<div><?php the_social_media_list(); ?></div>

			<div>
			<?php
			if ( $copyright = get_theme_mod( 'copyright_text' ) ) {
				printf( '<div class="copyright-text">%s</div>', nl2br( $copyright ) );
			}
			?>
			</div>

		</footer><!-- #colophon -->

	</div><!-- #site -->

<?php wp_footer(); ?>

</body>
</html>
