<?php
/*
Template Name:Search
*/
get_header(); 
        if(isset($_SESSION['filter_session'])){
            $args = $_SESSION['filter_session'];
            EndSession();    
        }
        else{
            $args = search_filter();
        }
        $the_SearchQuery = new WP_Query($args);    
?>

	<div class="mainContent positioning">
				<div class = "blankBody"id ="Blank">
						<?php setup_postdata($post);?>
							<?php the_content();?>
						<?php wp_reset_postdata();?> 
				</div>
	</div>
<?php printFilter('filterForm2', $args['meta_query'], $args['tax_query']); ?>
<?php printWidgetFilter($args['meta_query'], $args['tax_query']); ?>
<?php $slideDown = get_field("slide_down","options")?>
 <div class="bWrapp" <?php if($slideDown){ echo "id='SlideDown'"; }?> >
		
     
       <?php 
        if($the_SearchQuery->have_posts()):
         while ($the_SearchQuery->have_posts()) :
            $the_SearchQuery->the_post();   ?>
	        <?php get_template_part("content","bucket");?>
		<?php endwhile; ?>
		</div><!-- END bWrapp -->

    <?php else: ?>
	</div>
        <div class="resultWrapper">
            <h3 class="orange"> <?php  _e('No results.','um_lang'); ?> </h3>
            <p> <?php  _e("Sorry we couldn't find any results.","um_lang"); ?></p>
            <p class="smile">:(</p>
        </div>
    <?php endif; ?>


	
    <div style="clear:both"></div>
          

 <?php if($the_SearchQuery->max_num_pages > 1):?>
        <div class="contentPagesTravels">         
    <?php   
              if (function_exists("pagination")) {
                 pagination($the_SearchQuery->max_num_pages,1);
                }
        ?>
        </div> 
        <?php endif;?>
<?php get_footer(); ?>