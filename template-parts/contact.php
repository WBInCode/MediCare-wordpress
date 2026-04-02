<?php
/**
 * Contact / Booking Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section id="booking" class="section section--contact" aria-labelledby="contact-heading">
	<div class="container">
		<div class="contact-grid">
			<div class="contact__info reveal-left">
				<span class="section-label"><?php esc_html_e( 'Skontaktuj się z nami', 'bellezza' ); ?></span>
				<h2 id="contact-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_contact_title', __( 'Umów Wizytę', 'bellezza' ) ) ); ?></h2>
				<div class="section-divider" aria-hidden="true"></div>
				<p class="contact__text"><?php echo esc_html( get_theme_mod( 'bellezza_contact_text', __( 'Gotowa na transformację? Umów konsultację lub skontaktuj się z nami w przypadku jakichkolwiek pytań.', 'bellezza' ) ) ); ?></p>

				<div class="contact__details">
					<div class="contact__item">
						<div class="contact__item-icon" aria-hidden="true">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.5"/></svg>
						</div>
						<div>
						<h3><?php esc_html_e( 'Adres', 'bellezza' ); ?></h3>
						<p><?php echo esc_html( get_theme_mod( 'bellezza_address', __( 'ul. Piękna 12, 00-549 Warszawa', 'bellezza' ) ) ); ?></p>
						</div>
					</div>

					<div class="contact__item">
						<div class="contact__item-icon" aria-hidden="true">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" stroke="currentColor" stroke-width="1.5"/></svg>
						</div>
						<div>
							<h3><?php esc_html_e( 'Telefon', 'bellezza' ); ?></h3>
							<p><a href="tel:<?php echo esc_attr( get_theme_mod( 'bellezza_phone', '+1234567890' ) ); ?>"><?php echo esc_html( get_theme_mod( 'bellezza_phone_display', '+1 (234) 567-890' ) ); ?></a></p>
						</div>
					</div>

					<div class="contact__item">
						<div class="contact__item-icon" aria-hidden="true">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="1.5"/><path d="M22 6l-10 7L2 6" stroke="currentColor" stroke-width="1.5"/></svg>
						</div>
						<div>
							<h3><?php esc_html_e( 'Email', 'bellezza' ); ?></h3>
							<p><a href="mailto:<?php echo esc_attr( sanitize_email( get_theme_mod( 'bellezza_email', 'hello@bellezza.com' ) ) ); ?>"><?php echo esc_html( get_theme_mod( 'bellezza_email', 'hello@bellezza.com' ) ); ?></a></p>
						</div>
					</div>

					<div class="contact__item">
						<div class="contact__item-icon" aria-hidden="true">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
						</div>
						<div>
						<h3><?php esc_html_e( 'Godziny otwarcia', 'bellezza' ); ?></h3>
						<p><?php echo esc_html( get_theme_mod( 'bellezza_hours', __( 'Pon–Pt: 9:00–20:00 | Sob: 10:00–17:00', 'bellezza' ) ) ); ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="contact__form-wrap reveal-right">
				<div class="contact__form-card">
					<h3 class="contact__form-title font-heading"><?php esc_html_e( 'Zapytaj o Konsultację', 'bellezza' ); ?></h3>
					<?php
					// Support for Contact Form 7 or WPForms shortcode
					$form_shortcode = get_theme_mod( 'bellezza_contact_form_shortcode', '' );
					if ( ! empty( $form_shortcode ) ) {
						echo do_shortcode( wp_kses_post( $form_shortcode ) );
					} else {
						?>
						<p class="contact__form-note"><?php esc_html_e( 'Dodaj skrót formularza kontaktowego w Wygląd → Dostosuj → Sekcja kontaktu.', 'bellezza' ); ?></p>
						<form class="contact-form" method="post" action="#">
							<div class="form-row">
								<div class="form-group">
							<label for="contact-name"><?php esc_html_e( 'Imię i nazwisko', 'bellezza' ); ?></label>
							<input type="text" id="contact-name" name="name" required placeholder="<?php esc_attr_e( 'Twoje imię i nazwisko', 'bellezza' ); ?>">
								</div>
								<div class="form-group">
							<label for="contact-phone"><?php esc_html_e( 'Telefon', 'bellezza' ); ?></label>
							<input type="tel" id="contact-phone" name="phone" placeholder="<?php esc_attr_e( 'Twój numer telefonu', 'bellezza' ); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="contact-email"><?php esc_html_e( 'Email', 'bellezza' ); ?></label>
								<input type="email" id="contact-email" name="email" required placeholder="<?php esc_attr_e( 'your@email.com', 'bellezza' ); ?>">
							</div>
							<div class="form-group">
						<label for="contact-service"><?php esc_html_e( 'Interesujący zabieg', 'bellezza' ); ?></label>
						<select id="contact-service" name="service">
							<option value=""><?php esc_html_e( 'Wybierz zabieg...', 'bellezza' ); ?></option>
							<option value="facial"><?php esc_html_e( 'Odmładzanie twarzy', 'bellezza' ); ?></option>
							<option value="body"><?php esc_html_e( 'Modelowanie sylwetki', 'bellezza' ); ?></option>
							<option value="skin"><?php esc_html_e( 'Pielęgnacja skóry', 'bellezza' ); ?></option>
							<option value="laser"><?php esc_html_e( 'Zabiegi laserowe', 'bellezza' ); ?></option>
							<option value="prp"><?php esc_html_e( 'Terapia PRP', 'bellezza' ); ?></option>
							<option value="spa"><?php esc_html_e( 'Wellness i Spa', 'bellezza' ); ?></option>
							<option value="other"><?php esc_html_e( 'Inne', 'bellezza' ); ?></option>
								</select>
							</div>
							<div class="form-group">
						<label for="contact-message"><?php esc_html_e( 'Wiadomość', 'bellezza' ); ?></label>
						<textarea id="contact-message" name="message" rows="4" placeholder="<?php esc_attr_e( 'Opisz swoje oczekiwania...', 'bellezza' ); ?>"></textarea>
							</div>
							<button type="submit" class="btn btn--accent btn--full"><?php esc_html_e( 'Wyślij zapytanie', 'bellezza' ); ?></button>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- Map -->
		<?php
		$map_embed = get_theme_mod( 'bellezza_map_embed', '' );
		if ( ! empty( $map_embed ) ) :
			?>
			<div class="contact__map reveal-up">
				<?php echo wp_kses( $map_embed, array(
					'iframe' => array(
						'src'             => true,
						'width'           => true,
						'height'          => true,
						'style'           => true,
						'allowfullscreen' => true,
						'loading'         => true,
						'referrerpolicy'  => true,
						'title'           => true,
					),
				) ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
