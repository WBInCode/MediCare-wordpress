<?php
/**
 * Footer template
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #primary -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<!-- Pre-footer CTA -->
	<div class="footer-cta">
		<div class="container">
			<div class="footer-cta__inner reveal-up">
				<h2 class="footer-cta__title font-heading">
					<?php echo esc_html( get_theme_mod( 'bellezza_footer_cta_title', __( 'Gotowa na Transformację?', 'bellezza' ) ) ); ?>
				</h2>
				<p class="footer-cta__text">
					<?php echo esc_html( get_theme_mod( 'bellezza_footer_cta_text', __( 'Zarezerwuj bezpłatną konsultację i odkryj swój piękny potencjał.', 'bellezza' ) ) ); ?>
				</p>
				<a href="#booking" class="btn btn--accent btn--lg">
					<?php echo esc_html( get_theme_mod( 'bellezza_footer_cta_button', __( 'Umów Konsultację', 'bellezza' ) ) ); ?>
				</a>
			</div>
		</div>
	</div>

	<!-- Footer Main -->
	<div class="footer-main">
		<div class="container">
			<div class="footer-grid">
				<div class="footer-col footer-col--brand">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<span class="footer-logo font-heading"><?php bloginfo( 'name' ); ?></span>
					<?php endif; ?>
					<p class="footer-desc">
						<?php echo esc_html( get_theme_mod( 'bellezza_footer_desc', __( 'Klinika beauty premium oferująca zabiegi estetyczne najwyższej klasy w atmosferze luksusu i komfortu.', 'bellezza' ) ) ); ?>
					</p>
					<div class="footer-social">
						<?php
						$social_links = array(
							'facebook'  => get_theme_mod( 'bellezza_social_facebook', '#' ),
							'instagram' => get_theme_mod( 'bellezza_social_instagram', '#' ),
							'tiktok'    => get_theme_mod( 'bellezza_social_tiktok', '' ),
							'youtube'   => get_theme_mod( 'bellezza_social_youtube', '' ),
						);
						foreach ( $social_links as $network => $url ) :
							if ( ! empty( $url ) ) :
								?>
								<a href="<?php echo esc_url( $url ); ?>" class="social-link social-link--<?php echo esc_attr( $network ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>">
									<svg class="social-icon" aria-hidden="true"><use href="#icon-<?php echo esc_attr( $network ); ?>"></use></svg>
								</a>
								<?php
							endif;
						endforeach;
						?>
					</div>
				</div>

				<div class="footer-col">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<?php dynamic_sidebar( 'footer-1' ); ?>
					<?php else : ?>
						<h4 class="widget-title"><?php esc_html_e( 'Szybkie linki', 'bellezza' ); ?></h4>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'container'      => false,
							'fallback_cb'    => false,
							'depth'          => 1,
						) );
						?>
					<?php endif; ?>
				</div>

				<div class="footer-col">
					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<?php dynamic_sidebar( 'footer-2' ); ?>
					<?php else : ?>
						<h4 class="widget-title"><?php esc_html_e( 'Zabiegi', 'bellezza' ); ?></h4>
						<ul>
							<li><?php esc_html_e( 'Odmładzanie twarzy', 'bellezza' ); ?></li>
							<li><?php esc_html_e( 'Modelowanie sylwetki', 'bellezza' ); ?></li>
							<li><?php esc_html_e( 'Pielęgnacja skóry', 'bellezza' ); ?></li>
							<li><?php esc_html_e( 'Terapia laserowa', 'bellezza' ); ?></li>
						</ul>
					<?php endif; ?>
				</div>

				<div class="footer-col">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-3' ); ?>
					<?php else : ?>
						<h4 class="widget-title"><?php esc_html_e( 'Kontakt', 'bellezza' ); ?></h4>
						<address class="footer-contact">
							<p><?php echo esc_html( get_theme_mod( 'bellezza_address', __( 'ul. Piękna 12, 00-549 Warszawa', 'bellezza' ) ) ); ?></p>
							<p><a href="tel:<?php echo esc_attr( get_theme_mod( 'bellezza_phone', '+1234567890' ) ); ?>"><?php echo esc_html( get_theme_mod( 'bellezza_phone_display', '+1 (234) 567-890' ) ); ?></a></p>
							<p><a href="mailto:<?php echo esc_attr( sanitize_email( get_theme_mod( 'bellezza_email', 'hello@bellezza.com' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'bellezza_email', 'hello@bellezza.com' ) ); ?></a></p>
						</address>
						<p class="footer-hours">
							<?php echo esc_html( get_theme_mod( 'bellezza_hours', __( 'Pon–Pt: 9:00–20:00 | Sob: 10:00–17:00', 'bellezza' ) ) ); ?>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer Bottom -->
	<div class="footer-bottom">
		<div class="container">
			<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Wszelkie prawa zastrzeżone.', 'bellezza' ); ?></p>
		</div>
	</div>
</footer>

<!-- SVG Sprite for Social Icons -->
<svg xmlns="http://www.w3.org/2000/svg" class="svg-sprite" aria-hidden="true" style="display:none">
	<symbol id="icon-facebook" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></symbol>
	<symbol id="icon-instagram" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></symbol>
	<symbol id="icon-tiktok" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></symbol>
	<symbol id="icon-youtube" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></symbol>
</svg>

<?php wp_footer(); ?>
</body>
</html>
