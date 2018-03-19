<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ryder-davies-partners
 */

?>
	<footer class="foot">
		<div class="secondary-block">
			<div class="row column">
				<div class="footer-top">
				<?php if( have_rows('_footer_widgets', 'options') ): ?>	   
				<?php while( have_rows('_footer_widgets', 'options') ): the_row(); 
					$widgets_title = get_Sub_field('_widgets_title');
					$short_description = get_Sub_field('_short_description');
				?>
					<div class="large-3 columns">
						<h6><?php echo $widgets_title; ?></h6>
						<p><?php echo $short_description; ?></p>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>						
				</div>
			</div>
			<div class="row text-center">
				<?php $logos = get_field('footer_logo', 'options'); ?>
				<?php if($logos) : ?>
				<?php foreach( $logos as $logo ): ?>
					<div class="footer-logo tm-inline">
	                	<img src="<?php echo $logo['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	                </div>
		        <?php endforeach; ?>
		    	<?php endif; ?>
			</div>		
		</div>
		<div class="footer-bottom primary-block">
			<div class="row">
				<div class="large-12 columns">					
						<?php the_field('_copyright', 'options'); ?>
					<p class="footer-line">Designed by <a target="_blank" href="http://www.firebrandcreative.com">Firebrand</a> : Made by <a href="http://madebyfuse.com">Fuse</a> : Photography by <a href="https://www.buffythompsonphotography.co.uk/">Buffy Thompson</a> &amp; Shutterstock</p>
				</div>
			</div>
		</div>
	</footer>
</div>
</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
