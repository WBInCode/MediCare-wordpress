<?php
/**
 * About Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$about_title   = get_theme_mod( 'bellezza_about_title', __( 'O Naszej Klinice', 'bellezza' ) );
$about_text    = get_theme_mod( 'bellezza_about_text', __( 'Z ponad dekadą doświadczenia łączymy najnowsze technologie z artystycznym podejściem, aby dostarczyć wyjątkowe efekty podkreślające Twoje naturalne piękno.', 'bellezza' ) );
$about_image   = get_theme_mod( 'bellezza_about_image', '' );
$about_stats   = array(
	array(
		'number' => get_theme_mod( 'bellezza_stat_1_number', '15+' ),
		'label'  => get_theme_mod( 'bellezza_stat_1_label', __( 'Lat Doświadczenia', 'bellezza' ) ),
	),
	array(
		'number' => get_theme_mod( 'bellezza_stat_2_number', '10k+' ),
		'label'  => get_theme_mod( 'bellezza_stat_2_label', __( 'Zadowolonych Klientek', 'bellezza' ) ),
	),
	array(
		'number' => get_theme_mod( 'bellezza_stat_3_number', '50+' ),
		'label'  => get_theme_mod( 'bellezza_stat_3_label', __( 'Zabiegów', 'bellezza' ) ),
	),
	array(
		'number' => get_theme_mod( 'bellezza_stat_4_number', '25+' ),
		'label'  => get_theme_mod( 'bellezza_stat_4_label', __( 'Specjalistów', 'bellezza' ) ),
	),
);
?>

<section id="about" class="section section--about" aria-labelledby="about-heading">
	<div class="container">
		<div class="about-grid">
			<div class="about__media reveal-left">
				<div class="about__image-wrapper">
					<?php if ( ! empty( $about_image ) ) : ?>
						<img src="<?php echo esc_url( $about_image ); ?>" alt="<?php echo esc_attr( $about_title ); ?>" class="about__image" loading="lazy">
					<?php else : ?>
						<div class="about__image-placeholder"></div>
					<?php endif; ?>
					<div class="about__image-accent" aria-hidden="true"></div>
				</div>
				<div class="about__experience-badge">
					<span class="about__exp-number font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_stat_1_number', '15+' ) ); ?></span>
					<span class="about__exp-text"><?php esc_html_e( 'Lat Doskonałości', 'bellezza' ); ?></span>
				</div>
			</div>

			<div class="about__content reveal-right">
				<span class="section-label"><?php esc_html_e( 'O nas', 'bellezza' ); ?></span>
				<h2 id="about-heading" class="section-title font-heading"><?php echo esc_html( $about_title ); ?></h2>
				<div class="section-divider" aria-hidden="true"></div>
				<p class="about__text"><?php echo esc_html( $about_text ); ?></p>

				<div class="about__features">
					<div class="about__feature">
						<div class="about__feature-icon" aria-hidden="true">✦</div>
						<div>
							<h3><?php esc_html_e( 'Certyfikowani Specjaliści', 'bellezza' ); ?></h3>
							<p><?php esc_html_e( 'Certyfikowani dermatolodzy i lekarze estetyczni', 'bellezza' ); ?></p>
						</div>
					</div>
					<div class="about__feature">
						<div class="about__feature-icon" aria-hidden="true">✦</div>
						<div>
							<h3><?php esc_html_e( 'Zaawansowana Technologia', 'bellezza' ); ?></h3>
							<p><?php esc_html_e( 'Najnowocześniejszy sprzęt dla optymalnych efektów', 'bellezza' ); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Stats -->
		<div class="stats-bar reveal-up">
			<?php foreach ( $about_stats as $stat ) : ?>
				<div class="stat">
					<span class="stat__number font-heading" data-count="<?php echo esc_attr( $stat['number'] ); ?>">
						<?php echo esc_html( $stat['number'] ); ?>
					</span>
					<span class="stat__label"><?php echo esc_html( $stat['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
