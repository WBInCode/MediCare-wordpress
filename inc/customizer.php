<?php
/**
 * Bellezza Customizer Settings
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bellezza_customize_register( $wp_customize ) {

	/* =================================================================
	   Panel: Bellezza Theme Settings
	   ================================================================= */
	$wp_customize->add_panel( 'bellezza_panel', array(
		'title'    => __( 'Motyw Bellezza', 'bellezza' ),
		'priority' => 30,
	) );

	/* -----------------------------------------------------------------
	   Section: Hero
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_hero', array(
		'title' => __( 'Sekcja Hero', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$hero_fields = array(
		'bellezza_hero_badge'    => array( __( 'Tekst odznaki', 'bellezza' ), 'text', '✦ Klinika Premium Beauty' ),
		'bellezza_hero_title'    => array( __( 'Tytuł', 'bellezza' ), 'text', 'Gdzie Piękno Spotyka Naukę' ),
		'bellezza_hero_subtitle' => array( __( 'Podtytuł', 'bellezza' ), 'textarea', 'Zabiegi estetyczne premium w atmosferze luksusu i spokoju' ),
		'bellezza_hero_cta'      => array( __( 'Przycisk CTA 1', 'bellezza' ), 'text', 'Odkryj Nasze Zabiegi' ),
		'bellezza_hero_cta2'     => array( __( 'Przycisk CTA 2', 'bellezza' ), 'text', 'Umów Konsultację' ),
		'bellezza_hero_video'    => array( __( 'URL wideo tła', 'bellezza' ), 'url', '' ),
		'bellezza_hero_image'    => array( __( 'URL zdjęcia tła', 'bellezza' ), 'url', '' ),
	);

	foreach ( $hero_fields as $id => $config ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $config[2],
			'sanitize_callback' => $config[1] === 'url' ? 'esc_url_raw' : ( $config[1] === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $config[0],
			'section' => 'bellezza_hero',
			'type'    => $config[1],
		) );
	}

	/* -----------------------------------------------------------------
	   Section: About
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_about', array(
		'title' => __( 'Sekcja O nas', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$about_fields = array(
		'bellezza_about_title' => array( __( 'Tytuł', 'bellezza' ), 'text', 'O Naszej Klinice' ),
		'bellezza_about_text'  => array( __( 'Opis', 'bellezza' ), 'textarea', '' ),
		'bellezza_about_image' => array( __( 'URL zdjęcia', 'bellezza' ), 'url', '' ),
	);

	foreach ( $about_fields as $id => $config ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $config[2],
			'sanitize_callback' => $config[1] === 'url' ? 'esc_url_raw' : ( $config[1] === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $config[0],
			'section' => 'bellezza_about',
			'type'    => $config[1],
		) );
	}

	// Stats
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting( "bellezza_stat_{$i}_number", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "bellezza_stat_{$i}_number", array(
			'label'   => sprintf( __( 'Statystyka %d — liczba', 'bellezza' ), $i ),
			'section' => 'bellezza_about',
			'type'    => 'text',
		) );

		$wp_customize->add_setting( "bellezza_stat_{$i}_label", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( "bellezza_stat_{$i}_label", array(
			'label'   => sprintf( __( 'Statystyka %d — etykieta', 'bellezza' ), $i ),
			'section' => 'bellezza_about',
			'type'    => 'text',
		) );
	}

	/* -----------------------------------------------------------------
	   Section: Services
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_services', array(
		'title' => __( 'Sekcja Zabiegi', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$wp_customize->add_setting( 'bellezza_services_title', array(
		'default'           => 'Treatments We Offer',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'bellezza_services_title', array(
		'label'   => __( 'Tytuł sekcji', 'bellezza' ),
		'section' => 'bellezza_services',
	) );

	$wp_customize->add_setting( 'bellezza_services_subtitle', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'bellezza_services_subtitle', array(
		'label'   => __( 'Podtytuł sekcji', 'bellezza' ),
		'section' => 'bellezza_services',
	) );

	for ( $i = 1; $i <= 6; $i++ ) {
		foreach ( array( 'title' => 'text', 'desc' => 'textarea', 'image' => 'url' ) as $field => $type ) {
			$wp_customize->add_setting( "bellezza_service_{$i}_{$field}", array(
				'default'           => '',
				'sanitize_callback' => $type === 'url' ? 'esc_url_raw' : ( $type === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field' ),
			) );
			$wp_customize->add_control( "bellezza_service_{$i}_{$field}", array(
				'label'   => sprintf( __( 'Zabieg %d — %s', 'bellezza' ), $i, $field === 'title' ? 'tytuł' : ( $field === 'desc' ? 'opis' : 'zdjęcie' ) ),
				'section' => 'bellezza_services',
				'type'    => $type,
			) );
		}
	}

	/* -----------------------------------------------------------------
	   Section: Pricing
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_pricing', array(
		'title' => __( 'Sekcja Cennik', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$wp_customize->add_setting( 'bellezza_pricing_title', array(
		'default'           => 'Investment in Your Beauty',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'bellezza_pricing_title', array(
		'label'   => __( 'Tytuł sekcji', 'bellezza' ),
		'section' => 'bellezza_pricing',
	) );

	for ( $i = 1; $i <= 3; $i++ ) {
		foreach ( array( 'name', 'price', 'period' ) as $field ) {
			$wp_customize->add_setting( "bellezza_plan_{$i}_{$field}", array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( "bellezza_plan_{$i}_{$field}", array(
				'label'   => sprintf( __( 'Plan %d — %s', 'bellezza' ), $i, $field === 'name' ? 'nazwa' : ( $field === 'price' ? 'cena' : 'okres' ) ),
				'section' => 'bellezza_pricing',
			) );
		}
		$wp_customize->add_setting( "bellezza_plan_{$i}_features", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "bellezza_plan_{$i}_features", array(
			'label'       => sprintf( __( 'Plan %d — funkcje (jedna na linię)', 'bellezza' ), $i ),
			'section'     => 'bellezza_pricing',
			'type'        => 'textarea',
		) );
	}

	/* -----------------------------------------------------------------
	   Section: Team
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_team', array(
		'title' => __( 'Sekcja Zespół', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$wp_customize->add_setting( 'bellezza_team_title', array(
		'default'           => 'Poznaj Naszych Specjalistów',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'bellezza_team_title', array(
		'label'   => __( 'Tytuł sekcji', 'bellezza' ),
		'section' => 'bellezza_team',
	) );

	for ( $i = 1; $i <= 4; $i++ ) {
		foreach ( array( 'name', 'role', 'bio' ) as $field ) {
			$wp_customize->add_setting( "bellezza_team_{$i}_{$field}", array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( "bellezza_team_{$i}_{$field}", array(
				'label'   => sprintf( __( 'Członek %d — %s', 'bellezza' ), $i, $field === 'name' ? 'imię i nazwisko' : ( $field === 'role' ? 'stanowisko' : 'bio' ) ),
				'section' => 'bellezza_team',
			) );
		}
		$wp_customize->add_setting( "bellezza_team_{$i}_image", array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( "bellezza_team_{$i}_image", array(
			'label'   => sprintf( __( 'Członek %d — URL zdjęcia', 'bellezza' ), $i ),
			'section' => 'bellezza_team',
			'type'    => 'url',
		) );
	}

	/* -----------------------------------------------------------------
	   Section: Testimonials
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_testimonials', array(
		'title' => __( 'Opinie klientek', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$wp_customize->add_setting( 'bellezza_testimonials_title', array(
		'default'           => 'Co mówią nasze Klientki',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'bellezza_testimonials_title', array(
		'label'   => __( 'Tytuł sekcji', 'bellezza' ),
		'section' => 'bellezza_testimonials',
	) );

	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting( "bellezza_testimonial_{$i}_text", array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
		) );
		$wp_customize->add_control( "bellezza_testimonial_{$i}_text", array(
			'label'   => sprintf( __( 'Opinia %d — treść', 'bellezza' ), $i ),
			'section' => 'bellezza_testimonials',
			'type'    => 'textarea',
		) );

		foreach ( array( 'name', 'detail' ) as $field ) {
			$wp_customize->add_setting( "bellezza_testimonial_{$i}_{$field}", array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			) );
			$wp_customize->add_control( "bellezza_testimonial_{$i}_{$field}", array(
				'label'   => sprintf( __( 'Opinia %d — %s', 'bellezza' ), $i, $field === 'name' ? 'imię i nazwisko' : 'szczegół' ),
				'section' => 'bellezza_testimonials',
			) );
		}

		$wp_customize->add_setting( "bellezza_testimonial_{$i}_rating", array(
			'default'           => 5,
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( "bellezza_testimonial_{$i}_rating", array(
			'label'   => sprintf( __( 'Opinia %d — ocena (1–5)', 'bellezza' ), $i ),
			'section' => 'bellezza_testimonials',
			'type'    => 'number',
			'input_attrs' => array( 'min' => 1, 'max' => 5 ),
		) );
	}

	/* -----------------------------------------------------------------
	   Section: Before/After
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_before_after', array(
		'title' => __( 'Galeria Przed/Po', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$wp_customize->add_setting( 'bellezza_ba_title', array( 'default' => 'Przed i Po', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'bellezza_ba_title', array( 'label' => __( 'Tytuł sekcji', 'bellezza' ), 'section' => 'bellezza_before_after' ) );

	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting( "bellezza_ba_{$i}_before", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "bellezza_ba_{$i}_before", array( 'label' => sprintf( __( 'Para %d — zdjęcie Przed', 'bellezza' ), $i ), 'section' => 'bellezza_before_after', 'type' => 'url' ) );

		$wp_customize->add_setting( "bellezza_ba_{$i}_after", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( "bellezza_ba_{$i}_after", array( 'label' => sprintf( __( 'Para %d — zdjęcie Po', 'bellezza' ), $i ), 'section' => 'bellezza_before_after', 'type' => 'url' ) );

		$wp_customize->add_setting( "bellezza_ba_{$i}_label", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "bellezza_ba_{$i}_label", array( 'label' => sprintf( __( 'Para %d — etykieta', 'bellezza' ), $i ), 'section' => 'bellezza_before_after' ) );
	}

	/* -----------------------------------------------------------------
	   Section: FAQ
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_faq', array(
		'title' => __( 'Sekcja FAQ', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$wp_customize->add_setting( 'bellezza_faq_title', array( 'default' => 'Często Zadawane Pytania', 'sanitize_callback' => 'sanitize_text_field' ) );
	$wp_customize->add_control( 'bellezza_faq_title', array( 'label' => __( 'Tytuł sekcji', 'bellezza' ), 'section' => 'bellezza_faq' ) );

	for ( $i = 1; $i <= 8; $i++ ) {
		$wp_customize->add_setting( "bellezza_faq_{$i}_question", array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( "bellezza_faq_{$i}_question", array( 'label' => sprintf( __( 'FAQ %d — pytanie', 'bellezza' ), $i ), 'section' => 'bellezza_faq' ) );

		$wp_customize->add_setting( "bellezza_faq_{$i}_answer", array( 'default' => '', 'sanitize_callback' => 'sanitize_textarea_field' ) );
		$wp_customize->add_control( "bellezza_faq_{$i}_answer", array( 'label' => sprintf( __( 'FAQ %d — odpowiedź', 'bellezza' ), $i ), 'section' => 'bellezza_faq', 'type' => 'textarea' ) );
	}

	/* -----------------------------------------------------------------
	   Section: Contact & Social
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_contact', array(
		'title' => __( 'Kontakt i Social Media', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$contact_fields = array(
		'bellezza_contact_title'          => array( __( 'Tytuł sekcji', 'bellezza' ), 'text', 'Umów Wizytę' ),
		'bellezza_contact_text'           => array( __( 'Opis', 'bellezza' ), 'textarea', '' ),
		'bellezza_contact_form_shortcode' => array( __( 'Skrót formularza kontaktowego', 'bellezza' ), 'text', '' ),
		'bellezza_address'                => array( __( 'Adres', 'bellezza' ), 'text', 'ul. Piękna 12, 00-549 Warszawa' ),
		'bellezza_phone'                  => array( __( 'Telefon (surowy)', 'bellezza' ), 'text', '+48221234567' ),
		'bellezza_phone_display'          => array( __( 'Telefon (wyświetlany)', 'bellezza' ), 'text', '+48 22 123 45 67' ),
		'bellezza_email'                  => array( __( 'E-mail', 'bellezza' ), 'email', 'hello@bellezza.pl' ),
		'bellezza_hours'                  => array( __( 'Godziny otwarcia', 'bellezza' ), 'text', 'Pon–Pt: 9:00–20:00 | Sob: 10:00–17:00' ),
		'bellezza_map_embed'              => array( __( 'Osadzenie Google Maps (iframe)', 'bellezza' ), 'textarea', '' ),
		'bellezza_social_facebook'        => array( __( 'URL Facebook', 'bellezza' ), 'url', '#' ),
		'bellezza_social_instagram'       => array( __( 'URL Instagram', 'bellezza' ), 'url', '#' ),
		'bellezza_social_tiktok'          => array( __( 'URL TikTok', 'bellezza' ), 'url', '' ),
		'bellezza_social_youtube'         => array( __( 'URL YouTube', 'bellezza' ), 'url', '' ),
	);

	foreach ( $contact_fields as $id => $config ) {
		$sanitize = 'sanitize_text_field';
		if ( $config[1] === 'url' ) $sanitize = 'esc_url_raw';
		if ( $config[1] === 'email' ) $sanitize = 'sanitize_email';
		if ( $config[1] === 'textarea' ) $sanitize = 'sanitize_textarea_field';

		$wp_customize->add_setting( $id, array(
			'default'           => $config[2],
			'sanitize_callback' => $sanitize,
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $config[0],
			'section' => 'bellezza_contact',
			'type'    => $config[1],
		) );
	}

	/* -----------------------------------------------------------------
	   Section: Footer
	   ----------------------------------------------------------------- */
	$wp_customize->add_section( 'bellezza_footer', array(
		'title' => __( 'Ustawienia stopki', 'bellezza' ),
		'panel' => 'bellezza_panel',
	) );

	$footer_fields = array(
		'bellezza_footer_cta_title'  => array( __( 'Tytuł CTA', 'bellezza' ), 'text', 'Gotowa na Transformację?' ),
		'bellezza_footer_cta_text'   => array( __( 'Tekst CTA', 'bellezza' ), 'textarea', 'Zarezerwuj bezpłatną konsultację i odkryj swój piękny potencjał.' ),
		'bellezza_footer_cta_button' => array( __( 'Tekst przycisku CTA', 'bellezza' ), 'text', 'Umów Konsultację' ),
		'bellezza_footer_desc'       => array( __( 'Opis w stopce', 'bellezza' ), 'textarea', 'Klinika beauty premium oferująca zabiegi estetyczne najwyższej klasy.' ),
		'bellezza_header_cta_text'   => array( __( 'Tekst CTA w nagłówku', 'bellezza' ), 'text', 'Rezerwuj' ),
	);

	foreach ( $footer_fields as $id => $config ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $config[2],
			'sanitize_callback' => $config[1] === 'textarea' ? 'sanitize_textarea_field' : 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $config[0],
			'section' => 'bellezza_footer',
			'type'    => $config[1],
		) );
	}
}
add_action( 'customize_register', 'bellezza_customize_register' );
