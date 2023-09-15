<div class="header-wrapper">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-5 nav-col">
				<?php if (has_nav_menu('primary-menu-left')):
					wp_nav_menu([
						'theme_location'  => 'primary-menu-left',
						'container_class' => 'primary-menu primary-menu-left',
					]);
				endif; ?>
			</div>
			<div class="col-lg-2 col-md-6 col-6">
				<div class="logo-wrapper">
					<?php ifa_logo() ?>
				</div>
			</div>
			<div class="col-lg-5 nav-col">
				<?php if (has_nav_menu('primary-menu-right')):
					wp_nav_menu([
						'theme_location'  => 'primary-menu-right',
						'container_class' => 'primary-menu primary-menu-right',
					]);
				endif; ?>
			</div>
			<div class="col-md-6 col-6 actions-col">
				<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#searchModal" class="action-button search-button"><i class="fa-solid fa-magnifying-glass"></i></a>
				<a href="#primary-mobile-menu" class="action-button nav-button"><i class="fa-solid fa-bars"></i></a>
			</div>
		</div>
	</div>
	<?php if (has_nav_menu('mobile-menu')):
		wp_nav_menu([
			'theme_location' => 'mobile-menu',
			'container_id'   => 'primary-mobile-menu',
		]);
	endif; ?>
</div>
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<form role="search" method="get" id="search-form" class="search-form" action="<?= esc_url(home_url('/')) ?>">
					<input type="text" value="<?= get_search_query() ?>" name="s" id="s" placeholder="Tìm kiếm..." aria-label="Tìm kiếm">
					<button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>
