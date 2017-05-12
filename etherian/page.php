<?php

get_header();

if (have_posts()) {
	while (have_posts()) { the_post()

?>

<div class="row row-title">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<div class="banner banner-title">
			<h1>
				<?php the_title(); ?>
				<small><?php the_field('subtitle'); ?></small>
			</h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<?php the_content(); ?>
	</div>
</div>

<?php

	} // endwhile
} // endif

get_footer();

?>
