<?php
/**
 * Before / After Gallery Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section id="results" class="section section--before-after" aria-labelledby="results-heading">
	<div class="container">
		<div class="section-header text-center reveal-up">
			<span class="section-label"><?php esc_html_e( 'Prawdziwe Efekty', 'bellezza' ); ?></span>
			<h2 id="results-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_ba_title', __( 'Przed i Po', 'bellezza' ) ) ); ?></h2>
			<div class="section-divider section-divider--center" aria-hidden="true"></div>
			<p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'bellezza_ba_subtitle', __( 'Zobacz transformacje, które przeżyły nasze klientki', 'bellezza' ) ) ); ?></p>
		</div>

		<div class="ba-grid">
			<?php for ( $i = 1; $i <= 4; $i++ ) :
				$before = get_theme_mod( "bellezza_ba_{$i}_before", '' );
				$after  = get_theme_mod( "bellezza_ba_{$i}_after", '' );
				$label  = get_theme_mod( "bellezza_ba_{$i}_label", '' );

				if ( empty( $before ) && empty( $after ) && $i > 1 ) {
					continue;
				}
				?>
				<div class="ba-item reveal-up" role="figure" aria-label="<?php echo esc_attr( $label ?: sprintf( __( 'Przed i po %d', 'bellezza' ), $i ) ); ?>">
					<div class="ba-slider" data-ba-slider>
						<div class="ba-slider__after">
							<?php if ( ! empty( $after ) ) : ?>
						<img src="<?php echo esc_url( $after ); ?>" alt="<?php echo esc_attr__( 'Po zabiegu', 'bellezza' ); ?>" loading="lazy">
					<?php else : ?>
						<div class="ba-placeholder ba-placeholder--after"><?php esc_html_e( 'Po', 'bellezza' ); ?></div>
							<?php endif; ?>
						</div>
						<div class="ba-slider__before">
							<?php if ( ! empty( $before ) ) : ?>
						<img src="<?php echo esc_url( $before ); ?>" alt="<?php echo esc_attr__( 'Przed zabiegiem', 'bellezza' ); ?>" loading="lazy">
					<?php else : ?>
						<div class="ba-placeholder ba-placeholder--before"><?php esc_html_e( 'Przed', 'bellezza' ); ?></div>
							<?php endif; ?>
						</div>
						<div class="ba-slider__handle" role="slider" aria-label="<?php esc_attr_e( 'Suwak porównania', 'bellezza' ); ?>" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" tabindex="0">
							<div class="ba-slider__handle-line"></div>
							<div class="ba-slider__handle-circle">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
									<path d="M7 4l-4 6 4 6M13 4l4 6-4 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</div>
							<div class="ba-slider__handle-line"></div>
						</div>
					</div>
					<?php if ( ! empty( $label ) ) : ?>
						<p class="ba-item__label"><?php echo esc_html( $label ); ?></p>
					<?php endif; ?>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
