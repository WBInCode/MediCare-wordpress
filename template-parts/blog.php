<?php
/**
 * Blog / Tips Section
 *
 * @package Bellezza
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blog_posts = new WP_Query( array(
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
) );
?>

<section id="blog" class="section section--blog" aria-labelledby="blog-heading">
	<div class="container">
		<div class="section-header text-center reveal-up">
			<span class="section-label"><?php esc_html_e( 'Porady Beauty i Nowości', 'bellezza' ); ?></span>
			<h2 id="blog-heading" class="section-title font-heading"><?php echo esc_html( get_theme_mod( 'bellezza_blog_title', __( 'Z Naszego Bloga', 'bellezza' ) ) ); ?></h2>
			<div class="section-divider section-divider--center" aria-hidden="true"></div>
		</div>

		<?php if ( $blog_posts->have_posts() ) : ?>
			<div class="blog-grid">
				<?php
				$post_index = 0;
				while ( $blog_posts->have_posts() ) :
					$blog_posts->the_post();
					?>
					<article class="blog-card reveal-up reveal-delay-<?php echo esc_attr( $post_index % 3 ); ?>">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" class="blog-card__image-link">
								<?php the_post_thumbnail( 'bellezza-blog', array( 'class' => 'blog-card__image', 'loading' => 'lazy' ) ); ?>
							</a>
						<?php endif; ?>
						<div class="blog-card__content">
							<div class="blog-card__meta">
								<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
								<?php
								$categories = get_the_category();
								if ( ! empty( $categories ) ) :
									?>
									<span class="blog-card__cat"><?php echo esc_html( $categories[0]->name ); ?></span>
								<?php endif; ?>
							</div>
							<h3 class="blog-card__title font-heading">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
							<a href="<?php the_permalink(); ?>" class="blog-card__read-more">
							<?php esc_html_e( 'Czytaj artykuł', 'bellezza' ); ?>
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
							</a>
						</div>
					</article>
					<?php
					$post_index++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>

			<div class="text-center reveal-up" style="margin-top: var(--wp--preset--spacing--50)">
				<a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="btn btn--outline-dark">
					<?php esc_html_e( 'Zobacz wszystkie artykuły', 'bellezza' ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
