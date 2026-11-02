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
		<div class="footer-cols">
			<div class="archive-years">
				<h2><?php _e( 'Archivio per anni', 'lucacicca-reader' ); ?></h2>
				<ul>
					<?php
					$years = lcdr_footer_years();
					if ( $years ) {
						echo $years; // link /2026/ (archivio annuale nativo di WordPress)
					} else {
						echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'lucacicca-reader' ) . '</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="footer-cats">
				<h2><?php _e( 'Categorie', 'lucacicca-reader' ); ?></h2>
				<ul>
					<?php
					wp_list_categories( array(
						'title_li'     => '',
						'orderby'      => 'count',
						'order'        => 'DESC',
						'show_count'   => false,
						'hierarchical' => true,
					) );
					?>
				</ul>
			</div>
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
