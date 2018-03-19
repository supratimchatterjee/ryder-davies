<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ryder-davies-partners
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700,400italic' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42248794-19', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
<?php
	$cart_link = get_field('_cart_link', 'options');
	$account_link = get_field('_account_link', 'options');
	$registration = get_field('registration', 'options');
	$t_link = get_field('twiter_link','option');
	$y_link = get_field('youtube_link','option');

?>
<div class="off-canvas-wrapper">
<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>

	<div class="off-canvas position-left mobile-ofc" id="offCanvas" data-off-canvas>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'vertical menu' ) ); ?>
			<div class="section-heading">
				<?php the_field('_header_tagline', 'options'); ?>
			</div>
			<div class="header-contact-blocks">
				<?php if( have_rows('_rd_centers', 'options') ): ?>	   
				<?php while( have_rows('_rd_centers', 'options') ): the_row(); 
				$center = get_Sub_field('_center');
				$phone_number = get_Sub_field('_phone_number');
				?>
				
					<strong><span><?php echo $center; ?></span>: <?php echo $phone_number; ?></strong>
				
				<?php endwhile; ?>
				<?php endif; ?>	
			</div>			
			<div class="top-header-bar primary-block">
				<?php if( have_rows('_facebook_llinks', 'options') ): ?>	   
				<?php while( have_rows('_facebook_llinks', 'options') ): the_row(); 
				$fb_link = get_Sub_field('_fb_link');
				$fb_label = get_Sub_field('_fb_label');
				?>
				
					<?php if(!empty($fb_label)):?><a href="<?php echo $fb_link; ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/facebook-icon.svg"> <span><?php echo $fb_label;  ?></span>
					</a><?php endif; ?>
					
					
				<?php endwhile; ?>
				<?php endif; ?>
                <?php if ($t_link):?><a href="<?php echo $t_link;?>" target="_blank"><img class="new" src="<?php echo get_template_directory_uri(); ?>/img/twitter-icon.svg"></a><?php endif;?>
                <?php if ($y_link):?><a href="<?php echo $y_link;?>" target="_blank"><img class="new" src="<?php echo get_template_directory_uri(); ?>/img/youtube-icon.svg"></a><?php endif;?>
					<?php if($registration):?>
					<a href="<?php echo $registration; ?>" target="_blank"><img class="new" src="<?php echo get_template_directory_uri(); ?>/img/pencil-icon.svg"> <span>REGISTRATION</span></a>
					<?php endif;?> 
					<!--<a href="<?php echo $cart_link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-cart.png"> <span>SHOP</span></a>
					<a href="<?php echo $account_link; ?>" class="secondary-block"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-user.png"><span> MY ACCOUNT</span></a> 
					--><
					</div>
			
		</div>

	<div class="off-canvas-content" data-off-canvas-content>
		<header class="header">
			<div class="top-header-bar primary-block">
				<div class="row">
					<div class="medium-6 columns socail"> 
						<?php if( have_rows('_facebook_llinks', 'options') ): ?>	   
						<?php while( have_rows('_facebook_llinks', 'options') ): the_row(); 
						$fb_link = get_Sub_field('_fb_link');
						$fb_label = get_Sub_field('_fb_label');
						?>
						
							<?php if(!empty($fb_link)):?><a target="_blank" href="<?php echo $fb_link; ?>"><?php endif; ?>
								<?php if(!empty($fb_label)):?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/facebook-icon.svg"> <span><?php echo $fb_label;  ?></span>
								<?php endif; ?>
							<?php if(!empty($fb_link)):?></a><?php endif; ?>
							
						<?php endwhile; ?>
						<?php endif; ?>	
					</div>
					<div class="medium-6 columns text-right"> 
                      <?php if ($t_link):?><a href="<?php echo $t_link;?>" target="_blank"><img class="new" src="<?php echo get_template_directory_uri(); ?>/img/twitter-icon.svg"></a><?php endif;?>
                <?php if ($y_link):?><a href="<?php echo $y_link;?>" target="_blank"><img class="new" src="<?php echo get_template_directory_uri(); ?>/img/youtube-icon.svg"></a><?php endif;?>
						<?php if($registration):?>
						<a href="<?php echo $registration; ?>" target="_blank"><img class="new" src="<?php echo get_template_directory_uri(); ?>/img/pencil-icon.svg"> <span>REGISTRATION</span></a> 
						<?php endif;?>
						<!--<a href="<?php echo $cart_link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-cart.png"> <span>SHOP</span></a> 
						<a href="<?php echo $account_link; ?>" class="secondary-block"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-user.png"><span> MY ACCOUNT</span></a> -->
					</div>
				</div>
			</div>
			<div class="header-main">
				<div class="row">
					<div class="large-6 medium-8 small-9 columns">
						<a href="<?php echo home_url('/')?>" class="logo">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="">
							<span class="site-title">RYDER-DAVIES & PARTNERS</span>
							<span class="site-tagline">Veterinary Practice</span>
						</a>
					</div>
					<div class="large-6 medium-4 small-3 columns header-contact text-right">
						<button type="button" class="button primary-block menu-trigger" data-toggle="offCanvas">Menu</button>
						<div class="section-heading">
							<?php the_field('_header_tagline', 'options'); ?>
						</div>
						<div class="header-info"> 
							<div class="row header-contact-blocks">
							<?php if( have_rows('_rd_centers', 'options') ): ?>	   
							<?php while( have_rows('_rd_centers', 'options') ): the_row(); 
							$center = get_Sub_field('_center');
							$phone_number = get_Sub_field('_phone_number');
							?>
						
								
								<div class="small-12 medium-6 columns">
									<strong><span><?php echo $center; ?></span>: <?php echo $phone_number; ?></strong>
								</div>
								
							<?php endwhile; ?>
							<?php endif; ?>	
							
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row column">	
				<nav class="navigation">
					<div class="navigation-left secondary-block large-9 columns">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu dropdown' ) ); ?>
						
					</div>
					<div class="navigation-right primary-block large-3 columns">
						<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
							<input type="text" size="20" name="s" id="s" value="<?php _e('Search') ?>..."  onblur="if(this.value=='') this.value='<?php _e('Search') ?>...';" onfocus="if(this.value=='<?php _e('Search') ?>...') this.value='';"/>
							<input type="hidden" value="page" name="post_type">
							<input value="" type="submit">
						  </form>
							
					</div>
				</nav>
			</div>
		</header>
