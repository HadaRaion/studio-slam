<?php
get_header();

$lang = function_exists('pll_current_language') ? pll_current_language() : 'ko';
$headline = get_field("headline_{$lang}") ?? '';

$is_mobile  = wp_is_mobile();
$video_urls = [];
$random_video_url = '';

if (have_rows('bg_videos')) {
	while (have_rows('bg_videos')) {
		the_row();
		$video_url = get_sub_field('bg_video');
		if ($video_url) {
			$video_urls[] = $video_url;
		}
	}
}

if (!empty($video_urls)) {
	$random_video_url = $video_urls[array_rand($video_urls)];
}

$mobile_bg_image = get_field('bg_image') ?? 0;
$image_url = wp_get_attachment_url($mobile_bg_image);
?>


<main class="wrapper home no-header-padding" data-barba="container" data-barba-namespace="home">
	<div class="page-body">
		<div class="home__bg" <?php if ($is_mobile && !empty($image_url)): ?>style="background-image: url(<?php echo esc_url($image_url); ?>)" <?php endif; ?>>
			<?php if (!$is_mobile && !empty($random_video_url)): ?>
				<video class="home__video" id="slamVideo" muted loop playsinline autoplay="autoplay" type="video/mp4" src="<?php echo esc_url($random_video_url); ?>">
				</video>
			<?php endif; ?>
		</div>

		<?php if (!empty($headline)): ?>
			<div class="home__motto">
				<h2 class="headline-sm"><?php echo wp_kses_post($headline); ?></h2>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>