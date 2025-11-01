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

$producer_query = new WP_Query(array(
	'post_type' => 'producer',
	'posts_per_page' => 50,
	'orderby' => 'menu_order'
));
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
							<p><?php echo $value['text']; ?></p>
						<?php else: ?>
							<p><?php echo $value['text_en']; ?></p>
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

		<?php if ($producer_query->have_posts()) : ?>
			<div class="container-sm member">
				<?php while ($producer_query->have_posts()) :
					$producer_query->the_post();

					$producer_name = $lang == 'ko' ? get_the_title() : get_field('name_en');
					$career        = $lang == 'ko' ? get_field('career') : get_field('career_en');

					if (!$producer_name || !$career) {
						continue;
					}
				?>
					<div class="row member__row">
						<div class="col member__name">
							<h4 class=headline-sm data-scroll>
								<?php echo esc_html($producer_name); ?>
							</h4>
						</div>

						<?php if ($career) : ?>
							<div class="col member__career">
								<?php
								foreach ($career as $item) {
									if ($item['title']) {
										echo '<p data-scroll>' . esc_html($item['title']) . '</p>';
									}
									if ($item['text']) {
										echo '<p data-scroll class="padding-left">' . esc_html($item['text']) . '</p>';
									}
								}
								?>
							</div>
						<?php endif; ?>

					</div>

				<?php endwhile; ?>
			</div>
		<?php endif; ?>


	</div>

</main>

<?php get_footer(); ?>