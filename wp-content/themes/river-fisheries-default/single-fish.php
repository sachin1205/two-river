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
		
<div class="inner-wrap">
          <h2>Other Fish</h2>
          <div class="product-grid rows-of-3">
          <a href="" class="product-grid-item">
            
            <img src="img/product-thumb-grass-carp.jpg" class="product-grid-item-img" alt="">
           <header class="product-grid-item-header-wrap">
              <h2 class="product-grid-item-header">Product Title</h2>
            </header>
            <p class="product-grid-item-link">View Products</p>
          </a>
          <a href="" class="product-grid-item">
            
            <img src="img/product-thumb-bighead-carp.jpg" class="product-grid-item-img" alt="">
           <header class="product-grid-item-header-wrap">
              <h2 class="product-grid-item-header">Product Title</h2>
            </header>
            <p class="product-grid-item-link">View Products</p>
          </a>
          <a href="" class="product-grid-item">
            
            <img src="img/product-thumb-buffalo.jpg" class="product-grid-item-img" alt="">
           <header class="product-grid-item-header-wrap">
              <h2 class="product-grid-item-header">Product Title</h2>
            </header>
            <p class="product-grid-item-link">View Products</p>
          </a>
          
          </div>
        </div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/about-module' ) ); ?> 
	</section>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/slidebox' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>