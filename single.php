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
	<div class="page-body">
		<div class="container-fluid">
			<div class="detail__video">
				<iframe src="<?php echo esc_url($data['video_url']); ?>?controls=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>

		<div class="container-fluid">
			<div class="mouse-scroll">
				<span>Scroll</span>
				<svg class="mouse" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 76 130" preserveAspectRatio="xMidYMid meet">
					<g fill="none" fill-rule="evenodd">
						<rect width="70" height="110" x="1.5" y="1.5" stroke="#FFF" stroke-width="3" rx="36" />
						<circle class="scroll" cx="36.5" cy="31.5" r="5.6" fill="#FFF" />
					</g>
				</svg>
			</div>
		</div>

		<div class="container-fluid">
			<h4 class="detail__title headline-sm"><?php the_title(); ?></h4>

			<?php if ($data['director'] || $data['pd'] || $data['writer']) : ?>
				<div class="row row--detail">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title">
							<?php if ($lang == 'ko') : ?>
								제작진.
							<?php else : ?>
								Team.
							<?php endif; ?>
						</p>
					</div>

					<div class="col">
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
				<div class="row row--detail">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title"><?php echo esc_html($data['period_title']); ?>.</p>
					</div>
					<div class="col">
						<p><?php echo esc_html($data['period']); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($data['network']) : ?>
				<div class="row row--detail">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title"><?php echo esc_html($data['network_title']); ?>.</p>
					</div>
					<div class="col">
						<p><?php echo esc_html($data['network']); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($data['platform']) : ?>
				<div class="row row--detail">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title"><?php echo esc_html($data['platform_title']); ?>.</p>
					</div>
					<div class="col">
						<p><?php echo esc_html($data['platform']); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($data['hosts']) : ?>
				<div class="row row--detail">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title"><?php echo esc_html($data['hosts_title']); ?>.</p>
					</div>
					<div class="col">
						<p><?php echo esc_html($data['hosts']); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($data['plot']) : ?>
				<div class="row row--detail">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title"><?php echo esc_html($data['plot_title']); ?>.</p>
					</div>
					<div class="col">
						<p><?php echo esc_html($data['plot']); ?></p>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($data['official_site']) : ?>
				<div class="row row--detail row--for-detail-link">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title"></p>
					</div>
					<div class="col">
						<p class="detail__link"><a href="<?php echo esc_url($data['official_site']); ?>" target="_blank"><?php echo esc_html($data['official_site_title']); ?></a></p>
					</div>
				</div>
			<?php endif; ?>

			<?php if (have_rows('slides')): ?>
				<div class="row row--detail">
					<div class="col col--detail-sub-title">
						<p class="detail__sub-title">Image.</p>
					</div>
					<div class="col">
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php if (have_rows('slides')): ?>
			<div class="container-fluid">
				<section class="splide" id="image-slider" aria-label="Image Slider">
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
	</div>

	<div class="container-fluid">
		<div class="detail__go-back">
			<a href="<?php echo ($lang == 'ko') ? site_url('/works/') : site_url('/en/slam-works/') ?>">Back</a>
		</div>
	</div>
</main>

<?php
get_footer();
