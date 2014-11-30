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
<?php get_footer(); ?>