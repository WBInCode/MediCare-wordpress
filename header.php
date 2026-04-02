<?php
/**
 * Header template
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
	<?php esc_html_e( 'Przejdź do treści', 'bellezza' ); ?>
</a>

<header id="masthead" class="site-header" role="banner">
	<div class="header-inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-text" rel="home">
					<span class="logo-main"><?php bloginfo( 'name' ); ?></span>
					<?php
					$bellezza_description = get_bloginfo( 'description', 'display' );
					if ( $bellezza_description ) :
						?>
						<span class="logo-tagline"><?php echo esc_html( $bellezza_description ); ?></span>
					<?php endif; ?>
				</a>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Nawigacja główna', 'bellezza' ); ?>">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Otwórz menu', 'bellezza' ); ?>">
				<span class="hamburger">
					<span class="hamburger__line"></span>
					<span class="hamburger__line"></span>
					<span class="hamburger__line"></span>
				</span>
			</button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'fallback_cb'    => false,
				'items_wrap'     => '<ul id="%1$s" class="%2$s" role="list">%3$s</ul>',
			) );
			?>
		</nav>

		<div class="header-cta">
			<a href="#booking" class="btn btn--primary btn--sm">
				<?php echo esc_html( get_theme_mod( 'bellezza_header_cta_text', __( 'Rezerwuj', 'bellezza' ) ) ); ?>
			</a>
		</div>
	</div>
</header>

<main id="primary" class="site-main">
