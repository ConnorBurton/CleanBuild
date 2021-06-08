<div class="blog-footer small-pad">
  <div class="container flex">
    <div class="social-buttons half">
      <p>Share this post:</p>
      <a href="mailto:?Subject=<?php the_title(); ?>s&amp;Body=I%20saw%20this%20and%20thought%20of%20you%20would%20enjoy%20it. <?php the_permalink(); ?>" title="Share this post via email" rel="nofollow" id="email"><i class="fas fa-envelope"></i></a>
      <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="Share this post via Facebook" rel="nofollow" id="facebook"><i class="fab fa-facebook-f"></i></a>
      <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank" title="Share this post via Twitter" rel="nofollow" id="twitter"><i class="fab fa-twitter"></i></a>
      <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" target="_blank" title="Share this post via Linked In" rel="nofollow" id="linkedin"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <div class="navigation half">
      <?php if(get_previous_post_link()) { ?>
        <div class="nav-arrow nav-left">
          <?php previous_post_link( '%link', 'Previous Post' ); ?>
        </div>
      <?php } ?>

      <?php if(get_next_post_link()) { ?>
        <div class="nav-arrow nav-right">
          <?php next_post_link( '%link', 'Next post' ); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
