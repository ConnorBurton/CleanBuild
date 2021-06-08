<div class="posts-loop med-pad">
  <div class="container flex">
    <?php while ( have_posts() ) : the_post(); ?>
      <a href="<?= get_the_permalink(); ?>" title="Read more - <?= get_the_title(); ?>" class="post-block">
        <?php if(get_the_post_thumbnail_url()) { ?>
          <div class="post-image relative">
            <img data-src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="lazy o-fit">
          </div>
        <?php } ?>
        <div class="post-text">
          <h3><?= get_the_title(); ?></h3>
          <p><?= wp_trim_words( get_the_content(), 30, '...' ); ?> <span class="read-more">Read more</span></p>
        </div>
      </a>
    <?php endwhile; ?>
  </div>
</div>