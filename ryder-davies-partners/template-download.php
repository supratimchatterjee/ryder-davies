<?php
/**
 * Template Name: Download
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

	<section class="news_head">
		<div class="row">
			<div class="large-12 columns">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<?php if( have_rows('downloads') ): ?>	
	<section class="blog_news">
		<div class="row">
		   <?php while( have_rows('downloads') ): the_row(); ?>
		   	<?php  $text = get_sub_field('button_label');?>
		   		<?php  $link = get_sub_field('button_link');?>
		   		<?php
				  $sf_image = get_sub_field('image');
				  $sf_image = wp_get_attachment_image_src($sf_image, array(370,257));   
				  $sf_image = $sf_image[0];
				?>
			<div class="large-4 medium-6 small-12 columns">
				<div class="blog">
                    <img src="<?php echo $sf_image;?>">
					<div class="blog_info">
						<h2><?php the_sub_field('title');?></h2>
						<p><?php the_sub_field('content');?></p>
						<?php if($link):?>
						<a target="_blank" class="medium button secondary-block" href="<?php echo $link;?>"><?php echo $text;?></a>
						<?php endif;?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<div class="pageination">
        		
    		</div>
		</div>
	</section>
	<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>	
<?php get_footer();
