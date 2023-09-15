<?php

$home_settings        = get_field('theme_home_settings', 'option');
$register_course_page = get_field('_register_course_page', 'option');
$opening_schedule     = $home_settings['_opening_schedule'];
$table_heading        = $opening_schedule['_table_heading'];

$posts_per_page = - 1;

if ($opening_schedule['_posts_per_page'] != ''):
	$posts_per_page = $opening_schedule['_posts_per_page'];
endif;

$current_date = date('Ymd');

$args = [
	'post_type'      => 'course',
	'posts_per_page' => $posts_per_page,
	'meta_query'     => [
		'relation' => 'AND',
		[
			'key'     => '_course_details__opening_day',
			'value'   => $current_date,
			'compare' => '>',
			'type'    => 'DATE'
		],
		[
			'key'     => '_course_details__show',
			'value'   => true,
			'compare' => '=',
			'type'    => 'BOOLEAN'
		]
	]
];

$loop = new WP_Query($args);

if ($loop->have_posts()): ?>

	<section class="opening-schedule-wrapper" id="opening-schedule">
		<div class="container">
			<h2 class="partner-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms"><?= $opening_schedule['_title'] ?></h2>
			<table class="opening-schedule-table">
				<thead>
				<tr>
					<th class="name"><?= $table_heading[0]['_title'] ?></th>
					<th class="date"><?= $table_heading[1]['_title'] ?></th>
					<th class="timetable"><?= $table_heading[2]['_title'] ?></th>
					<th class="session"><?= $table_heading[3]['_title'] ?></th>
					<th class="fee"><?= $table_heading[4]['_title'] ?></th>
					<th class="location"><?= $table_heading[5]['_title'] ?></th>
					<th class="buttons"><?= $table_heading[6]['_title'] ?></th>
				</tr>
				</thead>
				<tbody class="opening-schedule-table-tbody">
				<?php while ($loop->have_posts()) : $loop->the_post();
					$course_details = get_field('_course_details', get_the_ID());
					$subtitle       = $course_details['_subtitle'];
					$desc           = $course_details['_desc'];
					$opening_day    = $course_details['_opening_day'];
					$location       = $course_details['_location'];
					$price          = $course_details['_price'];
					$sale_price     = $course_details['_sale_price'];
					$timetable      = $course_details['_timetable'];
					$time           = $course_details['_time'];
					$sessions       = $course_details['_sessions'];
					$brochure       = $course_details['_brochure']; ?>
					<tr>
						<td data-label="<?= $table_heading[0]['_title'] ?>" class="name">
							<a href="<?php the_permalink(); ?>">
								<?php the_title();
								if ($subtitle != ''):
									echo '<br> <span>' . $subtitle . '</span>';
								endif; ?>
							</a>
						</td>
						<td data-label="<?= $table_heading[1]['_title'] ?>" class="date"><?= $opening_day ?></td>
						<td data-label="<?= $table_heading[2]['_title'] ?>" class="timetable"><?= $timetable ?></td>
						<td data-label="<?= $table_heading[3]['_title'] ?>" class="session"><?= $sessions ?></td>
						<td data-label="<?= $table_heading[4]['_title'] ?>" class="fee"><?= $price ?></td>
						<td data-label="<?= $table_heading[5]['_title'] ?>" class="location"><?= $location ?></td>
						<td class="buttons">
							<a href="<?= get_permalink($register_course_page['_register_course_page']) . '?course_id=' . get_the_ID() ?>">Đăng ký</a>
							<a href="<?= $brochure ?>">Download</a>
						</td>
					</tr>
				<?php endwhile;
				wp_reset_postdata(); ?>
				</tbody>
			</table>
		</div>
	</section>

<?php endif;
