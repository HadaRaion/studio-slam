<?php get_header(); ?>
<main class="wrapper page" data-barba="container" data-barba-namespace="page">
	<div class="page-header">
		<h2 class="headline-lg"><?php the_title(); ?></h2>
	</div>

	<div class="page-body">
		<div class="container-fluid">
			<?php the_content(); ?>
		</div>
	</div>
</main>

<?php
get_footer();
