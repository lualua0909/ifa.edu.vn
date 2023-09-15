<?php

global $wp_query;

?>

<section class="archive-giang-vien-wrapper">
	<div class="container">
		<h1 class="archive-title"><?php the_archive_title() ?></h1>
		<div class="row">
			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : ?>

					<?php the_post();
					$thong_tin_giang_vien = get_field('thong_tin_giang_vien', get_the_ID()); ?>

					<div class="col-lg-4 col-sm-6">
						<div class="member-item">
							<div class="member-img">
								<?= wp_get_attachment_image($thong_tin_giang_vien['anh_dai_dien'], 'large') ?>
							</div>
							<div class="member-info">
								<h4><?= $thong_tin_giang_vien['ten'] ?></h4>
								<h5><?= $thong_tin_giang_vien['chuc_vu'] ?></h5>
								<p><?= $thong_tin_giang_vien['mo_ta'] ?></p>
								<a href="<?php the_permalink() ?>" class="detail-btn" target="_blank">Xem thêm</a>
							</div>
						</div>
					</div>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part('template-parts/content/content-none'); ?>

			<?php endif; ?>
		</div>

		<?php if ($wp_query->max_num_pages > 1): ?>
			<div class="load-more-wrapper">
				<a href="javascript:;" class="load-more-button">Hiển thị thêm</a>
			</div>
		<?php endif; ?>
	</div>
</section>
