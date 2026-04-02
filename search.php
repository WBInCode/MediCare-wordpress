<?php
/**
 * Search Results template
 *
 * @package Bellezza
 */

get_header();
?>

<div class="page-hero">
	<div class="container">
		<h1 class="page-hero__title font-heading">
			<?php printf( esc_html__( 'Wyniki wyszukiwania: %s', 'bellezza' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
	</div>
</div>

<div class="container" style="padding-block: var(--section-padding);">
	<?php if ( have_posts() ) : ?>
		<div class="blog-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" class="blog-card__image-link">
							<?php the_post_thumbnail( 'bellezza-blog', array( 'class' => 'blog-card__image', 'loading' => 'lazy' ) ); ?>
						</a>
					<?php endif; ?>
					<div class="blog-card__content">
						<h2 class="blog-card__title font-heading">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<div class="no-results text-center" style="padding: 4rem 0;">
			<h2 class="font-heading"><?php esc_html_e( 'Brak wyników', 'bellezza' ); ?></h2>
			<p><?php esc_html_e( 'Przepraszamy, nic nie pasuje do Twojego zapytania. Spróbuj innych słów kluczowych.', 'bellezza' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();
