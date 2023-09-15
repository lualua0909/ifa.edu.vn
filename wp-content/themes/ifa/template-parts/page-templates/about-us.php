<?php
$about_us_template  = get_field('about_us_template', get_the_ID());
$about_sections     = $about_us_template['about_sections'];
$about_last_section = $about_us_template['about_last_section']; ?>
<section class="about-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
	</div>
	<?php if ($about_sections):
		foreach ($about_sections as $key => $about_section): ?>
			<div class="about-section about-section-<?= ++ $key ?>">
				<div class="content-wrapper wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
					<h2 class="about-section-title"><?= $about_section['title'] ?></h2>
					<div class="entry-content">
						<?= wpautop($about_section['desc']) ?>
					</div>
					<div class="button-wrapper">
						<a href="<?= $about_section['button']['url'] ?>" target="_blank" class="view-more-button"><?= $about_section['button']['title'] ?></a>
					</div>
				</div>
				<div class="img-wrapper wow slideInRight" data-wow-duration="2s" data-wow-delay="100ms" style="background-image: url('<?= $about_section['background']['url'] ?>')">
					<?= wp_get_attachment_image($about_section['img']['id'], 'full') ?>
				</div>
			</div>
		<?php endforeach;
	endif; ?>
	<div class="about-section-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="content-wrapper wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
						<h2 class="entry-title"><?= $about_last_section['title'] ?></h2>
						<div class="entry-content">
							<?= wpautop($about_last_section['desc']) ?>
						</div>
						<div class="button-wrapper">
							<a href="<?= $about_last_section['button']['url'] ?>" target="_blank" class="action-button" role="button"><?= $about_last_section['button']['title'] ?></a>
							<a href="<?= $about_last_section['button_outline']['url'] ?>" target="_blank" class="action-button action-button-outline" role="button"><?= $about_last_section['button_outline']['title'] ?></a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="img-wrapper wow slideInRight" data-wow-duration="2s" data-wow-delay="100ms">
						<a href="<?= $about_last_section['video']['youtube_url'] ?>" data-fancybox="video-gallery">
							<?= wp_get_attachment_image($about_last_section['video']['img']['id'], 'full', '', ["class" => "about-img"]) ?>
							<?= wp_get_attachment_image($about_last_section['video']['mobile_img']['id'], 'full', '', ["class" => "about-img-mobile"]) ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

