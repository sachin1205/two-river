<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

	<section class="site-content" role="main">
	    <div class="inner-wrap">
	    	<h1>404: Page not found</h1>
	        <article class="site-content-primary">
				Sorry but we weren't able to find the page you were looking for. Try looking through our <a href="<?php bloginfo('url'); ?>/sitemap">Sitemap</a>.
	        </article>
	       	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar','parts/shared/flexible-content'  ) ); ?>
	    </div>
	</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>