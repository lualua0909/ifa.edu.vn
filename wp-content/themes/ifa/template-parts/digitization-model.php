<?php
$theme_home_settings = get_field('theme_home_settings', 'option');
$home_digitization   = $theme_home_settings['home_digitization'];
$digitization_models = $home_digitization['digitization_models'];
if ($digitization_models): ?>
	<section class="digitization-model-wrapper">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<h2 class="digitization-model-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms"><?= $home_digitization['title'] ?></h2>
					<div class="digitization-model-desc wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="200ms">
						<?= wpautop($home_digitization['desc']) ?>
					</div>
				</div>
			</div>
			<div class="d-flex align-items-start digitization-model-tabs wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
				<div class="nav flex-column nav-pills digitization-model-tablist" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<?php foreach ($digitization_models as $key => $digitization_model): ?>
						<button class="nav-link <?= ($key == 0) ? 'active' : '' ?>" id="v-pills-<?= $key ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?= $key ?>" type="button" role="tab" aria-controls="v-pills-<?= $key ?>" aria-selected="true">
							<span class="icon">
								<?= wp_get_attachment_image($digitization_model['icon']['id'],'thumbnail') ?>
		                    </span>
							<span class="text">
		                        <span><?= $digitization_model['title_1'] ?></span>
		                        <?= $digitization_model['title_2'] ?>
		                    </span>
						</button>
					<?php endforeach; ?>
				</div>
				<div class="tab-content" id="v-pills-tabContent">
					<?php foreach ($digitization_models as $key => $digitization_model): ?>
						<div class="tab-pane fade <?= ($key == 0) ? 'show active' : '' ?>" id="v-pills-<?= $key ?>" role="tabpanel" aria-labelledby="v-pills-<?= $key ?>-tab">
							<div class="digitization-model-content">
								<h4 class="entry-title"><?= $digitization_model['title_3'] ?></h4>
								<?php if ($digitization_model['packages']): ?>
									<div class="digitization-model-slick-slider">
										<?php foreach ($digitization_model['packages'] as $package_key => $package): ?>
											<div>
												<div class="package-card" style="background-image: url('<?= $package['img']['sizes']['medium'] ?>')">
													<a href="<?= $package['youtube_url'] ?>" data-fancybox="video-gallery-<?= $key ?>" class="youtube-url"></a>
													<div class="package-detail">
														<h3 class="package-title">
															<?= $package['title'] ?>
														</h3>
														<div class="package-desc">
															<?= $package['desc'] ?>
														</div>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="digitization-model-banner wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
				<?= wp_get_attachment_image($home_digitization['banner']['id'],'full') ?>
				<a href="<?= $home_digitization['button']['url'] ?>" class="view-more-button" target="_blank"><?= $home_digitization['button']['label'] ?></a>
			</div>
		</div>
	</section>
<?php endif;
