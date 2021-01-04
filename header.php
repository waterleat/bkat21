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
		<header id="masthead" class="w-full bg-white" style="background-image: url( <?php bloginfo( 'template_directory' ); ?>/assets/dist/images/BKA_text1.jpg ); background-repeat: no-repeat; background-position: center center; background-attachment: scroll; background-size: 100% auto;">

				<div id="headerblock" class="relative flex flex-col  md:flex-row h-auto px-3"  role="banner">
					<?php
					if ( is_customize_preview() ) {
						echo '<div id="bka2021-header-control"></div>';
					}
					?>

					<div class="logo mx-auto md:ml-0 pb-6 md:pt-0 md:pb-4  md:my-0 px-2">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php bloginfo( 'template_directory' ); ?>/assets/dist/images/BKA_logo.png" class="">
						</a>
					</div>

					<div class="absolute top-0 right-0">
						<div class="flex flex-col justify-around content-around md:flex-row md:w-80 h-full my-4 mr-2 md:mr-0">
							<?php
							if ( is_user_logged_in() ) {
								?>
								<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class=" py-1 md:py-2 px-2 md:px-3 bg-orange-600 border border-orange-600 rounded text-white text-center hover:bg-orange-700 hover:no-underline" alt="<?php esc_attr_e( 'Logout', 'bka2021' ); ?>">
									<span class="dashicons dashicons-migrate"></span> Logout</a>
									<a href="<?php echo get_page_link( get_page_by_title( 'ind member' )->ID ); ?>" class="mx-auto md:mx-4 my-3 md:my-2 text-black<?php echo ( is_user_logged_in() ? ' ' : ' hidden' ); ?>"><span class="text-2xl dashicons dashicons-universal-access-alt hover:text-blue-700 hover:no-underline" alt="member profile" title="member profile"></span>
									</a>
									<a href="<?php echo get_page_link( get_page_by_title( 'member options' )->ID ); ?>" class="py-1 md:py-2 px-2 md:px-3 bg-orange-600 border border-orange-600 rounded text-white text-center hover:bg-orange-700 hover:no-underline" alt="<?php esc_attr_e( 'Options', 'bka2021' ); ?>"><span class="dashicons dashicons-admin-settings"></span> Options</a>
								<?php
							} else {
								?>
								<a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" class=" py-1 md:py-2 px-2 md:px-3 bg-orange-600 border border-orange-600 rounded text-white text-center hover:bg-orange-700 hover:no-underline" alt="<?php esc_attr_e( 'Login', 'bka2021' ); ?>"><span class="dashicons dashicons-admin-home"></span> Login / Register'</a>
								<?php
							}
							?>
						</div>
					</div>


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
										// 'menu_class'     => 'text-sm mr-3 lg:mr-6 my-2 li-px-2 lg:li-px-3 li-py-2 hidden md:flex md:justify-end',
										'menu_class'     => 'text-sm mr-3 lg:mr-6 my-2 li-px-2 lg:li-px-3 li-py-2 flex md:justify-end',
										// 'menu_class'     => ' text-lg hidden xs:flex li-px-2 li-py-2 sm:justify-end ',
									)
								);
							}
							?>
						</nav>
					</div>
					<div class="sn">

					</div>

				</div>

		</header>

		<div id="content" class="site-content">
