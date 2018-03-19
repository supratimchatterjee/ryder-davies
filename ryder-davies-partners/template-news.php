<?php
/**
 * Template Name: News
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

	<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array('post_type'=>'post', 'posts_per_page'=>6 , 'paged' => $paged);
		$query = new WP_Query($args);
	?>

	<?php  ?>
	<?php if ($query->have_posts()) : ?>
	<section class="blog_news">
		<div class="row">
		    <?php while ($query->have_posts()) : $query->the_post(); ?>
			<div class="large-4 medium-6 small-12 columns">
				<div class="blog">
				<?php if(has_post_thumbnail()) : ?>
                	<?php the_post_thumbnail(array(370,257));?>
                <?php else: ?>
                    <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Placeholder&w=369&h=254">
                <?php endif; ?>
					<div class="blog_info">
						<h2><?php the_title();?></h2>
						<p><?php echo wp_trim_words( get_the_content(), 24, '' );?></p>
						<a class="medium button secondary-block" href="<?php the_permalink(); ?>">LEARN MORE</a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<div class="pageination">
        		<?php //wp_pagenavi( array( 'query' => $query ) ); ?>
    		</div>

    		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>
		</div>
	</section>
	<?php endif; wp_reset_query(); ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();
