<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SpicaBlog
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<section class="hero">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center pt-80 pb-100">
							<?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
							<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
							<?php the_archive_description( '<div class="subtitle px-lg-5">', '</div>' ); ?>
						</div>
					</div>
				</div>
			</section>

			<section id="posts" class="py-100">
				<div class="container">
					<div class="row">
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="col-md-4 mb-4">
								<div class="card h-100">
									<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
										<?php else : ?>
											<img src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.png" class="card-img-top" alt="Default Image">
										<?php endif; ?>
									</a>
									<div class="card-body">
										<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
										<div class="card-meta mb-3">
											<span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
											<span><i class="fas fa-user"></i> <?php the_author(); ?></span>
											<span><i class="fas fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?></span>
										</div>
										<p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>																				
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php spicablog_numeric_posts_nav(); ?>
					</div>
				</div>
			</section>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
