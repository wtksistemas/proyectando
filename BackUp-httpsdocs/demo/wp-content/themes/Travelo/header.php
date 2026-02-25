<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html <?php language_attributes(); ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	
    <?php if(get_field("site_favicon","options")): ?>
    <link rel="icon" type="image/png" href="<?php the_field("site_favicon","options"); ?>" />
    <?php endif; ?>
	
	
	<script>
        var theme_directory = "<?php echo get_template_directory_uri(); ?>";
    </script>
    <?php 
        $costumCss = get_field('custom_css','options');
        if($costumCss)
        {
            echo '<style type="text/css">'.$costumCss.'</style>';
        }
        $costumJavascript = get_field('custom_javascript','options');
        if($costumJavascript)
        {
            echo '<script type="text/javascript">
                jQuery.noConflict();
                (function($) {
                  '.$costumJavascript.'
                })(jQuery);
                </script>';
        }
       ?>
    	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<?php $webFont = get_field('google_fonts','options');
			if($webFont):
				wp_enqueue_style("Content-Font","http://fonts.googleapis.com/css?family=".$webFont['family'], false, "1.0");
		?>
			<style>
				body , input, textarea, .bucketBlog h3, .hasDatepicker, .sbHolder, #addReviewBtn, .bookFormBtnSubmit, .bookFormBtnReset{
					font-family:<?php echo $webFont['family']; ?>!important;
				}
			</style>
		<?php endif;?>
		
		

<div class="headerBg">
<div class="header">
			
			<?php $logo = get_field('logo','options');?>
            <?php if($logo):?>
            <a href="<?php echo get_site_url(); ?>" class="logo"><img src = "<?php echo $logo['sizes']['logo'];?>"/></a>
	        <?php else:?>
                  <a href="<?php echo get_site_url(); ?>" class="titleLogo"><?php bloginfo('name');?></a>
            <?php endif;?>

	<i id="menuResponsiveBtn" class="icon-reorder icon-large"></i>
	<div class="menuWrapper">
	<nav>
        <?php wp_nav_menu(array());?>
    </nav>		
    </div>
</div>
<?php if(get_field('do_shortcode')):?>
	<?php 
		$revSlider = get_field('do_shortcode');
		if (preg_match('/(\[.* )(.*?)(\])/', $revSlider, $matches)) {
			putRevSlider($matches[2]);
		}
		else{
			putRevSlider($revSlider);
		}
		if(is_page_template('template-home.php')){
			 if(!get_field('disable_search','options')){
					echo '<div class="slider">'; 
					   printFilter(); 
					   printWidgetFilter(); 
				   echo '</div>';
			 }
		}
	?>
<?php else: ?>
		<?php $deffault_image = get_field('default_image','options'); ?>
		<?php if(!is_page_template('template-home.php')):?>
						<div class="sliderBg">
							
						 <?php if(has_post_thumbnail()):
									 the_post_thumbnail('page_featured_image');  
								else:?>
										<?php if ($deffault_image):?>
											<img src="<?php echo $deffault_image;?>"/>
										 <?php endif;?>
								<?php endif;?>
							 <div class="slide-content">
								<?php if (has_post_thumbnail() || is_page_template('template-search.php') || is_page_template('template-contact.php') || is_page_template('template-travels.php') || is_page_template('template-booking.php') || ($post->post_title == "Blog")):?>
											<?php if(is_archive()): ?>
												<a><?php _e('Archive','um_lang');?></a>
											<?php elseif(is_search()): ?>
												<a><?php _e('Search','um_lang');?></a>
											<?php else:?>
												<a><?php the_title();?></a>
											<?php endif;?>
								<?php endif;?>
							</div>
						</div>
		<?php else: ?>
					<div class="slider">
								<?php $posts = get_field('tours', get_queried_object_id());   
							if($posts): ?>
								<div class="slides">
									   <?php foreach( $posts as $post):
												if (!is_numeric($post)):
														setup_postdata($post);
														$categories = wp_get_post_terms($post->ID,"tour_category");
														$showCategorie = get_field("category_on_slider");
															if($showCategorie)
															{
																if($categories)
																{
																	$category = $categories[0]->name;
																	$category_link = get_term_link($categories[0]->slug,"tour_category");
																}
																else
																{
																	$category = "";
																	$category_link = "";
																}
															}
															else
															{
																$category = "";
																$category_link = "";
															}?>
									<div class="slide">
											<?php  if(has_post_thumbnail()):
														the_post_thumbnail('home_slider_featured_image');
													else:?>
														<img src="<?php echo $deffault_image;?>"/>
												<?php endif; ?>
												
										<div class="slide-content">
											<div class="mainText">
												<a href="<?php the_permalink(); ?>">
													<h2><?php the_title();?></h2>
													<h4><?php the_field("tour_description_slider"); ?></h4>
												</a>
											</div><!--END mainText-->
													<h3 class="price"><a href="<?php echo $category_link ?>"> <?php if(!get_field('disable_all_price','options')):?> <strong><?php the_field('tour_currency'); the_field('price');?></strong><?php endif;?> <?php echo $category; ?></a></h3>
										</div>
									</div><!--END slide-->
								   
										 <?php endif;?>
									<?php endforeach; 
											wp_reset_postdata();?>
								</div>
							<?php else: ?>
									<?php if ($deffault_image):?>
										<div class="slides">
											<div class="slide">
														<img src="<?php echo $deffault_image;?>"/>
											</div>
										</div>
									<?php endif;?>
								<?php endif;?>
								<?php if(!get_field('disable_search','options')):?>
										  <?php printFilter(); ?>
										  <?php printWidgetFilter(); ?>
								<?php endif;?>
					</div><!-- END slider -->
		<?php endif; ?>
				
<?php endif;?>		
