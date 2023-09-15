<?php
$theme_general_sidebar_notification = get_field('theme_general_sidebar_notification', 'option');
?>
<section class="archive-wrapper archive-2-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
		<h1 class="archive-title"><?php the_archive_title() ?></h1>
		<div class="row">
			<div class="col-lg-9">
				<?php if (have_posts()) : ?>

					<?php while (have_posts()) : ?>

						<?php the_post(); ?>

						<?php get_template_part('template-parts/content/content', 'post-list-2') ?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part('template-parts/content/content-none'); ?>

				<?php endif; ?>
				<div class="pagination-wrapper">
					<?php ifa_pagination([
						'prev' => '<',
						'next' => '>',
					]) ?>
				</div>
			</div>
			<div class="col-lg-3">
				<aside class="sidebar-wrapper">
					<h5 class="sidebar-title"><?= $theme_general_sidebar_notification['title'] ?></h5>
					<div class="row">
						<?php if ($theme_general_sidebar_notification):
							foreach ($theme_general_sidebar_notification['banners'] as $banner):?>
								<div class="col-lg-12 col-md-6 col-12">
									<article class="archive-post-overlay">
										<div class="post-thumbnail">
											<a href="<?= $banner['url'] ?>">
												<?= wp_get_attachment_image($banner['img']['id'],'medium') ?>
											</a>
										</div>
										<div class="post-detail">
											<h3 class="post-title">
												<a href="<?= $banner['url'] ?>"><?= $banner['title'] ?></a>
											</h3>
										</div>
									</article>
								</div>
							<?php endforeach;
						endif; ?>
					</div>
				</aside>
			</div>
		</div>
	</div>
</section>
