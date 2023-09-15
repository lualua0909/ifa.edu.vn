<?php
$philosophy_template = get_field('philosophy_template', get_the_ID());
?>
<section class="philosophy-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
	</div>
	<div class="container">
		<div class="philosophy-img-wrapper wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms">
			<?= wp_get_attachment_image($philosophy_template['img_1']['id'],'full') ?>
		</div>
	</div>
	<div class="philosophy-content-wrapper wow bounceInUp" data-wow-duration="2s" data-wow-delay="200ms" style="background-image: url('<?= $philosophy_template['background_1']['url'] ?>')">
		<div class="container">
			<div class="philosophy-content">
				<?php the_content() ?>
			</div>
		</div>
	</div>
	<div class="philosophy-mission-wrapper wow bounceInUp" data-wow-duration="2s" data-wow-delay="300ms">
		<div class="container">
			<div class="philosophy-mission">
				<?= wp_get_attachment_image($philosophy_template['img_2']['id'],'large') ?>
			</div>
		</div>
	</div>
	<div class="philosophy-banner-wrapper wow bounceInUp" data-wow-duration="2s" data-wow-delay="400ms" style="background-image: url('<?= $philosophy_template['background_2']['url'] ?>')">
		<div class="container">
			<div class="philosophy-banner">
				<?= wp_get_attachment_image($philosophy_template['img_3']['id'],'large') ?>
			</div>
		</div>
	</div>
</section>
