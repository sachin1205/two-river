<?php
/**
 * Search results page
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
        <article class="site-content-primary"> 
			<?php if ( have_posts() ): ?>                	
				<h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
				<?php while ( have_posts() ) : the_post(); ?>
					<hr>
					<article>
						<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
						
						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; ?>
				<?php else: ?>
				<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
			<?php endif; ?>
			<?php wp_pagenavi(); ?>
		</article>
	</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>