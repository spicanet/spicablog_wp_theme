<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SpicaBlog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php $spicablog_comment_count = get_comments_number(); ?>
<h2 class="section-title mb-5">Comments (<?php echo $spicablog_comment_count; ?>)</h2>
<?php
if ( have_comments() ) :

	the_comments_navigation(); ?>

	<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'style'      => 'ol',
				'short_ping' => true,
			)
		);
		?>
	</ol><!-- .comment-list -->

	<?php
	the_comments_navigation();

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'spicablog' ); ?></p>
		<?php
	endif;

else : ?>

	<p>There are no comments here yet, you can be the first!</p>

<? endif;

comment_form();
?>