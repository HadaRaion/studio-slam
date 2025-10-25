<?php get_header(); ?>

<main class="wrapper" data-barba="container" data-barba-namespace="404">
	<div class="page-header">
		<h2 class="headline-lg">
			<span class="letter">4</span>
			<span class="letter">0</span>
			<span class="letter">4</span>
		</h2>
	</div>
	<div class="page-body">
		<div class="container-fluid text-center .align-items-center">
			<?php if (pll_current_language() == 'ko'): ?>
				<h3 class="headline-md">페이지를 찾을 수 없습니다. </h3>
				<h4 class="headline-sm"> <a href="/">홈으로 돌아가기</a> </h4>
			<?php else: ?>
				<h3 class="headline-md">Can't find the page. </h3>
				<h4 class="headline-sm"> <a href="/en/">Go bake homepage.</a> </h4>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php
get_footer();
