<?php
/**
 * Front Page Template
 *
 * @package Bellezza
 */

get_header();

get_template_part( 'template-parts/hero' );
get_template_part( 'template-parts/about' );
get_template_part( 'template-parts/services' );
get_template_part( 'template-parts/before-after' );
get_template_part( 'template-parts/pricing' );
get_template_part( 'template-parts/team' );
get_template_part( 'template-parts/testimonials' );
get_template_part( 'template-parts/blog' );
get_template_part( 'template-parts/faq' );
get_template_part( 'template-parts/contact' );

get_footer();
