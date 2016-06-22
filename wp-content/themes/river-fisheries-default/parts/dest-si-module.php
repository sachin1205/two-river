<section class="site-intro">
      <div class="inner-wrap">
        <h1 class="display-font-size">
<?php if(get_field('si_h1')):
	the_field('si_h1');
	else:
         the_title(); 
     endif; ?></h1>
        <p class="si-subtext"><?php if(get_field('si_h1')):
	the_field('si_sub_heading');
	
     endif; ?></p>
      </div>
    </section>