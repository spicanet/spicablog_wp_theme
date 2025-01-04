<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'spicablog' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
							<?php the_archive_description( '<div class="subtitle px-lg-5">', '</div>' ); ?>
						</div>
					</div>
				</div>
			</section>

			<section id="posts" class="py-100">	
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ul class="search-results">
								<?php while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'search' );
								endwhile;
								?>
							</ul>
						</div>
					</div>
				</div>
			</section>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_footer();
