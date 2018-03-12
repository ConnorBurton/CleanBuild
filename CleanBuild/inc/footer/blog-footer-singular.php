<?php
  if(get_field('custom_disabled_button_class', 'post_sections')) {
    $disabled_class = 'class="'. get_field('custom_disabled_button_class', 'post_sections') .'"';
  } else {
    $disabled_class = '';
  }
?>

<div class="blog-footer container">
  <div class="social-buttons">
    <p>Share this post:</p>
    <a href="mailto:?Subject=<?php the_title(); ?>s&amp;Body=I%20saw%20this%20and%20thought%20of%20you%20would%20enjoy%20it. <?php the_permalink(); ?>" title="Share this post via email" rel="nofollow" id="email"><i class="fa fa-envelope"></i></a>
    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share this post via Facebook" rel="nofollow" id="facebook"><i class="fa fa-facebook-official"></i></a>
    <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank" title="Share this post via Twitter" rel="nofollow" id="twitter"><i class="fa fa-twitter"></i></a>
    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Share this post via Google Plus" rel="nofollow" id="google"><i class="fa fa-google-plus"></i></a>
    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank" title="Share this post via Linked In" rel="nofollow" id="linkedin"><i class="fa fa-linkedin"></i></a>
  </div>
  <div class="navigation">
    <?php if(get_previous_post_link()) { ?>
      <div class="nav-arrow nav-left">
        <?php previous_post_link( '%link', 'Previous Post' ); ?>
      </div>
    <?php } else { ?>
      <div class="nav-arrow nav-left"><a <?= $disabled_class; ?>>Previous Post</a></div>
    <?php } ?>

    <?php if(get_next_post_link()) { ?>
      <div class="nav-arrow nav-right">
        <?php next_post_link( '%link', 'Next post' ); ?>
      </div>
    <?php } else { ?>
      <div class="nav-arrow nav-right"><a <?= $disabled_class; ?>>Next Post</a></div>
    <?php } ?>
  </div>
</div>