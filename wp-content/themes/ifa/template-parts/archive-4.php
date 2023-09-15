<?php
$theme_general_category_activities = get_field('theme_general_category_activities', 'option');
$category_sidebar                  = $theme_general_category_activities['category_sidebar'];
$args                              = [
	'post_type'      => 'post',
	'posts_per_page' => 10,
	'tax_query'      => [
		[
			'taxonomy' => 'category',
			'field'    => 'term_id',
			'terms'    => $category_sidebar,
		],
	]
];
$loop                              = new WP_Query($args);
?>
<section class="archive-wrapper archive-4-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
		<div class="row">
			<div class="col-lg-8">
				<h1 class="archive-title"><?php the_archive_title() ?></h1>
				<div class="row">
					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : ?>

							<?php the_post(); ?>

							<div class="col-lg-12">
								<?php get_template_part('template-parts/content/content',
									'post-list-3') ?>
							</div>

						<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part('template-parts/content/content-none'); ?>

					<?php endif; ?>
				</div>
				<div class="pagination-wrapper">
					<?php ifa_pagination([
						'prev' => '<',
						'next' => '>',
					]) ?>
				</div>
			</div>
			<div class="col-lg-4">
				<?php if ($loop->have_posts()): ?>

					<?php while ($loop->have_posts()) : $loop->the_post(); ?>

						<?php get_template_part('template-parts/content/content', 'post-list') ?>

					<?php endwhile;
					wp_reset_postdata(); ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
