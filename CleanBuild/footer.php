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
							<?php include 'inc/content/contact-details.php'; ?>
						</div>
					</div>
				</div>
				<div class="bottom-footer">
					<div class="container">
						<p>&copy; Copyright <?php echo date('Y'); ?>  <?php echo do_shortcode('[company-name]'); ?> <span>|</span> Reg no. <?php echo do_shortcode('[reg-number]') ?> <span>|</span> <a href="/terms-conditions" title="View the sites terms and conditions">Website terms and privacy policy</a></p>
					</div>
				</div>
			</footer>

		</div> <?php // closing #container ?>

		<?php wp_footer(); ?>

	</body>

</html>
