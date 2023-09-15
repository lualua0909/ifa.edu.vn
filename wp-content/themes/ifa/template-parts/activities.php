<?php
$theme_home_settings = get_field('theme_home_settings', 'option');
$home_activities     = $theme_home_settings['home_activities'];
$args                = [
	'post_type'      => 'post',
	'posts_per_page' => 7,
	'tax_query'      => [
		[
			'taxonomy' => 'category',
			'field'    => 'term_id',
			'terms'    => $home_activities['category'],
		],
	]
];
$loop                = new WP_Query($args);
if ($loop->have_posts()): ?>
	<section class="activities-wrapper">
		<div class="container">
			<h2 class="partner-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms"><?= $home_activities['title'] ?></h2>
			<div class="row">
				<?php $loop = new WP_Query($args);
				while ($loop->have_posts()) : $loop->the_post(); ?>
					<div class="col-lg-4 col-md-6 wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="300ms">
						<article <?php post_class('post-card-1'); ?>>
							<div class="post-thumbnail">
								<?php if (has_post_thumbnail(get_the_ID())): ?>
									<a href="<?php the_permalink() ?>">
										<?php the_post_thumbnail('large') ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="post-detail">
								<p class="post-date">
									<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('d/m/Y'); ?></time>
								</p>
								<h3 class="post-title">
									<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</h3>
								<div class="post-desc">
									<?php the_excerpt() ?>
								</div>
							</div>
						</article>
					</div>
					<?php break;
				endwhile;
				wp_reset_postdata(); ?>
				<div class="col-lg-4 col-md-6 wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
					<?php $i = 0;
					$loop    = new WP_Query($args);
					while ($loop->have_posts()) : $loop->the_post();
						$i ++;
						if ($i == 1):
							continue;
						endif; ?>
						<article <?php post_class('post-card-2'); ?>>
							<div class="post-thumbnail">
								<a href="<?php the_permalink() ?>">
									<?php the_post_thumbnail('large') ?>
								</a>
							</div>
							<div class="post-detail">
								<h3 class="post-title">
									<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</h3>
								<p class="post-date">
									<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('d/m/Y'); ?></time>
								</p>
							</div>
						</article>
						<?php
						if ($i >= 5):
							break;
						endif;
					endwhile;
					wp_reset_postdata(); ?>
				</div>
				<div class="col-lg-4 wow slideInRight" data-wow-duration="1.5s" data-wow-delay="300ms">
					<div class="row">
						<?php $i = 0;
						$loop    = new WP_Query($args);
						while ($loop->have_posts()) : $loop->the_post();
							$i ++;
							if ($i <= 5):
								continue;
							endif; ?>
							<div class="col-lg-12 col-md-6">
								<article <?php post_class('post-card-3'); ?> style="background-image: url('<?= get_the_post_thumbnail_url(get_the_ID(),
									'large'); ?>')">
									<h6 class="post-cat"><?= get_the_category(get_the_ID())[0]->name ?></h6>
									<div class="post-detail">
										<p class="post-date">
											<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date('d/m/Y'); ?></time>
										</p>
										<h3 class="post-title">
											<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
										</h3>
									</div>
								</article>
							</div>
						<?php
						endwhile;
						wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
			<div class="category-link">
				<a href="<?= get_category_link($home_activities['category']) ?>" target="_blank" class="category-link-button" role="button">Xem thêm</a>
			</div>
		</div>
	</section>
<?php endif;
