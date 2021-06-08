			<footer class="footer">
				<div class="container">

					<div class="top-footer flex med-pad no-pad-bot">

						<div class="links">
							<div class="menu-col vt">
								<h3>Information</h3>
								<?php wp_nav_menu(array('menu' => 'Footer Information', 'container' => false)); ?>
							</div>
							<div class="menu-col vt">
								<h3>Products</h3>
								<?php wp_nav_menu(array('menu' => 'Footer Products', 'container' => false)); ?>
							</div>
						</div>

						<div class="address">
							<?php include 'inc/content/contact-details.php'; ?>
						</div>

					</div>

					<div class="bottom-footer med-pad">
						<p>
							&copy; Copyright <?php echo date('Y'); ?>  <?php echo do_shortcode('[company-name]'); ?> 
							<span>|</span> Company no. <?php echo do_shortcode('[reg-number]') ?> 
							<span>|</span> <a href="/terms-conditions" title="View the sites terms and conditions">Terms & Conditions</a>
							<span>|</span> <a href="/cookie-policy" title="View the sites cookie policy">Cookie Policy</a>
						</p>
					</div>

				</div>
			</footer>

		</div> <?php // closing #container ?>

		<?php wp_footer(); ?>

		<?php
			if( wp_script_is( 'backstretch-script', 'enqueued' ) ) {
				include 'inc/footer/backstretch-script.php';
			}

			if( wp_script_is( 'gmap-link', 'enqueued' ) ) {
				include 'inc/footer/map-script.php';
			}

			if(get_field('seasonal_opening_hours', 'seasonal')) {
				include 'inc/footer/seasonal-opening-hours.php';
			}
		?>

	</body>

</html>
