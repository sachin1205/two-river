
<?php if( have_rows('flexible_content') ): echo '<section class="additional-content">';
    while ( have_rows('flexible_content') ) : the_row(); ?>

	<?php if( get_row_layout() == 'tab_content' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
		 	
		 	
		 		<?php if( get_sub_field('section_header')): ?>
					<h2><?php the_sub_field('section_header'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('section_subtext')): ?>
					<p><?php the_sub_field('section_subtext'); ?></p>
				<?php endif; ?>

				<ul class="accordion-tabs">
				<?php if( have_rows('tab_content_row') ): 

				while ( have_rows('tab_content_row') ) : the_row(); ?>
				<li class="tab-header-and-content">
					<a href="javascript:void(0)" class="tab-link"><?php the_sub_field('tab_header'); ?></a>
					
					<div class="tab-content"><?php the_sub_field('tab_body'); ?>    </div>
								
					</li>
				
				<?php endwhile; ?>


				<?php endif; ?>
				</ul>
			<?php if( get_sub_field('divider')): ?>
					<hr>
			<?php endif; ?>
		<?php endif; ?>


	<?php elseif( get_row_layout() == 'full_width_cta' ): ?>
		
			<div class="row cta-banner bottom-baseline">
	            <span class="col-6of9">
	            <h2 class="cta-banner-header"><?php the_sub_field('section_header'); ?></h2>
	            <p class="cta-banner-body"><?php the_sub_field('section_body'); ?></p>
	            
	        </span>
	        <a href="<?php the_sub_field('url'); ?>" class="red-btn-l col-3of9 col-last cta-download" target="_blank"><?php the_sub_field('cta_button'); ?></a>
	        </div>
	        <?php if( get_sub_field('divider')): ?>
					<hr>
			
		<?php endif; ?>


 	<?php elseif( get_row_layout() == 'multiple_columns' ): ?>
	 	
	 		<?php if( get_sub_field('section_header')): ?>
				<h2><?php the_sub_field('section_header'); ?></h2>
			<?php endif; ?>
			<?php if( get_sub_field('section_subtext')): ?>
				<p><?php the_sub_field('section_subtext'); ?></p>
			<?php endif; ?>
				<section class="<?php if (get_sub_field('number_columns') == '2') {
						echo 'rows-of-2';
					} else if (get_sub_field('number_columns') == '3') {
					        echo 'rows-of-3';
					} else if (get_sub_field('number_columns') == '4') {
					        echo 'rows-of-4';
					}
					?>">

	         	<?php if( have_rows('content') ): while ( have_rows('content') ) : the_row(); ?>
					<div><?php the_sub_field('content_column'); ?></div>
				<?php endwhile; ?>
				<?php endif; ?>
				</section>
			<?php if( get_sub_field('divider')): ?>
				<hr>
			
		<?php endif; ?>

 			
 			<?php elseif( get_row_layout() == 'img_gallery_section' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			
			<?php if( get_sub_field('section_header')): ?>
				<h2><?php the_sub_field('section_header'); ?></h2>
			<?php endif; ?>
			<section class="<?php if (get_sub_field('number_columns') == '2') {
						echo 'rows-of-2';
					} else if (get_sub_field('number_columns') == '3') {
					        echo 'rows-of-3';
					} else if (get_sub_field('number_columns') == '4') {
					        echo 'rows-of-4';
					}
					?>">
			
			<?php 

$images = get_sub_field('img_gallery');

if( $images ): ?>


<?php foreach( $images as $image ): ?>
                
                    <a href="<?php echo $image['sizes']['large']; ?>" class="lightbox loop-item">
	                    <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <h4 class="li-title"><?php echo $image['caption']; ?></h4>
                    </a>
                
            
	
	
            <?php endforeach; ?>
            
			
  
<?php endif; ?>
</section>




	        <?php if( get_sub_field('divider')): ?>
					<hr>
			<?php endif; ?>
		<?php endif; ?>
		
		

			<?php elseif( get_row_layout() == 'click_expand' ): ?>
		<?php if( get_sub_field('fullwidth') == false): ?>
			<div class="click-expand <?php if( get_sub_field('spacing')): ?>spacing-bottom<?php endif; ?>">
          <h3 class="ce-header"><?php the_sub_field('section_header'); ?></h3>
          <div class="ce-body"><?php the_sub_field('section_body'); ?></div>
      </div>
	        
		<?php endif; ?>


 	<?php elseif( get_row_layout() == 'multiple_columns' ): ?>
	 	<?php if( get_sub_field('fullwidth') == false): ?>
	 		<?php if( get_sub_field('section_header')): ?>
				<h2><?php the_sub_field('section_header'); ?></h2>
			<?php endif; ?>
			<?php if( get_sub_field('section_subtext')): ?>
				<p><?php the_sub_field('section_subtext'); ?></p>
			<?php endif; ?>
				<section class="<?php if (get_sub_field('number_columns') == '2') {
						echo 'rows-of-2';
					} else if (get_sub_field('number_columns') == '3') {
					        echo 'rows-of-3';
					} else if (get_sub_field('number_columns') == '4') {
					        echo 'rows-of-4';
					}
					?>">

	         	<?php if( have_rows('content') ): while ( have_rows('content') ) : the_row(); ?>
					<div><?php the_sub_field('content_column'); ?></div>
				<?php endwhile; ?>
				<?php endif; ?>
				</section>
			<?php if( get_sub_field('divider')): ?>
				<hr>
			<?php endif; ?>
		<?php endif; ?>
		
 			
	<?php elseif( get_row_layout() == 'table' ): ?>
	   
	        <?php if( get_sub_field('section_header')): ?>
	            <div class="headexpand-wrap">  
	            <h3 class="headexpand"><?php the_sub_field('section_header'); ?></h3>
	        <?php endif; ?>

	        <?php if( get_sub_field('table_content')): ?>
	            <div class="table-wrap">
	                <table class="tablesaw" data-mode="stack">
	                <?php the_sub_field('table_content'); ?>
	                </table>
	            </div>
	        <?php endif; ?>
	        <?php if( get_sub_field('section_header')): ?>
	           </div> <!--headexpand-wrap END -->
	        <?php endif; ?>
	        <?php if( get_sub_field('divider')): ?>
				<hr>
			
	    <?php endif; ?>


	<?php elseif( get_row_layout() == 'picture_grid' ): ?>
		
				<?php if( get_sub_field('section_header')): ?>
					<h2><?php the_sub_field('section_header'); ?></h2>
				<?php endif; ?>
				<?php if( get_sub_field('section_subtext')): ?>
					<p><?php the_sub_field('section_subtext'); ?></p>
				<?php endif; ?>
		<section class="<?php if (get_sub_field('number_columns') == '2') {
							echo 'rows-of-2';
						} else if (get_sub_field('number_columns') == '3') {
						        echo 'rows-of-3';
						} else if (get_sub_field('number_columns') == '4') {
						        echo 'rows-of-4';
						}
						?>">	
		<?php if( get_sub_field('lightbox')): ?>	
			<?php if( have_rows('picture_repeat') ):		
			while ( have_rows('picture_repeat') ) : the_row(); ?>
						
				<?php 	
					$image = wp_get_attachment_image_src(get_sub_field('picture'), 'thumbnail');
					$imagelarge = wp_get_attachment_image_src(get_sub_field('picture'), 'full');
				 ?>
			 
			
				<a href="<?php echo $imagelarge[0]; ?>" class="lightbox bottom-baseline">
						 <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" />
					<?php if( get_sub_field('sub_title')): ?>
						<figcaption><?php the_sub_field('sub_title'); ?></figcaption>
					<?php endif; ?>
				</a>
				<?php if( get_sub_field('divider')): ?>
		 				<hr>
					<?php endif; ?>
			
			
				
			<?php endwhile; ?>
			<?php endif; ?>
			
		<?php else : ?>
			<?php if( have_rows('picture_repeat') ):		
			while ( have_rows('picture_repeat') ) : the_row(); ?>
						
				<?php 	
					$image = wp_get_attachment_image_src(get_sub_field('picture'), 'thumbnail');
					$imagelarge = wp_get_attachment_image_src(get_sub_field('picture'), 'full');
				 ?>
			 
			
				<figure class="bottom-baseline">
					 <img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" />
				<?php if( get_sub_field('sub_title')): ?>
					<figcaption><?php the_sub_field('sub_title'); ?></figcaption>
				<?php endif; ?>
			</figure>
				
			<?php if( get_sub_field('divider')): ?>
		 				<hr>
					<?php endif; ?>
			
				
			<?php endwhile; ?>
			<?php endif; ?>
			
		<?php endif; ?>
		</section>
		


	<?php elseif( get_row_layout() == 'product_grid' ): ?>
		
			<?php if( get_sub_field('section_header')): ?>
				<h2 class="carousel-header"><span><?php the_sub_field('section_header'); ?></span></h2>
			<?php endif; ?>
			<?php if( get_sub_field('section_subtext')): ?>
				<p><?php the_sub_field('section_subtext'); ?></p>
			<?php endif; ?>

			<div class="<?php if( get_sub_field('carousel')): ?>flexslider<?php endif; ?> product-carousel">
			<ul class="slides">
				<?php if( have_rows('product_row') ): while ( have_rows('product_row') ) : the_row(); ?>
				<li>
					<?php if( have_rows('product_item') ):		
					while ( have_rows('product_item') ) : the_row(); ?>
					<?php 	
					$image = wp_get_attachment_image_src(get_sub_field('product_picture'), 'thumbnail');
					$imagelarge = wp_get_attachment_image_src(get_sub_field('product_picture'), 'full');
					?>
					<a class="product-item" href="<?php the_sub_field('product_url'); ?>"> 
							<h3 class="product-header"><?php the_sub_field('product_header'); ?></h3> 
							<span class="product-img">
							<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test')) ?>" />
							</span>
							<span class="product-cta">Learn More</span>
					</a>
					<?php endwhile; ?>
					<?php endif; ?>
				</li>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
			</div>

			<?php if( get_sub_field('divider')): ?>
				<hr>
		
		<?php endif; ?>



	<?php elseif( get_row_layout() == 'text_media' ): ?>
		
			<?php if( get_sub_field('section_subtext')): ?>
				<p><?php the_sub_field('section_subtext'); ?></p>
			<?php endif; ?>
			
	     	<article class="clearfix">
	    		
	    		<div class="col-3of9">
	    			<?php the_sub_field('media'); ?>
	    		</div>
	    		<div class="col-6of9 col-last">
	    		<?php if( get_sub_field('section_header')): ?>
				<h2><?php the_sub_field('section_header'); ?></h2>
			<?php endif; ?>
	    			<?php the_sub_field('text'); ?>
	    		</div>
	    		
				</article>
				<?php if( get_sub_field('divider')): ?>
					<hr>
			
		<?php endif; ?>
	



<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>




