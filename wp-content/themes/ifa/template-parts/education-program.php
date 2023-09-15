<?php
$theme_home_settings    = get_field('theme_home_settings', 'option');
$home_education_program = $theme_home_settings['home_education_program'];
$education_programs     = $home_education_program['education_programs'];
if ($education_programs): ?>
	<section class="education-program-wrapper">
		<div class="container">
			<h2 class="partner-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms"><?= $home_education_program['title'] ?></h2>
			<div class="accordion" id="education-program-accordion">
				<div class="row">
					<div class="col-lg-6">
						<?php foreach ($education_programs as $key => $item):
							if ($key % 2 != 0):
								continue;
							endif; ?>
							<div class="accordion-item wow slideInLeft" data-wow-duration="1.5s" data-wow-delay="<?= $key ?>00ms">
								<h2 class="accordion-header" id="education-program-<?= $key ?>">
									<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#education-program-collapse-<?= $key ?>" aria-expanded="true" aria-controls="education-program-collapse-<?= $key ?>">
										<span class="icon">
											<?= wp_get_attachment_image($item['icon']['id'],'thumbnail') ?>
										</span>
										<span class="text"><?= $item['title'] ?></span>
									</button>
								</h2>
								<div id="education-program-collapse-<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="education-program-<?= $key ?>" data-bs-parent="#education-program-accordion">
									<div class="accordion-body">
										<?php if ($item['content']): ?>
											<ul>
												<?php foreach ($item['content'] as $content): ?>
													<li><?= $content['education_program_name'] ?></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
					<div class="col-lg-6">
						<?php foreach ($education_programs as $key => $item):
							if ($key % 2 == 0):
								continue;
							endif; ?>
							<div class="accordion-item wow slideInRight" data-wow-duration="1.5s" data-wow-delay="<?= $key ?>00ms">
								<h2 class="accordion-header" id="education-program-<?= $key ?>">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#education-program-collapse-<?= $key ?>" aria-expanded="true" aria-controls="education-program-collapse-<?= $key ?>">
										<span class="icon">
											<?= wp_get_attachment_image($item['icon']['id'],'thumbnail') ?>
										</span>
										<span class="text"><?= $item['title'] ?></span>
									</button>
								</h2>
								<div id="education-program-collapse-<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="education-program-<?= $key ?>" data-bs-parent="#education-program-accordion">
									<div class="accordion-body">
										<?php if ($item['content']): ?>
											<ul>
												<?php foreach ($item['content'] as $content): ?>
													<li><?= $content['education_program_name'] ?></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif;
