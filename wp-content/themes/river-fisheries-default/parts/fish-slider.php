<?php
//global $wp_query;

//query_posts(array('cat' => $cat_ID, 'post__not_in' => array($this_post), 'posts_per_page' => 3, 'orderby' => 'rand'));
$args = array (
  'posts_per_page' => '3',
  'post_type' => 'page',
  //'post__not_in' => array($this_page),
  'order' => 'ASC',
  'orderby' => 'rand',
  'cat' => '3'
);
$query = new WP_Query( $args );
?>
<div class="inner-wrap">
          <h2>Fishes</h2>

   <div class="product-grid rows-of-3">
<?php
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
?>

 <a href="<?php the_permalink(); ?>" class="product-grid-item">
        <?php if ( has_post_thumbnail()) : ?>
<?php the_post_thumbnail(); ?>

<?php endif; ?>
   <header class="product-grid-item-header-wrap">
              <h2 class="product-grid-item-header"><?php the_title(); ?></h2>
            </header>
            <p class="product-grid-item-link">View Products</p>
          </a>


<?php }
}
 ?>

<?php wp_reset_postdata(); ?>


          
          
          </div>
        </div>