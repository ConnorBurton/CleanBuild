<script type="text/javascript">

var $ = jQuery.noConflict();

$(document).ready(function(){

	$('.slider').backstretch([
    <?php
      if(get_field('banner_images')) {
        $images = get_field('banner_images');
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
