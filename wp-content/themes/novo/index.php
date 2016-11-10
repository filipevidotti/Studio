<?php get_header();?>

<div class="main" style="background-image: url('<?php bloginfo('template_url'); ?>/images/default.jpg')">

<!--    Change the image source '/images/default.jpg' with your favourite image.     -->
    
    <div class="cover black" data-color="black"></div>
     
<!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <h1 class="logo cursive">
            Luana Jardim 
        </h1>
<!--  H1 can have 2 designs: "logo" and "logo cursive"           -->
        
        <div class="content">
            <h4 class="motto">Em breve um novo site.</h4>
            <div class="subscribe">
                
                <div class="row">
                  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>    
				   <?php the_content(); ?>   
				  <?php endwhile; ?>    
                </div>
            </div>
        </div>
    </div>
  <?php get_footer(); ?>