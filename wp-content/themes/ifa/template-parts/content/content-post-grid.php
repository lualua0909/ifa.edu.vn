<?php
$post_icon = get_field('post_icon', get_the_ID());
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-grid'); ?>>
	<?php if ($post_icon): ?>
		<div class="post-icon">
			<?= wp_get_attachment_image($post_icon['id']) ?>
		</div>
	<?php endif; ?>
	<div class="post-detail">
		<h3 class="post-title">
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		</h3>
		<div class="post-desc">
			<?php the_excerpt() ?>
		</div>
	</div>
	<div class="post-thumbnail">
		<?php if (has_post_thumbnail(get_the_ID())): ?>
			<a href="<?php the_permalink() ?>">
				<img src="<?= get_the_post_thumbnail_url(get_the_ID(),
					'large'); ?>" alt="<?php the_title(); ?>">
			</a>
		<?php endif; ?>
	</div>
</article>
