<section class="recipe-slider">
  
        <div class="flexslider product-carousel">
          <ul class="slides">         


<?php if( have_rows('hs_slide') ):
while ( have_rows('hs_slide') ) : the_row(); ?>
            <li>
              <div class="rs-item-first" style="background-image:url('<?php if(get_sub_field("hs_image")):
  the_sub_field("hs_image");
     endif; ?>');">
                <div class="inner-wrap">
                <p class="pseudo-header section-spacing"><?php if(get_sub_field('hs_header')):
  the_sub_field('hs_header');
     endif; ?></p>
                  <h1><?php if(get_sub_field('hs_title')):
  the_sub_field('hs_title');
     endif; ?></h1>
                
                <p class="text-alignright"><a href="<?php if(get_sub_field('hs_url')):
  the_sub_field('hs_url');
     endif; ?>" class="link-arrow">View Recipe</a></p>
                </div>
              </div>
            </li>

            <?php
            endwhile;
            endif; 
            ?>
            
          </ul>
        </div>
      
</section>