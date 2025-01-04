<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package SpicaBlog
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="hero">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center pt-80 pb-100">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'spicablog' ); ?></h1>
					</div>
				</div>
			</div>
		</section>

		<section class="error-404 not-found py-100">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'spicablog' ); ?></p>

						<?php
						get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );
						?>

						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'spicablog' ); ?></h2>
							<ul>
								<?php
								wp_list_categories(
									array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									)
								);
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
