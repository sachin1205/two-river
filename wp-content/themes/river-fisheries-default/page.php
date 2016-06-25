<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
 
    
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
       
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<!--Site Content-->
	<section class="site-content" role="main">
	    <div class="inner-wrap">

	        <article class="site-content-primary"> 
	        	<?php the_content(); ?> 
						<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/flexible-content' ) ); ?>
						<?php if (is_page( '9' )) : ?>
							<!--Sitemap Page-->
						   <ul>
						    <?php
						    // Add pages you'd like to exclude in the exclude here
						    wp_list_pages(
						    array(
						    'exclude' => '',
						    'title_li' => '',
						    )
						    );
						    ?>
						   </ul>
						<?php endif; ?>     
						<?php if (is_page( '997' )) : ?>
						<?php Starkers_Utilities::get_template_parts( array( 'parts/fish-feed' ) ); ?>	
						<?php endif; ?>  
						<?php if (is_page( '999' )) : ?>
						<?php Starkers_Utilities::get_template_parts( array( 'parts/dish-feed' ) ); ?>	
						<?php endif; ?>   
						<?php if (is_page( '1095' )) : ?>
						<?php Starkers_Utilities::get_template_parts( array( 'parts/products-module' ) ); ?>	
						<?php endif; ?>                  
	        </article>
	        
				<?php //Starkers_Utilities::get_template_parts( array( 'parts/shared/sidebar' ) ); ?>
			

		</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/about-module' ) ); ?> 
	</section>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/slidebox' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>