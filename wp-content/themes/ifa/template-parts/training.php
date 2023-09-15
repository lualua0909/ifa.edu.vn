<?php
$theme_home_settings = get_field('theme_home_settings', 'option');
$home_training       = $theme_home_settings['home_training'];
$banners             = $home_training['banners'];
?>
<section class="training-wrapper" style="background-image: url('<?= $home_training['background']['url'] ?>')">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<h2 class="training-title wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms"><?= $home_training['title'] ?></h2>
				<div class="training-desc wow slideInLeft" data-wow-duration="2s" data-wow-delay="200ms">
					<?= wpautop($home_training['desc']) ?>
				</div>
				<a href="<?= $home_training['button']['url'] ?>" target="_blank" class="view-more-button wow slideInLeft" data-wow-duration="2s" data-wow-delay="300ms" role="button"><?= $home_training['button']['title'] ?></a>
			</div>
		</div>
		<div class="row">
			<?php if ($banners):
				foreach ($banners as $key => $banner):?>
					<div class="col-lg-4 col-md-6">
						<div class="training-img wow bounceInUp" data-wow-duration="2s" data-wow-delay="<?= $key ?>00ms">
							<?php if ($banner['url'] != ''): ?>
								<a href="<?= $banner['url'] ?>">
									<?= wp_get_attachment_image($banner['img']['id'],'medium') ?>
								</a>
							<?php else: ?>
								<?= wp_get_attachment_image($banner['img']['id'],'medium') ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach;
			endif; ?>
		</div>
	</div>
</section>
