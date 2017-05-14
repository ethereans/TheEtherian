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
			</h1>

			<ul class="title-links">
				<li><strong>SHARE:</strong></li>
				<li><a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i>&nbsp;&nbsp;Permalink</a></li>
				<li><a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" target="_blank"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</a></li>
				<li><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_the_permalink()); ?>&text=<?php the_title(); ?>" target="_blank"><i class="fa fa-twitter"></i>&nbsp;&nbsp;Twitter</a></li>
				<li><a href="https://reddit.com/submit?url=<?php echo urlencode(get_the_permalink()); ?>&title=<?php the_title(); ?>" target="_blank"><i class="fa fa-reddit"></i>&nbsp;&nbsp;Reddit</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<?php if (get_the_content()) { ?>
			<div class="row post-content">
				<div class="col-xs-12">
					<?php the_content(); ?>
				</div>
			</div>
		<?php } // endif ?>

		<?php if (have_rows('dapp_news')) { ?>
			<div class="row post-dapp-news">
				<?php

				while (have_rows('dapp_news')) {
					the_row();

					$dapp_post_object = get_sub_field('dapp');

					?>

					<div class="col-sm-6 dapp-news">
						<h3><?php echo get_the_title($dapp_post_object->ID); ?></h3>

						<?php the_sub_field('news'); ?>
					</div>

				<?php } // endwhile ?>
			</div>
		<?php } // endif ?>
	</div>
</div>

<?php

	} // endwhile
} // endif

get_footer();

?>
