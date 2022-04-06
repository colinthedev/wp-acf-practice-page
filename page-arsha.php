<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 *  Template Name: Arsha
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package colinfeb2022
 */

get_header();

$hero_image = get_field('hero_image');
$skills_image = get_field('skills_image');
// Portfolio Images
$portfolio_image_row_1_1 = get_field('portfolio_section_image_row_1_1');
$portfolio_image_row_1_2 = get_field('portfolio_section_image_row_1_2');
$portfolio_image_row_1_3 = get_field('portfolio_section_image_row_1_3');
$portfolio_image_row_2_1 = get_field('portfolio_section_image_row_2_1');
$portfolio_image_row_2_2 = get_field('portfolio_section_image_row_2_2');
$portfolio_image_row_2_3 = get_field('portfolio_section_image_row_2_3');
$portfolio_image_row_2_4 = get_field('portfolio_section_image_row_2_4');
$portfolio_image_row_3_1 = get_field('portfolio_section_image_row_3_1');
$portfolio_image_row_3_2 = get_field('portfolio_section_image_row_3_2');

// Team Images
$team_image_walter = get_field('team_section_image_walter');
$team_image_sarah = get_field('team_section_image_sarah');
$team_image_william = get_field('team_section_image_william');
$team_image_amanda = get_field('team_section_image_amanda');

// Team Query
$team_member_arg = array(
	'post_type' => 'team_members',
	'orderby' => 'title',
    'order'   => 'ASC',
);
$team_members_query = new WP_Query( $team_member_arg );

// Pricing Plans Query
$plan_arg = array(
	'post_type' => 'pricing_plans',
	'orderby' => 'menu_order',
    'order'   => 'ASC',
);
$plan_query = new WP_Query( $plan_arg );

// Logos Query
$logos_arg = array(
	'post_type' => 'logo_gallery',
	'orderby' => 'menu_order',
    'order'   => 'ASC',
);
$logos_query = new WP_Query( $logos_arg );

// Projects Query
$projects_arg = array(
	'post_type' => 'portfolio',
);
$projects_query = new WP_Query( $projects_arg );

?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
				<h1><?php the_field('hero_heading'); ?></h1>
				<h2><?php the_field('hero_subheading'); ?></h2>
				<div class="d-flex justify-content-center justify-content-lg-start">
					<a href="<?php the_field('hero_button_link'); ?>" class="btn-get-started scrollto"><?php the_field('hero_button_text'); ?></a>
					<a href="<?php the_field('hero_button_watch_link'); ?>" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span><?php the_field('hero_button_watch_text'); ?></span></a>
				</div>
			</div>
			<div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
				<img class="img-fluid animated" src="<?= esc_url($hero_image['url']); ?>" alt="<?= esc_attr($hero_image['alt']); ?>" />		
			</div>
		</div>
	</div>
</section><!-- End Hero -->

<main id="main">
<!-- ======= Clients Section ======= -->
	<section id="cliens" class="cliens section-bg">
		<div class="container">
			<div class="row" data-aos="zoom-in">
				<?php if ( $logos_query->have_posts() ) : ?> 
					<?php while ( $logos_query->have_posts() ) : $logos_query->the_post(); ?>
						<?php $logos_image = get_field('logo_image'); ?>
						<div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
							<img src="<?= esc_url($logos_image['url']); ?>" alt="<?= esc_attr($logos_image['alt']); ?>" class="img-fluid">
						</div>
						<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</section><!-- End Cliens Section -->

	<!-- ======= About Us Section ======= -->
	<section id="about" class="about">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2><?php the_field('about_us_heading'); ?></h2>
			</div>
			<div class="row content">
				<div class="col-lg-6">
					<p><?php the_field('about_us_left_text'); ?></p>
					<?php if( have_rows('about_us_list') ): ?>
						<ul>
							<?php while( have_rows('about_us_list') ) : the_row(); ?>    
								<li><i class="ri-check-double-line"></i> <?php the_sub_field('about_us_list_text'); ?></li>
							<?php  endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="col-lg-6 pt-4 pt-lg-0">
					<p><?php the_field('about_us_right_text'); ?></p>
					<a href="<?php the_field('about_us_button_link'); ?>" class="btn-learn-more"><?php the_field('about_us_button_text'); ?></a>
				</div>
			</div>
		</div>
	</section><!-- End About Us Section -->

	<!-- ======= Why Us Section ======= -->
	<section id="why-us" class="why-us section-bg">
		<div class="container-fluid" data-aos="fade-up">
			<div class="row">
				<div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
					<div class="content"><?php the_field('why_us_top_section_text'); ?></div>
					<div class="accordion-list">
					<?php if( have_rows('why_us_accordion') ): ?>
						<ul>
							<?php while( have_rows('why_us_accordion') ) : the_row(); ?>
								<li>
									<a class="collapse" data-bs-toggle="collapse" data-bs-target="#accordion-list-<?php echo get_row_index(); ?>"><span>0<?php echo get_row_index(); ?></span> <?php the_sub_field('why_us_accordion_heading'); ?><i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
									<div id="accordion-list-<?php echo get_row_index(); ?>" class="collapse <?php echo get_row_index() === 1 ? 'show' : ''; ?>" data-bs-parent=".accordion-list">
										<p><?php the_sub_field('why_us_accordion_list_text'); ?></p>
									</div>
								</li>
							<?php endwhile ?>
						</ul>
					<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("<?= esc_url(get_field('why_us_image')); ?>");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
			</div>
		</div>
	</section><!-- End Why Us Section -->

	<!-- ======= Skills Section ======= -->
	<section id="skills" class="skills">
		<div class="container" data-aos="fade-up">
			<div class="row">
				<div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
					<img class="img-fluid" src="<?= esc_url($skills_image['url']); ?>" alt="<?= esc_attr($skills_image['alt']); ?>">
				</div>
				<div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
					<h3><?php the_field('skills_heading'); ?></h3>
					<p class="fst-italic"><?php the_field('skills_text'); ?></p>
					<div class="skills-content">
						<?php if( have_rows('skills_rating_list') ): ?>
						<?php while( have_rows('skills_rating_list') ) : the_row(); ?>
							<div class="progress">
								<span class="skill"><?php the_sub_field('skill_rating_list_item'); ?> <i class="val"><?php the_sub_field('skill_rating_list_value'); ?>%</i></span>
								<div class="progress-bar-wrap">
									<div class="progress-bar" role="progressbar" aria-valuenow="<?php the_sub_field('skill_rating_list_value'); ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- End Skills Section -->

	<!-- ======= Services Section ======= -->
	<section id="services" class="services section-bg">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2><?php the_field('services_section_heading'); ?></h2>
				<p><?php the_field('services_section_text'); ?></p>
			</div>
			<div class="row">
				<?php if( have_rows('services_section_services_list') ): ?>
				<?php while( have_rows('services_section_services_list') ) : the_row(); ?>
					<div class="col-xl-3 col-md-6 d-flex align-items-stretch <?php echo get_row_index() > 1 ? 'mt-4 mt-md-0' : ''; ?>" data-aos="zoom-in" data-aos-delay="<?php the_sub_field('services_section_animation'); ?>">
					<div class="icon-box">
						<div class="icon"><i class="bx <?php the_sub_field('services_section_icon'); ?>"></i></div>
						<h4><a href=""><?php the_sub_field('services_section_heading'); ?></a></h4>
						<p><?php the_sub_field('services_section_text'); ?></p>
					</div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section><!-- End Services Section -->

	<!-- ======= Cta Section ======= -->
	<section id="cta" class="cta">
		<div class="container" data-aos="zoom-in">
			<div class="row">
				<div class="col-lg-9 text-center text-lg-start">
					<h3><?php the_field('cta_section_heading'); ?></h3>
					<p><?php the_field('cta_section_text'); ?></p>
				</div>
				<div class="col-lg-3 cta-btn-container text-center">
					<a class="cta-btn align-middle" href="#"><?php the_field('cta_section_button_text'); ?></a>
				</div>
			</div>
		</div>
	</section><!-- End Cta Section -->

	<!-- ======= Portfolio Section ======= -->
	<section id="portfolio" class="portfolio">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2><?php the_field('portfolio_section_heading'); ?></h2>
				<p><?php the_field('portfolio_section_text'); ?></p>
			</div>
			<ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
				<li data-filter="*" class="filter-active">All</li>
				<li data-filter=".filter-app">App</li>
				<li data-filter=".filter-card">Card</li>
				<li data-filter=".filter-web">Web</li>
			</ul>
			<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
				<?php if ( $projects_query->have_posts() ) : ?> 
					<?php while ( $projects_query->have_posts() ) : $projects_query->the_post(); ?>
						<div class="col-lg-4 col-md-6 portfolio-item filter-<?php the_field('category'); ?>">
							<div class="portfolio-img">
								<img src="<?= esc_url( get_field('photo') ); ?>" class="img-fluid">
							</div>
							<div class="portfolio-info">
								<h4><?php the_title_attribute(); ?></h4>
								<p><?php the_field('description'); ?></p>
								<a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
								<a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</section><!-- End Portfolio Section -->

	<!-- ======= Team Section ======= -->
	<section id="team" class="team section-bg">
		<div class="container" data-aos="fade-up">
		<div class="section-title">
			<h2><?php the_field('team_section_heading'); ?></h2>
			<p><?php the_field('team_section_text'); ?></p>
		</div>
		<div class="row">
			<?php if ( $team_members_query->have_posts() ) : ?> 
				<?php $team_member_index = 1; ?>
				<?php while ( $team_members_query->have_posts() ) : $team_members_query->the_post(); ?>
					<div class="col-lg-6 <?php echo $team_member_index == 1 ? 'mt-4 mt-lg-0' : $team_member_index > 1 ? 'mt-4' : ''; ?>">
						<div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
							<div class="pic">
								<img src="<?= esc_url( get_field('photo') ); ?>" alt="photo of <?php the_title_attribute(); ?>" class="img-fluid">
							</div>
							<div class="member-info">
							<h4><?php the_title(); ?></h4>
							<span><?php the_field('job_title'); ?></span>
							<p><?php the_field('job_description'); ?></p>
								<div class="social">
									<?php if (get_field('twitter_link')) : ?>
										<a href="<?= esc_url( get_field('twitter_link') ); ?>"><i class="ri-twitter-fill"></i></a>
									<?php endif; ?>
									<a href="<?= esc_url( get_field('facebook_link') ); ?>"><i class="ri-facebook-fill"></i></a>
									<a href="<?= esc_url( get_field('instagram_link') ); ?>"><i class="ri-instagram-fill"></i></a>
									<a href="<?= esc_url( get_field('linkedin_link') ); ?>"> <i class="ri-linkedin-box-fill"></i> </a>
								</div>
							</div>
						</div>
					</div>
				<?php $team_member_index = $team_member_index + 1;
				endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
		</div>
	</section><!-- End Team Section -->

	<!-- ======= Pricing Section ======= -->
	<section id="pricing" class="pricing">
		<div class="container" data-aos="fade-up">
		<div class="section-title">
			<h2><?php the_field('pricing_section_heading'); ?></h2>
			<p><?php the_field('pricing_section_text'); ?></p>
		</div>
		<div class="row">
			<?php if ( $plan_query->have_posts() ) : ?> 
				<?php while ( $plan_query->have_posts() ) : $plan_query->the_post(); ?>
					<div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
					<?php $featured_class = get_field('is_featured'); ?>
						<div class="box <?php echo $featured_class === true ? 'featured' : '' ?>">
							<h3><?php the_title(); ?></h3>
							<h4><sup>$</sup><?php the_field('plan_cost'); ?><span>per <?php the_field('plan_pricing_interval'); ?></span></h4>
							<?php if( have_rows('plan_list_options') ): ?>
								<ul>
									<?php while( have_rows('plan_list_options') ) : the_row(); ?>
										<?php if(get_sub_field('included_in_plan')): ?>
											<li> <i class="bx bx-check"></i>  <?php the_sub_field('plan_benefit') ?></li>
										<?php else: ?>
											<li class="na"><i class="bx bx-x"></i> <span><?php the_sub_field('plan_benefit') ?></span></li>
										<?php endif; ?>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
							<a href="#" class="buy-btn">Get Started</a>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
		</div>
	</section><!-- End Pricing Section -->

	<!-- ======= Frequently Asked Questions Section ======= -->
	<section id="faq" class="faq section-bg">
		<div class="container" data-aos="fade-up">
		<div class="section-title">
			<h2><?php the_field('faq_section_heading'); ?></h2>
			<p><?php the_field('faq_section_text'); ?></p>
		</div>
		<div class="faq-list">
			<?php if( have_rows('faq_section_accordion') ): ?>
			<ul>
				<?php while( have_rows('faq_section_accordion') ) : the_row(); ?>
				<li data-aos="fade-up" data-aos-delay="<?php the_sub_field('faq_accordion_animation'); ?>">
					<i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-<?php echo get_row_index(); ?>"><?php the_sub_field('faq_accordion_heading'); ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
					<div id="faq-list-<?php echo get_row_index(); ?>" class="collapse <?php echo get_row_index() === 1 ? 'show' : ''; ?>" data-bs-parent=".faq-list">
					<p><?php the_sub_field('faq_accordion_text'); ?></p>
					</div>
				</li>
				<?php endwhile ?>
			</ul>
			<?php endif; ?>
		</div>
		</div>
	</section><!-- End Frequently Asked Questions Section -->

	<!-- ======= Contact Section ======= -->
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">
			<div class="section-title">
				<h2><?php the_field('contact_section_heading'); ?></h2>
				<p><?php the_field('contact_section_text'); ?></p>
			</div>
			<div class="row">
				<div class="col-lg-5 d-flex align-items-stretch">
					<div class="info">
						<div class="address">
						<i class="bi bi-geo-alt"></i>
						<h4>Location:</h4>
						<p><?php the_field('contact_section_location'); ?></p>
						</div>
						<div class="email">
						<i class="bi bi-envelope"></i>
						<h4>Email:</h4>
						<p><?php the_field('contact_section_email'); ?></p>
						</div>
						<div class="phone">
						<i class="bi bi-phone"></i>
						<h4>Call:</h4>
						<p><?php the_field('contact_section_phone'); ?></p>
						</div>
						<div><?php the_field('contact_section_maps'); ?></div>
					</div>
				</div>

				<div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
					<form action="forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="row">
							<div class="form-group col-md-6">
								<label for="name">Your Name</label>
								<input type="text" name="name" class="form-control" id="name" required>
							</div>
							<div class="form-group col-md-6">
								<label for="name">Your Email</label>
								<input type="email" class="form-control" name="email" id="email" required>
							</div>
						</div>
						<div class="form-group">
							<label for="name">Subject</label>
							<input type="text" class="form-control" name="subject" id="subject" required>
						</div>
						<div class="form-group">
							<label for="name">Message</label>
							<textarea class="form-control" name="message" rows="10" required></textarea>
						</div>
						<div class="my-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">Your message has been sent. Thank you!</div>
						</div>
						<div class="text-center">
							<button type="submit">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section><!-- End Contact Section -->
	<!-- Gloabl Theme Settings -->
	<h2 class="mt-5">Global Theme Settings</h2>
	<?php the_field('footer_global_text', 'option'); ?>

</main><!-- End #main -->
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<?php
get_footer();
