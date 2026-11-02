<?php
/**
 * Lucacicca Reader — functions.php
 * Tema minimale per la lettura. Versione: 1.8
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LCDR_VERSION', '1.8' );

/* ---- Setup ---- */
function lcdr_setup() {
	load_theme_textdomain( 'lucacicca-reader', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	register_nav_menus( array( 'primary' => __( 'Menu principale', 'lucacicca-reader' ) ) );
}
add_action( 'after_setup_theme', 'lcdr_setup' );

function lcdr_content_width() {
	$GLOBALS['content_width'] = 640;
}
add_action( 'after_setup_theme', 'lcdr_content_width', 0 );

/* ---- Widget area nel footer (nessuna sidebar laterale) ---- */
function lcdr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer (sotto il contenuto)', 'lucacicca-reader' ),
		'id'            => 'footer-1',
		'description'   => __( 'Widget mostrati in fondo alla pagina, sotto il contenuto, a colonna piena.', 'lucacicca-reader' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lcdr_widgets_init' );

/* ---- Stile (unico asset CSS del tema, cache-bust ?ver=1.8) ---- */
function lcdr_enqueue_style() {
	wp_enqueue_style( 'lcdr-style', get_stylesheet_uri(), array(), LCDR_VERSION );
}
add_action( 'wp_enqueue_scripts', 'lcdr_enqueue_style' );

/* ---- Leggerezza: via lo script superfluo ---- */

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

function lcdr_dequeue_jquery() {
	if ( ! is_admin() ) {
		wp_dequeue_script( 'jquery' );
	}
}
add_action( 'wp_enqueue_scripts', 'lcdr_dequeue_jquery', 100 );

/* ---- Dark mode: toggle manuale, prima paint senza flash ---- */
function lcdr_theme_boot() {
	?>
	<script>
	(function () {
		try {
			var t = localStorage.getItem('lcdr-theme');
			if (t) document.documentElement.setAttribute('data-theme', t);
		} catch (e) {}
	})();
	</script>
	<?php
}
add_action( 'wp_head', 'lcdr_theme_boot', 1 );

function lcdr_theme_toggle_script() {
	?>
	<script>
	(function () {
		var btn = document.getElementById('lcdr-toggle');
		if (!btn) return;
		btn.addEventListener('click', function () {
			var h = document.documentElement;
			var cur = h.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
			h.setAttribute('data-theme', cur);
			try { localStorage.setItem('lcdr-theme', cur); } catch (e) {}
			btn.setAttribute('aria-pressed', cur === 'dark' ? 'true' : 'false');
			btn.textContent = cur === 'dark' ? '☼' : '☾';
		});
		var cur = document.documentElement.getAttribute('data-theme') || 'light';
		btn.setAttribute('aria-pressed', cur === 'dark' ? 'true' : 'false');
		btn.textContent = cur === 'dark' ? '☼' : '☾';
	})();
	</script>
	<?php
}
add_action( 'wp_footer', 'lcdr_theme_toggle_script' );

/* ---- Excerpt ---- */
function lcdr_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'lcdr_excerpt_more' );

function lcdr_excerpt_length() {
	return 40;
}
add_filter( 'excerpt_length', 'lcdr_excerpt_length' );

/* ---- Archivio per anni nel footer ---- */
function lcdr_footer_years() {
	return wp_get_archives( array(
		'type'            => 'yearly',
		'format'          => 'custom',
		'before'          => '<li>',
		'after'           => '</li>',
		'show_post_count' => false,
		'echo'            => false,
	) );
}

/* ---- Post correlati: stessa categoria, 3 post, miniatura + titolo ---- */
function lcdr_related_posts() {
	if ( ! is_singular( 'post' ) ) {
		return '';
	}

	$cats = wp_get_post_categories( get_the_ID() );
	if ( empty( $cats ) ) {
		return '';
	}

	$related = new WP_Query( array(
		'category__in'   => $cats,
		'post__not_in'   => array( get_the_ID() ),
		'posts_per_page' => 3,
		'orderby'        => 'rand',
		'no_found_rows'  => true,
		'post_status'    => 'publish',
	) );

	if ( ! $related->have_posts() ) {
		return '';
	}

	$out = '<section class="related-posts"><h2>' . esc_html__( 'Post correlati', 'lucacicca-reader' ) . '</h2><ul class="related-list">';
	foreach ( $related->posts as $p ) {
		$thumb = get_the_post_thumbnail( $p->ID, 'thumbnail' );
		$out  .= '<li><a href="' . esc_url( get_permalink( $p->ID ) ) . '">';
		if ( $thumb ) {
			$out .= $thumb;
		}
		$out .= '<span class="related-title">' . esc_html( get_the_title( $p->ID ) ) . '</span></a></li>';
	}
	$out .= '</ul></section>';

	wp_reset_postdata();

	return $out;
}
