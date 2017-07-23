			<footer class="footer">
				<div class="container">
					<div class="top-footer table">
						<div class="links td vt">
							<div class="menu-col">
								<h2>Information</h2>
								<?php wp_nav_menu(array('menu' => 'Footer Information', 'container' => false)); ?>
							</div>
							<div class="menu-col">
								<h2>Products</h2>
								<?php wp_nav_menu(array('menu' => 'Footer Products', 'container' => false)); ?>
							</div>
						</div>
						<div class="address td vt">
							<h2>Get in touch</h2>
							<ul class="address-details">
								<?php echo do_shortcode('[address]'); ?>
								<li class="space"></li>
								<li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo do_shortcode('[phone]'); ?></li>
								<li><i class="fa fa-fax" aria-hidden="true"></i> <?php echo do_shortcode('[fax]'); ?></li>
								<li><a href="<?php echo do_shortcode('[email link="true"]'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo do_shortcode('[email]'); ?></a></li>
								<li class="space"></li>
								<li class="social"><?php echo do_shortcode('[social]'); ?></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="bottom-footer">
					<div class="container">
						<p>&copy; Copyright <?php echo date('Y'); ?> <?php echo do_shortcode('[company-name]'); ?> <span>|</span> <a href="/terms-conditions" title="View the sites terms and conditions">Website terms and privacy policy</a></p>
					</div>
				</div>
			</footer>

		</div> <?php // closing #container ?>

		<?php wp_footer(); ?>

	</body>

</html>
