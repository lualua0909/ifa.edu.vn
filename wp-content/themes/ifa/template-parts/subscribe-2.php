<section class="subscribe-wrapper-2">
	<div class="container">
		<div class="subscribe-form-wrapper">
			<form id="contact-form" method="post" novalidate>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-desc">
							Mọi thông tin của bạn được bảo mật. Và chỉ phục vụ cho nhu cầu tư vấn tại IFA
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div id="contact-error-msg"></div>
					</div>
					<div class="col-lg-6">
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
					</div>
					<div class="col-lg-6">
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
					</div>
					<div class="col-lg-12 text-end">
						<button type="submit" class="btn btn-primary">Gửi đi</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
