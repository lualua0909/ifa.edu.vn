<?php
$theme_footer_settings = get_field('theme_footer_settings', 'option');
$footer_hotline        = $theme_footer_settings['footer_hotline'];
?>
<div class="footer-wrapper">
	<div class="footer-widgets">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms">
					<div class="footer-widget footer-widget-1">
						<div class="footer-logo">
							<?= wp_get_attachment_image($theme_footer_settings['footer_logo']['id'],'medium') ?>
						</div>
						<div class="desc">
							<?= wpautop($theme_footer_settings['footer_desc']) ?>
						</div>
						<a href="tel:<?= $footer_hotline['phone'] ?>" class="hotline-button">
                            <span class="icon">
                                <img width="35" height="35" src="<?= get_theme_file_uri('assets/images/phone-call.png') ?>" alt="Hotline">
                            </span>
							<span class="text">
                                <?= $footer_hotline['title'] ?> <br>
                                <?= $footer_hotline['phone'] ?>
                            </span>
						</a>
					</div>
				</div>
				<div class="col-lg-2 wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="200ms">
					<div class="footer-widget footer-widget-2">
						<?php $theme_location = 'footer-menu-1';
						if (has_nav_menu($theme_location)):
							$theme_locations = get_nav_menu_locations();
							$menu_obj         = get_term($theme_locations[$theme_location],
								'nav_menu');
							$menu_name        = $menu_obj->name;
							?>
							<h5 class="footer-widget-title"><?= $menu_name ?></h5>
							<?php
							wp_nav_menu([
								'theme_location' => $theme_location,
								'menu_class'     => 'footer-links'
							]);
						endif; ?>
					</div>
				</div>
				<div class="col-lg-3 wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
					<div class="footer-widget footer-widget-3">
						<?php $theme_location = 'footer-menu-2';
						if (has_nav_menu($theme_location)):
							$theme_locations = get_nav_menu_locations();
							$menu_obj         = get_term($theme_locations[$theme_location],
								'nav_menu');
							$menu_name        = $menu_obj->name;
							?>
							<h5 class="footer-widget-title"><?= $menu_name ?></h5>
							<?php
							wp_nav_menu([
								'theme_location' => $theme_location,
								'menu_class'     => 'footer-links'
							]);
						endif; ?>
					</div>
				</div>
				<div class="col-lg-3 wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
					<div class="footer-widget footer-widget-4">
						<h5 class="footer-widget-title"><?= $theme_footer_settings['footer_widget_4_title'] ?></h5>
						<address>
							<p><?= $theme_footer_settings['footer_address'] ?></p>
							<?php if ($theme_footer_settings['footer_contact']):
								foreach ($theme_footer_settings['footer_contact'] as $footer_address): ?>
									<p><?= $footer_address['icon'] . ' ' . $footer_address['text'] ?></p>
								<?php endforeach;
							endif; ?>
						</address>
						<?php if ($theme_footer_settings['footer_social']): ?>
							<ul class="social-list">
								<?php foreach ($theme_footer_settings['footer_social'] as $footer_social): ?>
									<li>
										<a href="<?= $footer_social['url'] ?>" target="_blank">
											<?= wp_get_attachment_image($footer_social['logo']['id'],'thumbnail') ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright-wrapper wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
		<div class="container">
			<div class="copyright"><?= $theme_footer_settings['footer_copyright'] ?></div>
		</div>
	</div>
</div>
