<section class="about-module">
  <div class="inner-wrap">
    <div class="col-2">
      <p class="pseudo-header"><?php if(get_field('am_header','option')):
  the_field('am_header','option');
  
     endif; ?></p>
    </div>
    <div class="col-10">
      <h3><?php if(get_field('am_sub_heading','option')):
  the_field('am_sub_heading');  
  
     endif; ?></h3>
    <p class="xlarge-font-size"><?php if(get_field('am_text','option')):
  the_field('am_text','option');
  
     endif; ?>      
    </p>
    <p class="section-cta"><a href="/about" class="btn-outline-arrow">Learn More</a></p>
    </div>
  </div>
</section>