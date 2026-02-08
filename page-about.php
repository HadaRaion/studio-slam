<?php
get_header();

$lang = function_exists('pll_current_language') ? pll_current_language() : 'ko';

$overview_title = get_field('overview_title') ?? 'Overview.';
$overview_text = get_field('overview_text') ?? '';
$overview_text_en = get_field('overview_text_en') ?? '';
$vision_title = get_field('vision_title') ?? 'Vision.';
$vision_text = get_field('vision_text') ?? '';
$vision_text_en = get_field('vision_text_en') ?? '';
$who_we_are_title = get_field('who_we_are_title') ?? 'Who we are.';
$who_we_are_text = get_field('who_we_are_text') ?? '';
$who_we_are_text_en = get_field('who_we_are_text_en') ?? '';


$about_data = [
	'overview' => [
		'title' => $overview_title,
		'text' => $overview_text,
		'text_en' => $overview_text_en,
	],
	'vision' => [
		'title' => $vision_title,
		'text' => $vision_text,
		'text_en' => $vision_text_en,
	],
	'who_we_are' => [
		'title' => $who_we_are_title,
		'text' => $who_we_are_text,
		'text_en' => $who_we_are_text_en,
	],
];


$creators = ($lang == 'ko') ? get_field('creators') : get_field('creators_en');
?>


<main class="wrapper <?php echo $lang == 'ko' ? 'about' : 'about about-us'; ?>" data-barba="container" data-barba-namespace="about">
	<div class="page-header">
		<h2 class="headline-lg">
			<span class="letter">A</span>
			<span class="letter">b</span>
			<span class="letter">o</span>
			<span class="letter">u</span>
			<span class="letter">t</span>
			<span class="space"></span>
			<span class="letter">u</span>
			<span class="letter">s</span>
		</h2>
	</div>

	<div class="page-body">

		<?php foreach ($about_data as $key => $value) { ?>
			<div class="container-sm justify-content-between">
				<div class="row">
					<div class="col about__title">
						<h3 class="headline-md"><?php echo $value['title']; ?></h3>
						<div class="line"></div>
					</div>

					<div class="col about__text">
						<?php if ($lang == 'ko'): ?>
							<p><?php echo wp_kses_post($value['text']); ?></p>
						<?php else: ?>
							<p><?php echo wp_kses_post($value['text_en']); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>


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
			<div class="divide-logo"><img data-scroll src="<?php echo get_theme_file_uri('/images/logo_horizontal.svg'); ?>" alt="Studio Slam Logo" /></div>
		</div>

		<?php
		$history_data = $lang == 'ko' ? get_field('history') : get_field('history_en');
		?>

		<?php if ($history_data && is_array($history_data)) : ?>
			<section class="about-section about-section--history" aria-label="Company History Timeline">
				<div class="container-sm">
					<h2 class="headline-md" data-scroll>History.</h2>
					
					<div id="history-slider" class="splide" role="region" aria-label="History Timeline Slider">
						<div class="splide__arrows"></div>
						<div class="splide__track">
							<ul class="splide__list">
								<?php foreach ($history_data as $year_item) : ?>
									<?php
									$year = $year_item['year'] ?? '';
									$contents = $year_item['contents'] ?? [];
									
									if (!$year || empty($contents)) {
										continue;
									}
									?>
									<li class="splide__slide">
										<div class="history-slide-content">
											<h3 class="history-year headline-sm" data-scroll><?php echo esc_html($year); ?></h3>
											
											<?php if (is_array($contents)) : ?>
												<ul class="history-items">
													<?php foreach ($contents as $content) : ?>
														<?php
														$title = $content['title'] ?? '';
														$link_id = $content['link'] ?? null;
														$platform = $content['platform'] ?? 'none';
														$icon_id = $content['icon'] ?? null;
														$icon_url = $platform === 'custom' && $icon_id ? wp_get_attachment_image_url($icon_id, 'full') : get_theme_file_uri('/images/icons/' . $platform . '.png');
														
														
														if (!$title) {
															continue;
														}
														
														$has_link = !empty($link_id);
														$permalink = $has_link ? get_permalink($link_id) : '';
														?>
														<li class="history-item">
															<?php if ($has_link && $permalink) : ?>
																<a href="<?php echo esc_url($permalink); ?>" class="history-link">
																	<?php echo esc_html($title); ?>
																</a>
															<?php else : ?>
																<span class="history-text"><?php echo esc_html($title); ?></span>
															<?php endif; ?>

															<?php if ($platform !== 'none') : ?>
																<span class="platform-icon <?php echo esc_attr($platform); ?>" aria-hidden="true" style="background-image: url('<?php echo esc_url($icon_url); ?>');"></span>
																<span class="sr-only"><?php echo esc_html($platform); ?></span>
															<?php endif; ?>
														</li>
													<?php endforeach; ?>
												</ul>
											<?php endif; ?>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php if ($creators && is_array($creators)) : ?>
			<section class="about-section about-section--creators" aria-label="Creators">
				<div class="container-sm">
					<h2 class="headline-md" data-scroll>Creators.</h2>
					<ul class="creator-list">
						<?php foreach ($creators as $creator) : ?>
							<li class="creator-name headline-sm"><?php echo esc_html($creator['name']); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</section>
		<?php endif; ?>

	</div>

</main>

<?php
get_footer();
