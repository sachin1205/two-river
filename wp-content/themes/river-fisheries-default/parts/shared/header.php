<!--Site Header-->
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/search-module' ) ); ?>

<div class="site-header-wrap">
      <!--Site Header-->
    <header class="site-header" role="banner">
     
      <div class="sh-sticky-wrap">
      
        <div class="inner-wrap">
        <a href="/" class="site-logo"><img src="<?php bloginfo('template_url'); ?>/img/site-logo.png" alt="Site Logo"></a>
          <!--Site Nav-->
        <div class="site-nav-container">
          <div class="snc-header">
            <a href="#" class="close-menu menu-link">Close</a>
          </div>
   <?php wp_nav_menu(array(
            'menu'            => 'Primary Nav',
            'container'       => 'nav',
            'container_class' => 'site-nav',
            'menu_class'      => 'sn-level-1',
            'walker'        => new themeslug_walker_nav_menu
            )); ?>



        <!--Site Nav END-->
        </div>
        <a href="" class="site-nav-container-screen menu-link">&nbsp;</a>
        <div class="sh-utility-nav">
          
          <span class="sh-icons">
          <a class="sh-ico-chinese" target="_blank" href="#"><span>Chinese</span></a>
                        <a class="sh-ico-search search-link" target="_blank" href="#"><span>Search</span></a>

          <a href="#menu" class="sh-ico-menu menu-link"><span>Menu</span></a>
          </span>
        </div>
        </div>
        
      </div>
      <!--inner-wrap END-->
    </header>
<?php if(is_home() || is_front_page()): ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/home-si-module' ) ); ?>
<?php else: ?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/dest-si-module' ) ); ?>
<?php endif; ?>
    </div>