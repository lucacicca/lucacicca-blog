<?php
/**
 * Lucacicca Reader — index.php
 * Template universale: home, singolo, archivi, ricerca, 404.
 */
get_header();
?>
<main id="content" class="wrap">

	<?php if ( have_posts() ) : ?>

		<?php if ( is_archive() ) : ?>
			<p class="archive-title">
				<?php
				if ( is_day() ) printf( __( 'Archivio: %s', 'lucacicca-reader' ), get_the_date( 'j F Y' ) );
				elseif ( is_month() ) printf( __( 'Archivio: %s', 'lucacicca-reader' ), get_the_date( 'F Y' ) );
				elseif ( is_year() ) printf( __( 'Archivio: %s', 'lucacicca-reader' ), get_the_date( 'Y' ) );
				else the_archive_title();
				?>
			</p>
		<?php elseif ( is_search() ) : ?>
			<p class="archive-title">
				<?php printf( __( 'Risultati per: %s', 'lucacicca-reader' ), '<q>' . esc_html( get_search_query() ) . '</q>' ); ?>
			</p>
		<?php endif; ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( ! is_singular() && has_post_thumbnail() ) : ?>
					<a class="lcdr-thumb" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
						<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
					</a>
				<?php endif; ?>

				<h1 class="entry-title">
					<?php if ( is_singular() ) : ?>
						<?php the_title(); ?>
					<?php else : ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php endif; ?>
				</h1>

				<p class="entry-meta">
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<?php if ( ! is_singular() ) : ?>
						| <a href="<?php the_permalink(); ?>#comments"><?php comments_number( __( 'Commenta', 'lucacicca-reader' ), __( '1 commento', 'lucacicca-reader' ), __( '% commenti', 'lucacicca-reader' ) ); ?></a>
					<?php endif; ?>
				</p>

				<?php if ( is_singular() && has_post_thumbnail() ) : ?>
					<figure class="lcdr-featured">
						<?php the_post_thumbnail( 'large', array( 'fetchpriority' => 'high' ) ); ?>
					</figure>
				<?php endif; ?>

				<div class="entry-content">
					<?php
					the_content( __( 'Continua a leggere &rarr;', 'lucacicca-reader' ) );
					wp_link_pages( array(
						'before' => '<p class="page-links">' . __( 'Pagine:', 'lucacicca-reader' ),
						'after'  => '</p>',
					) );
					?>
				</div>

				<?php if ( is_singular() ) : ?>

										<?php if ( has_category() || has_tag() ) : ?>
						<p class="entry-tax">
							<?php if ( has_category() ) : ?>
								<span class="tax-row">
								<span class="tax-label"><?php _e( 'Categorie:', 'lucacicca-reader' ); ?></span>
								<?php the_category( ', ' ); ?>
								</span>
							<?php endif; ?>
							<?php if ( has_tag() ) : ?>
								<span class="tax-row">
								<span class="tax-label"><?php _e( 'Tag:', 'lucacicca-reader' ); ?></span>
								<?php the_tags( '', ', ' ); ?>
								</span>
							<?php endif; ?>
						</p>
					<?php endif; ?>

					<?php echo lcdr_related_posts(); ?>

					<nav class="nav-links">
						<?php
						$prev = get_previous_post();
						$next = get_next_post();
						if ( $prev ) echo '<span class="nav-previous"><a href="' . esc_url( get_permalink( $prev ) ) . '">&larr; ' . esc_html( get_the_title( $prev ) ) . '</a></span>';
						if ( $next ) echo '<span class="nav-next"><a href="' . esc_url( get_permalink( $next ) ) . '">' . esc_html( get_the_title( $next ) ) . ' &rarr;</a></span>';
						?>
					</nav>
				<?php endif; ?>

				<?php
				if ( is_singular() && ( comments_open() || get_comments_number() ) ) {
					comments_template();
				}
				?>

			</article>
		<?php endwhile; ?>

		<?php
		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
		) );
		?>

	<?php else : ?>

		<div class="no-results">
			<h2><?php _e( 'Niente da mostrare', 'lucacicca-reader' ); ?></h2>
			<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Torna alla home', 'lucacicca-reader' ); ?></a></p>
			<?php get_search_form(); ?>
		</div>

	<?php endif; ?>

</main>
<?php
get_footer();
