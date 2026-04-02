<?php
/**
 * Team Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$team = array();
for ( $i = 1; $i <= 4; $i++ ) {
	$name = get_theme_mod( "bellezza_team_{$i}_name", '' );
	if ( empty( $name ) && $i <= 3 ) {
		$defaults = array(
			1 => array( 'Dr. Sarah Mitchell', __( 'Główna Dermatolog', 'bellezza' ) ),
			2 => array( 'Dr. Emily Chen', __( 'Lekarz Estetyczny', 'bellezza' ) ),
			3 => array( 'Anna Kowalski', __( 'Starszy Estetyk', 'bellezza' ) ),
		);
		$name = $defaults[ $i ][0];
		$role = $defaults[ $i ][1];
	} else {
		$role = get_theme_mod( "bellezza_team_{$i}_role", '' );
	}

	if ( ! empty( $name ) ) {
		$team[] = array(
			'name'  => $name,
			'role'  => $role,
			'image' => get_theme_mod( "bellezza_team_{$i}_image", '' ),
			'bio'   => get_theme_mod( "bellezza_team_{$i}_bio", '' ),
		);
	}
}
?>

<section id="team" class="section section--team" aria-labelledby="team-heading">
	<div class="container">
		<div class="section-header text-center reveal-up">
			<span class="section-label"><?php esc_html_e( 'Nasz Zespół', 'bellezza' ); ?></span>
			<h2 id="team-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_team_title', __( 'Poznaj Naszych Specjalistów', 'bellezza' ) ) ); ?></h2>
			<div class="section-divider section-divider--center" aria-hidden="true"></div>
			<p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'bellezza_team_subtitle', __( 'Nagradzani profesjonaliści poświęceni Twojemu pięknu i dobremu samopoczuciu', 'bellezza' ) ) ); ?></p>
		</div>

		<div class="team-grid">
			<?php foreach ( $team as $i => $member ) : ?>
				<div class="team-card reveal-up reveal-delay-<?php echo esc_attr( $i % 3 ); ?>">
					<div class="team-card__image-wrap">
						<?php if ( ! empty( $member['image'] ) ) : ?>
							<img src="<?php echo esc_url( $member['image'] ); ?>" alt="<?php echo esc_attr( $member['name'] ); ?>" class="team-card__image" loading="lazy">
						<?php else : ?>
							<div class="team-card__image-placeholder"></div>
						<?php endif; ?>
						<div class="team-card__overlay">
							<?php if ( ! empty( $member['bio'] ) ) : ?>
								<p class="team-card__bio"><?php echo esc_html( $member['bio'] ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="team-card__info">
						<h3 class="team-card__name font-heading"><?php echo esc_html( $member['name'] ); ?></h3>
						<p class="team-card__role"><?php echo esc_html( $member['role'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
