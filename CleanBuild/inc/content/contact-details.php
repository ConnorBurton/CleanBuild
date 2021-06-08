<h3>Address</h3>
<?= do_shortcode('[address]'); ?>

<h3>Get in touch</h3>
<ul class="contact-details">
  <li><i class="fas fa-phone"></i> <?= do_shortcode('[phone]'); ?></li>
  <li><i class="fas fa-fax"></i> <?= do_shortcode('[fax]'); ?></li>
  <li><a href="<?= do_shortcode('[email link="true"]'); ?>"><i class="fas fa-envelope"></i> <?= do_shortcode('[email]'); ?></a></li>
</ul>

<?= do_shortcode('[social container="true"]'); ?>
