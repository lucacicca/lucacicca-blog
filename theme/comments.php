<?php
/**
 * Lucacicca Reader — comments.php
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: %s: numero commenti */
				_n( '%s commento', '%s commenti', get_comments_number(), 'lucacicca-reader' ),
				number_format_i18n( get_comments_number() )
			);
			?>
		</h2>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 0, // niente avatar: lettura pulita
			) );
			?>
		</ol>

		<?php
		the_comments_pagination( array(
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
		) );
		?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'I commenti sono chiusi.', 'lucacicca-reader' ); ?></p>
	<?php endif; ?>

	<?php
	comment_form( array(
		'title_reply'           => __( 'Lascia un commento', 'lucacicca-reader' ),
		'label_submit'          => __( 'Invia', 'lucacicca-reader' ),
		'comment_notes_after'  => '',
		'comment_notes_before' => '<p class="comment-notes">' . __( 'Il tuo indirizzo email non sar&agrave; pubblicato.', 'lucacicca-reader' ) . '</p>',
	) );
	?>

</div>
