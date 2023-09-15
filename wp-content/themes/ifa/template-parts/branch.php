<?php
$contact_template = get_field('contact_template', get_the_ID());
$branch           = $contact_template['branch'];
if ($branch): ?>
	<section class="branch-wrapper">
		<div class="container">
			<?php foreach ($branch as $key => $item): ?>
				<div class="branch-item row <?= $key % 2 != 0 ? 'flex-lg-row-reverse' : '' ?>">
					<div class="col-lg-6">
						<div class="branch-content">
							<h3 class="branch-name"><?= $item['title'] ?></h3>
							<?php if ($item['info']): ?>
								<div class="contact-info">
									<ul class="info-list">
										<?php foreach ($item['info'] as $info): ?>
											<li>
												<span><?= $info['icon'] ?></span>
												<?= $info['text'] ?>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="map-wrapper">
							<?= $item['map'] ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif;