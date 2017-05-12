<?php

/* Template Name: Contact */

get_header();

if (have_posts()) {
	while (have_posts()) { the_post()

?>

<div class="row row-title">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<div class="banner banner-title">
			<h1>
				Contact
				<small><?php the_field('subtitle'); ?></small>
			</h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<p class="contact-instructions">Fields marked with * are required.</p>

		<?php echo do_shortcode('[contact-form-7 id="735" title="Contact Form" html_class="contact-form" html_id="contactForm"]'); ?>
	</div>
</div>

<?php

	} // endwhile
} // endif

get_footer();

?>
