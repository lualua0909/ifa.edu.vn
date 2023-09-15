<?php
$certificate_lookup = get_field('theme_general_certificate_lookup', 'option');
?>
<section class="certificate-lookup-wrapper" style="background-image: url('<?= $certificate_lookup['background'] ?>')">
	<div class="container">
		<div class="section-heading">
			<h2 class="section-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms"><?= $certificate_lookup['title'] ?></h2>
			<div class="desc wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="500ms">
				<?= wpautop($certificate_lookup['desc']) ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="certificate-lookup-form-wrapper wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="800ms">
					<iframe src="https://smarte.edu.vn/chungchi-ifa" title="Tra cứu chứng chỉ"></iframe>
				</div>
			</div>
		</div>
	</div>
</section>
