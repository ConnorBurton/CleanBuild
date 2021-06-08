<div class="blog-footer small-pad">
  <div class="container">
    <div class="navigation">
      <?php if(get_next_posts_link()) { ?>
        <div class="nav-arrow nav-left"><?php next_posts_link( 'Older posts', '' ); ?></div>
      <?php } ?>

      <?php if(get_previous_posts_link()) { ?>
        <div class="nav-arrow nav-right"><?php previous_posts_link( 'Newer posts' ); ?></div>
      <?php } ?>
    </div>
  </div>
</div>
