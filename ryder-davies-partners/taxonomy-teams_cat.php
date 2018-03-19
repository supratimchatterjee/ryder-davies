<?php
/**
 * The template for displaying all pages.
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

		<?php $queried_object = get_queried_object();?>
        <?php $tax_ID = $queried_object->term_id; ?>

	<div class="row">
		<div class="large-12 columns">
			<h2 class="cs-adjust-1"><?php the_field('heading_team','option'); ?></h2>

			<article class="cs-adjust-2">
				<section class="section-blocks text-center">
					<div class="row">
						<div class="large-12 columns">
						<div class="child-menu cs-tab-area">
							<?php  $terms = get_terms('teams_cat'); ?>
							<ul>
								<?php foreach ($terms as $term) :?>
								<?php $term_id = $term->term_id; ?>
            					<?php $class = $term_id  == $tax_ID ? 'active' : '' ; ?>
								<li class="<?php echo $class; ?>"> <a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name;?></a></li>
								<?php endforeach; ?>

							</ul>
							</div>
						</div>		
					</div>
					<?php
					while ( have_posts() ) : the_post();?>
					<div class="section-content">
						<div class="row">
							<div class="large-3 columns">
								<?php
								$sf_image = get_post_thumbnail_id();
								$sf_image  = wp_get_attachment_image_src( $sf_image, array(275,340));
								$sf_image = $sf_image[0];
								?>
								<img src="<?php echo $sf_image; ?>" alt="">
							</div>
							<div class="large-9 columns cs-adjust-3" >
								<h1><?php the_title();?> <strong><?php the_field('sub_heading');?></strong></h1>
								<h2><?php the_field('sub_heading_two');?></h2>
								<?php the_content(); ?>	
							</div>	
						</div>	
					</div>
					<?php endwhile; ?>
				</section>
			</article>
			
		</div>		
	</div>

<?php
get_footer();
