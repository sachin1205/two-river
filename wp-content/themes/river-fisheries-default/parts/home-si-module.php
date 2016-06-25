    <section class="site-intro">
      <div class="inner-wrap">
        <h1 class="si-h1"><?php if(get_field('home_h1')):
	the_field('home_h1');
	else:
         the_title(); 
     endif; ?></h1>
<p><a href="#products" class="si-scroll smooth-scroll">View our Carp Varieties & Dishes</a></p>
      </div>
    </section>