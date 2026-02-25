<?php
/*
Template Name:Travels
*/
    $categoryName = '';
    if(isset($_POST["um_CatSearch"]) && $_POST["um_CatSearch"])
    {
        $categoryName = $_POST["um_CatSearch"];          
    }
get_header();?>
	<div class="mainContent positioning">
				<div class = "blankBody"id ="Blank">
						<?php setup_postdata($post);?>
							<?php the_content();?>
						<?php wp_reset_postdata();?> 
				</div>
	</div>

 <div class="filter2">
		<h5><b><?php _e("Show by Categories","um_lang");?></b></h5>
    
    
    <?php
        $template_file = get_post_meta( get_the_ID(), '_wp_page_template', TRUE );
        $terms = get_terms('tour_category');
        if($terms):
         foreach ( $terms as $term ) :
         ?>
          <form id="<?php echo 'um'.$term->name; ?>"  action="<?php the_permalink(); ?>" method="post"> 
          <input type="hidden" name="um_CatSearch" value="<?php echo $term->slug ?>">
     	       	
                   <a href="#" onclick="jQuery(this).closest('form').submit(); return false;"><?php echo $term->name; ?></a>
               
          </form>
        <?php 
            endforeach;
            endif; 
        ?>
       
            <form action="" method="post"> 
          <input type="hidden" name="um_CatSearch" value="">
                <a href="#" onclick="jQuery(this).closest('form').submit(); return false;"><?php _e("All","um_lang");?></a>
          </form>

	</div>
  
<?php $slideDown = get_field("slide_down","options")?>
 <div class="bWrapp" <?php if($slideDown){ echo "id='SlideDown'"; }?> >
<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    $args = array(
        'post_type'      => 'tours_post',
        'posts_per_page' => 6,
        'paged'          => $paged,
        'tour_category'  => $categoryName
    );

        $the_Query = new WP_Query($args);        
         while ($the_Query->have_posts())
          {
                $the_Query->the_post();   
                get_template_part("content","bucket");
	      }
?>
 </div><!-- END bWrapp -->
   
 <div style="clear:both"></div>
<?php if($the_Query->max_num_pages > 1):?>
 <div class="contentPagesTravels">
<?php
         if (function_exists("pagination")) 
            {
                pagination($the_Query->max_num_pages, 1,"");   
            }
?>
</div>
<?php endif;?>
<?php get_footer(); ?>