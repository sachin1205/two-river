<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
		<?php if ( have_posts() ): ?>
			<?php if ( is_day() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h1>							
			<?php elseif ( is_month() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'M Y' ); ?></h1>	
			<?php elseif ( is_year() ) : ?>
			<h1>Archive: <?php echo  get_the_date( 'Y' ); ?></h1>								
			<?php else : ?>
			<h1>Archive</h1>	
			<?php endif; ?>
			<article class="site-content-primary"> 
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
					<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
			</article>
			<?php else: ?>
			<h1>No posts to display</h1>	
		<?php endif; ?>
	<?php wp_pagenavi(); ?>
	</div>
</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>