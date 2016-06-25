<section class="site-intro">
      <div class="inner-wrap">
        <h1 class="display-font-size">
        <?php if(is_home()): ?>
News
<?php else :?>
<?php  if(get_field('si_h1')):
	the_field('si_h1');
	else:
         the_title(); 
     endif; ?></h1>
        <?php if(get_field('si_h1')):  ?>
	<p class="si-subtext"> <?php the_field('si_sub_heading'); ?>
	</p>
   <?php  endif; ?>
    <?php  endif; ?>
      </div>
    </section>