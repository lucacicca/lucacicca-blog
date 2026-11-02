<?php
/**
 * Lucacicca Reader — footer.php
 */
?>
<footer class="site-footer">
	<div class="wrap">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-widgets">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
		<?php endif; ?>
		<div class="archive-years">
			<h2><?php _e( 'Archivio', 'lucacicca-reader' ); ?></h2>
			<ul>
				<?php
				$years = lcdr_footer_years();
				if ( $years ) {
					echo $years;
				} else {
					echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'lucacicca-reader' ) . '</a></li>';
				}
				?>
			</ul>
		</div>
		<p>
			<?php
			printf(
				__( 'Dal 2004 — %s. Tema: Lucacicca Reader.', 'lucacicca-reader' ),
				get_bloginfo( 'name' )
			);
			?>
			<span class="sep">|</span><a href="<?php echo esc_url( get_feed_link() ); ?>"><?php _e( 'Feed RSS', 'lucacicca-reader' ); ?></a>
		</p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
