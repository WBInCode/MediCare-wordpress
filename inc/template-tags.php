<?php
/**
 * Template Tags
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print page hero with optional background
 */
function bellezza_page_hero( $title = '', $subtitle = '' ) {
	if ( empty( $title ) ) {
		$title = get_the_title();
	}
	?>
	<div class="page-hero">
		<div class="container">
			<h1 class="page-hero__title font-heading reveal-up"><?php echo esc_html( $title ); ?></h1>
			<?php if ( ! empty( $subtitle ) ) : ?>
				<p class="page-hero__subtitle reveal-up reveal-delay-1"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>
		</div>
	</div>
	<?php
}

/**
 * Posted on date
 */
function bellezza_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	printf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);
}

/**
 * Posted by author
 */
function bellezza_posted_by() {
	printf(
		'<span class="byline"><span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}
