<?php
$contact_template = get_field('contact_template', get_the_ID());
$map              = $contact_template['map'];
$contact_info     = $contact_template['contact_info'];
$social           = $contact_template['social'];
?>
<section class="contact-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="content-wrapper">
					<h1 class="entry-title"><?php the_title() ?></h1>
					<div class="entry-content">
						<?php the_content() ?>
					</div>
					<?php if ($contact_info): ?>
						<div class="contact-info">
							<ul class="info-list">
								<?php foreach ($contact_info as $item): ?>
									<li>
										<span><?= $item['icon'] ?></span>
										<?= $item['text'] ?>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
					<div class="social-wrapper">
						<?php if ($social['facebook'] != ''): ?>
							<a href="<?= $social['facebook'] ?>" class="facebook" target="_blank">
								<span class="logo">
									<img width="25" height="25" src="<?= get_theme_file_uri('assets/images/facebook-app-symbol.png') ?>" alt="Facebook">
								</span>
								<span class="text">Facebook</span>
							</a>
						<?php endif; ?>
						<?php if ($social['zalo'] != ''): ?>
							<a href="<?= $social['zalo'] ?>" class="zalo" target="_blank">
								<span class="logo">
									<img width="25" height="25" src="<?= get_theme_file_uri('assets/images/zalo-icon.png') ?>" alt="Zalo">
								</span>
								<span class="text">Zalo</span>
							</a>
						<?php endif; ?>
						<?php if ($social['youtube'] != ''): ?>
							<a href="<?= $social['youtube'] ?>" class="youtube" target="_blank">
								<span class="logo">
									<img width="25" height="25" src="<?= get_theme_file_uri('assets/images/youtube-icon.png') ?>" alt="Youtube">
								</span>
								<span class="text">Youtube</span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="map-wrapper">
					<?= $map ?>
				</div>
			</div>
		</div>
	</div>
</section>
