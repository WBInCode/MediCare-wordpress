<?php
/**
 * Hero Section — Full-screen with video/image background
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_title    = get_theme_mod( 'bellezza_hero_title', __( 'Gdzie Piękno Spotyka Naukę', 'bellezza' ) );
$hero_subtitle = get_theme_mod( 'bellezza_hero_subtitle', __( 'Zabiegi estetyczne premium w atmosferze luksusu i spokoju', 'bellezza' ) );
$hero_cta      = get_theme_mod( 'bellezza_hero_cta', __( 'Odkryj Nasze Zabiegi', 'bellezza' ) );
$hero_cta2     = get_theme_mod( 'bellezza_hero_cta2', __( 'Umów Konsultację', 'bellezza' ) );
$hero_video    = get_theme_mod( 'bellezza_hero_video', '' );
$hero_image    = get_theme_mod( 'bellezza_hero_image', '' );
?>

<section id="hero" class="hero" aria-label="<?php esc_attr_e( 'Sekcja główna', 'bellezza' ); ?>">
	<div class="hero__bg">
		<?php if ( ! empty( $hero_video ) ) : ?>
			<video class="hero__video" autoplay muted loop playsinline preload="metadata" aria-hidden="true">
				<source src="<?php echo esc_url( $hero_video ); ?>" type="video/mp4">
			</video>
		<?php elseif ( ! empty( $hero_image ) ) : ?>
			<img class="hero__image" src="<?php echo esc_url( $hero_image ); ?>" alt="" loading="eager" fetchpriority="high">
		<?php endif; ?>
		<div class="hero__overlay" aria-hidden="true"></div>
	</div>

	<div class="hero__content">
		<div class="container">
			<span class="hero__badge reveal-up"><?php echo esc_html( get_theme_mod( 'bellezza_hero_badge', __( '✦ Klinika Premium Beauty', 'bellezza' ) ) ); ?></span>
			<h1 class="hero__title font-heading reveal-up reveal-delay-1"><?php echo esc_html( $hero_title ); ?></h1>
			<p class="hero__subtitle reveal-up reveal-delay-2"><?php echo esc_html( $hero_subtitle ); ?></p>
			<div class="hero__actions reveal-up reveal-delay-3">
				<a href="#services" class="btn btn--accent btn--lg"><?php echo esc_html( $hero_cta ); ?></a>
				<a href="#booking" class="btn btn--outline btn--lg"><?php echo esc_html( $hero_cta2 ); ?></a>
			</div>
		</div>
	</div>

	<div class="hero__scroll" aria-hidden="true">
		<span class="hero__scroll-text"><?php esc_html_e( 'Przewiń', 'bellezza' ); ?></span>
		<span class="hero__scroll-line"></span>
	</div>
</section>
