<?php get_header(); ?>

<main class="wrapper home no-header-padding" data-barba="container" data-barba-namespace="home">
	<div class="page-body">
		<div class="home__bg">
			<video class="home__video" id="slamVideo" muted loop playsinline autoplay="autoplay" type="video/mp4" >
			</video>
		</div>
		<div class="home__motto">


		<?php if(pll_current_language() == 'ko'): ?> 
			<h4>‘다름’을 존중하고 창조하는<br>크리에이터들의 공간<h4>
		<?php else: ?> 
			<h4>A space for creators<br>who respect and create ‘difference’<h4>
		<?php endif; ?>

		</div>
	</div>
</main>

<?php get_footer(); ?>
