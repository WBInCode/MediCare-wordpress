<?php
/**
 * Pricing Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$plans = array(
	array(
		'name'     => get_theme_mod( 'bellezza_plan_1_name', __( 'Podstawowy', 'bellezza' ) ),
		'price'    => get_theme_mod( 'bellezza_plan_1_price', '199 zł' ),
		'period'   => get_theme_mod( 'bellezza_plan_1_period', __( 'za zabieg', 'bellezza' ) ),
		'features' => get_theme_mod( 'bellezza_plan_1_features', "Podstawowy zabieg facial\nAnaliza skóry\nSpersonalizowany plan pielęgnacji\nProdukty do pielęgnacji\nKonsultacja 30 min" ),
		'featured' => false,
	),
	array(
		'name'     => get_theme_mod( 'bellezza_plan_2_name', __( 'Premium', 'bellezza' ) ),
		'price'    => get_theme_mod( 'bellezza_plan_2_price', '399 zł' ),
		'period'   => get_theme_mod( 'bellezza_plan_2_period', __( 'za zabieg', 'bellezza' ) ),
		'features' => get_theme_mod( 'bellezza_plan_2_features', "Zaawansowany facial\nMikronakłuwanie lub peeling chemiczny\nTerapia LED\nProdukty premium\nKonsultacja 60 min\nWizyta kontrolna" ),
		'featured' => true,
	),
	array(
		'name'     => get_theme_mod( 'bellezza_plan_3_name', __( 'Pakiet Luxe', 'bellezza' ) ),
		'price'    => get_theme_mod( 'bellezza_plan_3_price', '799 zł' ),
		'period'   => get_theme_mod( 'bellezza_plan_3_period', __( 'za zabieg', 'bellezza' ) ),
		'features' => get_theme_mod( 'bellezza_plan_3_features', "Pełny zabieg twarzy i ciała\nBotoks lub wypełniacz\nSesja terapii PRP\nLuksusowe spa\nZestaw produktów premium\nPriorytetowe zapisy\nDostęp do VIP Lounge" ),
		'featured' => false,
	),
);
?>

<section id="pricing" class="section section--pricing" aria-labelledby="pricing-heading">
	<div class="container">
		<div class="section-header text-center reveal-up">
			<span class="section-label"><?php esc_html_e( 'Cennik', 'bellezza' ); ?></span>
			<h2 id="pricing-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_pricing_title', __( 'Inwestycja w Twoje Piękno', 'bellezza' ) ) ); ?></h2>
			<div class="section-divider section-divider--center" aria-hidden="true"></div>
			<p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'bellezza_pricing_subtitle', __( 'Przejrzyste ceny wszystkich naszych zabiegów premium', 'bellezza' ) ) ); ?></p>
		</div>

		<div class="pricing-grid">
			<?php foreach ( $plans as $i => $plan ) :
				$features = array_filter( array_map( 'trim', explode( "\n", $plan['features'] ) ) );
				?>
				<div class="pricing-card <?php echo $plan['featured'] ? 'pricing-card--featured' : ''; ?> reveal-up reveal-delay-<?php echo esc_attr( $i ); ?>">
					<?php if ( $plan['featured'] ) : ?>
						<span class="pricing-card__badge"><?php esc_html_e( 'Najpopularniejszy', 'bellezza' ); ?></span>
					<?php endif; ?>
					<div class="pricing-card__header">
						<h3 class="pricing-card__name"><?php echo esc_html( $plan['name'] ); ?></h3>
						<div class="pricing-card__price">
							<span class="pricing-card__amount font-heading"><?php echo esc_html( $plan['price'] ); ?></span>
							<span class="pricing-card__period"><?php echo esc_html( $plan['period'] ); ?></span>
						</div>
					</div>
					<ul class="pricing-card__features" role="list">
						<?php foreach ( $features as $feature ) : ?>
							<li>
								<svg class="pricing-card__check" width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8l3.5 3.5L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
								<?php echo esc_html( $feature ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<a href="#booking" class="btn <?php echo $plan['featured'] ? 'btn--accent' : 'btn--outline-dark'; ?> btn--full">
					<?php esc_html_e( 'Rezerwuj', 'bellezza' ); ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
