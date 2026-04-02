<?php
/**
 * Page template
 *
 * @package Bellezza
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero__title font-heading reveal-up"><?php the_title(); ?></h1>
	</div>
</div>

<div class="container" style="padding-block: var(--section-padding);">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
			<?php the_content(); ?>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();
