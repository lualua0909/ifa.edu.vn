<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-list'); ?>>
	<div class="post-thumbnail">
		<?php if (has_post_thumbnail(get_the_ID())): ?>
			<a href="<?php the_permalink() ?>">
				<?php the_post_thumbnail('thumbnail') ?>
			</a>
		<?php endif; ?>
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
