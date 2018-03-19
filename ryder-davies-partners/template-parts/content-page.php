<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ryder-davies-partners
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="section-blocks text-center narrow">
	<div class="row">
		<div class="large-12 columns">
		<div class="child-menu">	
		 <?php
			if ( $post->post_parent ) {
				$children = wp_list_pages( array(
					'title_li' => '',
					'child_of' => $post->post_parent,
					'echo'     => 0
				) );
			} else {
				$children = wp_list_pages( array(
					'title_li' => '',
					'child_of' => $post->ID,
					'echo'     => 0
				) );
			}
			 
			if ( $children ) : ?>
				<ul>
					<?php echo $children; ?>
				</ul>
				<?php $i++; ?>
		    <?php endif; ?>
			</div>
			
		</div>		
	</div>

	<div class="section-content">
		<div class="row">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>		
		</div>	
	</div>
</section>
	
</article><!-- #post-## -->
