<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SpicaBlog
 */

?>

<section class="hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center pt-80 pb-100">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php if (get_field('subtitle')): ?>
					<div class="subtitle px-lg-5"><?php the_field('subtitle'); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<section id="content" class="py-100">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
</section>
