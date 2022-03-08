<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package colinfeb2022
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

<style>
	.active > a {
		color: #47b2e4;
	}

	.my-class > a {
		padding: 8px 20px;
		margin-left: 30px;
		border-radius: 50px;
		color: #fff;
		font-size: 14px;
		border: 2px solid #47b2e4;
		font-weight: 600;
	}

	.my-class > a:hover {
		color: #fff !important;
		background: #31a9e1 !important;
	}

</style>

	<header id="header" class="fixed-top mb-5 pb-5">
		<p><?php the_field('header_global_text', 'option'); ?></p>
		<div class="container d-flex align-items-center">
			<h1 class="logo me-auto"><a href="index.html">Arsha</a></h1>
			<nav id="navbar" class="navbar">
				<?php wp_nav_menu( array( 'menu' => 'Main Menu') ) ?>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
		</div>
	</header><!-- End Header -->
