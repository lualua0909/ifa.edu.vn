<?php $theme_home_settings = get_field('theme_home_settings', 'option');
$home_partner              = $theme_home_settings['home_partner']; ?>
<section class="partners-wrapper">
	<div class="container">
		<h2 class="partner-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms"><?= $home_partner['title'] ?></h2>
		<?php if ($home_partner['partners']): ?>
			<div class="partners-slick-slider wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="200ms">
				<?php foreach ($home_partner['partners'] as $partner): ?>
					<div>
						<div class="partner-item">
							<a href="<?= $partner['url'] ?>" target="_blank">
								<?= wp_get_attachment_image($partner['logo']['id'],'full') ?>
							</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
