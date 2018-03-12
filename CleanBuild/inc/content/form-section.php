<div class="form-section">
  <div class="container table">
    <div class="form td vt">
      <?php
        $form = get_field('form_shortcode');
        echo do_shortcode($form);
      ?>
    </div>
    <div class="sidebar td vt">
      <h2>Get in touch</h2>
      <?php echo do_shortcode('[address container="true"]'); ?>
      <ul class="contact-information">
        <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo do_shortcode('[phone]'); ?></li>
        <li><i class="fa fa-fax" aria-hidden="true"></i> <?php echo do_shortcode('[fax]'); ?></li>
        <li><a href="<?php echo do_shortcode('[email link="true"]'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo do_shortcode('[email]'); ?></a></li>
        <li class="space"></li>
        <li class="social"><?php echo do_shortcode('[social]'); ?></li>
      </ul>
    </div>
  </div>
</div>