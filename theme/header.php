<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'community-fabricator' ); ?></a>

		<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary shadow">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'community-fabricator' ); ?>">
					<span class="navbar-toggler-icon"></span>
				</button>




				<div class="collapse navbar-collapse" id="navbarSupportedContent-555">

					<form method="get" id="navbar-searchform" class="inline-form" action="http://localhost:22080/" role="search">
						<label class="sr-only" for="s">Search</label>
						<div class="input-group">
							<input class="field form-control form-control-sm" id="s" name="s" type="text" placeholder="Search …" value="">
							<span class="input-group-append">
								<input class="submit btn btn-secondary btn-sm" id="navbar-searchsubmit" name="submit" type="submit" value="Search">
							</span>
						</div>
					</form>

					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'depth'           => 2,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>

					<!--ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Features</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Pricing</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown"
							   aria-haspopup="true" aria-expanded="false">Dropdown
							</a>
							<div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
					</ul-->

					<?php if (is_user_logged_in()) { ?>
						<ul class="navbar-nav ml-auto nav-flex-icons">
							<li class="nav-item">
								<a class="nav-link waves-effect waves-light">1
									<i class="fas fa-envelope"></i>
								</a>
							</li>
							<li class="nav-item avatar dropdown">
								<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
								   aria-haspopup="true" aria-expanded="false">
									<!--img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0"
										 alt="avatar image"-->
									<?php echo get_avatar(get_current_user_id(), 20, '', '', ['class' => 'rounded-circle z-depth-0']); ?>
								</a>
								<div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary shadow"
									 aria-labelledby="navbarDropdownMenuLink-55">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><?php esc_html_e( 'Logout', 'community-fabricator' ); ?></a>
								</div>
							</li>
						</ul>
					<?php } else { ?>
						<ul class="navbar-nav ml-auto nav-flex-icons">
							<li class="nav-item">
								<a href="<?php echo esc_url( home_url( '/register' ) ); ?>" class="nav-link waves-effect waves-light">
									<?php esc_html_e( 'Register', 'community-fabricator' ); ?>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo esc_url( home_url( '/login' ) ); ?>" class="nav-link waves-effect waves-light">
									<?php esc_html_e( 'Login', 'community-fabricator' ); ?>
								</a>
							</li>
						</ul>
					<?php } ?>
				</div>

			<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
