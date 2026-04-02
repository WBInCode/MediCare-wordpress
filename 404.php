<?php
/**
 * 404 Page
 *
 * @package Bellezza
 */

get_header();
?>

<section class="error-404" style="padding-block: var(--section-padding); text-align: center; min-height: 60vh; display: flex; align-items: center;">
	<div class="container">
		<span class="error-404__number font-heading" style="font-size: clamp(5rem, 15vw, 12rem); color: var(--color-secondary); line-height: 1; display: block;">404</span>
		<h1 class="font-heading" style="margin-top: 1rem;"><?php esc_html_e( 'Nie znaleziono strony', 'bellezza' ); ?></h1>
		<p style="color: var(--color-text-light); margin: 1.5rem auto; max-width: 500px;">
			<?php esc_html_e( 'Strona, której szukasz mogła zostać usunięta, zmieniona lub jest tymczasowo niedostępna.', 'bellezza' ); ?>
		</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--accent">
			<?php esc_html_e( 'Wróć na stronę główną', 'bellezza' ); ?>
		</a>
	</div>
</section>

<?php
get_footer();
