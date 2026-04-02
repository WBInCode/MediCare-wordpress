<?php
/**
 * Single Post template
 *
 * @package Bellezza
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<div class="page-hero page-hero--post">
		<div class="container">
			<div class="page-hero__meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) :
					?>
					<span class="page-hero__cat"><?php echo esc_html( $categories[0]->name ); ?></span>
				<?php endif; ?>
			</div>
			<h1 class="page-hero__title font-heading reveal-up"><?php the_title(); ?></h1>
			<div class="page-hero__author">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', array( 'class' => 'page-hero__avatar' ) ); ?>
				<span><?php the_author(); ?></span>
			</div>
		</div>
	</div>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="single-featured-image">
			<div class="container container--wide">
				<?php the_post_thumbnail( 'bellezza-hero', array( 'class' => 'single-featured-image__img', 'loading' => 'eager', 'fetchpriority' => 'high' ) ); ?>
			</div>
		</div>
	<?php endif; ?>

	<div class="container container--narrow" style="padding-block: var(--section-padding);">
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-content' ); ?>>
			<?php the_content(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bellezza' ),
				'after'  => '</div>',
			) );
			?>
		</article>

		<div class="single-tags">
			<?php the_tags( '<div class="tag-list">', '', '</div>' ); ?>
		</div>

		<?php
		// Post navigation
		the_post_navigation( array(
			'prev_text' => '<span class="nav-label">' . esc_html__( 'Poprzedni', 'bellezza' ) . '</span><span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-label">' . esc_html__( 'Następny', 'bellezza' ) . '</span><span class="nav-title">%title</span>',
		) );

		// Comments
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
	</div>

<?php
endwhile;

get_footer();
