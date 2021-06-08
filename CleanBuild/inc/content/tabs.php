<?php if(get_field('tabs')) { ?>
<?php $item = 0; $content = 0; ?>
<div class="tabs-wrap med-pad">
  <div class="container">

    <div class="tab-list t-center">
      <?php while ( have_rows('tabs') ) : the_row(); ?>
        <?php $item++; ?>
        <li data-tab="tab-<?php echo $item; ?>" class="tab-<?php echo $item; if($item == 1) { echo ' current'; } ?>"><span><?php the_sub_field('tab_heading'); ?></span></li>
      <?php endwhile; ?>
    </div>

    <?php while ( have_rows('tabs') ) : the_row(); ?>
      <?php $content++; ?>
      <p class="toggle-tab tab-<?php echo $content; if($content == 1) { echo ' current'; } ?>" data-tab="tab-<?php echo $content; ?>"><?php the_sub_field('tab_heading'); ?></p>
      <div class="tab-content <?php if($content == 1) { echo ' current'; } ?>" id="tab-<?php echo $content; ?>">

        <?php the_sub_field('content'); ?>

      </div>
    <?php endwhile; ?>

  </div>
</div>
<?php } ?>
