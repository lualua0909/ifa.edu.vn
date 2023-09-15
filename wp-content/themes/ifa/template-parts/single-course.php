<?php

$course_details       = get_field('_course_details', get_the_ID());
$register_course_page = get_field('_register_course_page', 'option');
$desc_1               = $course_details['_desc_1'];
$desc                 = $course_details['_desc'];
$opening_day          = $course_details['_opening_day'];
$location             = $course_details['_location'];
$price                = $course_details['_price'];
$sale_price           = $course_details['_sale_price'];
$timetable            = $course_details['_timetable'];
$time                 = $course_details['_time'];
$brochure             = $course_details['_brochure'];

?>

<section class="single-course-wrapper">
	<div class="container">
		<div class="course-desc reset-container">
			<?= wpautop($desc_1) ?>
		</div>

		<div class="course-detail">
			<?php if ($opening_day != ''): ?>
				<div class="course-detail-item-wrapper opening-day">
					<div class="course-detail-item">
						<i class="fa-solid fa-book"></i>
						<div class="course-detail-content">
							<h3 class="course-detail-label">Khai giảng</h3>
							<p class="course-detail-value"><?= $opening_day ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($location != ''): ?>
				<div class="course-detail-item-wrapper location">
					<div class="course-detail-item">
						<i class="fa-solid fa-location-dot"></i>
						<div class="course-detail-content">
							<h3 class="course-detail-label">Địa điểm</h3>
							<p class="course-detail-value"><?= $location ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($price != ''): ?>
				<div class="course-detail-item-wrapper price">
					<div class="course-detail-item">
						<i class="fa-solid fa-money-check-dollar"></i>
						<div class="course-detail-content">
							<h3 class="course-detail-label">Phí tham dự</h3>
							<p class="course-detail-value"><?= $price ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($sale_price != ''): ?>
				<div class="course-detail-item-wrapper sale-price">
					<div class="course-detail-item">
						<i class="fa-solid fa-tags"></i>
						<div class="course-detail-content">
							<h3 class="course-detail-label">Phí ưu đãi</h3>
							<p class="course-detail-value"><?= $sale_price ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($timetable != ''): ?>
				<div class="course-detail-item-wrapper timetable">
					<div class="course-detail-item">
						<i class="fa-solid fa-calendar-days"></i>
						<div class="course-detail-content">
							<h3 class="course-detail-label">Lịch học</h3>
							<p class="course-detail-value"><?= $timetable ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($time != ''): ?>
				<div class="course-detail-item-wrapper time">
					<div class="course-detail-item">
						<i class="fa-solid fa-clock"></i>
						<div class="course-detail-content">
							<h3 class="course-detail-label">Giờ học</h3>
							<p class="course-detail-value"><?= $time ?></p>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<div class="button-wrapper">
			<a href="<?= $brochure ?>">Tải brochure</a>
			<a href="<?= get_permalink($register_course_page['_register_course_page']) . '?course_id=' . get_the_ID() ?>">Đăng ký tham dự</a>
		</div>

		<div class="course-desc reset-container">
			<?= wpautop($desc) ?>
		</div>

		<div class="entry-content reset-container">
			<?php the_content() ?>
		</div>

		<div class="button-wrapper button-wrapper-2">
			<a href="<?= $brochure ?>">Tải brochure</a>
			<a href="<?= get_permalink($register_course_page['_register_course_page']) . '?course_id=' . get_the_ID() ?>">Đăng ký tham dự</a>
		</div>

		<?php if ($register_course_page['_banner']['_img']): ?>
			<div class="banner-wrapper">
				<div class="banner">
					<a href="<?= $register_course_page['_banner']['_url'] ?>">
						<?= wp_get_attachment_image($register_course_page['_banner']['_img'], 'full') ?>
					</a>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
