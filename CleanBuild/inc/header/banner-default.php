<?php
  if(is_home()) {
    $title = 'Latest News';
  } else if(is_archive()) {
    $title = get_the_archive_title();
  } else if(is_404()) {
    $title = 'Error 404';
  } else {
    $title = get_the_title();
  }
?>

<div class="banner default">
  <div class="container">
    <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
    <h1><?= $title; ?></h1>
  </div>
  <div class="slider"></div>
</div>