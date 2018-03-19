<?php
/**
 * Template Name: Forms
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ryder-davies-partners
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<section class="section-blocks text-center">
					<div class="">
						<div class="row">
							<h1 style="margin-top:55px"><?php the_title(); ?></h1>
							<?php the_content(); ?>		
						</div>	
					</div>
				</section>
					
				</article><!-- #post-## -->				
			<?php endwhile; // End of the loop.?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
