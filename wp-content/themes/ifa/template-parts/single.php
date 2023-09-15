<section class="single-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<h1 class="entry-title"><?php the_title() ?></h1>
				<div class="entry-content reset-container">
					<?php the_content() ?>
				</div>
			</div>
		</div>
	</div>
</section>
