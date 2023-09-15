<?php

$register_course_page       = get_field('_register_course_page', 'option');
$training_template_settings = $register_course_page['training_template_settings'];

if ($training_template_settings): ?>

	<section class="training-template-wrapper">
		<?php foreach ($training_template_settings as $template_setting):
			$title = $template_setting['title'];
			$content = $template_setting['content'];
			$button = $template_setting['button'];
			$img = wp_get_attachment_image_url($template_setting['img'], 'full');
			?>
			<div class="training-section">
				<div class="content-wrapper wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
					<h2 class="section-title"><?= $title ?></h2>
					<div class="section-content">
						<?= wpautop($content) ?>
					</div>
					<div class="button-wrapper">
						<?php if ($button['label'] != ''): ?>
							<a href="<?= $button['url'] ?>" target="_blank" class="view-more-button"><?= $button['label'] ?></a>
						<?php endif; ?>
					</div>
				</div>
				<div class="img-wrapper wow slideInRight" data-wow-duration="2s" data-wow-delay="100ms" style="background-image: url(<?= $img ?>)"></div>
			</div>
		<?php endforeach; ?>
	</section>

<?php endif;
