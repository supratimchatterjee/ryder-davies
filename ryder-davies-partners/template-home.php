<?php
/**
 * Template Name: Home
 */

get_header(); ?>
	<?php if ( have_posts() ) : ?>
 	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php $short_description = get_field('_short_description'); ?>
		<?php $surgery_description = get_field('_surgery_description'); ?>	
		
		
	<section class="section-banner">
	<div class="row column">
		<div class="reslider-image">
			<ul class="rslides">
				<?php $i=1; ?>
				<?php if( have_rows('_home_slider') ): ?>	   
				<?php while( have_rows('_home_slider') ): the_row(); ?>	
					<?php	
						$home_slider_image = get_sub_field('_image');
						$home_slider_image = wp_get_attachment_image_src($home_slider_image, 'slider-image'); 
						$home_slider_image = $home_slider_image[0]; 
						$caption = get_sub_field('_caption');
						$button_label = get_sub_field('_button_label');
						$button_link = get_sub_field('_button_link');
					?>
						
				<li class="<?php if($i==1):?>is-active<?php endif; ?> orbit-slide primary-block">
					<div class="row">
						<div class="large-3 medium-12 columns">
							<div class="slide-caption">
								<?php if(!empty($caption)){echo $caption;}	?>
								<?php if(!empty($button_label)):?>
									<a class="large button secondary-block" href="<?php echo $button_link ;?>"><?php echo $button_label ;?></a>
								<?php endif;?>
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
	<section class="section-mid-heading">
		<div class="row">
			<div class="large-12 columns">
				<div class="text-center narrow">
					<h4><?php echo $short_description ;?></h4>
				</div>			
			</div>
		</div>	
	</section>
	<section class="section-services">
		<div class="row">
			<?php if( have_rows('_home_module') ): ?>	   
			<?php while( have_rows('_home_module') ): the_row(); ?>	
			
				<?php $sf_image = get_sub_field('_module_image'); ?>
				<?php $sf_image = wp_get_attachment_image_src($sf_image, 'module_img_size'); ?>    <!-- coustom IMAGE size -->
				<?php $sf_image = $sf_image[0]; ?>
			
				<?php $module_title = get_sub_field('_module_title'); ?>
				<?php $module_link = get_sub_field('_module_link'); ?>
				
		
			<div class="large-4 medium-4 columns">
			<?php if(!empty($module_link)):?><a href="<?php echo $module_link?>"><?php endif; ?>
			
				<h2><?php echo $module_title; ?></h2>
				<?php if(!empty($sf_image)):?>
					<img src="<?php echo $sf_image; ?>" alt="">
				<?php else :?>
					<img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=DummyImage&w=370&h=230" alt="">
				<?php endif;?>
			<?php if(!empty($module_link)):?></a><?php endif; ?>
			
			</div>
		 <?php endwhile; ?>
		 <?php endif; ?>	
		</div>	
	</section>

	<section class="section-contact">
		<div class="row">
			<div class="large-6 columns">
				<div class="col-first primary-block">
					<h2 class="underline">Our Surgeries</h2>
						<div class="row">
						<div class="large-7 medium-7 small-12 columns">
							<?php echo $surgery_description; ?>
						</div>
						
					<div class="large-5 medium-5 small-12 columns col-pin text-center">
					<?php if( have_rows('_surgery_units') ): ?>	   
					<?php while( have_rows('_surgery_units') ): the_row(); ?>
					
						<?php $unit_name = get_sub_field('_unit_name');?>
						<?php $unit_link = get_sub_field('unit_link');?>
											
						<?php if(!empty($unit_name)):?><a href="<?php echo $unit_link; ?>"><strong><?php echo $unit_name; ?></strong></a><?php endif; ?>
											
					<?php endwhile; ?>
					<?php endif; ?>		
						<img src="<?php echo get_template_directory_uri(); ?>/img/map-pin.png" alt="">
					</div>
					</div>

				</div>
			</div>		
			<div class="large-3 columns">
				<div class="col-mid primary-block">				
					<div class="row">					
						<h2 class="underline">Latest News</h2>
						<?php 
						// args
						$args = array(
							  'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => '2'
						);				
						// query
						$the_query = new WP_Query( $args );
						?>
						<?php if( $the_query->have_posts() ): ?>
							<?php $i = 1; ?>
						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
												
							<p><strong><?php the_time('j F Y'); ?></strong></p>
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<p><?php echo excerpt('20');?>...</p>
							<strong><a href="<?php the_permalink(); ?>">READ MORE</a></strong>
							<div <?php if($i==1):?>class="underline" <?php endif; ?>></div>
							<?php $i++; ?>
						<?php endwhile; ?>
						<?php endif; ?>
						<?php wp_reset_query();	?>					
						
					</div>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="col-last">				
					<div class="row">					
						<h2 class="secondary-block">Find Us</h2>					
						<div id="map_wrapper">
						    <div id="map_canvas" class="mapping"></div>
						</div>
						<script type="text/javascript">
							jQuery(function($) {
							    // Asynchronously Load the map API 
							    var script = document.createElement('script');
							    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
							    document.body.appendChild(script);
							});

							function initialize() {
							    var map;
							    var bounds = new google.maps.LatLngBounds();
							    var mapOptions = {
							        mapTypeId: 'roadmap'
							    };
							                    
							    // Display a map on the page
							    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
							    map.setTilt(45);
							        
							    // Multiple Markers
							    var markers = [
							<?php if( have_rows('_map') ): ?>	   
								<?php $m = 1 ; ?>
							<?php while( have_rows('_map') ): the_row(); ?>
								<?php $location = get_sub_field('_google_map'); ?>
								<?php if( $m != 4 ): ?>
							        ['<?php the_sub_field( '_map_title' ); ?>', <?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>],
							    <?php else: ?>
							    	['<?php the_sub_field( '_map_title' ); ?>', <?php echo $location['lat']; ?>,<?php echo $location['lng']; ?>]
							    <?php endif ?>
							    <?php $m++; ?>
							<?php endwhile; ?>
							<?php endif; ?>
							    ];
							                        
							    // Info Window Content
							    var infoWindowContent = [
							    <?php if( have_rows('_map') ): ?>	   
								<?php $n = 1 ; ?>
								<?php while( have_rows('_map') ): the_row(); ?>
									<?php if( $n != 4 ): ?>
							        ['<div class="info_content">' +
							        '<h3><?php the_sub_field( '_map_title' ); ?></h3>' +
							        '</div>'],
							        <?php else: ?>
							        ['<div class="info_content">' +
							        '<h3><?php the_sub_field( '_map_title' ); ?></h3>' +
							        '<p><?php the_sub_field( '_map_description' ); ?></p>' +
							        '</div>']						        
								    <?php endif ?>
								    <?php $n++; ?>
								<?php endwhile; ?>
								<?php endif; ?>						        
							    ];
							        
							    // Display multiple markers on a map
							    var infoWindow = new google.maps.InfoWindow(), marker, i;
							    
							    // Loop through our array of markers & place each one on the map  
							    for( i = 0; i < markers.length; i++ ) {
							        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							        bounds.extend(position);
							        marker = new google.maps.Marker({
							            position: position,
							            map: map,
							            title: markers[i][0]
							        });
							        
							        // Allow each marker to have an info window    
							        google.maps.event.addListener(marker, 'click', (function(marker, i) {
							            return function() {
							                infoWindow.setContent(infoWindowContent[i][0]);
							                infoWindow.open(map, marker);
							            }
							        })(marker, i));

							        // Automatically center the map fitting all markers on the screen
							        map.fitBounds(bounds);
							    }

							    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
							    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
							        this.setZoom(7);
							        google.maps.event.removeListener(boundsListener);
							    });
							    
							}
						</script>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endwhile; endif; ?>	
<?php

get_footer();
