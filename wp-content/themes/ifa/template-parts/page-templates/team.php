<?php
$our_team = get_field('our_team', get_the_ID());
?>
<section class="our-team-wrapper">
	<div class="container">
		<div class="heading">
			<h1 class="entry-title"><?php the_title() ?></h1>
		</div>
		<?php if ($our_team): ?>
			<div class="our-team-slick-slider">
				<?php foreach ($our_team as $item): ?>
					<div class="member-item">
						<div class="member-img">
							<?= wp_get_attachment_image($item['img']['id'], 'medium') ?>
						</div>
						<div class="member-info">
							<h4><?= $item['name'] ?></h4>
							<h5><?= $item['text_1'] ?></h5>
							<p><?= $item['text_2'] ?></p>
							<a href="<?= $item['url'] ?>" class="detail-btn" target="_blank">Xem thêm</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
