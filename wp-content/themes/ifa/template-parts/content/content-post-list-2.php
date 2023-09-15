<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-list-2'); ?>>
	<h3 class="post-title">
		<a href="<?php the_permalink() ?>" class="card-title"><?php the_title(); ?></a>
	</h3>
	<div class="post-desc">
		<?php the_excerpt() ?>
	</div>
</article>
