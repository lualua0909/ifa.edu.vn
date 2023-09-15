<?php
$cooperate_template = get_field('cooperate_template', get_the_ID());
$cooperate_1        = $cooperate_template['cooperate_1'];
$cooperate_2        = $cooperate_template['cooperate_2'];
$cooperate_3        = $cooperate_template['cooperate_3'];
$cooperate_4        = $cooperate_template['cooperate_4'];
?>
<section class="cooperate-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
		<h1 class="entry-title wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms"><?php the_title() ?></h1>

		<div class="cooperate cooperate-1">
			<div class="ifa-approval wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
				<?= wp_get_attachment_image($cooperate_1['img']['id'],'medium') ?>
			</div>
			<div class="content wow slideInRight" data-wow-duration="2s" data-wow-delay="100ms">
				<h2><?= $cooperate_1['title'] ?></h2>
				<?= wpautop($cooperate_1['content']) ?>
				<div class="cooperate-img wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms">
					<?= wp_get_attachment_image($cooperate_1['img_2']['id'],'medium') ?>
				</div>
			</div>
		</div>

		<div class="cooperate cooperate-2">
			<div class="content wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
				<h2><?= $cooperate_2['title'] ?></h2>
				<?= wpautop($cooperate_2['content']) ?>
				<h3><?= $cooperate_2['title_2'] ?></h3>
				<?php if ($cooperate_2['list']): ?>
					<ul>
						<?php foreach ($cooperate_2['list'] as $text): ?>
							<li><?= $text['text'] ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="cooperate-img wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms">
				<img src="<?= $cooperate_2['img']['sizes']['medium'] ?>" alt="<?= $cooperate_2['img']['alt'] ?>">
			</div>
		</div>

		<div class="cooperate cooperate-3">
			<div class="cooperate-img wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
				<?= wp_get_attachment_image($cooperate_3['img']['id'],'medium') ?>
			</div>
			<div class="content wow slideInRight" data-wow-duration="2s" data-wow-delay="100ms">
				<h2><?= $cooperate_3['title'] ?></h2>
				<?= wpautop($cooperate_3['content']) ?>
				<h3><?= $cooperate_3['title_2'] ?></h3>
				<?php if ($cooperate_3['list']): ?>
					<ul>
						<?php foreach ($cooperate_3['list'] as $text): ?>
							<li><?= $text['text'] ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>

		<div class="cooperate cooperate-3">
			<div class="cooperate-img wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms">
				<?= wp_get_attachment_image($cooperate_4['img']['id'],'medium') ?>
			</div>
			<div class="content wow slideInRight" data-wow-duration="2s" data-wow-delay="100ms">
				<h2><?= $cooperate_4['title'] ?></h2>
				<?= wpautop($cooperate_4['content']) ?>
				<h3><?= $cooperate_4['title_2'] ?></h3>
				<?php if ($cooperate_4['list']): ?>
					<ul>
						<?php foreach ($cooperate_4['list'] as $text): ?>
							<li><?= $text['text'] ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
