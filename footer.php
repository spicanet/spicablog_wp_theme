<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SpicaBlog
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row gx-lg-5 pt-80 pb-5">
				<div class="col-md-4 mb-5">
					<div class="site-branding">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div>
					<div class="site-description">
						<?php bloginfo( 'description' ); ?>
					</div>
				</div>
				<div class="col-md-4 mb-5">
					<h3>Quick Links</h3>
					<ul>
						<li><a href="/blog/">Blog</a></li>
						<li><a href="/about/">About Us</a></li>
						<li><a href="/team/">Our Team</a></li>
					</ul>
				</div>
				<div class="col-md-4 mb-5">
					<h3>Information</h3>
					<ul>
						<li><a href="/privacy-policy/">Privacy Policy</a></li>
						<li><a href="/sitemap/">Sitemap</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="site-info">
			<div class="container">
				<div class="row">	
					<div class="col-md-12 text-center">
						&copy; <?php echo date( 'Y' ); ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.webvisor.org/metrika/tag_ww.js", "ym"); ym(99331141, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/99331141" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

</body>
</html>
