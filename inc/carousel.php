<?php

// Carousel

function carousel() {

		

        $slider_show = get_option('general_enable_slider');
        $slider_auto = get_option('general_auto_play');
        $slider_speed = get_option('general_slider_delay');
        $slider_animation_time = get_option('general_animation_time');
        
        
        if(empty($slider_speed)) {$slider_speed = "4000";}
        if(empty($slider_animation_time)) {$slider_animation_time = "1000";}

        if($slider_show[0] == 'yes') {
        
        // Query Slides
        $args=array('post_type' => 'pt_slides' ,'post_status' => 'publish',  'posts_per_page' => 10);
        query_posts($args);
        
        $count_posts = wp_count_posts('pt_slides');
        $total_posts = $count_posts->publish;
        
        // If the total number of posts are greater than 10, set the count to
        if ($count_posts->publish > 10) {
	        $count_posts->publish = 10;
        }
        
        
        
        
        
        if ($total_posts == 1) {
	        
	        
	        
	   
  
  if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	global $post; 
	$postid = $post->ID;
	
	$video_link = get_post_meta($postid, 'tk_video_link', true);?>
	<div id="carousel" class="container">
    <div class="row">
    <div class="col-xs-12">
    <?php if($video_link){?>
  
      <div class="col-md-6">
      <!-- <h1><?php the_title(); ?></h1> -->
	  <?php the_content();?>
      </div>
      <div class="col-md-6">
      <?php tk_video_player($video_link);?>
      </div>
    	
      <?php } elseif(has_post_thumbnail()){?>
      <a href="<?php echo the_permalink()?>" style="display: inline-block;width: 100%;height: 100%;"><?php the_post_thumbnail('slider'); ?></a>
      <?php }else{?>
      <?php the_content();?>
      <?php }
                      ?>
    </div>
    </div>
    <?php endwhile;
          endif; ?>
  </div>
  </div>
	        
	        
	 <?php       
        } else {
	        
       
        
        
        ?>



        
        
			<div class="container">
					
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php for ($i = 1; $i <= $total_posts; $i++) { ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i-1; ?>" <?php if ($i=="1"){echo 'class="active"';}?>></li>
    <?php }?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  
  <?php 
  $counter = 0;
  if ( have_posts() ) : while ( have_posts() ) : the_post();
	
	global $post; 
	$postid = $post->ID;
	
	$video_link = get_post_meta($postid, 'tk_video_link', true);?>
	
    <div class="item <?php if ($counter == "0") {echo ' active';}$counter++  ?>">
    <div class="col-xs-10 col-xs-offset-1">
    <?php if($video_link){?>
  
      <div class="col-md-5">
      <h1><?php the_title(); ?></h1>
	  <?php the_content();?>
      </div>
      <div class="col-md-7">
      <?php tk_video_player($video_link);?>
      </div>
    	
      <?php } elseif(has_post_thumbnail()){?>
      <a href="<?php echo the_permalink()?>" style="display: inline-block;width: 100%;height: 100%;"><?php the_post_thumbnail('slider'); ?></a>
      <?php }else{?>
      <?php the_content();?>
      <?php }
                      ?>
      
      <div class="carousel-caption">
      
      </div><!-- /.carousel-caption -->
    </div>
    </div>
    <?php endwhile;
          endif; ?>
  </div>
			
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
			
			
			



        <?php } 
       wp_reset_query();
       
       
       
       }
       }
     