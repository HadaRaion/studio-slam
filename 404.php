<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main class="wrapper" data-barba="container" data-barba-namespace="404">
	<div class="page-header">
		<h2>		
			<span class="letter">4</span>
			<span class="letter">0</span>
			<span class="letter">4</span>

		</h2>
	</div>
	<div class="page-body">
		<div class="container-fluid text-center .align-items-center">
		<?php if(pll_current_language() == 'ko'): ?> 
			<h3>페이지를 찾을 수 없습니다. </h3>
			<h4> <a href="/">홈으로 돌아가기</a> </h4>
		<?php else: ?> 
			<h3>Can't find the page. </h3>
			<h4> <a href="/en/">Go bake homepage.</a> </h4>
		<?php endif; ?>

		</div>	
	</div>

</main>

<?php
get_footer();
