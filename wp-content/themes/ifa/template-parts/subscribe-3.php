<?php
$contact_info = get_field('theme_general_contact_info_gr', 'option');
$social       = $contact_info['social'];
?>
<section id="subscribe-consultation" class="subscribe-wrapper-3">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-lg-2">
				<div class="contact-info-wrapper">
					<div class="content">
						<h2 class="entry-title"><?= $contact_info['title'] ?></h2>
						<div class="desc reset-container">
							<?= $contact_info['desc'] ?>
						</div>
						<?php if ($contact_info['contact_info']): ?>
							<div class="contact-info">
								<ul class="info-list">
									<?php foreach ($contact_info['contact_info'] as $item): ?>
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
									<img src="<?= get_theme_file_uri('assets/images/facebook-app-symbol.png') ?>" alt="Facebook">
								</span>
								</a>
							<?php endif; ?>
							<?php if ($social['zalo'] != ''): ?>
								<a href="<?= $social['zalo'] ?>" class="zalo" target="_blank">
								<span class="logo">
									<img src="<?= get_theme_file_uri('assets/images/zalo-icon.png') ?>" alt="Zalo">
								</span>
								</a>
							<?php endif; ?>
							<?php if ($social['youtube'] != ''): ?>
								<a href="<?= $social['youtube'] ?>" class="youtube" target="_blank">
								<span class="logo">
									<img src="<?= get_theme_file_uri('assets/images/youtube-icon.png') ?>" alt="Youtube">
								</span>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-10">
				<div class="subscribe-form-wrapper">
					<form id="contact-form" method="post" novalidate>
						<div class="form-desc">
							Mọi thông tin của bạn được bảo mật. Và chỉ phục vụ cho nhu cầu tư vấn tại IFA
						</div>
						<div class="form-gr">
							<div id="contact-error-msg"></div>
						</div>
						<div class="form-gr">
							<label for="company">Tên công ty</label>
							<input type="text" id="company" name="company" class="form-control" placeholder="Nhập tên công ty">
						</div>
						<div class="form-gr">
							<label for="name">Họ và tên</label>
							<input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ tên của bạn" required>
							<div class="invalid-feedback">
								Không được để trống
							</div>
						</div>
						<div class="form-gr">
							<label for="phone">Số điện thoại</label>
							<input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
							<div class="invalid-feedback">
								Không được để trống
							</div>
						</div>
						<div class="form-gr">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Nhập email của bạn" required>
							<div class="invalid-feedback">
								Không được để trống
							</div>
						</div>
						<div class="form-gr">
							<label for="message">Thông điệp</label>
							<textarea id="message" name="message" class="form-control" placeholder="Nhập nội dung cần tư vấn" rows="7"></textarea>
						</div>

						<div class="text-center">
							<button type="submit" class="btn btn-primary">Gửi đi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
