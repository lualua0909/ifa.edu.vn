<?php $theme_home_settings = get_field('theme_home_settings', 'option');
$home_slider               = $theme_home_settings['home_slider'];
if ($home_slider): ?>
	<section class="hero-wrapper">
		<div class="hero-slick-slider">
			<?php foreach ($home_slider as $item): ?>
				<div>
					<div class="hero-slider-item" style="--bg: url(<?= wp_get_attachment_image_url($item['background'], 'full') ?>); --bg-mobile: url(<?= wp_get_attachment_image_url($item['background_mobile'], 'full') ?>);">
						<div class="hero-slider-content">
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
										<div class="hero-img-wrapper">
											<?= wp_get_attachment_image($item['left_img']['id'], 'large') ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="hero-content-wrapper">
											<div class="hero-logo">
												<?= wp_get_attachment_image($item['right_img']['id'], 'large') ?>
											</div>
											<h2 class="hero-title"><?= $item['title'] ?></h2>
											<div class="hero-desc">
												<?= wpautop($item['desc']) ?>
											</div>
											<?php if ($item['button']): ?>
												<div class="button-wrapper">
													<?php foreach ($item['button'] as $button): ?>
														<a href="<?= $button['url'] ?>" target="_blank" class="view-more-button" role="button"><?= $button['name'] ?></a>
													<?php endforeach; ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif;
