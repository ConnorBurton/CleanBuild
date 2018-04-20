<?php while ( have_rows('seasonal_opening_hours', 'seasonal') ) : the_row(); ?>
  <?php if(get_sub_field('enable')) { ?>
    <div class="seasonal-opening-hours" id="<?php the_sub_field('id'); ?>">
      <div class="container">
        <?php while ( have_rows('opening_hours') ) : the_row(); ?>
          <p><?php the_sub_field('time'); ?></p>
        <?php endwhile; ?>
      </div>
    </div>
  <?php } ?>
<?php endwhile; ?>