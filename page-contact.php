<?php
get_header();

$lang = function_exists('pll_current_language') ? pll_current_language() : 'ko';
$address_ko = get_field('address_ko') ?? '';
$address_en = get_field('address_en') ?? '';
$mail       = get_field('mail') ?? 'contact@studioslam.net';
$map_url    = get_field('map_url') ?? '';
?>

<main class="wrapper contact" data-barba="container" data-barba-namespace="contact">
	<div class="page-header">
		<h2 class="headline-lg">
			<span class="letter">C</span>
			<span class="letter">o</span>
			<span class="letter">n</span>
			<span class="letter">t</span>
			<span class="letter">a</span>
			<span class="letter">c</span>
			<span class="letter">t</span>
		</h2>
	</div>

	<div class="container-fluid justify-content-between page-body">
		<div class="row--contact">
			<div class="col--contact col--contact-info">
				<div class="contact__info">
					<div class="contact__info__title">
						<p>Location.</p>
					</div>
					<div class="contact__info__content">
						<p><?php echo esc_html($address_ko); ?></p>
						<p><?php echo esc_html($address_en); ?></p>
					</div>
				</div>

				<div class="contact__info">
					<div class="contact__info__title">
						<p>Mail.</p>
					</div>
					<div class="contact__info__content contact__info__content-mail">
						<p><a href="mailto:<?php echo esc_url($mail); ?>"><?php echo esc_html($mail); ?></a></p>
					</div>
				</div>
			</div>

			<div class="col--contact contact__map">
				<iframe src="<?php echo esc_url($map_url); ?>" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" tabindex="0"></iframe>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>