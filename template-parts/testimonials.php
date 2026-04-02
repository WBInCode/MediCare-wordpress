<?php
/**
 * Testimonials Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$testimonials = array();
for ( $i = 1; $i <= 6; $i++ ) {
	$text = get_theme_mod( "bellezza_testimonial_{$i}_text", '' );
	if ( empty( $text ) && $i <= 3 ) {
		$defaults = array(
			1 => array(
				'text'   => __( 'Efekty przeszły moje oczekiwania. Zespół sprawił, że czułam się komfortowo przez cały czas. Wyglądam i czuję się o 10 lat młodziej!', 'bellezza' ),
				'name'   => 'Jessica Martin',
				'detail' => __( 'Odmładzanie Twarzy', 'bellezza' ),
				'rating' => 5,
			),
			2 => array(
				'text'   => __( 'Absolutnie niesamowite doświadczenie od początku do końca. Klinika jest piękna, personel profesjonalny, a efekty mówią same za siebie.', 'bellezza' ),
				'name'   => 'Amanda Roberts',
				'detail' => __( 'Modelowanie Sylwetki', 'bellezza' ),
				'rating' => 5,
			),
			3 => array(
				'text'   => __( 'Byłam w wielu klinikach, ale Bellezza jest na zupełnie innym poziomie. Indywidualne podejście i dbałość o szczegóły robią ogromną różnicę.', 'bellezza' ),
				'name'   => 'Sophie Williams',
				'detail' => __( 'Pakiet Pielęgnacji Skóry', 'bellezza' ),
				'rating' => 5,
			),
		);
		$text   = $defaults[ $i ]['text'];
		$name   = $defaults[ $i ]['name'];
		$detail = $defaults[ $i ]['detail'];
		$rating = $defaults[ $i ]['rating'];
	} else {
		$name   = get_theme_mod( "bellezza_testimonial_{$i}_name", '' );
		$detail = get_theme_mod( "bellezza_testimonial_{$i}_detail", '' );
		$rating = get_theme_mod( "bellezza_testimonial_{$i}_rating", 5 );
	}

	if ( ! empty( $text ) ) {
		$testimonials[] = array(
			'text'   => $text,
			'name'   => $name,
			'detail' => $detail,
			'rating' => (int) $rating,
			'avatar' => get_theme_mod( "bellezza_testimonial_{$i}_avatar", '' ),
		);
	}
}
?>

<section id="testimonials" class="section section--testimonials" aria-labelledby="testimonials-heading">
	<div class="container">
		<div class="section-header text-center reveal-up">
			<span class="section-label"><?php esc_html_e( 'Opinie', 'bellezza' ); ?></span>
			<h2 id="testimonials-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_testimonials_title', __( 'Co mówią nasze Klientki', 'bellezza' ) ) ); ?></h2>
			<div class="section-divider section-divider--center" aria-hidden="true"></div>
		</div>

		<div class="testimonials-slider" role="region" aria-label="<?php esc_attr_e( 'Opinie klientek', 'bellezza' ); ?>">
			<div class="testimonials-track" data-testimonials-track>
				<?php foreach ( $testimonials as $i => $t ) : ?>
					<blockquote class="testimonial-card" aria-label="<?php echo esc_attr( sprintf( __( 'Opinia od %s', 'bellezza' ), $t['name'] ) ); ?>">
						<div class="testimonial-card__stars" aria-label="<?php echo esc_attr( sprintf( __( '%d z 5 gwiazdek', 'bellezza' ), $t['rating'] ) ); ?>">
							<?php for ( $s = 0; $s < 5; $s++ ) : ?>
								<svg class="star <?php echo $s < $t['rating'] ? 'star--filled' : ''; ?>" width="18" height="18" viewBox="0 0 18 18" aria-hidden="true"><path d="M9 1l2.47 5.01L17 6.76l-4 3.9.94 5.5L9 13.77l-4.94 2.6.94-5.5-4-3.9 5.53-.76L9 1z" fill="currentColor"/></svg>
							<?php endfor; ?>
						</div>
						<p class="testimonial-card__text"><?php echo esc_html( $t['text'] ); ?></p>
						<footer class="testimonial-card__author">
							<?php if ( ! empty( $t['avatar'] ) ) : ?>
								<img src="<?php echo esc_url( $t['avatar'] ); ?>" alt="" class="testimonial-card__avatar" loading="lazy">
							<?php else : ?>
								<div class="testimonial-card__avatar-placeholder" aria-hidden="true">
									<?php echo esc_html( mb_substr( $t['name'], 0, 1 ) ); ?>
								</div>
							<?php endif; ?>
							<div>
								<cite class="testimonial-card__name"><?php echo esc_html( $t['name'] ); ?></cite>
								<?php if ( ! empty( $t['detail'] ) ) : ?>
									<span class="testimonial-card__detail"><?php echo esc_html( $t['detail'] ); ?></span>
								<?php endif; ?>
							</div>
						</footer>
					</blockquote>
				<?php endforeach; ?>
			</div>

			<div class="testimonials-nav">
				<button class="testimonials-btn testimonials-btn--prev" aria-label="<?php esc_attr_e( 'Poprzednia opinia', 'bellezza' ); ?>" data-testimonials-prev>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M12 4l-6 6 6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
				<div class="testimonials-dots" data-testimonials-dots></div>
				<button class="testimonials-btn testimonials-btn--next" aria-label="<?php esc_attr_e( 'Następna opinia', 'bellezza' ); ?>" data-testimonials-next>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M8 4l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</button>
			</div>
		</div>
	</div>
</section>
