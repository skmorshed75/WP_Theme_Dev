<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package theme-blog
 */

get_header();
?>

<div id="primary" class="content-area col-md-8 offset-md-2">

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(

			);


		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
	</div>
<?php
//get_sidebar();
get_footer();
