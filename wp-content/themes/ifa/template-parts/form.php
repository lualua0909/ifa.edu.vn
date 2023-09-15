<?php

$banner    = get_field('_form_template_banner', get_the_ID());
$header    = get_field('_form_template_header', get_the_ID());
$shortcode = get_field('_form_template_shortcode', get_the_ID());

?>

<section class="form-wrapper">
	<div class="container">
		<div class="form-container">
			<div class="form-banner">
				<?= wp_get_attachment_image($banner, 'full') ?>
			</div>
			<div class="form-header">
				<h1 class="form-title"><?= $header['_title'] ?></h1>
				<div class="form-content">
					<?= wpautop($header['_content']) ?>
				</div>
			</div>
			<?= do_shortcode($shortcode) ?>
		</div>
	</div>
</section>
