<?php

$home_settings        = get_field('theme_home_settings', 'option');
$opening_schedule     = $home_settings['_opening_schedule'];
$register_course_page = get_field('_register_course_page', 'option');
$success_modal        = $register_course_page['_success_modal'];
$course               = '';

if (isset($_GET['course_id'])):
	$course = $_GET['course_id'];
endif;

$current_date = date('Ymd');

$args = [
	'post_type'      => 'course',
	'posts_per_page' => - 1,
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

?>

<section class="register-course-wrapper">
	<div class="container">

		<?php if (!$loop->have_posts()): ?>
			<div class="alert alert-danger" role="alert">
				Không có khoá học nào!
			</div>
			<?php return;
		endif; ?>

		<h1 class="partner-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms"><?php the_title() ?></h1>

		<div class="register-course-form-wrapper">
			<form id="register-course-form" method="post" novalidate>
				<div class="form-gr msg">
					<div id="register-course-error-msg"></div>
				</div>
				<div class="form-gr name">
					<label for="name">Họ và tên <span>*</span></label>
					<input type="text" id="name" name="name" class="form-control" required>
					<div class="invalid-feedback">
						Không được để trống
					</div>
				</div>
				<div class="form-gr sex">
					<label for="sex">Danh xưng</label>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="sex" id="male" value="Anh">
						<label class="form-check-label" for="male">Anh</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="sex" id="female" value="Chị">
						<label class="form-check-label" for="female">Chị</label>
					</div>
					<div class="invalid-feedback">
						Không được để trống
					</div>
				</div>
				<div class="form-gr phone">
					<label for="phone">Số điện thoại <span>*</span></label>
					<input type="text" id="phone" name="phone" class="form-control" required>
					<div class="invalid-feedback">
						Không được để trống
					</div>
				</div>
				<div class="form-gr email">
					<label for="email">Email đăng ký <span>*</span></label>
					<input type="email" id="email" name="email" class="form-control" required>
					<div class="invalid-feedback">
						Không được để trống
					</div>
				</div>
				<div class="form-gr company">
					<label for="company">Thương hiệu công ty <span>*</span></label>
					<input type="text" id="company" name="company" class="form-control" required>
					<div class="invalid-feedback">
						Không được để trống
					</div>
				</div>
				<div class="form-gr title">
					<label for="title">Chức danh <span>*</span></label>
					<input type="text" id="title" name="title" class="form-control" required>
					<div class="invalid-feedback">
						Không được để trống
					</div>
				</div>
				<div class="form-gr website">
					<label for="website">Website của công ty</label>
					<input type="text" id="website" name="website" class="form-control">
				</div>
				<div class="form-gr course">
					<label for="course">Khoá học đăng ký</label>
					<select id="course" name="course">
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
							<option value="<?php the_title() ?>" <?= get_the_ID() == $course ? 'selected' : '' ?>><?php the_title() ?></option>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</select>
				</div>
				<div class="form-gr submit">
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Gửi thông tin</button>
					</div>
				</div>
			</form>
		</div>

		<div class="entry-content reset-container">
			<?php the_content() ?>
		</div>
	</div>

	<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="page-body">
					<div class="head">
						<h3><?= $success_modal['_title'] ?></h3>
						<p><?= $success_modal['_desc'] ?></p>
					</div>
					<div style="text-align:center;">
						<div class="checkmark-circle">
							<div class="background"></div>
							<div class="checkmark draw"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
