<?php get_header(); ?>
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
						<p>14F, JoongAng Ilbo Building, 48-6 Sangamsan-ro, Mapo-gu, Seoul, Republic of Korea</p>
						<p>서울시 마포구 상암산로 48-6, 중앙일보빌딩 14층</p>
					</div>
				</div>

				<div class="contact__info">
					<div class="contact__info__title">
						<p>Mail.</p>
					</div>
					<div class="contact__info__content">
						<p><a mailto:contact@studioslam.net>contact@studioslam.net</a></p>
					</div>
				</div>

				<div class="contact__map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.0675096008704!2d126.8875065120832!3d37.57702797191927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c991331d587dd%3A0xeecfbe2bb45482b!2z64yA7ZWc66-86rWtIOyEnOyauO2KueuzhOyLnCDrp4jtj6zqtawg7IOB7JWU7IKw66GcIDQ4LTY!5e0!3m2!1sko!2sca!4v1751853839000!5m2!1sko!2sca" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" tabindex="0"></iframe>
				</div>
			</div>

			<div class="col--contact contact__form col--contact-form">
				<?php the_content() ?>

			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>