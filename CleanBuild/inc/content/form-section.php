<div class="form-section">
  <div class="container table">
    <div class="form td vt">
      <?php
        $form = get_field('form_shortcode');
        echo do_shortcode($form);
      ?>
    </div>
    <div class="sidebar td vt">
      <?php include 'contact-details.php'; ?>
    </div>
  </div>
</div>