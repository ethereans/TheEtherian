<?php /* Template Name: Home */ get_header(); ?>

<div class="row row-dapp">
	<div class="col-sm-10 col-sm-push-2 col-body">
		<div id="dappGrid" class="row">
			<?php

			$last_post = wp_get_recent_posts(['numberposts' => 1], 'OBJECT');

			$dapps = new WP_Query([
				'post_type' => 'dapp',
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC'
			]);

			if ($dapps->have_posts()) {
				while ($dapps->have_posts()) {
					$dapps->the_post();

					$dapp_logo_metadata = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "full");

					$horizontal_class = '';

					if ($dapp_logo_metadata[1] > 1.25 * $dapp_logo_metadata[2])
					{
						$horizontal_class = ' horizontal';
					}
					?>

					<div class="col-xs-12 col-sm-6 col-lg-4">
						<div class="panel panel-dapp">
							<a href="<?php the_permalink(); ?>"><div class="panel-heading">
								<img class="panel-logo<?php echo $horizontal_class ?>" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?> Logo" />

								<h3 class="panel-title">
									<span class="dapp-name"><?php the_title(); ?></span>
									<small><?php the_field('description'); ?></small>
								</h3>

								<a href="<?php the_permalink(); ?>" class="btn btn-purple">The Latest News</a>
							</div></a>

							<div class="panel-body">
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
										<?php

										while (have_rows('links')) {
											the_row();
											?>

											<li><a href="<?php the_sub_field('link'); ?>" target="_blank"><i class="<?php echo $icons[get_sub_field('type')]; ?>"></i>&nbsp;&nbsp;<?php echo ucfirst(get_sub_field('type')); ?></a></li>
										<?php } // endwhile ?>
									</ul>

								<?php } // endif ?>
							</div>
						</div>
					</div>

					<?php
				} // endwhile
			} // endif

			wp_reset_query();
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>
