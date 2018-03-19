<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ryder-davies-partners
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

	<section class="blog_single">
		<div class="row">
			<div class="large-12 columns">
				<div class="row">
					<div class="large-6 medium-6 columns">
						<div class="blog_description">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					</div>
					<div class="large-6 medium-6 columns">
						<div class="blog_image">
							<?php if(get_post_format() == 'video') : ?>
								<?php if(get_field('post_video')) : ?>
									<div class="video-container">
										<?php the_field('post_video');?>
									</div>
								<?php else: ?>
									<?php if(has_post_thumbnail()) : ?>
					                	<?php the_post_thumbnail(array(565,412));?>
					                <?php else: ?>
					                    <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Placeholder&w=565&h=412">
					                <?php endif; ?>
								<?php endif;?>
							<?php else: ?>
								<?php if(has_post_thumbnail()) : ?>
				                	<?php the_post_thumbnail(array(565,412));?>
				                <?php else: ?>
				                    <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Placeholder&w=565&h=412">
				                <?php endif; ?>
							<?php endif; ?>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="pagination_bottom">
		<div class="row">
			<div class="large-12 columns">
				<?php
					$prev_post = get_previous_post(); $next_post = get_next_post();
					 if(!empty($prev_post)):
					        echo '<a href="'.get_the_permalink($prev_post->ID).'"> PREVIOUS STORY </a>';
					  endif;
				?>
					<a href="<?php echo get_permalink(255); ?>" title=""> NEWS PAGE </a>
				<?php
					if(!empty($next_post)):
					     echo '<a href="'.get_the_permalink($next_post->ID).'" > NEXT STORY </a>';
					endif;
				?>
			</div>
		</div>

	</section>


<?php endwhile;?>
<?php endif;?>

<?php get_footer();
