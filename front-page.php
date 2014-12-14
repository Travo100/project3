<?php get_header(); ?>
<section>
	<div class="tt-jumbotron">
  	<div class="container">
  		<div class="col-md-12">
  			<h1>Travis Thompson</h1>
        <h2>Web Developer</h2>
        <div class="col-md-3 col-xs-6">
          <img src="<?php ilink('html-logo.png'); ?>">
          <p>HTML 5</p>
        </div>
        <div class="col-md-3 col-xs-6">
          <img src="<?php ilink('css-logo.png'); ?>">
          <p>CSS 3</p>
        </div>
        <div class="col-md-3 col-xs-6">
          <img src="<?php ilink('jquery-logo.png'); ?>">
          <p>jQuery</p>
        </div>
        <div class="col-md-3 col-xs-6">
          <img src="<?php ilink('wordpress-logo.png'); ?>">
          <p>WordPress</p>
        </div>
  		</div>
  	</div>
	</div>
</section>
<section>
  <div class="tt-about-me" id="about">
    <div class="container">
      <div class="col-md-3 me-pic">
        <h2><?php the_title(); ?></h2>
        <img src="<?php ilink('me.png'); ?>">
      </div>
      <div class="col-md-9 me-content">
        <?php if( have_posts() ): while(have_posts() ) : the_post(); ?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
        <?php endwhile; else : ?>
          <p><?php_e( 'Sorry, no posts matched yoru criteria.' ); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="tt-portfolio" id="portfolio">
    <div class="container">
      <div class="col-md-10 col-centered">
        <h2>Portfolio</h2>
        <div id="tt-carousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php 
              $i = 0;
              $args = array( 'post_type' => 'portfolio'); 
              $loop = new WP_Query( $args );
              if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); 
            ?> 
            <div class="item <?php if ($i == 0) { ?>active<?php } ?>">
              <?php $i++; ?>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <a href="<?php the_permalink(); ?>"><i class="fa fa-info"></i></a>
                <?php if ( get_post_meta( get_the_ID(), 'port-link', true) ) : ?>
                  <a href="<?php echo get_post_meta( get_the_ID(), 'port-link', true); ?>" target="_blank"><i class="fa fa-link"></i></a>
                <?php endif; ?>
              </div>
            </div>
            <?php
              endwhile; 
              endif;
              rewind_posts();
            ?>
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#tt-carousel" role="button" data-slide="prev">
            <i class="fa fa-chevron-circle-left"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#tt-carousel" role="button" data-slide="next">
            <i class="fa fa-chevron-circle-right"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="tt-contact" id="contact">
    <div class="container">
      <h2>Contact</h2>
      <p id="contact-me">Feel free to contact me about your next project!</p>
      <a href="tel:+1-858-442-3161"><i class="fa fa-mobile"></i> +1-858-442-3161</a>
      <a href="mailto:Travo100@gmail.com"><i class="fa fa-envelope"></i> travo100@gmail.com</a>
      <?php echo do_shortcode( '[contact-form-7 id="1770" title="Contact form 1"]' ); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>