<?php
/**
 * Services Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$services = array(
	array(
		'icon'  => '💎',
		'title' => get_theme_mod( 'bellezza_service_1_title', __( 'Odmładzanie Twarzy', 'bellezza' ) ),
		'desc'  => get_theme_mod( 'bellezza_service_1_desc', __( 'Zaawansowane zabiegi na twarz, w tym botoks, wypełniacze i nieoperacyjne liftingi dla młodszego, odświeżonego wyglądu.', 'bellezza' ) ),
		'image' => get_theme_mod( 'bellezza_service_1_image', '' ),
	),
	array(
		'icon'  => '✨',
		'title' => get_theme_mod( 'bellezza_service_2_title', __( 'Modelowanie Sylwetki', 'bellezza' ) ),
		'desc'  => get_theme_mod( 'bellezza_service_2_desc', __( 'Wyrzeźb i ukształtuj sylwetkę dzięki nieinwazyjnym zabiegom: kriolipolizie, radiofrekwencji i terapii ultradźwiękami.', 'bellezza' ) ),
		'image' => get_theme_mod( 'bellezza_service_2_image', '' ),
	),
	array(
		'icon'  => '🌸',
		'title' => get_theme_mod( 'bellezza_service_3_title', __( 'Pielęgnacja Skóry', 'bellezza' ) ),
		'desc'  => get_theme_mod( 'bellezza_service_3_desc', __( 'Spersonalizowane zabiegi skórne, w tym peelingi chemiczne, mikronakłuwanie i terapia LED dla promiennej, zdrowej cery.', 'bellezza' ) ),
		'image' => get_theme_mod( 'bellezza_service_3_image', '' ),
	),
	array(
		'icon'  => '⚡',
		'title' => get_theme_mod( 'bellezza_service_4_title', __( 'Zabiegi Laserowe', 'bellezza' ) ),
		'desc'  => get_theme_mod( 'bellezza_service_4_desc', __( 'Precyzyjna terapia laserowa: depilacja, rewitalizacja skóry, usuwanie przebarwień i zabiegi naczyniowe.', 'bellezza' ) ),
		'image' => get_theme_mod( 'bellezza_service_4_image', '' ),
	),
	array(
		'icon'  => '🧬',
		'title' => get_theme_mod( 'bellezza_service_5_title', __( 'Terapia PRP', 'bellezza' ) ),
		'desc'  => get_theme_mod( 'bellezza_service_5_desc', __( 'Wykorzystaj moc własnych czynników wzrostu do odmłodzenia skóry, odbudowy włosów i przyspieszonej regeneracji.', 'bellezza' ) ),
		'image' => get_theme_mod( 'bellezza_service_5_image', '' ),
	),
	array(
		'icon'  => '🌿',
		'title' => get_theme_mod( 'bellezza_service_6_title', __( 'Wellness i Spa', 'bellezza' ) ),
		'desc'  => get_theme_mod( 'bellezza_service_6_desc', __( 'Luksusowe zabiegi spa: masaże terapeutyczne, aromaterapia i holistyczne rytuały dla pełnego relaksu.', 'bellezza' ) ),
		'image' => get_theme_mod( 'bellezza_service_6_image', '' ),
	),
);
?>

<section id="services" class="section section--services" aria-labelledby="services-heading">
	<div class="container">
		<div class="section-header text-center reveal-up">
			<span class="section-label"><?php esc_html_e( 'Nasze Usługi', 'bellezza' ); ?></span>
			<h2 id="services-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_services_title', __( 'Zabiegi, które oferujemy', 'bellezza' ) ) ); ?></h2>
			<div class="section-divider section-divider--center" aria-hidden="true"></div>
			<p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'bellezza_services_subtitle', __( 'Odkryj nasz kompleksowy wachlarz zabiegów estetycznych premium', 'bellezza' ) ) ); ?></p>
		</div>

		<div class="services-grid">
			<?php foreach ( $services as $i => $service ) : ?>
				<article class="service-card reveal-up reveal-delay-<?php echo esc_attr( $i % 3 ); ?>">
					<div class="service-card__image-wrap">
						<?php if ( ! empty( $service['image'] ) ) : ?>
							<img src="<?php echo esc_url( $service['image'] ); ?>" alt="<?php echo esc_attr( $service['title'] ); ?>" class="service-card__image" loading="lazy">
						<?php else : ?>
							<div class="service-card__image-placeholder"></div>
						<?php endif; ?>
						<div class="service-card__overlay">
							<span class="service-card__icon" aria-hidden="true"><?php echo esc_html( $service['icon'] ); ?></span>
						</div>
					</div>
					<div class="service-card__content">
						<h3 class="service-card__title font-heading"><?php echo esc_html( $service['title'] ); ?></h3>
						<p class="service-card__desc"><?php echo esc_html( $service['desc'] ); ?></p>
						<a href="#booking" class="service-card__link">
						<?php esc_html_e( 'Dowiedz się więcej', 'bellezza' ); ?>
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
