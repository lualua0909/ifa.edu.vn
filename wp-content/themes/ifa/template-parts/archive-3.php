<section class="archive-wrapper archive-3-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
		<h1 class="archive-title"><?php the_archive_title() ?></h1>
		<div class="row">
			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : ?>

					<?php the_post(); ?>

					<div class="col-lg-4 col-sm-6">
						<?php get_template_part('template-parts/content/content', 'post-grid') ?>
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
</section>
