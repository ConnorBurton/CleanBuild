<?php
  if(get_field('custom_disabled_button_class', 'post_sections')) {
    $disabled_class = 'class="'. get_field('custom_disabled_button_class', 'post_sections') .'"';
  } else {
    $disabled_class = '';
  }
?>

<div class="blog-footer container">
  <div class="navigation">
    <?php if(get_previous_posts_link()) { ?>
      <div class="nav-arrow nav-right"><?php previous_posts_link( 'Newer posts' ); ?></div>
    <?php } else { ?>
      <div class="nav-arrow nav-right"><a <?= $disabled_class; ?>>Newer Posts</a></div>
    <?php } ?>

    <?php if(get_next_posts_link()) { ?>
      <div class="nav-arrow nav-left"><?php next_posts_link( 'Older posts', '' ); ?></div>
    <?php } else { ?>
      <div class="nav-arrow nav-left"><a <?= $disabled_class; ?>>Older Posts</a></div>
    <?php } ?>
  </div>
</div>