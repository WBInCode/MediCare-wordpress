<?php
/**
 * Index template (fallback)
 *
 * @package Bellezza
 */

get_header();
?>

<div class="container" style="padding-block: var(--section-padding);">
	<?php if ( have_posts() ) : ?>

		<header class="archive-header">
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<h1 class="archive-header__title font-heading"><?php single_post_title(); ?></h1>
			<?php elseif ( is_archive() ) : ?>
				<?php the_archive_title( '<h1 class="archive-header__title font-heading">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="archive-header__desc">', '</div>' ); ?>
			<?php elseif ( is_search() ) : ?>
				<h1 class="archive-header__title font-heading">
					<?php printf( esc_html__( 'Search Results for: %s', 'bellezza' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h1>
			<?php endif; ?>
		</header>

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
						<div class="blog-card__meta">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>
						<h2 class="blog-card__title font-heading">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
						<a href="<?php the_permalink(); ?>" class="blog-card__read-more"><?php esc_html_e( 'Read Article', 'bellezza' ); ?></a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<?php the_posts_pagination( array(
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
			'class'     => 'bellezza-pagination',
		) ); ?>

	<?php else : ?>
		<div class="no-results text-center" style="padding: 4rem 0;">
			<h1 class="font-heading"><?php esc_html_e( 'Nothing Found', 'bellezza' ); ?></h1>
			<p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for.', 'bellezza' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();
