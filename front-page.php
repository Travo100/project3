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
  <div class="tt-about-me">
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
  <div class="tt-portfolio">
    <div class="container">
      <div class="col-md-10 col-centered">
          <h2>Portfolio</h2>
          <div id="tt-carousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
  <!--         <ol class="carousel-indicators">
            <li data-target="#tt-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#tt-carousel" data-slide-to="1"></li>
          </ol> -->

            
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php 
              $args = array( 'post_type' => 'portfolio-piece'); 
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post(); 
           ?> 
            <div class="item active">
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                
              </div>
            </div>
          <?php 
            endwhile; 
            rewind_posts();
          ?>
            <?php 
              $args = array( 'post_type' => 'portfolio-piece'); 
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post(); 
           ?> 
            <div class="item">
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
               
              </div>
            </div>
             <?php 
            endwhile; 
            rewind_posts();
          ?>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#tt-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#tt-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

