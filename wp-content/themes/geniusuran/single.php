<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Geniusuran
 */

get_header();
?>

<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
		<?php
		while ( have_posts() ) :
			the_post();


           get_template_part('parts/content', 'page');
   
			// If comments are open or we have at least one comment, load up the comment template.
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'geniusuran' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'geniusuran' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			

		endwhile; // End of the loop.
		?>

	</div>
</div>
<?php

get_footer();
