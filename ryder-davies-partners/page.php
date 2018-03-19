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

	<div class="row">
		<div class="large-12 columns">
			<?php
			while ( have_posts() ) : the_post();?>
			<section class="section-banner">
	<div class="row column">
		<div class="reslider-image">
			<ul class="rslides">
				<?php $i=1; ?>
				<?php if( have_rows('slider') ): ?>	   
				<?php while( have_rows('slider') ): the_row(); ?>	
					<?php	
						$home_slider_image = get_sub_field('slider_image');
						$home_slider_image = wp_get_attachment_image_src($home_slider_image, 'large'); 
						$home_slider_image = $home_slider_image[0]; 
						$caption = get_sub_field('slider_caption');
					?>
						
				<li class="<?php if($i==1):?>is-active<?php endif; ?> orbit-slide primary-block">
					<div class="row">
						<div class="large-3 medium-12 columns">
							<div class="slide-caption">
								<?php if(!empty($caption)){echo $caption;}	?>								
							</div>
						</div>
						<div class="large-9 medium-12 columns"> 
						<?php if(!empty($home_slider_image)):?>
						<img class="orbit-image" src="<?php echo $home_slider_image; ?>" alt="Space"> </div>
						<?php else: ?>
						<img class="orbit-image" src="https://placeholdit.imgix.net/~text?txtsize=33&txt=DummyImage&w=870&h=450" alt="Space"> </div>
						<?php endif; ?>
					</div>
				</li>
				<?php $i++; ?>				
			 <?php endwhile; ?>
			<?php endif; ?>	
			</ul>
			</div>
		</div>
	</section>

	<?php get_template_part( 'template-parts/content', 'page' );?>
				

	<?php endwhile; ?>
	</div>		
</div>

<?php

get_footer();
