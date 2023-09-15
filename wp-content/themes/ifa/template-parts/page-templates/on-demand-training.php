<?php
$on_demand_training_template = get_field('on_demand_training_template', get_the_ID());
?>
<section class="on-demand-training-wrapper">
	<div class="container">
		<?php if (function_exists('yoast_breadcrumb')):
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
		endif; ?>
	</div>
	<div class="on-demand-training-detail" style="background-image: url('<?= $on_demand_training_template['background']['url'] ?>')">
		<div class="container">
			<h1 class="entry-title wow slideInLeft" data-wow-duration="2s" data-wow-delay="100ms"><?php the_title() ?></h1>
			<div class="entry-content wow slideInLeft" data-wow-duration="2s" data-wow-delay="300ms">
				<?php the_content() ?>
			</div>
		</div>
	</div>
	<div class="education-program-wrapper">
		<div class="container">
			<h2 class="education-program-title wow bounceInUp" data-wow-duration="2s" data-wow-delay="100ms"><?= $on_demand_training_template['title'] ?></h2>
			<?php if ($on_demand_training_template['education_programs']): ?>
				<div class="education-programs">
					<?php foreach ($on_demand_training_template['education_programs'] as $key => $education_program): ?>
						<div class="education-program wow bounceInUp" data-wow-duration="2s" data-wow-delay="<?= $key ?>00ms">
							<h3>
								<a target="_blank" href="<?= $education_program['url'] ?>"><?= $education_program['title'] ?></a>
							</h3>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<div class="button-wrapper wow bounceInUp" data-wow-duration="2s" data-wow-delay="300ms">
				<a target="_blank" href="<?= $on_demand_training_template['button']['url'] ?>" class="view-more-button"><?= $on_demand_training_template['button']['title'] ?></a>
			</div>
			<div class="education-program-content wow bounceInUp" data-wow-duration="2s" data-wow-delay="500ms">
				<?= wpautop($on_demand_training_template['content']) ?>
			</div>
		</div>
	</div>
</section>
