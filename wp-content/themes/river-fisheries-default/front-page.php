<?php

	/*
		Template Name: Front Page
	*/
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
       

	<!--Site Content-->
	<section class="site-content" role="main">
    
<?php Starkers_Utilities::get_template_parts( array( 'parts/products-module' ) ); ?>   

<?php Starkers_Utilities::get_template_parts( array( 'parts/recipe-module' ) ); ?>   

<?php Starkers_Utilities::get_template_parts( array( 'parts/about-module' ) ); ?>   



    </section>
    <!--

<div class="slide-panel">
  <div class="slide-panel-button">Download Our<br>Rubber Material Guide</div>

  <h2>Download Our ISO Guide</h2>
  <p>Our new material selection guide, Rubber Molding Material Selection Guide, will make it easy for you to select the appropriate material to achieve the desired functionality of your component. Durometers do not have to be hard!</p>
</div>
-->




<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/slidebox' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>