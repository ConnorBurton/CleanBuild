<div class="repeater-content">

  <?php $count = 0; ?>
  <?php while ( have_rows('repeater_content') ) : the_row(); $count++; ?>

    <div class="row table">

      <?php if ($count % 2 == 0) { ?>
        <div class="image td vm">
          <?php $img = get_sub_field('image'); ?>
          <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
        </div>
      <?php } ?>

      <div class="content td vm">
        <div class="inner-container">
          <?php the_sub_field('content'); ?>
          <?php if(get_sub_field('custom_button_text')) { ?>
            <a href="<?php the_sub_field('custom_button_link'); ?>" class="btn black"><?php the_sub_field('custom_button_text'); ?></a>
          <?php } else { ?>
            <a href="<?= get_the_permalink(18); ?>" class="btn black">Contact us</a>
          <?php } ?>
        </div>
      </div>

      <?php if ($count % 2 !== 0) { ?>
        <div class="image td vm">
          <?php $img = get_sub_field('image'); ?>
          <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
        </div>
      <?php } ?>

    </div>

  <?php endwhile; ?>

</div>