<?php

get_header();

if (have_posts()) {
	while (have_posts()) { the_post();

?>

<div class="row row-title">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<div class="banner banner-title">
			<?php
			$dapp_logo_metadata = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");

			$horizontal_class = '';

			if ($dapp_logo_metadata[1] > 1.25 * $dapp_logo_metadata[2])
			{
				$horizontal_class = ' horizontal';
			}
			?>
			<img class="title-logo<?php echo $horizontal_class ?>" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?> Logo" />

			<h1>
				<?php the_title(); ?>
				<small><?php the_field('description'); ?></small>
			</h1>

			<?php

			$icons = [
				'website' => 'fa fa-desktop',
				'twitter' => 'fa fa-twitter',
				'facebook' => 'fa fa-facebook',
				'reddit' => 'fa fa-reddit',
				'slack' => 'fa fa-slack',
				'gitter' => 'fa icon-gitter',
				'github' => 'fa fa-github',
				'rocket' => 'fa icon-rocketchat'
			];

			if (have_rows('links')) {
				?>

				<ul class="title-links">
					<?php while (have_rows('links')) { the_row(); ?>
					<li><a href="<?php the_sub_field('link'); ?>" target="_blank"><i class="<?php echo $icons[get_sub_field('type')]; ?>"></i>&nbsp;&nbsp;<?php echo ucfirst(get_sub_field('type')); ?></a></li>
					<?php } // endwhile ?>
				</ul>

			<?php } // endif ?>
		</div>
	</div>
</div>

<div class="row single-dapp">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<div class="row" id="newsGrid">
			<?php

			$dapp_news = new WP_Query([
				'post_type' => 'post',
				'posts_per_page' => 10
			]);

			$dapp_id = get_the_ID();

			if ($dapp_news->have_posts()) {
				while ($dapp_news->have_posts()) {

					$dapp_news->the_post();

					if (have_rows('dapp_news')) {
						while (have_rows('dapp_news')) {

							the_row();

							$dapp = get_sub_field('dapp');

							if ($dapp->ID === $dapp_id) {
								?>

								<div class="col-sm-6 dapp-news">
									<h3><?php the_date(); ?></h3>

									<?php the_sub_field('news'); ?>
								</div>

								<?php
							} // endif
						} // endwhile
					} // endif
				} // endwhile
			} // endif

			wp_reset_query();
			?>
		</div>
	</div>
</div>

<?php

	} // endwhile
} // endif

get_footer();

?>
