<?php
$procedure_template = get_field('procedure_template', get_the_ID());
?>
<section class="procedure-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
		<h1 class="entry-title wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms"><?php the_title() ?></h1>
	</div>
	<div class="container-fluid">
		<div class="img-wrapper">
			<div class="img-desktop-wrapper">
				<?= wp_get_attachment_image($procedure_template['img_desktop'], 'full') ?>
			</div>
			<div class="img-mobile-wrapper">
				<?= wp_get_attachment_image($procedure_template['img_mobile'], 'full') ?>
			</div>
		</div>
	</div>
	<div class="container">
		<h2 class="procedure-img-title wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms"><?= $procedure_template['title'] ?></h2>
	</div>
	<div class="procedure-img-carousel wow bounceInUp" data-wow-duration="2s" data-wow-delay="300ms">
		<?php if ($procedure_template['imgs']):
			foreach ($procedure_template['imgs'] as $img):?>
				<div>
					<div class="procedure-img-detail">
						<div class="procedure-img">
							<?= wp_get_attachment_image($img['img']['id'], 'large') ?>
						</div>
						<div class="procedure-img-content">
							<h2><?= $img['title'] ?></h2>
							<div class="post-meta">
								<p class="post-date"><?= $img['date'] ?></p>
								<p class="post-location"><?= $img['location'] ?></p>
								<a href="<?= $img['button']['url'] ?>" class="post-link"><?= $img['button']['title'] ?></a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;
		endif; ?>
	</div>
</section>
