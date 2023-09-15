<?php

$thong_tin_giang_vien = get_field('thong_tin_giang_vien', get_the_ID());

?>

<section class="single-giang-vien-wrapper">
	<div class="container">
		<div class="info-wrapper">
			<div class="avatar-wrapper">
				<div class="avatar">
					<?= wp_get_attachment_image($thong_tin_giang_vien['anh_dai_dien'], 'large') ?>
				</div>
			</div>
			<div class="info-detail">
				<h1 class="entry-title"><?= $thong_tin_giang_vien['ten'] ?></h1>
				<h3 class="subtitle"><?= $thong_tin_giang_vien['chuc_vu'] ?></h3>
				<div class="desc">
					<?= wpautop($thong_tin_giang_vien['mo_ta']) ?>
				</div>
			</div>
		</div>

		<ul class="nav nav-tabs" id="giang-vien-tab" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="giang-vien-tab-1" data-bs-toggle="tab" data-bs-target="#giang-vien-1" type="button" role="tab" aria-controls="giang-vien-1" aria-selected="true">Trình độ chuyên môn</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="giang-vien-tab-2" data-bs-toggle="tab" data-bs-target="#giang-vien-2" type="button" role="tab" aria-controls="giang-vien-2" aria-selected="false">Kinh nghiệm làm việc</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="giang-vien-tab-3" data-bs-toggle="tab" data-bs-target="#giang-vien-3" type="button" role="tab" aria-controls="giang-vien-3" aria-selected="false">Kinh nghiệm giảng dạy</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="giang-vien-tab-4" data-bs-toggle="tab" data-bs-target="#giang-vien-4" type="button" role="tab" aria-controls="giang-vien-4" aria-selected="false">Lĩnh vực tư vấn</button>
			</li>
		</ul>

		<div class="tab-content" id="giang-vien-tab-content">
			<div class="tab-pane fade show active" id="giang-vien-1" role="tabpanel" aria-labelledby="giang-vien-tab-1">
				<?php if ($thong_tin_giang_vien['tab_content_1']): ?>
					<ul>
						<?php foreach ($thong_tin_giang_vien['tab_content_1'] as $item): ?>
							<li><?= wpautop($item['noi_dung']) ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="tab-pane fade" id="giang-vien-2" role="tabpanel" aria-labelledby="giang-vien-tab-2">
				<?php if ($thong_tin_giang_vien['tab_content_2']): ?>
					<ul>
						<?php foreach ($thong_tin_giang_vien['tab_content_2'] as $item): ?>
							<li><?= wpautop($item['noi_dung']) ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="tab-pane fade" id="giang-vien-3" role="tabpanel" aria-labelledby="giang-vien-tab-3">
				<?php if ($thong_tin_giang_vien['tab_content_3']): ?>
					<ul>
						<?php foreach ($thong_tin_giang_vien['tab_content_3'] as $item): ?>
							<li><?= wpautop($item['noi_dung']) ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="tab-pane fade" id="giang-vien-4" role="tabpanel" aria-labelledby="giang-vien-tab-4">
				<?php if ($thong_tin_giang_vien['tab_content_4']): ?>
					<ul>
						<?php foreach ($thong_tin_giang_vien['tab_content_4'] as $item): ?>
							<li><?= wpautop($item['noi_dung']) ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
