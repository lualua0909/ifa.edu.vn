<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-list-3'); ?>>
	<div class="post-thumbnail">
		<?php if (has_post_thumbnail(get_the_ID())): ?>
			<div class="product-img">
				<?php the_post_thumbnail('medium') ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="post-content">
		<h3 class="post-title">
			<a href="<?php the_permalink() ?>" class="card-title"><?php the_title(); ?></a>
		</h3>
		<div class="post-desc">
			<?php the_excerpt() ?>
		</div>
	</div>
</article>
