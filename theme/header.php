<?php
/**
 * Lucacicca Reader — header.php
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Vai al contenuto', 'lucacicca-reader' ); ?></a>

<header class="site-header">
	<div class="wrap inner">
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
		<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		<div class="header-tools">
			<?php get_search_form(); ?>
			<button id="lcdr-toggle" aria-pressed="false" aria-label="<?php esc_attr_e( 'Cambia tema chiaro/scuro', 'lucacicca-reader' ); ?>">&#9790;</button>
		</div>
	</div>
	<div class="wrap">
		<nav class="site-nav" aria-label="<?php esc_attr_e( 'Menu principale', 'lucacicca-reader' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'depth'          => 1,
					'fallback_cb'    => false,
				) );
			}
			?>
		</nav>
	</div>
</header>
