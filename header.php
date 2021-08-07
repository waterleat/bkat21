<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bka2021
 */

$membership_login_url = "https://membership.britishkendoassociation.com/login.php";

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>   style="background-image: url( <?php bloginfo( 'template_directory' ); ?>/assets/dist/images/navy_blue.png ); background-repeat: repeat;  background-attachment: scroll; ">
	<!-- can style be added using wp_body_open -->
	<?php wp_body_open(); ?>
	<div id="page" class="site w-full md:container mx-auto text-grey055 font-body text-sm lg:text-base" <?php echo ! is_customize_preview() ? '' : 'style="padding: 0 40px;"'; ?>>
		<header id="masthead" class="w-full bg-white" >

				<div id="headerblock" class="relative flex flex-col  md:flex-row h-auto px-3"  role="banner">
					<?php
					if ( is_customize_preview() ) {
						echo '<div id="bka2021-header-control"></div>';
					}
					?>

					<!-- logo & title -->
					<div class="relative logo mx-auto pt-6 md:pb-4 md:pt-0 md:pl-2  md:m-0 z-10">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php bloginfo( 'template_directory' ); ?>/assets/dist/images/BKA_logo.png" alt="logo">
						</a>
					</div>
					<div class="absolute inset-0  md:relative md:mx-auto ">
						<h3 class="font-display text-center md:text-left m-0 text-xl pt-32 md:pt-16 md:text-2xl lg:text-4xl text-indigo-900">BRITISH KENDO ASSOCIATION</h3>
					</div>

					<!-- membership agm Logout buttons -->
					<div class="absolute top-0 right-0">
						<div class="flex flex-col justify-around content-around md:flex-row md:w-100 lg:w-128 mr-2 md:mr-0 md:py-2">
							<a href="<?php echo esc_url( $membership_login_url ); ?>" class="mt-2 md:mr-2 px-2 py-1 md:py-2 border border-yellow-600 rounded text-white text-center bg-gradient-to-r from-yellow-600 to-red-500 hover:from-red-500 hover:to-yellow-600 hover:text-white hover:no-underline" alt="<?php esc_attr_e( 'Login', 'bka2021' ); ?>"><span class="dashicons dashicons-admin-home"></span><span class="sm:hidden"> Members / Join</span><span class="hidden sm:inline"> Member's Area / Join</span></a>
							<?php
							if (! is_user_logged_in() ) { ?>
								<a href="<?php echo esc_url( get_permalink( get_page_by_title( 'AGM 2021' ) ) ); ?>" class="mt-2 md:mr-2 px-2 py-1 md:py-2 bg-gradient-to-r from-yellow-600 to-red-500 border border-yellow-600 rounded text-white text-right xs:text-center  hover:from-red-500 hover:to-yellow-600 hover:text-white hover:no-underline" alt="<?php esc_attr_e( 'AGM 2021', 'bka2021' ); ?>"><span class="dashicons dashicons-groups"></span><span class=""> 2021 AGM</span></a>
							<?php } else { ?>
								<!-- /?p=4697 -->
								<a href="<?php echo site_url( 'index.php/agmitem/agm-discussion-area' ); ?>" class="mt-2 md:mr-2 px-2 py-1 md:py-2 bg-gradient-to-r from-yellow-600 to-red-500 border border-yellow-600 rounded text-white text-right xs:text-center  hover:from-red-500 hover:to-yellow-600 hover:text-white hover:no-underline" alt="<?php esc_attr_e( 'AGM 2021', 'bka2021' ); ?>"><span class="dashicons dashicons-groups"></span><span class=""> 2021 AGM</span></a>
								<a href="<?php echo esc_url( home_url('wp-login.php?action=logout') ); ?>" class="mt-2 md:mr-2 px-2 py-1 md:py-2 bg-gradient-to-r from-yellow-600 to-red-500 border border-yellow-600 rounded text-white text-right xs:text-center  hover:from-red-500 hover:to-yellow-600 hover:text-white hover:no-underline" alt="<?php esc_attr_e( 'AGM 2021', 'bka2021' ); ?>"><span class="dashicons dashicons-external"></span><span class=""> Logout</span></a>
							<?php } ?>
						</div>
					</div>

					<!-- menus -->
					<div class="hidden md:block md:absolute md:bottom-0 md:right-0">
						<nav id="site-navigation" class="flex-col justify-center " role="navigation">
							<?php
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_id'        => 'primary-menu',
										'walker'         => new Bka2021\Core\WalkerNav(),
										'container'      => 'ul',
										'menu_class'     => 'text-sm mr-3 lg:mr-6 my-2 li-px-2 lg:li-px-3 li-py-2 flex md:justify-end',
									)
								);
							}
							?>
						</nav>
					</div>

				</div>

		</header>

		<div id="content" class="site-content">
