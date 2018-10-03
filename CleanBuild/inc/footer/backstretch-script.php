<script type="text/javascript">
	
<?php
	
	//Set up $option variable so we can grab banner_images from the news and other custom post types too.
	global $post;
	
	//Get post ID by defualt
	$option = $post->ID;
	
	//if news pages get page for posts 
	if ( is_home() || is_single() || is_category() ) {
		$option = get_option('page_for_posts');
	} 
	
	// You can extend this to work for custom post types too e.g.
	/*		
	  if ( is_singular('cases') || is_post_type_archive('cases') ){
		 $option = 'cases';
		}
	*/
	
?>

var $ = jQuery.noConflict();

$(document).ready(function(){

	$('.slider').backstretch([
    <?php
      if(get_field('banner_images', $option)) {
        $images = get_field('banner_images', $option);
        foreach($images as $img) {
          $img = $img['url'];
  				echo  '"'. $img .'",';
        }
      } else {
        echo '"'. get_stylesheet_directory_uri() .'/assets/background/background-example.png,"';
      }
    ?>

	],{
		duration:4000,
		fade:750,
		preload:0,
    fadeFirst: false,
	});

});

</script>
