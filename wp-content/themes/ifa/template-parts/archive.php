<?php
$theme_general_category_activities = get_field('theme_general_category_activities', 'option');
$post_hot                          = $theme_general_category_activities['post_hot'];
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
<section class="archive-wrapper archive-1-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
		<h1 class="archive-title"><?php the_archive_title() ?></h1>
		<?php if ($post_hot):
			setup_postdata($post_hot);
			$post_location = get_field('post_location', get_the_ID()) ?>
			<div class="post-hero">
				<div class="post-thumbnail">
					<?php if (has_post_thumbnail(get_the_ID())): ?>
						<a href="<?php the_permalink() ?>">
							<?php the_post_thumbnail('large') ?>
						</a>
					<?php endif; ?>
				</div>
				<div class="post-detail">
					<h2 class="post-title">
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</h2>
					<div class="post-meta">
						<p class="post-date">
							<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('d/m/Y'); ?></time>
						</p>
						<p class="post-location"><?= $post_location ?></p>
						<a href="<?php the_permalink() ?>" class="post-link">Xem Thêm</a>
					</div>
				</div>
			</div>
			<?php wp_reset_postdata();
		endif; ?>
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<?php if (have_posts()) : ?>

						<?php while (have_posts()) : ?>

							<?php the_post(); ?>

							<div class="col-lg-6 col-md-6">
								<?php get_template_part('template-parts/content/content', 'post') ?>
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
