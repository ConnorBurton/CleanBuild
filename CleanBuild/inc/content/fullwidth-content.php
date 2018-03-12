<div class="fullwidth-content">
  <div class="container">
    <?php
      if ( have_posts() ) {
        while ( have_posts() ) { the_post();
          the_content();
        }
      }
    ?>
  </div>
</div>