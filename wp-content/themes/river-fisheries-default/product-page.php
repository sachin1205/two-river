<?php

  /*
     Template Name: Product Page
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
						                  
	        </article>
	   </div>     
		 <figure class="img-module">
         <?php 

$image = get_field('product_image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>
        </figure>
        <?php $pageID = get_queried_object_id(); ?>
        <?php endwhile; ?>

<?php wp_reset_query(); ?>



<?php Starkers_Utilities::get_template_parts( array( 'parts/products-slider' ) ); ?> 

<?php Starkers_Utilities::get_template_parts( array( 'parts/about-module' ) ); ?> 
	</section>


<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/slidebox' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>