<?php
/**
 * FAQ Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$faqs = array();
for ( $i = 1; $i <= 8; $i++ ) {
	$q = get_theme_mod( "bellezza_faq_{$i}_question", '' );
	$a = get_theme_mod( "bellezza_faq_{$i}_answer", '' );

	if ( empty( $q ) && $i <= 5 ) {
		$defaults = array(
			1 => array( __( 'Czego mogę się spodziewać podczas pierwszej wizyty?', 'bellezza' ), __( 'Pierwsza wizyta obejmuje kompleksową konsultację, podczas której specjalista oceni Twoją skórę, omówi cele i stworzy spersonalizowany plan zabiegów. Konsultacja trwa ok. 30–45 minut.', 'bellezza' ) ),
			2 => array( __( 'Czy zabiegi są bolesne?', 'bellezza' ), __( 'Większość naszych zabiegów wiąże się z minimalnym dyskomfortem. Stosujemy miejscowe kremy znieczulające i zaawansowane technologie chłodzenia, aby zapewnić Twoją wygodę przez cały czas.', 'bellezza' ) ),
			3 => array( __( 'Kiedy zobaczyć efekty?', 'bellezza' ), __( 'Efekty różnią się w zależności od zabiegu. Niektóre dają natychmiastowe rezultaty, inne wymagają 2–4 tygodni dla pełnego efektu. Specjalista poda szczegółowy harmonogram podczas konsultacji.', 'bellezza' ) ),
			4 => array( __( 'Czy oferujecie finansowanie?', 'bellezza' ), __( 'Tak, oferujemy elastyczne plany płatności, aby nasze zabiegi były dostępne dla każdego. Akceptujemy główne karty kredytowe i długookresowe plany rat dla większych pakietów.', 'bellezza' ) ),
			5 => array( __( 'Jak się przygotować do zabiegu?', 'bellezza' ), __( 'Przygotowanie zależy od rodzaju zabiegu, ale ogólnie zalecamy unikanie ekspozycji na słońce, odstawienie retinolu 48 godzin wcześniej i przybycie z oczyszczoną, umytą twarzą.', 'bellezza' ) ),
		);
		$q = $defaults[ $i ][0];
		$a = $defaults[ $i ][1];
	}

	if ( ! empty( $q ) && ! empty( $a ) ) {
		$faqs[] = array( 'question' => $q, 'answer' => $a );
	}
}
?>

<section id="faq" class="section section--faq" aria-labelledby="faq-heading">
	<div class="container container--narrow">
		<div class="section-header text-center reveal-up">
			<span class="section-label"><?php esc_html_e( 'FAQ', 'bellezza' ); ?></span>
			<h2 id="faq-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_faq_title', __( 'Często Zadawane Pytania', 'bellezza' ) ) ); ?></h2>
			<div class="section-divider section-divider--center" aria-hidden="true"></div>
		</div>

		<div class="faq-list reveal-up" role="list">
			<?php foreach ( $faqs as $i => $faq ) :
				$faq_id = 'faq-' . ( $i + 1 );
				?>
				<div class="faq-item" role="listitem">
					<button class="faq-item__question" aria-expanded="false" aria-controls="<?php echo esc_attr( $faq_id ); ?>">
						<span><?php echo esc_html( $faq['question'] ); ?></span>
						<svg class="faq-item__icon" width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
							<path d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</button>
					<div id="<?php echo esc_attr( $faq_id ); ?>" class="faq-item__answer" role="region" aria-labelledby="<?php echo esc_attr( $faq_id ); ?>-btn" hidden>
						<p><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
