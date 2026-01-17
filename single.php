<?php
get_header();

$lang = function_exists('pll_current_language') ? pll_current_language() : 'ko';


$labels = [
	'director'       => ['ko' => '기획', 'en' => 'Director'],
	'pd'             => ['ko' => '연출', 'en' => 'Producer'],
	'writer'         => ['ko' => '작가', 'en' => 'Writer'],
	'period'         => ['ko' => '방영기간', 'en' => 'Period'],
	'network'        => ['ko' => '방송사', 'en' => 'Network'],
	'platform'       => ['ko' => '플랫폼', 'en' => 'Platform'],
	'hosts'          => ['ko' => '출연진', 'en' => 'Cast'],
	'plot'           => ['ko' => '기획의도', 'en' => 'Plot'],
	'official_site'  => ['ko' => '공식홈페이지', 'en' => 'Official website'],
];

$fields = [
	'director'      => 'slam_leader',
	'pd'            => 'slam_pd',
	'writer'        => 'slam_writer',
	'period'        => 'slam_period',
	'network'       => 'slam_channel',
	'platform'      => 'slam_platform',
	'hosts'         => 'slam_hosts',
	'plot'          => 'slam_plot',
	'official_site' => 'slam_link',
];

$data = [
	'video_url' => get_field('slam_movie') ?? '',
];

foreach ($fields as $key => $field) {
	$field_name = ($lang === 'ko') ? $field : "{$field}_en";
	$data[$key] = get_field($field_name);
	$data["{$key}_title"] = $labels[$key][$lang];
}
?>
<main class="wrapper <?php echo $lang == 'ko' ? 'detail' : 'detail detail-us'; ?>" data-barba="container" data-barba-namespace="detail">
	<div class="page-header">
		<h2 class="detail__title headline-md"><?php the_title(); ?></h2>
	</div>
	<div class="page-body">
		<div class="container-sm">
			<?php if ($data['director'] || $data['pd'] || $data['writer']) : ?>
				<div class="detail-info-contain">

					<h3 class="detail-info__title">
						<?php if ($lang == 'ko') : ?>
							제작진.
						<?php else : ?>
							Team.
						<?php endif; ?>
					</h3>

					<div class="detail-info__content">
						<?php if ($data['director']) : ?>
							<p><?php echo esc_html($data['director_title']); ?> / <?php echo esc_html($data['director']); ?></p>
						<?php endif; ?>
						<?php if ($data['pd']) : ?>
							<p><?php echo esc_html($data['pd_title']); ?> / <?php echo esc_html($data['pd']); ?></p>
						<?php endif; ?>
						<?php if ($data['writer']) : ?>
							<p><?php echo esc_html($data['writer_title']); ?> / <?php echo esc_html($data['writer']); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($data['period']) : ?>
				<div class="detail-info-contain">

					<h3 class="detail-info__title"><?php echo esc_html($data['period_title']); ?>.</h3>

					<p class="detail-info__content"><?php echo esc_html($data['period']); ?></p>
				</div>
			<?php endif; ?>

			<?php if ($data['network']) : ?>
				<div class="detail-info-contain">
					<h3 class="detail-info__title"><?php echo esc_html($data['network_title']); ?>.</h3>
					<p class="detail-info__content"><?php echo esc_html($data['network']); ?></p>
				</div>
			<?php endif; ?>

			<?php if ($data['platform']) : ?>
				<div class="detail-info-contain">
					<h3 class="detail-info__title"><?php echo esc_html($data['platform_title']); ?>.</h3>
					<p class="detail-info__content"><?php echo esc_html($data['platform']); ?></p>
				</div>
			<?php endif; ?>

			<?php if ($data['hosts']) : ?>
				<div class="detail-info-contain">
					<h3 class="detail-info__title"><?php echo esc_html($data['hosts_title']); ?>.</h3>
					<p class="detail-info__content"><?php echo esc_html($data['hosts']); ?></p>
				</div>
			<?php endif; ?>

			<?php if ($data['plot']) : ?>
				<div class="detail-info-contain">
					<h3 class="detail-info__title"><?php echo esc_html($data['plot_title']); ?>.</h3>
					<div class="detail-info__content"><?php echo wp_kses_post($data['plot']); ?></div>
				</div>
			<?php endif; ?>

			<?php if ($data['official_site']) : ?>
				<div class="detail-info-contain">
					<h3 class="detail-info__title" aria-hidden="true"></h3>
					<a class="detail-info__content detail-info__content--link" href="<?php echo esc_url($data['official_site']); ?>" target="_blank"><?php echo esc_html($data['official_site_title']); ?></a>
				</div>
			<?php endif; ?>

			<?php if ($data['video_url']) : ?>
				<div class="detail-info-contain">
					<h3 class="detail-info__title" aria-hidden="true">Trailer.</h3>
					<div class="detail-info__content detail-info__content--video">
						<iframe src="<?php echo esc_url($data['video_url']); ?>?controls=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
			<?php endif; ?>

			<?php if (have_rows('slides')): ?>
				<div class="detail-info-contain">
					<h3 class="detail-info__title">Image.</h3>
					<section class="splide detail-info__content detail-info__content--slider" id="image-slider" aria-label="Image Slider">
						<div class="splide__track">
							<ul class="splide__list">
								<?php while (have_rows('slides')): the_row();
									$image = get_sub_field('image');
								?>
									<li class="splide__slide">
										<?php echo wp_get_attachment_image($image, 'slam-works-slide'); ?>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</section>
				</div>
			<?php endif; ?>

			<div class="detail__go-back">
				<a href="<?php echo ($lang == 'ko') ? site_url('/works/') : site_url('/en/slam-works/') ?>">Back</a>
			</div>
		</div>

	</div>
</main>
2
<?php
get_footer();
