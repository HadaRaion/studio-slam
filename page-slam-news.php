<?php get_header(); ?>

	<main class="wrapper news" data-barba="container" data-barba-namespace="news">
		<div class="page-header">
			<h2>		
				<span class="letter">N</span>
				<span class="letter">e</span>
				<span class="letter">w</span>
				<span class="letter">s</span>
			</h2>
		</div>

		<div class="page-body">
			<div class="container-sm works__list">
				<?php echo do_shortcode('[kboard id=1]'); ?>
			</div>	
		</div>

	</main>

<?php get_footer(); ?>