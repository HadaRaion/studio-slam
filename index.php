<?php get_header(); ?>
<main class="wrapper works" data-barba="container" data-barba-namespace="works">
	<div class="page-header">
		<h2>
			<span class="letter">W</span>
			<span class="letter">o</span>
			<span class="letter">r</span>
			<span class="letter">k</span>
			<span class="letter">s</span>
		</h2>
	</div>

	<div class="container-sm works__list page-body">
		<ul class="">
				<?php
					while(have_posts()) {
						the_post(); ?>
						<li class="works__list__item">
							<a class="works__image" href="<?php the_permalink(); ?>">
								<img src="<?php the_post_thumbnail_url('slam-works-retina') ?>" alt="썸네일" />
							</a>
							<h4 class="works__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</li>
						<?php } ?>
			</ul>

		<div class="works__pagination">
			<?php echo paginate_links();?>
		</div>


	</div>
</main>

<?php get_footer(); ?>