<?php
$message_template = get_field('message_template', get_the_ID());
?>
<section class="message-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
	</div>
	<div class="message-detail-wrapper" style="background-image: url('<?= $message_template['background']['url'] ?>')">
		<div class="container">
			<h1 class="entry-title wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
				<?= wp_get_attachment_image($message_template['img']['id'],'large') ?>
			</h1>
			<div class="message-desc wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms">
				<?= wpautop($message_template['desc']) ?>
			</div>
		</div>
	</div>
	<div class="message-video-wrapper">
		<div class="container">
			<div class="video-wrapper">
				<?= $message_template['youtube_iframe'] ?>
			</div>
		</div>
	</div>
	<div class="massage-content-wrapper">
		<div class="container">
			<div class="massage-content wow bounceInUp" data-wow-duration="2s" data-wow-delay="300ms">
				<?php the_content() ?>
			</div>
			<p class="position wow bounceInUp" data-wow-duration="2s" data-wow-delay="200ms"><?= $message_template['position'] ?></p>
			<p class="name wow bounceInUp" data-wow-duration="2s" data-wow-delay="300ms"><?= $message_template['name'] ?></p>
			<div class="signature wow bounceInUp" data-wow-duration="2s" data-wow-delay="400ms">
				<img src="<?= $message_template['signature']['sizes']['medium'] ?>" alt="<?= $message_template['signature']['alt'] ?>">
			</div>
		</div>
	</div>
</section>
