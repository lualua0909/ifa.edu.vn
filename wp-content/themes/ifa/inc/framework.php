<?php

/**
 * The file that defines the theme framework
 */

/**
 * The main template file
 */
function ifa_home(){
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php do_action('ifa_home'); ?>
		</main>
	</div>
	<?php get_footer();
}

/**
 * The template for displaying archive pages
 */
function ifa_archive(){
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php do_action('ifa_archive'); ?>
		</main>
	</div>
	<?php get_footer();
}

/**
 * The template for displaying search results pages
 */
function ifa_search(){
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php do_action('ifa_search'); ?>
		</main>
	</div>
	<?php get_footer();
}

/**
 * The template for displaying all pages
 */
function ifa_page(){
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php do_action('ifa_page'); ?>
		</main>
	</div>
	<?php get_footer();
}

/**
 * The template for displaying all single posts
 */
function ifa_single(){
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php do_action('ifa_single'); ?>
		</main>
	</div>
	<?php get_footer();
}

/**
 * The template for displaying all single posts
 */
function ifa_single_course(){
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php do_action('ifa_single_course'); ?>
		</main>
	</div>
	<?php get_footer();
}

/**
 * The template for displaying 404 pages (not found)
 */
function ifa_404(){
	get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php do_action('ifa_404'); ?>
		</main>
	</div>
	<?php get_footer();
}
