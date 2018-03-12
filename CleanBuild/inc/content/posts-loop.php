<?php
  if(get_field('custom_excerpt_length', 'post_sections')) {
    $length = get_field('custom_excerpt_length', 'post_sections');
  } else {
    $length = 30;
  }
?>
<div class="posts-loop">
  <div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
      <a href="<?= get_the_permalink(); ?>" title="Read more - <?= get_the_title(); ?>" class="post-block">
        <?php if(get_the_post_thumbnail_url()) { ?>
          <div class="post-image">
            <?= get_the_post_thumbnail(); ?>
          </div>
        <?php } ?>
        <div class="post-text">
          <h3><?= get_the_title(); ?></h3>
          <p><?= wp_trim_words( get_the_content(), $length, '...' ); ?> <span class="read-more">Read more</span></p>
        </div>
      </a>
    <?php endwhile; ?>
  </div>
</div>