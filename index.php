<?php get_header(); ?>
<main class="wrapper works" data-barba="container" data-barba-namespace="works">
	<div class="page-header">
		<h2 class="headline-lg">
			<span class="letter">W</span>
			<span class="letter">o</span>
			<span class="letter">r</span>
			<span class="letter">k</span>
			<span class="letter">s</span>
		</h2>
	</div>

	<div class="container-sm works__list page-body">
		<ul>
			<?php
			while (have_posts()) {
				the_post(); ?>
				<li role="article" aria-label="<?php the_title(); ?>">
					<a class="works__image-wrapper" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'slam-works-retina', [ 'loading' => 'lazy' ] ); ?>
					</a>
					<h3 class="works__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				</li>
			<?php } ?>
		</ul>

		<div class="works__pagination">
			<?php echo paginate_links(); ?>
		</div>


	</div>
</main>

<?php
get_footer();
