<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-card'); ?>>
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
