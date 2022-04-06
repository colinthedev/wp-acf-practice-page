<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 *  Template Name: Modern-landing-page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package colinfeb2022
 */

get_header();

$hero_image = get_field('hero_image');
$row_5_dotted_image = get_field('row-5_image_dotted');
$row_5_big_image = get_field('row-5_image_big');
$row_5_video_image = get_field('row-5_image_video');

// Apartments Query
$apartments_arg = array(
    'post_type' => 'apartment',
);
$apartments_query = new WP_Query( $apartments_arg );

// Featured Apartments Query
$featured_apts_1_arg = array(
	'post_type' => 'apartment_property',
    'meta_key'     => 'featured',
    'meta_value'   => true,
    'posts_per_page' => 3,
    'orderby' => 'menu_order',
    'order'   => 'ASC',
);
$featured_1_apts = new WP_Query( $featured_apts_1_arg );

// Featured Apartments Query
$featured_apts_2_arg = array(
	'post_type' => 'apartment_property',
    'meta_key'     => 'featured',
    'meta_value'   => true,
    'posts_per_page' => 3,
    'offset'     =>  3,
    'orderby' => 'menu_order',
    'order'   => 'ASC',
);
$featured_2_apts = new WP_Query( $featured_apts_2_arg );


?>

<section id="hero" class="container-xl pos-relative py-5 px-2">
    <?php if( !empty( $hero_image ) ): ?>
        <img class="bg-image" src="<?= esc_url($hero_image['url']); ?>" alt="<?= esc_attr($hero_image['alt']); ?>" />	
    <?php endif; ?>	
    <div class="heading-wrapper card w-md-25">
        <div class="card-body">
            <h1 class="heading-wrapper__title txt-dark-blue"> <span class="txt-blue"><?php the_field('hero_heading_top'); ?><br></span><?php the_field('hero_heading_bot'); ?></h1>
            <p class="heading-wrapper__description pt-3 m-0"><?php the_field('hero_subheading'); ?></p>
        </div>
    </div>
    <div class="pl-3 pl-md-5">
        <div class="row w-md-25 d-grid gap-2 d-md-block pt-4 pt-md-5 py-2">
            <div class="d-grid gap-2 d-md-block" style="z-index: 100;">
            <?php if(have_rows('hero_buttons')): ?>
                    <?php while( have_rows('hero_buttons')) : the_row(); ?>
                        <a class="btn <?php the_sub_field('hero_buttons_class'); ?>" href="<?php the_sub_field('hero_buttons_link'); ?>"><?php the_sub_field('hero_buttons_text'); ?></a>
                    <?php  endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
        <form>
            <div class="search-wrapper row w-75">
                <?php if(have_rows('hero_search_field')): ?>
                    <?php while( have_rows('hero_search_field')) : the_row(); ?>
                        <div class="col-12 col-lg-col <?php the_sub_field('search_field_class'); ?>">
                            <div class="input-group flex-wrap">
                                <label class="hero-sml-gray-txt input-group-text w-100 bg-transparent border-0" id="addon-wrapping"><?php the_sub_field('search_field_label'); ?></label>
                                <input 
                                type="text" 
                                class="hero-sml-blue-txt form-control w-100 border-0"  
                                aria-describedby="addon-wrapping"
                                <?php if(have_rows('search_field_input')): ?>
                                    <?php while( have_rows('search_field_input')) : the_row(); ?>
                                        placeholder="<?php the_sub_field('search_field_input_placeholder'); ?>" 
                                        aria-label="<?php the_sub_field('search_field_input_placeholder'); ?>"
                                    <?php  endwhile; ?>
                                <?php endif; ?>>
                            </div>
                        </div>
                    <?php  endwhile; ?>
                <?php endif; ?>
                <div class="col-12 col-md-col col-xl-4 py-2 py-md-0 d-xl-flex align-items-center justify-content-center">
                    <a class="btn btn-link px-0 px-sm-3">+ Advanced Filter</a>
                    <button type="submit" class="hero-search-btn btn btn-primary btn-lg">Search</button>
                </div>
            </div>
        </form>
    </div>
</section>

<main>
    <!-- Row-2 -->
    <section class="apt-select-wrapper container">
        <div class="top-txt-wrapper pt-5 mt-md-5 row">
            <h2 class="top-txt__heading col-12 text-center p-0 mb-4 mb-md-5"><?php the_field('row-2_heading_top'); ?> <br><span class="txt-blue"><?php the_field('row-2_heading_bot'); ?></span></h2>
            <p class="top-txt__description col-12 text-center mb-4 mb-md-5"><?php the_field('row-2_subheading'); ?></p>
        </div>
        <div class="row m-0 flex-lg-nowrap">
            <?php if ( $apartments_query->have_posts() ) : ?> 
                <?php while ( $apartments_query->have_posts() ) : $apartments_query->the_post(); ?>
                    <div class="apt-cards-wrapper col-12 col-md-6 col-lg-3 card mb-4 mx-auto mb-md-3" style="max-width: 250px;">
                        <a href="<?php the_field('card_link'); ?>">
                            <img src="<?= esc_url( get_field('card_image') ); ?>" alt="<?php the_title_attribute(); ?> apartment" class="card-img-top">
                            <div class="card-body pt-4 pb-0">
                                <p class="card-text text-center"><?php the_field('card_title'); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center mt-3">
            <a class="apt-select-btn btn btn-primary" href="<?php the_field('row-2_continue_btn_link'); ?>"><?php the_field('row-2_continue_btn_text'); ?></a>
        </div>
    </section>
    <!-- Row-3 -->
    <section class="apt-featured-wrapper pb-5">
        <div class="top-txt-wrapper pt-5 mt-md-5 row">
            <h2 class="top-txt__heading col-12 text-center mb-4 mb-md-5"><?php the_field('row-3_heading'); ?></span></h2>
            <p class="top-txt__description col-12 text-center mb-4 mb-md-5"><?php the_field('row-3_subheading'); ?></p>
        </div>
        <div data-bs-interval="false" id="carouselExampleIndicators" class="carousel slide container-fluid mw-big" data-bs-ride="carousel">
            <div class="carousel-inner d-md-flex pb-3">
                <button class="carousel-control carousel-control-prev d-none d-lg-block" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="font-size: 2.5rem;">&#x3c;</span>
                </button>
                <div class="flex-column flex-lg-row align-items-center justify-content-center carousel-item active">
                    <?php if ( $featured_1_apts->have_posts() ) : ?> 
                        <?php while ( $featured_1_apts->have_posts() ) : $featured_1_apts->the_post(); ?>
                            <div class="card mr-md-2 <?php the_field('featured_card_class'); ?>" style="max-width: 18rem;">
                                <img src="<?= esc_url( get_field('featured_image')['url'] ); ?>" alt="<?php the_title_attribute(); ?> apartment" class="card-img-top">
                                <div class="apt-card card-body">
                                    <p class="card-title apt-card-heading mb-2"><i class="fa fa-map-marker mr-1" style="font-size:25px;color:#FE7847"></i> <?php the_field('featured_title'); ?></p>
                                    <p class="apt-card__cost mb-0"> <span>&#36;</span> <?php the_field('featured_price'); ?></p>
                                    <p class="apt-card__location mb-3"><?php the_field('featured_location'); ?></p>
                                    <p class="apt-card__description card-text"><?php the_field('featured_description'); ?></p>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="apt-card-info-wrap p-1 list-group d-flex flex-row">
                                        <div class="d-flex flex-column w-100 justify-content-between">
                                            <p class="mb-1 txt-blue"><?php the_field('featured_bedrooms'); ?> <span class="ml-1" style="color:rgb(54, 54, 54)"> <i class="fa fa-bed"></i></span> </p>
                                            <p class="mb-1 apt-card-info-txt">Bedrooms</p>
                                        </div>
                                        <div class="d-flex flex-column w-100 justify-content-between">
                                            <p class="mb-1 txt-blue"><?php the_field('featured_bathrooms'); ?> <span class="ml-1" style="color:rgb(54, 54, 54);"><i class="fa fa-bath"></i></span> </p>
                                            <p class="mb-1 apt-card-info-txt">Bathrooms</p>
                                        </div>
                                        <div class="d-flex flex-column w-100 justify-content-between">
                                            <p class="mb-1 txt-blue"><?php the_field('featured_sqft'); ?><span class="ml-1" style="color:rgb(54, 54, 54);"><i class="fa fa-square-o"></i></span> </p>
                                            <p class="mb-1 apt-card-info-txt">Square Ft</p>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check d-none" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary d-flex align-items-center border-0 mb-0" for="btnradio1"><span><i class="fa fa-heart"></i></span></label>
                                    
                                        <input type="radio" class="btn-check d-none" name="btnradio" id="btnradio2" autocomplete="off">
                                        <label class="btn btn-outline-primary d-flex align-items-center border-0 mb-0" for="btnradio2">&#43;</label>
                                    
                                        <input type="radio" class="btn-check d-none" name="btnradio" id="btnradio3" autocomplete="off">
                                        <label class="btn btn-outline-primary d-flex align-items-center border-0 mb-0" for="btnradio3">&#167;</label>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <div class="flex-column flex-lg-row align-items-center justify-content-center carousel-item">
                    <?php if ( $featured_2_apts->have_posts() ) : ?> 
                        <?php while ( $featured_2_apts->have_posts() ) : $featured_2_apts->the_post(); ?>
                        <?php $featured_image = get_field('featured_image'); ?>
                            <div class="card mr-md-2 <?php the_field('featured_card_class'); ?>" style="max-width: 18rem;">
                                <img src="<?= esc_url( $featured_image['url'] ); ?>" alt="<?php the_title_attribute(); ?> apartment" class="card-img-top">
                                <div class="apt-card card-body">
                                    <p class="card-title apt-card-heading mb-2"><i class="fa fa-map-marker mr-1" style="font-size:25px;color:#FE7847"></i> <?php the_field('featured_title'); ?></p>
                                    <p class="apt-card__cost mb-0"> <span>&#36;</span> <?php the_field('featured_price'); ?></p>
                                    <p class="apt-card__location mb-3"><?php the_field('featured_location'); ?></p>
                                    <p class="apt-card__description card-text"><?php the_field('featured_description'); ?></p>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="apt-card-info-wrap p-1 list-group d-flex flex-row">
                                        <div class="d-flex flex-column w-100 justify-content-between">
                                            <p class="mb-1 txt-blue"><?php the_field('featured_bedrooms'); ?> <span class="ml-1" style="color:rgb(54, 54, 54)"> <i class="fa fa-bed"></i></span> </p>
                                            <p class="mb-1 apt-card-info-txt">Bedrooms</p>
                                        </div>
                                        <div class="d-flex flex-column w-100 justify-content-between">
                                            <p class="mb-1 txt-blue"><?php the_field('featured_bathrooms'); ?> <span class="ml-1" style="color:rgb(54, 54, 54);"><i class="fa fa-bath"></i></span> </p>
                                            <p class="mb-1 apt-card-info-txt">Bathrooms</p>
                                        </div>
                                        <div class="d-flex flex-column w-100 justify-content-between">
                                            <p class="mb-1 txt-blue"><?php the_field('featured_sqft'); ?> <span class="ml-1" style="color:rgb(54, 54, 54);"><i class="fa fa-square-o"></i></span> </p>
                                            <p class="mb-1 apt-card-info-txt">Square Ft</p>
                                        </div>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check d-none" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary d-flex align-items-center border-0 mb-0" for="btnradio1"><span><i class="fa fa-heart"></i></span></label>
                                    
                                        <input type="radio" class="btn-check d-none" name="btnradio" id="btnradio2" autocomplete="off">
                                        <label class="btn btn-outline-primary d-flex align-items-center border-0 mb-0" for="btnradio2">&#43;</label>
                                    
                                        <input type="radio" class="btn-check d-none" name="btnradio" id="btnradio3" autocomplete="off">
                                        <label class="btn btn-outline-primary d-flex align-items-center border-0 mb-0" for="btnradio3">&#167;</label>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
                <button class="carousel-control carousel-control-next d-none d-lg-block" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true" style="font-size: 2.5rem;">&#x3e;</span>
                </button>
            </div>
            <div class="carousel-indicators d-none d-lg-flex justify-content-center">
                <button class="active carousel-indicator mr-2" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                <button class="carousel-indicator" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
        </div>
    </section>
    <!-- Row-4 -->
    <section class="apt-plans-wrapper py-5">
        <div class="top-txt-wrapper row">
            <h2 class="top-txt__heading col-12 text-center mb-4 mb-md-5"><?php the_field('row-4_heading'); ?></span></h2>
        </div>                
        <ul class="row nav nav-tabs mx-auto border-0 pb-4" id="myTab" role="tablist" style="max-width: 550px;">
            <li class="col-12 col-md-4 nav-item" role="presentation">
                <button class="apt-plans-btn nav-link mx-auto active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home, home2" aria-selected="true">The Studio</button>
            </li>
            <li class="col-12 col-md-4 nav-item" role="presentation">
                <button class="apt-plans-btn nav-link mx-auto" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile, profile2" aria-selected="false">Deluxe Portion</button>
            </li>
            <li class="col-12 col-md-4 nav-item" role="presentation">
                <button class="apt-plans-btn nav-link mx-auto" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Penthouse</button>
            </li>
        </ul>
        <div class="container-fluid">
            <div class="tab-content-bg p-2 p-md-5 mx-auto mw-xlrg" id="myTabContent">
                <div class="row d-flex tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-12 col-lg-6 studio-left mx-auto p-3 p-md-5">
                        <h3 class="studio-left__title">The Studio</h3>
                        <p class="studio-left__description">Boasting chic interiors, three private balconies and a remarkable terrace, this two bedroom apartment will epitomise complete luxury. Not only will residents benefit from a superb location in the heart of Shoreditch, but they will also enjoy unrivalled facilities and a 24-hour bespoke concierge.</p>
                        <ul class="studio-left__list list-unstyled">
                            <li>Total Area<span>……………………………</span>2800 Sq. Ft</li>
                            <li>Bedroom<span>………………………</span>2500 Sq. Ft</li>
                            <li>Bathroom<span>………………………</span>2200 Sq. Ft</li>
                            <li>Smoking/ pets<span>…………………</span>1800 Sq. Ft</li>
                            <li>Lounge<span>………………………</span>1000 Sq. Ft</li>
                        </ul>
                    </div>
                    <div class="studio-right col-12 col-lg-6 pt-5 pt-lg-0">
                        <img class="d-block mx-auto h-100 w-100" style="object-fit: contain; max-width: 550px;" src="/assets/apt-plans-1.jpg" alt="">
                    </div>
                </div>
                <div class="row d-flex tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-12 col-lg-6 studio-left mx-auto p-3 p-md-5">
                        <h3 class="studio-left__title">Deluxe Portions</h3>
                        <p class="studio-left__description">Boasting chic interiors, three private balconies and a remarkable terrace, this two bedroom apartment will epitomise complete luxury. Not only will residents benefit from a superb location in the heart of Shoreditch, but they will also enjoy unrivalled facilities and a 24-hour bespoke concierge.</p>
                        <ul class="studio-left__list list-unstyled">
                            <li>Total Area<span>………………………</span>2800 Sq. Ft</li>
                            <li>Bedroom<span>………………………</span>2500 Sq. Ft</li>
                            <li>Bathroom<span>…………………………</span>2200 Sq. Ft</li>
                            <li>Smoking/ pets<span>……………</span>1800 Sq. Ft</li>
                            <li>Lounge<span>…………………………</span>1000 Sq. Ft</li>
                        </ul>
                    </div>
                    <div class="studio-right col-12 col-lg-6 pt-5 pt-lg-0">
                        <img class="d-block mx-auto h-100 w-100" style="object-fit: contain; max-width: 550px;" src="/assets/apt-plans-1.jpg" alt="">
                    </div>
                </div>
                <div class="row d-flex tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="col-12 col-lg-6 studio-left mx-auto p-3 p-md-5">
                        <h3 class="studio-left__title">Penthouse</h3>
                        <p class="studio-left__description">Boasting chic interiors, three private balconies and a remarkable terrace, this two bedroom apartment will epitomise complete luxury. Not only will residents benefit from a superb location in the heart of Shoreditch, but they will also enjoy unrivalled facilities and a 24-hour bespoke concierge.</p>
                        <ul class="studio-left__list list-unstyled">
                            <li>Total Area<span>………………</span>2800 Sq. Ft</li>
                            <li>Bedroom<span>…………………</span>2500 Sq. Ft</li>
                            <li>Bathroom<span>………………</span>2200 Sq. Ft</li>
                            <li>Smoking/ pets<span>…</span>1800 Sq. Ft</li>
                            <li>Lounge<span>……………</span>1000 Sq. Ft</li>
                        </ul>
                    </div>
                    <div class="studio-right col-12 col-lg-6 pt-5 pt-lg-0">
                        <img class="d-block mx-auto h-100 w-100" style="object-fit: contain; max-width: 550px;" src="/assets/apt-plans-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ROW - 5 -->
    <section class="apt-video-wrapper mt-5 mx-auto mw-xxlrg">
        <div class="row">
            <div class="col-12 col-lg-4 text-center text-lg-left pb-5 pb-lg-0 pl-0 pl-lg-5">
                <h4 class="apt-location-heading pt-3 pt-lg-5"><?php the_field('row-5_heading--1'); ?> <br><?php the_field('row-5_heading--2'); ?><br> <?php the_field('row-5_heading--3'); ?> <span class="txt-blue"><?php the_field('row-5_heading--4'); ?></span></h4>
                <a href="<?php the_field('row-5_button_main_link'); ?>" role="button" class="btn btn-primary mt-4 py-3 px-4"><?php the_field('row-5_button_main_text'); ?></a>
            </div>
            <div class="col-12 col-lg-8 position-relative" style="height:450px">
                <img class="dotted-bg w-50" src="<?= esc_url( $row_5_dotted_image['url'] ); ?>" alt="<?= esc_attr( $row_5_dotted_image['alt'] ); ?>">
                <img class="image-bg mx-auto mx-lg-0 w-75" src="<?= esc_url( $row_5_big_image['url'] ); ?>" alt="<?= esc_attr( $row_5_big_image['alt'] ); ?>">
                <img class="video-bg mx-auto mx-lg-0 w-75"  src="<?= esc_url( $row_5_video_image['url'] ); ?>" alt="<?= esc_attr( $row_5_video_image['alt'] ); ?>">
                <a href="<?php the_field('row-5_video_button_link'); ?>" target="_blank" role="button" class="btn video-player-btn d-flex justify-content-center align-items-center">&#x276F;</a>
            </div>
        </div>
    </section>
    <!-- ROW - 6 -->
    <section class="apt-amenities-wrapper">
        <div class="top-txt-wrapper pt-5 mt-md-5 row">
            <p class="top-txt__description-blue col-12 text-center mb-2"><?php the_field('row-6_heading_top'); ?></p>
            <h2 class="top-txt__heading col-12 text-center mb-4 mb-md-5"><?php the_field('row-6_heading_bottom'); ?></span></h2>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            <?php if(have_rows('row-6_listings')): ?>
                <?php while( have_rows('row-6_listings')) : the_row(); ?>
                <?php $row_6_card_image = get_sub_field('featured_card_image'); ?>
                    <div class="col-12 col-md-3">
                        <div class="card h-100">
                            <div class="card-img-bg d-flex align-items-center mx-auto">
                                <img class="amenities-card-img card-img-top" src="<?php echo $row_6_card_image['url']; ?>" alt="<?php echo $row_6_card_image['alt']; ?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php the_sub_field('card_title'); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php  endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</main>


<?php
get_footer();