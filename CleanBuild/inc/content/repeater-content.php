<div class="repeater-content">

  <?php $count = 0; ?>
  <?php while ( have_rows('repeater_content') ) : the_row(); $count++; ?>
  <?php $img = get_sub_field('image'); ?>

    <div class="row flex">

      <?php if ($count % 2 == 0) { ?>
        <div class="image half relative"><img data-src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>" class="lazy o-fit"></div>
      <?php } ?>

      <div class="content half large-pad">
        <div class="inner-container">
          <?php the_sub_field('content'); ?>
        </div>
      </div>

      <?php if ($count % 2 !== 0) { ?>
        <div class="image half relative"><img data-src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>" class="lazy o-fit"></div>
      <?php } ?>

    </div>

  <?php endwhile; ?>

</div>