<div class="form-section med-pad">
  <div class="container flex">
    <div class="form three-quarter">
      <?php
        $form = get_field('form_shortcode');
        echo do_shortcode($form);
      ?>
    </div>
    <div class="sidebar quarter">
      <?php include 'contact-details.php'; ?>
    </div>
  </div>
</div>