<?php

/**
 * The header for our theme
 */
add_action('ifa_header', function (){
	get_template_part('template-parts/header');
});

/**
 * The home page for our theme
 */
add_action('ifa_home', function (){
	get_template_part('template-parts/hero');
	get_template_part('template-parts/education-program');
	get_template_part('template-parts/opening-schedule');
	get_template_part('template-parts/digitization-model-v2');
	get_template_part('template-parts/training');
	get_template_part('template-parts/activities');
	get_template_part('template-parts/partners');
	get_template_part('template-parts/subscribe');
});

/**
 * The template for displaying all pages
 */
add_action('ifa_page', function (){
	if (is_page_template('templates/on-demand-training.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/on-demand-training');
		get_template_part('template-parts/subscribe');
	elseif (is_page_template('templates/message.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/message');
		get_template_part('template-parts/subscribe');
	elseif (is_page_template('templates/team.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/team');
		get_template_part('template-parts/subscribe');
	elseif (is_page_template('templates/philosophy.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/philosophy');
	elseif (is_page_template('templates/about-us.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/about-us');
		get_template_part('template-parts/subscribe');
	elseif (is_page_template('templates/procedure.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/procedure');
		get_template_part('template-parts/subscribe');
	elseif (is_page_template('templates/cooperate.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/cooperate');
		get_template_part('template-parts/subscribe');
	elseif (is_page_template('templates/contact.php')):
		get_template_part('template-parts/page-templates/contact');
		get_template_part('template-parts/subscribe-2');
		get_template_part('template-parts/branch');
	elseif (is_page_template('templates/training.php')):
		get_template_part('template-parts/hero');
		get_template_part('template-parts/page-templates/training');
		get_template_part('template-parts/subscribe');
	elseif (is_page_template('templates/register-course.php')):
		get_template_part('template-parts/register-course');
	elseif (is_page_template('templates/form.php')):
		get_template_part('template-parts/form');
	else:
		get_template_part('template-parts/hero');
		get_template_part('template-parts/single');
	endif;
});

/**
 * The template for displaying all single posts
 */
add_action('ifa_single', function (){
	if (in_category('giang-vien')):
		get_template_part('template-parts/single-giang-vien');
	else:
		get_template_part('template-parts/hero');
		get_template_part('template-parts/single');
	endif;
});

/**
 * The template for displaying all single posts
 */
add_action('ifa_single_course', function (){
	get_template_part('template-parts/single-course');
	get_template_part('template-parts/training-2');
});

/**
 * The template for displaying archive pages
 */
add_action('ifa_archive', function (){
	get_template_part('template-parts/hero');
	if (is_category('thong-bao')):
		get_template_part('template-parts/archive-2');
		get_template_part('template-parts/certificate-lookup');
		get_template_part('template-parts/subscribe-3');
	elseif (is_category('tu-van-doanh-nghiep')):
		get_template_part('template-parts/archive-3');
		get_template_part('template-parts/subscribe-3');
	elseif (is_category('giang-vien')):
		get_template_part('template-parts/archive-giang-vien');
		get_template_part('template-parts/subscribe-3');
	elseif (is_category('hoc-vien')):
		get_template_part('template-parts/archive');
		get_template_part('template-parts/certificate-lookup');
		get_template_part('template-parts/subscribe');
	else:
		get_template_part('template-parts/archive');
		get_template_part('template-parts/subscribe');
	endif;
});

/**
 * The template for displaying search results pages
 */
add_action('ifa_search', function (){
	get_template_part('template-parts/hero');
	get_template_part('template-parts/archive-2');
});

/**
 * The footer for our theme
 */
add_action('ifa_footer', function (){
	get_template_part('template-parts/footer');
});

/**
 * The template for displaying 404 pages (not found)
 */
add_action('ifa_404', function (){

});
