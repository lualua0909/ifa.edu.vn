<?php
/**
 * Functions and definitions
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ifa_theme_support(){

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support('automatic-feed-links');

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Custom logo
	 */
	add_theme_support('custom-logo');

	/**
	 * Nav menu
	 */
	add_theme_support('menus');

	/**
	 * Body open
	 */
	add_theme_support('body-open');

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		[
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		]
	);

	/**
	 * Register nav menu
	 */
	register_nav_menus([
		'primary-menu-left'  => 'Primary Menu (Left)',
		'primary-menu-right' => 'Primary Menu (Right)',
		'mobile-menu'        => 'Mobile menu',
		'footer-menu-1'      => 'Footer Menu 1',
		'footer-menu-2'      => 'Footer Menu 2',
	]);
}

add_action('after_setup_theme', 'ifa_theme_support');

/**
 * REQUIRED FILES
 * Include required files.
 */

/**
 * Framework
 */
require get_template_directory() . '/inc/framework.php';

/**
 * Layouts
 */
require get_template_directory() . '/inc/layouts.php';

/**
 * Register and Enqueue Styles.
 */
function ifa_register_styles(){

	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('bootstrap', get_theme_file_uri('assets/libs/bootstrap/css/bootstrap.min.css'), [], $theme_version, 'all');
	wp_enqueue_style('fancybox', get_theme_file_uri('assets/libs/fancybox/fancybox.css'), [], $theme_version, 'all');
	wp_enqueue_style('fontawesome', get_theme_file_uri('assets/libs/fontawesome/css/all.min.css'), [], $theme_version, 'all');
	wp_enqueue_style('mmenu', get_theme_file_uri('assets/libs/mmenu/mmenu.css'), [], $theme_version, 'all');
	wp_enqueue_style('slick', get_theme_file_uri('assets/libs/slick/slick.css'), [], $theme_version, 'all');
	wp_enqueue_style('wow', get_theme_file_uri('assets/libs/wow/css/animate.css'), [], $theme_version, 'all');
	wp_enqueue_style('ifa', get_theme_file_uri('assets/css/style.css'), [], $theme_version, 'all');

}

add_action('wp_enqueue_scripts', 'ifa_register_styles');

/**
 * Register and Enqueue Scripts.
 */
function ifa_register_scripts(){

	global $wp_query;
	$theme_version = wp_get_theme()->get('Version');

	// Include jquery
	wp_enqueue_script('jquery');

	if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('bootstrap', get_theme_file_uri('assets/libs/bootstrap/js/bootstrap.min.js'), ['jquery'], $theme_version, true);
	wp_enqueue_script('fancybox', get_theme_file_uri('assets/libs/fancybox/fancybox.umd.js'), ['jquery'], $theme_version, true);
	wp_enqueue_script('mmenu', get_theme_file_uri('assets/libs/mmenu/mmenu.js'), ['jquery'], $theme_version, true);
	wp_enqueue_script('slick', get_theme_file_uri('assets/libs/slick/slick.min.js'), ['jquery'], $theme_version, true);
	wp_enqueue_script('wow', get_theme_file_uri('assets/libs/wow/js/wow.min.js'), ['jquery'], $theme_version, true);
	wp_enqueue_script('ifa', get_theme_file_uri('assets/js/scripts.js'), ['jquery'], $theme_version, true);
	wp_localize_script('ifa', 'ifa', [
		'admin_ajax_url' => admin_url('admin-ajax.php'),
		'posts'          => json_encode($wp_query->query_vars),
		'current_page'   => get_query_var('paged') ? get_query_var('paged') : 1,
		'max_page'       => $wp_query->max_num_pages
	]);

}

add_action('wp_enqueue_scripts', 'ifa_register_scripts');

/**
 * Add ACF option page
 */
function acf_op_init(){
	if (function_exists('acf_add_options_page')){
		$option_page = acf_add_options_page([
			'page_title' => 'Theme General Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect'   => false
		]);

		acf_add_options_sub_page([
			'page_title'  => 'Home',
			'menu_title'  => 'Home',
			'menu_slug'   => 'theme-home-settings',
			'parent_slug' => 'theme-general-settings',
		]);

		acf_add_options_sub_page([
			'page_title'  => 'Footer',
			'menu_title'  => 'Footer',
			'menu_slug'   => 'theme-footer-settings',
			'parent_slug' => 'theme-general-settings',
		]);
	}
}

add_action('acf/init', 'acf_op_init');

/**
 * Display custom logo
 */
function ifa_logo(){
	if (has_custom_logo()):
		$custom_logo_id = get_theme_mod('custom_logo');
		$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
		$custom_logo_url = $logo[0];
		?>
		<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" rel="home">
			<img width="<?= $logo[1] ?>" height="<?= $logo[2] ?>" src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
		</a>
	<?php
	else:
		echo '<div class="site-name">' . get_bloginfo('name') . '</div>';
	endif;
}

/**
 * pagination
 */
function ifa_pagination($args = []){

	$defaults = [
		'items_wrap_class'  => '',
		'items_class'       => '',
		'item_active_class' => 'active',
		'links_class'       => '',
		'prev'              => 'Prev',
		'next'              => 'Next',
		'prev_label'        => 'Previous',
		'next_label'        => 'Next',
		'echo'              => true
	];

	$args        = wp_parse_args($args, $defaults);
	$args        = (object) $args;
	$query       = $GLOBALS['wp_query'];
	$paged       = max(1, absint($query->get('paged')));
	$total_pages = max(1, absint($query->max_num_pages));

	if (1 == $total_pages):
		return;
	endif;

	$pages_to_show         = absint(5);
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start       = floor($pages_to_show_minus_1 / 2);
	$half_page_end         = ceil($pages_to_show_minus_1 / 2);
	$start_page            = $paged - $half_page_start;
	$pagination            = '';

	if ($start_page <= 0):
		$start_page = 1;
	endif;

	$end_page = $paged + $half_page_end;

	if (($end_page - $start_page) != $pages_to_show_minus_1):
		$end_page = $start_page + $pages_to_show_minus_1;
	endif;

	if ($end_page > $total_pages):
		$start_page = $total_pages - $pages_to_show_minus_1;
		$end_page   = $total_pages;
	endif;

	if ($start_page < 1):
		$start_page = 1;
	endif;

	$pagination .= '<ul class="' . $args->items_wrap_class . '">';

	// First
	if ($start_page >= 2 && $pages_to_show < $total_pages){
		//$pagination .= get_pagenum_link( 1 );
	}

	// Previous
	if ($paged > 1){
		$pagination .= '<li class="' . $args->items_class . '"><a class="' . $args->links_class . '" href="' . get_pagenum_link($paged - 1) . '" aria-label="' . $args->prev_label . '">' . $args->prev . '</a></li>';
	}

	foreach (range($start_page, $end_page) as $i){
		if ($i == $paged):
			$pagination .= '<li class="' . $args->items_class . ' ' . $args->item_active_class . '"><a class="' . $args->links_class . '" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
		else:
			$pagination .= '<li class="' . $args->items_class . '"><a class="' . $args->links_class . '" href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
		endif;
	}

	// Next
	if ($paged < $total_pages){
		$pagination .= '<li class="' . $args->items_class . '"><a class="' . $args->links_class . '" href="' . get_pagenum_link($paged + 1) . '" aria-label="' . $args->next_label . '">' . $args->next . '</a></li>';
	}

	// Last
	if ($end_page < $total_pages){
		//$pagination .= get_pagenum_link( $total_pages );
	}

	$pagination .= '</ul>';

	if ($args->echo){
		echo $pagination;

		return;
	}

	return $pagination;
}

/**
 * Replace archive title
 */

add_filter('get_the_archive_title', 'replace_archive_title', 11);

function replace_archive_title($title){

	if (is_category()){
		$title = single_cat_title('', false);
	}elseif (is_tag()){
		$title = single_tag_title('', false);
	}elseif (is_author()){
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	}elseif (is_post_type_archive()){
		$title = post_type_archive_title('', false);
	}elseif (is_tax()){
		$title = single_term_title('', false);
	}

	return $title;
}

/**
 * Subscribe form
 */
add_action('wp_ajax_subscribe_form', 'subscribe_form');
add_action('wp_ajax_nopriv_subscribe_form', 'subscribe_form');
function subscribe_form(){
	$email   = isset($_POST['email']) ? esc_attr($_POST['email']) : '';
	$content = 'Có một email mới vừa được đăng ký trên trang web của bạn. Email:' . $email;
	$to      = get_field('theme_general_smtp_mail_to', 'option');

	if (empty($email)):
		wp_send_json_error([
			'code'    => 'empty_email',
			'message' => 'Email không được bỏ trống',
			'status'  => 403,
		]);
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)):
		wp_send_json_error([
			'code'    => 'invalid_email_format',
			'message' => 'Email không hợp lệ',
			'status'  => 403,
		]);
	endif;

	$send = wp_mail($to, 'Đăng ký nhận thông tin', $content, ['content-type' => 'text/html']);

	if ($send){
		wp_send_json_success([
			'code'    => 'sendmail_success',
			'message' => 'Gửi thành công. Cảm ơn bạn đã đăng ký!',
			'status'  => 200,
		]);
	}else{
		wp_send_json_error([
			'code'    => 'sendmail_failed',
			'message' => 'Gửi thất bại. Đã có lỗi xảy ra!',
			'status'  => 403,
		]);
	}
	die();
}

/**
 * Contact form
 */
add_action('wp_ajax_contact_form', 'contact_form');
add_action('wp_ajax_nopriv_contact_form', 'contact_form');
function contact_form(){
	$company = isset($_POST['company']) ? esc_attr($_POST['company']) : '';
	$name    = isset($_POST['name']) ? esc_attr($_POST['name']) : '';
	$phone   = isset($_POST['phone']) ? esc_attr($_POST['phone']) : '';
	$email   = isset($_POST['email']) ? esc_attr($_POST['email']) : '';
	$message = isset($_POST['message']) ? esc_attr($_POST['message']) : '';

	$content = 'Email: ' . $email . 'Công ty: ' . $company . ' Tên: ' . $name . ' Số điện thoại: ' . $phone . ' Thông điệp: ' . $message;
	$to      = get_field('theme_general_smtp_mail_to', 'option');

	if (empty($name)):
		wp_send_json_error([
			'code'    => 'empty_name',
			'message' => 'Họ và tên không được bỏ trống',
			'status'  => 403,
		]);
	endif;

	if (empty($phone)):
		wp_send_json_error([
			'code'    => 'empty_name',
			'message' => 'Họ và tên không được bỏ trống',
			'status'  => 403,
		]);
	endif;

	if (empty($email)):
		wp_send_json_error([
			'code'    => 'empty_email',
			'message' => 'Email không được bỏ trống',
			'status'  => 403,
		]);
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)):
		wp_send_json_error([
			'code'    => 'invalid_email_format',
			'message' => 'Email không hợp lệ',
			'status'  => 403,
		]);
	endif;

	$send = wp_mail($to, 'Đăng ký nhận thông tin', $content, ['content-type' => 'text/html']);

	if ($send){
		wp_send_json_success([
			'code'    => 'sendmail_success',
			'message' => 'Gửi thành công. Cảm ơn bạn đã đăng ký!',
			'status'  => 200,
		]);
	}else{
		wp_send_json_error([
			'code'    => 'sendmail_failed',
			'message' => 'Gửi thất bại. Đã có lỗi xảy ra!',
			'status'  => 403,
		]);
	}
	die();
}

/**
 * SMTP config
 */
add_action('phpmailer_init', 'phpmailer_init', 999);

function phpmailer_init($phpmailer){

	$theme_general_smtp = get_field('theme_general_smtp', 'option');

	//check smtp enable
	if (intval($theme_general_smtp['smtp_enable']) == false):
		return;
	endif;

	$phpmailer->isSMTP();
	$phpmailer->Host       = $theme_general_smtp['smtp_host'];
	$phpmailer->Port       = $theme_general_smtp['smtp_port'];
	$phpmailer->SMTPSecure = $theme_general_smtp['smtp_secure'];
	$phpmailer->SMTPAuth   = intval($theme_general_smtp['smtp_auth']);
	$phpmailer->Username   = $theme_general_smtp['smtp_username'];
	$phpmailer->Password   = $theme_general_smtp['smtp_password'];
	$phpmailer->From       = $theme_general_smtp['smtp_from'];
	$phpmailer->FromName   = $theme_general_smtp['smtp_from_name'];
	$phpmailer->SetFrom($phpmailer->From, $phpmailer->FromName);
	$phpmailer->addReplyTo($theme_general_smtp['smtp_reply'],
		$theme_general_smtp['smtp_reply_name']);
	$phpmailer->Timeout = 10;
}

/**
 * Display Floating Action Buttons
 */
add_action('ifa_footer', 'fabs');

function fabs(){
	$floating_action_button = get_field('floating_action_button', 'option');
	$phone                  = $floating_action_button['phone'];
	$email                  = $floating_action_button['email'];
	$zalo                   = $floating_action_button['zalo'];
	$messenger              = $floating_action_button['messenger'];
	?>
	<div class="fabs">

		<?php if ($phone != ''): ?>
			<a href="tel:<?= $phone ?>" target="_blank" class="fab-btn">
				<img src="<?= get_theme_file_uri('assets/images/fab-telephone.png') ?>" alt="Phone">
			</a>
		<?php endif; ?>

		<?php if ($email != ''): ?>
			<a href="mailto:<?= $email ?>" target="_blank" class="fab-btn">
				<img src="<?= get_theme_file_uri('assets/images/fab-email.png') ?>" alt="Email">
			</a>
		<?php endif; ?>

		<?php if ($zalo != ''): ?>
			<a href="https://zalo.me/<?= $zalo ?>" target="_blank" class="fab-btn">
				<img src="<?= get_theme_file_uri('assets/images/fab-zalo.png') ?>" alt="Zalo">
			</a>
		<?php endif; ?>

		<?php if ($messenger != ''): ?>
			<a href="<?= $messenger ?>" target="_blank" class="fab-btn">
				<img src="<?= get_theme_file_uri('assets/images/fab-messenger.png') ?>" alt="Messenger">
			</a>
		<?php endif; ?>

		<a id="prime" class="fab-prime"><i class="fa-solid fa-plus"></i></a>
	</div>

	<a id="back-to-top" class="fab-btn">
		<img src="<?= get_theme_file_uri('assets/images/fab-up-arrow.png') ?>" alt="Back to top">
	</a>
<?php }

function loadmore_ajax_handler(){
	$args                = json_decode(stripslashes($_POST['query']), true);
	$args['paged']       = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';

	query_posts($args);

	if (have_posts()) :
		while (have_posts()): the_post();
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
		<?php endwhile;
	endif;
	die;
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler');

function modify_category_posts_per_page($query){
	if (!is_admin() && $query->is_main_query()):
		if ($query->is_category('giang-vien')):
			$query->set('posts_per_page', 12);
		endif;
	endif;
}

add_action('pre_get_posts', 'modify_category_posts_per_page');

/**
 * Contact form
 */
add_action('wp_ajax_register_course_form', 'register_course_form');
add_action('wp_ajax_nopriv_register_course_form', 'register_course_form');
function register_course_form(){
	$name    = isset($_POST['company']) ? esc_attr($_POST['name']) : '';
	$sex     = isset($_POST['name']) ? esc_attr($_POST['sex']) : '';
	$phone   = isset($_POST['phone']) ? esc_attr($_POST['phone']) : '';
	$email   = isset($_POST['email']) ? esc_attr($_POST['email']) : '';
	$company = isset($_POST['company']) ? esc_attr($_POST['company']) : '';
	$title   = isset($_POST['title']) ? esc_attr($_POST['title']) : '';
	$website = isset($_POST['website']) ? esc_attr($_POST['website']) : '';
	$course  = isset($_POST['course']) ? esc_attr($_POST['course']) : '';

	$content = '';

	if ($sex != ''):
		$content .= $sex . ': ';
	endif;

	$content .= $name . "\n";

	$content .= 'Số điện thoại: ' . $phone . "\n";
	$content .= 'Email: ' . $email . "\n";
	$content .= 'Công ty: ' . $company . "\n";
	$content .= 'Chức danh: ' . $title . "\n";

	if ($website != ''):
		$content .= 'Website: ' . $website . "\n";
	endif;

	$content              .= 'Khoá học: ' . $course . "\n";
	$register_course_page = get_field('_register_course_page', 'option');
	$to                   = $register_course_page['_email'];

	if (empty($name)):
		wp_send_json_error([
			'code'    => 'empty_name',
			'message' => 'Họ và tên không được bỏ trống',
			'status'  => 403,
		]);
	endif;

	if (empty($phone)):
		wp_send_json_error([
			'code'    => 'empty_phone',
			'message' => 'Số điện thoại không được bỏ trống',
			'status'  => 403,
		]);
	endif;

	if (empty($company)):
		wp_send_json_error([
			'code'    => 'empty_company',
			'message' => 'Thương hiệu công ty không được bỏ trống',
			'status'  => 403,
		]);
	endif;

	if (empty($title)):
		wp_send_json_error([
			'code'    => 'empty_title',
			'message' => 'Chức dang không được bỏ trống',
			'status'  => 403,
		]);
	endif;

	if (empty($email)):
		wp_send_json_error([
			'code'    => 'empty_email',
			'message' => 'Email không được bỏ trống',
			'status'  => 403,
		]);
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)):
		wp_send_json_error([
			'code'    => 'invalid_email_format',
			'message' => 'Email không hợp lệ',
			'status'  => 403,
		]);
	endif;

	$send = wp_mail($to, 'Đăng ký khoá học', $content, ['content-type' => 'text/html']);

	if ($send){
		wp_send_json_success([
			'code'    => 'sendmail_success',
			'message' => 'Gửi thành công. Cảm ơn bạn đã đăng ký!',
			'status'  => 200,
		]);
	}else{
		wp_send_json_error([
			'code'    => 'sendmail_failed',
			'message' => 'Gửi thất bại. Đã có lỗi xảy ra!',
			'status'  => 403,
		]);
	}
	die();
}

// Register Custom Post Type
function create_course_post_type(){

	$labels = [
		'name'                  => _x('Khoá học', 'Post Type General Name', 'ifa'),
		'singular_name'         => _x('Khoá học', 'Post Type Singular Name', 'ifa'),
		'menu_name'             => __('Khoá học', 'ifa'),
		'name_admin_bar'        => __('Khoá học', 'ifa'),
		'archives'              => __('Item Archives', 'ifa'),
		'attributes'            => __('Item Attributes', 'ifa'),
		'parent_item_colon'     => __('Parent Item:', 'ifa'),
		'all_items'             => __('Tất cả khoá học', 'ifa'),
		'add_new_item'          => __('Thêm khoá học mới', 'ifa'),
		'add_new'               => __('Thêm khoá học', 'ifa'),
		'new_item'              => __('New Item', 'ifa'),
		'edit_item'             => __('Edit Item', 'ifa'),
		'update_item'           => __('Update Item', 'ifa'),
		'view_item'             => __('View Item', 'ifa'),
		'view_items'            => __('View Items', 'ifa'),
		'search_items'          => __('Search Item', 'ifa'),
		'not_found'             => __('Not Found', 'ifa'),
		'not_found_in_trash'    => __('Not Found in Trash', 'ifa'),
		'featured_image'        => __('Featured Image', 'ifa'),
		'set_featured_image'    => __('Set featured image', 'ifa'),
		'remove_featured_image' => __('Remove featured image', 'ifa'),
		'use_featured_image'    => __('Use as featured image', 'ifa'),
		'insert_into_item'      => __('Insert into item', 'ifa'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'ifa'),
		'items_list'            => __('Items list', 'ifa'),
		'items_list_navigation' => __('Items list navigation', 'ifa'),
		'filter_items_list'     => __('Filter items list', 'ifa'),
	];

	$rewrite = [
		'slug'       => 'khoa-hoc',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => false,
	];

	$args = [
		'label'               => __('Khoá học', 'ifa'),
		'labels'              => $labels,
		'supports'            => ['title', 'editor'],
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'khoa-hoc',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	];
	register_post_type('course', $args);
}

add_action('init', 'create_course_post_type', 0);
