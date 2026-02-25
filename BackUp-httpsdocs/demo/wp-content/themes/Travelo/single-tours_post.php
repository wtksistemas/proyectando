<?php
     get_header(); 
     global $post;
     setup_postdata( $post );
     ?>
   <script>
        var tourRate = "<?php echo get_field('rating'); ?>";
		<?php if(!get_field('disable_all_price','options')):?>
			 var priceValue ="<h5 class=\"sliderPrice\"><b><?php the_field('tour_currency'); the_field('price');?></b></h5>";
			<?php else:?>
			var priceValue = "";
		<?php endif; ?>
    </script>
 		    	<div class="contentCity">
            	<div class="leftCity">

   <div class="latestOffers"> 
            <h5><?php _e('Latest Tours','um_lang');?></h5>
             <img src="<?php echo get_template_directory_uri().'/images/blog_arrow.png' ?>" />
            <?php 
                $tours = array('post_type' => 'tours_post' , 'posts_per_page' => -1);
                $the_query = new WP_Query($tours);
                 while ( $the_query->have_posts() ) :
	            $the_query->the_post();
	            ?>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <?php 
                endwhile;
                 wp_reset_postdata();
                ?>
        </div>
                	<div class="citySlider">

                <div id="gallery" class="ad-gallery">
                  <div class="ad-image-wrapper">
                  </div>
                  <div class="ad-nav">
                    <div class="ad-thumbs">
                      <ul class="ad-thumb-list">
                        <?php 
                        $tour_images = get_field('tour_slider');
                        if($tour_images):
                            foreach($tour_images as $image):
                        ?>
                        <li>
                            <a href="<?php echo $image['image']; ?>">
                            <img src="<?php echo $image['image']; ?>">
                            </a>                      
                        </li>
                        <?php 
                            endforeach; 
                            endif;                       
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
      
                   </div>

                     <?php 
                        $taxonomies = array();
                        $tourCategories = get_field('filter_options_attributes','options');
                        if($tourCategories)
                        {
                            foreach($tourCategories as $cat)
                                {
                                        $current_cat = "um_".toAscii($cat["category_name"]);
                                        $tax = wp_get_post_terms($post->ID, $current_cat , array("fields" => "all")); 
                                        if(!empty($tax[0]->name))
                                        {
                                            array_push($taxonomies,array(
                                                    "Name"  => $cat["category_name"],
                                                    "Value" => $tax[0]->name
                                            ));
                                        }
                                 }
                        }
                    ?>
                    <div class="property">
                        <?php if($taxonomies):?>
                            <?php foreach($taxonomies as $tax):?>
                        	<div>   
                                <p><b><?php echo $tax['Name'];?></b></p>
                                <p><?php echo $tax['Value'];?></p>
                            </div>
                            <?php endforeach;?>
                        <?php endif;?>                               
                        <div>
                            <p><b><?php _e('Stars','um_lang');?></b></p>
                            <p class="ratingStars"></p>
                        </div>          
                    </div>
                </div>
                
                <div class="rightCity">
                	<h3><b><?php the_title();?></b></h3>

                    <?php
                         $available_dates = get_field('available_dates');
                            if($available_dates)
                            {
                                $count = count($available_dates);
                                if($count > 1)
                                {
                                     echo '<h6 class="blue">From <b>'.date("F d, Y", strtotime($available_dates[0]['arrival_date'])).'</b> to <b>'.date("F d, Y", strtotime($available_dates[$count - 1]['arrival_date'])).'</b></h6>';
                                }
                                else
                                {
                                     echo '<h6 class="blue">From <b>'.date("F d, Y", strtotime($available_dates[0]['arrival_date'])).'</b></h6>';
                                }
                            }
                            ?>

                    <p><?php the_content();?></p>
                    <table>    
                        <?php 
                            $checkForDefault = get_field('use_default_tour_attribute');
                            if($checkForDefault)    { $tour_attributes = get_field('tour_attributes','options'); }
                            else                    { $tour_attributes = get_field('tour_attributes'); }
                    
                            if($tour_attributes):
                                foreach($tour_attributes as $attribute):
                                    if($attribute['show_on_tour']):     
                        ?>
                        <tr>
                               <td><?php echo $attribute['attribute_name']?></td>
                                <td><?php echo $attribute['attribute_value']?></td>
                            </tr>
                        <?php
                              endif;
                              endforeach; 
                              endif;
                         ?>
                    </table> 
            
<?php 
  
   $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'template-booking.php',
                'hierarchical' => 0
        )); 

?>                 
            <form method="post" action="<?php echo get_permalink(get_page_by_title($pages[0]->post_title)); ?>" class="cityBook">
                <span class="selector">
                    <input type="hidden" name ="um_choose" value="<?php echo the_id();?>">
            	   <a href="" onclick="jQuery(this).closest('form').submit(); return false;"><div class="bookBtn"><p><?php _e('Book now','um_lang');?></p></div></a> 
                </span>
            </form>   
<?php wp_reset_postdata();?>            
                </div><!-- END rightCity -->
            </div><!-- END contentCity -->
    
            <?php $tabs = get_field("tabs");
                  $showTabs = get_field('show_on_page');
               if($showTabs):
                    if($tabs):
             ?>    
           <div class="tabHolder">
                <div class="tabsWrapper">
                    <div class="tabs">
                        <div class="tabsHeader">
                            <?php foreach($tabs as $tab): ?>
                	            <h5 class="tab"><?php echo $tab['title'];?></h5>
                            <?php endforeach;?>
                        </div>
                        <div class="tabsBody">
                            <?php foreach($tabs as $tab): ?>
								<div>							
     	                            <p><?php echo $tab['content'];?></p>
								</div>
							<?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
               <?php
                    endif;
                endif;
                ?>
                <?php if(get_field('show_reviews_on_page'))
                        {comments_template();}?>
                <?php get_footer(); ?>
               