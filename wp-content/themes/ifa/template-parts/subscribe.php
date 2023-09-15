<?php

$subscribe = get_field('_theme_general_subscribe', 'option');

?>

<section class="subscribe-wrapper">
	<div class="container">
		<div class="subscribe-container" style="background-image: url('<?= get_theme_file_uri('assets/images/subscribe-bg.jpg') ?>')">
			<h4 class="subscribe-title"><?= $subscribe['_title'] ?></h4>
			<div class="subscribe-desc reset-container">
				<?= wpautop($subscribe['_content']) ?>
			</div>
			<div class="subscribe-form-wrapper">
				<form id="subscribe-form" method="post" novalidate>
					<div class="row">
						<div class="col-12">
							<div id="error-msg"></div>
						</div>
						<div class="col-md-8">
							<input type="email" name="email" class="form-control" placeholder="Địa chỉ email của bạn" aria-label="Địa chỉ email của bạn" required>
							<div class="invalid-feedback">
								Vui lòng nhập email
							</div>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-primary">Đăng ký ngay</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
