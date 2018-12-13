<?php

if ( get_field( '', $post->ID )) : ?>
	<?php
// check if the repeater field has rows of data
	if( have_rows('') ): ?>

		<div class="wrapper" >

			<div class="owl-carousel owl-theme">

<?php	// loop through the rows of data
while ( have_rows('') ) : the_row();
	$image_id = get_sub_field('image');
// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];

// thumbnail
	$size_full = 'full';
	$size_mobile = 'mobile-img';

	$image_full = wp_get_attachment_image_src($image_id, $size_full);
	$image_full_img = $image_full[0];

	$image_mobile = wp_get_attachment_image_src($image_id, $size_mobile);
	$image_mobile_img = $image_mobile[0];

	?>

	<div class="slide-holder">


		<?php
// check mobile
		if ( wp_is_mobile()) : ?>

			<?php
// check for custom mobile image ACF field
			if (get_sub_field( 'image_for_mobile' )) : ?> 

				<div class="row mobile image_for_mobile <?php the_sub_field('caption_box_placement'); ?>" style="background: url('<?php the_sub_field( 'image_for_mobile' ); ?>') no-repeat 50% 50%; background-size: cover; height: 300px;margin-left: 0;margin-right: 0;">

					<?php
// Do the custom mobile image size in functions.php
					else : ?>

						<div class="row mobile custom_image size <?php the_sub_field('caption_box_placement'); ?>" style="background: url('<?php echo $image_mobile_img; ?>') no-repeat 50% 50%; background-size: cover; height: 300px;margin-left: 0;margin-right: 0;">	

							<?php
// end mobile image check
						endif; ?>

						<?php
// do desktop
						else : ?>	

							<div class="row desktop <?php the_sub_field('caption_box_placement'); ?>" style="background: url('<?php echo $image_full_img ?>') no-repeat 50% 50%; background-size: cover; height: 500px;margin-left: 0;margin-right: 0;">				

							<?php endif; ?>

							<?php if( get_sub_field('caption_box') ): ?>

								<div class="row <?php if ( get_sub_field('caption_box_placement')) { the_sub_field( 'caption_box_placement'); } else { echo 'align-items-end justify-content-start'; } ?>"
									style="width: 1140px; margin: 0 auto;">
									<div class="text-holder" style="<?php if( get_sub_field( 'caption_box_background' )) : ?>background: rgba(0, 0, 0, .7);padding: 15px;border-radius: 20px;<?php endif; ?> margin: 30px;">
										<?php if( get_sub_field('headline') ): ?><p class="headline"><?php the_sub_field( 'headline' ); ?></p><?php endif; ?>
										<?php if( get_sub_field('subhead') ): ?>
											<p><?php the_sub_field( 'subhead' ); ?></p>
										<?php endif; ?>
										<?php if( get_sub_field('show_button') ): ?>
											<a href="<?php the_sub_field( 'button_link' ); ?>"><?php the_sub_field( 'button' ); ?></a>
										<?php endif; ?>
									</div>

								</div>

							<?php endif; ?>

						</div>

					</div>

				<?php endwhile; ?>

			</div>	

		</div><!-- #wrapper-static-hero -->

	<?php endif; ?>
<?php endif; ?>

