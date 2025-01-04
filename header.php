<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SpicaBlog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<!-- Skip link -->
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'spicablog' ); ?></a>

	<!-- Header -->
	<header id="masthead" class="site-header">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">
				<div class="container-fluid">
					<div class="site-branding">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php
						wp_nav_menu(
							array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class' => 'navbar-nav m-auto mb-2 mb-lg-0',
							'container' => false,
							'walker' => new Bootstrap_Navwalker()
							)
						);
						?>
					</div>
					<div class="site-languages">
						<?php echo do_shortcode('[language-switcher]'); ?>
					</div>
				</div>
			</nav><!-- #site-navigation -->
			
		</div>
	</header><!-- #masthead -->
	<!-- End Header -->