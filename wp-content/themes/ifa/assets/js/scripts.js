jQuery(function ($) {

	if ($(window).width() < 992) {
		new Mmenu("#primary-mobile-menu", {
			"extensions": [
				"position-right"
			]
		}, {});
	}

	// window.onscroll = function () {
	// 	is_sticky();
	// };

	let header_wrapper = $('.header-wrapper');
	let sticky = header_wrapper.offset().top;

	// function is_sticky() {
	// 	if (window.pageYOffset > (sticky + 350)) {
	// 		header_wrapper.addClass("animated-header fadeInDown nav-fixed");
	// 	}
	// 	else {
	// 		header_wrapper.removeClass("animated-header fadeInDown nav-fixed");
	// 	}
	// }

	$('.load-more-button').on('click', function (e) {
		e.preventDefault();

		let button = $(this);
		let data = {
			'action': 'loadmore',
			'query': ifa.posts,
			'page': ifa.current_page
		};

		$.ajax({ // you can also use $.post here
			url: ifa.admin_ajax_url, // AJAX handler
			data: data,
			type: 'POST',
			beforeSend: function (xhr) {
				button.text('Đang tải...');
			},
			success: function (data) {
				if (data) {
					button.text('Hiển thị thêm');
					$('.archive-giang-vien-wrapper .row').append(data);
					ifa.current_page++;
					if (ifa.current_page === ifa.max_page) {
						button.remove(); // if last page, remove the button
					}
				} else {
					button.remove();
				}
			}
		});
	});

	$('#back-to-top').on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, '300');
	});

	$('#prime').on('click', function (e) {
		e.preventDefault();
		$(this).toggleClass('active');
		$('.fab-btn').toggleClass('active');
	});

	$('.partners-slick-slider').slick({
		dots: true,
		arrows: true,
		infinite: false,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			{
				breakpoint: 1199,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 485,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			}
		]
	});

	$('button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
		e.target
		e.relatedTarget
		$('.digitization-model-slick-slider').slick('setPosition');
	});

	$('.digitization-model-slick-slider').slick({
		dots: true,
		arrows: true,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			{
				breakpoint: 1199,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 485,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	$('.hero-slick-slider').slick({
		dots: true,
		arrows: false,
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
	});

	$('.search-button a').on('click', function (e) {
		e.preventDefault();
		let myModal = new bootstrap.Modal($('#searchModal'));
		myModal.show()
	});

	$('.procedure-img-carousel').slick({
		dots: false,
		arrows: true,
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		centerMode: true,
		autoplay: true,
		autoplaySpeed: 5000,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 1,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			}
		]
	});

	function fadeIn() {
		let fade = $('#error-msg');
		let opacity = 0;
		let intervalID = setInterval(function () {
			if (opacity < 1) {
				opacity = opacity + 0.5
				fade.css('opacity', opacity);
			} else {
				clearInterval(intervalID);
			}
		}, 200);
	}

	function fadeIn_2() {
		let fade = $('#contact-error-msg');
		let opacity = 0;
		let intervalID = setInterval(function () {
			if (opacity < 1) {
				opacity = opacity + 0.5
				fade.css('opacity', opacity);
			} else {
				clearInterval(intervalID);
			}
		}, 200);
	}

	function fadeIn_3() {
		let fade = $('#register-course-error-msg');
		let opacity = 0;
		let intervalID = setInterval(function () {
			if (opacity < 1) {
				opacity = opacity + 0.5
				fade.css('opacity', opacity);
			} else {
				clearInterval(intervalID);
			}
		}, 200);
	}

	$("#subscribe-form").submit(function (e) {
		e.preventDefault();
		let form = $(this)[0];
		let email = $('#subscribe-form input[name=email]');
		let error_msg = $('#error-msg');
		let button = $('#subscribe-form button[type=submit]');

		error_msg.css('opacity', 0);
		error_msg.html('');

		if (!form.checkValidity()) {
			e.stopPropagation()
		} else {
			$.ajax({
				type: "post",
				dataType: "json",
				url: ifa.admin_ajax_url,
				data: {
					action: "subscribe_form",
					email: email.val(),
				},
				beforeSend: function () {
					button.attr('disabled', 'disabled');
					button.html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
				},
				success: function (response) {
					button.removeAttr('disabled');
					button.html('Đăng ký');
					if (response.success) {
						email.val('');
						error_msg.html("<div class='alert alert-success'>Viện Quản trị và Tài chính (IFA) trân trọng cảm ơn Quý Anh/Chị đã đăng ký. Chúng tôi sẽ phản hồi thông tin sớm nhất đến Quý Anh/Chị</div>");
						fadeIn();
					} else {
						error_msg.html("<div class='alert alert-danger'>" + response.data.message + "</div>");
						fadeIn();
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					button.removeAttr('disabled', 'disabled');
					button.html('Đăng ký');
					console.log('The following error occured: ' + textStatus, errorThrown);
				}
			});
		}
		form.classList.add('was-validated');
		return false;
	});

	$("#contact-form").submit(function (e) {
		e.preventDefault();
		let form = $(this)[0];
		let error_msg = $('#contact-error-msg');
		let company = $('#contact-form input[name=company]');
		let name = $('#contact-form input[name=name]');
		let phone = $('#contact-form input[name=phone]');
		let email = $('#contact-form input[name=email]');
		let message = $('#contact-form textarea[name=message]');
		let button = $('#contact-form button[type=submit]');

		error_msg.css('opacity', 0);
		error_msg.html('');

		if (!form.checkValidity()) {
			e.stopPropagation()
		} else {
			$.ajax({
				type: "post",
				dataType: "json",
				url: ifa.admin_ajax_url,
				data: {
					action: "contact_form",
					company: company.val(),
					name: name.val(),
					phone: phone.val(),
					email: email.val(),
					message: message.val(),
				},
				beforeSend: function () {
					button.attr('disabled', 'disabled');
					button.html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
				},
				success: function (response) {
					console.log(response);
					button.removeAttr('disabled');
					button.html('Gửi đi');
					if (response.success) {
						error_msg.html("<div class='alert alert-success'>Viện Quản trị và Tài chính (IFA) trân trọng cảm ơn Quý Anh/Chị đã đăng ký. Chúng tôi sẽ phản hồi thông tin sớm nhất đến Quý Anh/Chị</div>");
						fadeIn_2();
					} else {
						error_msg.html("<div class='alert alert-danger'>" + response.data.message + "</div>");
						fadeIn_2();
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					button.removeAttr('disabled', 'disabled');
					button.html('Đăng ký');
					console.log('The following error occured: ' + textStatus, errorThrown);
				}
			});
		}
		form.classList.add('was-validated');
		return false;
	});

	$('.digitization-model-first-slick-slider').slick({
		arrows: false,
		dots: true
	});

	$('.our-team-slick-slider').slick({
		arrows: true,
		dots: true,
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	$("#register-course-form").submit(function (e) {
		e.preventDefault();
		let form = $(this)[0];
		let error_msg = $('#register-course-form #register-course-error-msg');
		let name = $('#register-course-form input[name=name]');
		let sex = $('#register-course-form input[name=sex]:checked').val();
		let phone = $('#register-course-form input[name=phone]');
		let email = $('#register-course-form input[name=email]');
		let company = $('#register-course-form input[name=company]');
		let title = $('#register-course-form input[name=title]');
		let website = $('#register-course-form input[name=website]');
		let course = $('#register-course-form select[name=course]');
		let button = $('#register-course-form button[type=submit]');

		error_msg.css('opacity', 0);
		error_msg.html('');

		if (!form.checkValidity()) {
			e.stopPropagation()
		} else {
			$.ajax({
				type: "post",
				dataType: "json",
				url: ifa.admin_ajax_url,
				data: {
					action: "register_course_form",
					name: name.val(),
					sex: sex,
					phone: phone.val(),
					email: email.val(),
					company: company.val(),
					title: title.val(),
					website: website.val(),
					course: course.val(),
				},
				beforeSend: function () {
					button.attr('disabled', 'disabled');
					button.html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
				},
				success: function (response) {
					button.removeAttr('disabled');
					button.html('Gửi thông tin');
					if (response.success) {
						error_msg.html("<div class='alert alert-success'>Viện Quản trị và Tài chính (IFA) trân trọng cảm ơn Quý Anh/Chị đã đăng ký. Chúng tôi sẽ phản hồi thông tin sớm nhất đến Quý Anh/Chị</div>");
						fadeIn_3();

						var myModal = new bootstrap.Modal(document.getElementById('successModal'))
						myModal.show();

						setTimeout(
							function () {
								document.location.href = "/";
							}, 3000);
					} else {
						error_msg.html("<div class='alert alert-danger'>" + response.data.message + "</div>");
						fadeIn_3();
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					button.removeAttr('disabled', 'disabled');
					button.html('Gửi thông tin');
					console.log('The following error occured: ' + textStatus, errorThrown);
				}
			});
		}
		form.classList.add('was-validated');
		return false;
	});
});

new WOW().init();
