<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SpicaBlog
 */

?>

<?php 
// Получаем данные автора
$author_id = get_the_author_meta('ID');
$author_url = get_author_posts_url($author_id);
$author_name = get_the_author_meta('display_name', $author_id);
$position = get_the_author_meta('position', $author_id);
$bio = get_the_author_meta('description', $author_id);
$facebook = get_the_author_meta('facebook', $author_id);
$twitter = get_the_author_meta('twitter', $author_id);
$linkedin = get_the_author_meta('linkedin', $author_id);
$profile_picture = get_user_meta($author_id, 'profile_picture', true);
if ( $profile_picture ) {
	$avatar_url = esc_url($profile_picture);
} else {
	$avatar_url = get_avatar_url($author_id);
}
?>

<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center pt-80 pb-100">
				<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php if (get_field('subtitle')): ?>
					<div class="subtitle px-lg-5"><?php the_field('subtitle'); ?></div>
				<?php endif; ?>				
				<div class="entry-meta">
					<span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
					<span><i class="fas fa-user"></i> <a href="<?php echo get_author_posts_url( $author_id ); ?>"><?php echo $author_name; ?></a></span>
					<span><i class="fas fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="content" class="py-100">
	<div class="container">
		<div class="row gx-lg-5">
			<div class="col-lg-8">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-thumbnail mb-5">
						<?php echo the_post_thumbnail( 'large', array( 'class' => 'img-fluid rounded' ) ); ?>
					</div>
				<?php endif; ?>
				<div class="entry-content mb-5">
					<?php the_content(); ?>
				</div>
				<div class="author-info mb-5 p-4 bg-light border rounded">
					<div class="d-flex align-items-center">
						<a href="<?php echo $author_url; ?>">
							<img src="<?php echo $avatar_url; ?>" alt="<?php echo esc_attr($author_name); ?>" class="rounded-circle me-3" width="100" height="100">
						</a>
						<div>
							<h4 class="mb-0"><a href="<?php echo $author_url; ?>"><?php echo esc_html($author_name); ?></a></h4>
							<div class="social-links">
								<?php if ( $facebook ) : ?>
									<a href="<?php echo esc_url($facebook); ?>" target="_blank" class="me-2"><i class="fab fa-facebook-f"></i></a>
								<?php endif; ?>
								<?php if ( $twitter ) : ?>
									<a href="<?php echo esc_url($twitter); ?>" target="_blank" class="me-2"><i class="fab fa-twitter"></i></a>
								<?php endif; ?>
								<?php if ( $linkedin ) : ?>
									<a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
								<?php endif; ?>
							</div>
							<?php if ( $position ) : ?>
								<p class="mb-1"><?php echo esc_html($position); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<?php if ( $bio ) : ?>
						<div class="author-bio mt-3">
							<p class="mb-1"><?php echo esc_html($bio); ?></p>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( comments_open() || get_comments_number() ) : ?>
					<div class="entry-comments mb-5">
						<?php comments_template(); ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
