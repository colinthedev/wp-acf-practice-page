<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: ACF Fields
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package colinfeb2022
 */

get_header();
?>
	<p><?php the_field('header_global_text', 'option'); ?></p>

	<main id="primary" class="site-main mb-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Range Field -->
					<?php $text_size = get_field('range'); ?>
					<h2 style="font-size: <?php echo $text_size ?>px" class="mb-3">Font size is: <?php the_field('range') ?> </h2>

					<form oninput="result.value=parseInt(a.value)">
						<?php $text_size = get_field('range'); ?>
						<input type="range"  id="a" value="<?php $text_size ?>">
						<output name="result" for="a">
							<h2 style="font-size: <?php echo esc_attr($text_size['value']); ?>px">Font size is: </h2>
						</output>
						<h2 style="font-size: <?php echo $text_size ?>px" >Font size is: <?php the_field('range') ?> </h2>
					</form>


					<!-- Text Field -->
					<h2 class="mt-5">Text</h2>
					<p><?php the_field('text') ?></p>


					<!-- Textarea Field -->
					<h2 class="mt-5">Textarea</h2>
					<p><?php the_field('text_area') ?></p>
		

					<!-- Button Group Field -->
					<h2 class="mt-5">Button Group</h2>
					<?php if (get_field('button_group') == 'right') : ?>
						<p>position: <?= get_field('button_group'); ?></p>
					<?php endif; ?>


					<!-- Radio Button Field -->
					<h2 class="mt-5">Radio Button</h2>
					<?php
					$field = get_field_object('radio_button');
					$value = $field['value'];
					$label = $field['choices'][ $value ];
					?>

					<p>Color: <span class="color-<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></span></p>
					<h2 class="mt-5">Checkbox</h2>
					<?php
					$decisions = get_field('checkbox');

					if( $decisions ): ?>
						<ul>
							<?php foreach( $decisions as $decision ): ?>
								<li><?php echo $decision; ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>


					<!-- Select Field -->
					<h2 class="mt-5">Select</h2>
					<?php
					$things = get_field( 'select' );

					// Create a comma-separated list from selected values.
					if( $things ): ?>
						<p>Thing: <?php echo implode( ', ', $things ); ?></p>
					<?php endif; ?>


					<!-- True/False Field -->
					<h2 class="mt-5">True / False</h2>
					<?php if( get_field('true_or_false') === true ) : ?>
							<p>This is true</p>
					<?php else : ?>
							<p>This is false</p>
					<?php endif; ?>


					<!-- File Field -->
					<h2 class="mt-5">File</h2>
					<?php
					$file = get_field('file');
					
					if( $file ): ?>
						<a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
					<?php else : ?>
						<p>No file found</p>
					<?php endif; ?>


					<!-- Gallery Field -->
					<h2 class="mt-5">Gallery</h2>
					<?php 
					$images = get_field('gallery');

					if( $images ): ?>
						<div id="carousel" class="flexslider">
							<ul class="slides">
								<?php foreach( $images as $image ): ?>
									<li>
										<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="Thumbnail of <?php echo esc_url($image['alt']); ?>" />
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>


					<!-- Image Field -->
					<h2 class="mt-5">Image</h2>
					<?php if( get_field('image') ): ?>
						<img src="<?php the_field('image'); ?>" />
					<?php endif; ?>


					<!-- WYSIWYG Field -->
					<h2 class="mt-5">WYSIWYG Editor</h2>
					<?php the_field('wsywig_editor'); ?>


					<!-- Color Picker Field -->
					<h2 class="mt-5">Color Picker</h2>
					<div style="height: 50px; width: 50%; background-color:<?php the_field('color_picker'); ?>"></div>
					<p>Color hexcode: <?php the_field('color_picker'); ?></p>


					<!-- Date Picker Field -->
					<h2 class="mt-5">Date Picker</h2>
					<p>Event Date: <?php the_field('date_picker'); ?></p>


					<!-- Date Timer Picker Field -->
					<h2 class="mt-5">Date Timer Picker</h2>
					<p>Event starts: <?php the_field('date_timer_picker'); ?></p>


					<!-- Time Picker Field -->
					<h2 class="mt-5">Time Picker</h2>
					<p>Monday: <?php the_field('time_picker'); ?> - <?php the_field('time_picker'); ?></p>

					<!-- Clone Field -->
					<h2 class="mt-5">Clone</h2>
					<?php if(get_field('image') ):

					$title = get_field('text');

					?>
						<div style="bacground-image: url('<?= esc_url(get_field('image')); ?>')">
							<img src="<?php the_field('image'); ?>">
							<h2><?php echo $title ?></h2>
						</div>
					<?php endif; ?>


					<!-- Repeater Field -->
					<h2 class="mt-5">Repeater</h2>
					<?php if( have_rows('repeater') ): ?>
						<ul class="slides">
							<?php while( have_rows('repeater') ): the_row(); 
								?>
								<li>
									<img src="<?= get_sub_field('img'); ?>">
									<p><?php the_sub_field('caption'); ?></p>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>


					<!-- Link Field -->
					<h2 class="mt-5">Link</h2>
					<?php 
					$link = get_field('link');
					if( $link ): ?>
						<a class="button" href="<?php echo esc_url( $link ); ?>">Continue Reading</a>
					<?php endif; ?>


					<!-- Page Link Field -->
					<h2 class="mt-5">Page Link</h2>
					<a href="<?php the_field('page_link'); ?>">Continue reading</a>


					<!-- Post Object Field -->
					<h2 class="mt-5">Post Object</h2>
					<?php
					$featured_posts = get_field('post_object');

					if( $featured_posts ): ?>
						<ul>
							<?php foreach( $featured_posts as $post ): 

								// Setup this post for WP functions (variable must be named $post).
								setup_postdata($post); ?>
								<li>
									<?php the_title(); ?> <br>
									<?php the_field( 'job_title' ); ?> <br>
									<?php the_field( 'job_description' ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php 
						wp_reset_postdata(); ?>
					<?php endif; ?>


					<!-- Gloabl Theme Settings -->
					<h2 class="mt-5">Global Theme Settings</h2>
					<?php the_field('footer_global_text', 'option'); ?>


				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php

get_footer();
