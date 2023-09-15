<?php
$theme_home_settings = get_field('theme_home_settings', 'option');
$home_digitization = $theme_home_settings['home_digitization'];
$digitization_models = $home_digitization['digitization_models'];
$digitization_model_first = $home_digitization['digitization_model_first'];
$digitization_model_last = $home_digitization['digitization_model_last'];
if ($digitization_models): ?>
<section class="digitization-model-wrapper" onload="myFunction()" style="padding-top: 0px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="digitization-model-title wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="100ms">
                    <?=$home_digitization['title']?></h2>
                <div class="digitization-model-desc wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="200ms">
                    <?=wpautop($home_digitization['desc'])?>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-start digitization-model-tabs wow bounceInUp" data-wow-duration="1.5s"
            data-wow-delay="300ms">
            <div class="nav flex-column nav-pills digitization-model-tablist" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-first-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-first" type="button" role="tab" aria-controls="v-pills-first"
                    aria-selected="true">
                    <span class="icon">
                        <?=wp_get_attachment_image($digitization_model_first['icon']['id'], 'thumbnail')?>
                    </span>
                    <span class="text">
                        <?=$digitization_model_first['title_1']?>
                        <span><?=$digitization_model_first['title_2']?></span>
                    </span>
                </button>
                <?php foreach ($digitization_models as $key => $digitization_model): ?>
                <button class="nav-link" id="v-pills-<?=$key?>-tab" data-bs-toggle="pill"
                    data-bs-target="#v-pills-<?=$key?>" type="button" role="tab" aria-controls="v-pills-<?=$key?>"
                    aria-selected="true">
                    <span class="icon">
                        <?=wp_get_attachment_image($digitization_model['icon']['id'],
    'thumbnail')?>
                    </span>
                    <span class="text">
                        <span><?=$digitization_model['title_1']?></span>
                        <?=$digitization_model['title_2']?>
                    </span>
                </button>
                <?php endforeach;?>
                <button class="nav-link" id="v-pills-last-tab" data-bs-toggle="pill" data-bs-target="#v-pills-last"
                    type="button" role="tab" aria-controls="v-pills-last" aria-selected="true">
                    <span class="icon">
                        <?=wp_get_attachment_image($digitization_model_last['icon']['id'],
    'thumbnail')?>
                    </span>
                    <span class="text">
                        <span><?=$digitization_model_last['title']?></span>
                    </span>
                </button>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-first" role="tabpanel"
                    aria-labelledby="v-pills-first-tab">
                    <div class="digitization-model-content">
                        <div class="digitization-model-first-slick-slider">
                            <div>
                                <div class="digitization-model-first">
                                    <?=wp_get_attachment_image($digitization_model_first['slide_1']['id'],
    'large')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($digitization_models as $key => $digitization_model): ?>
                <div class="tab-pane fade" id="v-pills-<?=$key?>" role="tabpanel"
                    aria-labelledby="v-pills-<?=$key?>-tab">
                    <div class="digitization-model-content">
                        <h4 class="entry-title"><?=$digitization_model['title_3']?></h4>
                        <?php if ($digitization_model['packages']): ?>
                        <div class="digitization-model-slick-slider">
                            <?php foreach ($digitization_model['packages'] as $package_key => $package): ?>

                            <?php if ($digitization_model['type'] == 'type_1'): ?>

                            <div>
                                <div class="package-card"
                                    style="background-image: url('<?=$package['img']['sizes']['large']?>')">
                                    <a href="<?=$package['youtube_url']?>" data-fancybox="video-gallery-<?=$key?>"
                                        class="youtube-url"></a>
                                    <div class="package-detail">
                                        <h3 class="package-title">
                                            <?=$package['title']?>
                                        </h3>
                                        <div class="package-desc">
                                            <?=$package['desc']?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php else: ?>
                            <div>
                                <div class="package-card-2"
                                    style="background-image: url('<?=$package['img']['sizes']['large']?>')">
                                    <div class="icon">
                                        <?=wp_get_attachment_image($package['icon'], 'thumbnail')?>
                                    </div>
                                    <div class="content">
                                        <div class="package-desc">
                                            <?=$package['desc']?>
                                        </div>
                                        <h3 class="package-title">
                                            <?=$package['title']?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <?php endif?>

                            <?php endforeach;?>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
                <div class="tab-pane fade" id="v-pills-last" role="tabpanel" aria-labelledby="v-pills-last-tab">
                    <div class="digitization-model-last">
                        <img src="<?=get_theme_file_uri('assets/images/digitization-model-last-image.png')?>" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="digitization-model-banner wow bounceInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
            <?=wp_get_attachment_image($home_digitization['banner'], 'full')?>
            <a href="<?=$home_digitization['button']['url']?>" class="view-more-button"
                target="_blank"><?=$home_digitization['button']['label']?></a>
        </div>
    </div>
    <script>
    window.onload = function() {
        document.getElementById('v-pills-last-tab').click()
    };
    </script>
</section>
<?php endif;