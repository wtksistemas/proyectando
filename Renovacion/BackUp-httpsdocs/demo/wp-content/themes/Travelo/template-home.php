<?php
/*
Template Name:Home
*/
 get_header();
 
?>
        <div class="latestPost"> 
        <h5><?php _e("Latest Posts","um_lang"); ?></h5>
            <img src="<?php echo get_template_directory_uri().'/images/blog_arrow.png' ?>" />
        <?php
        $myposts = get_posts(array());
        foreach( $myposts as $post ) : ?>
	        <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
        <?php endforeach; ?>
        </div>
		
		
		<div class = "mainContent positioning">
			<div class = "blankBody"id ="Blank">
				<?php wp_reset_postdata();?>
				 <?php setup_postdata($post);?>
					<?php the_content();?>
				<?php wp_reset_postdata();?>
			</div>
		</div>
		
<div class="bucketWrapper">
       
        <ul class="prettyGallery">
<?php

$args1 = array(
    'post_type' => 'tours_post',
    'posts_per_page' => -1
    );
$the_query = new WP_Query($args1);

while ( $the_query->have_posts() ) :
	$the_query->the_post();
	?>
            <li>
            <div class="bucket">
			<?php if(!get_field('disable_all_price','options')):?>
                <h5><b><?php the_field('tour_currency'); the_field('price');?></b></h5>
                <?php endif; ?>
				<div class="imgHover"></div>
          
                    <?php 
                        if ( has_post_thumbnail() ) {
	                        the_post_thumbnail("tour_preview");
                        }
                        else {
	                        echo '<div class="bucketImgDefault"></div>';
                        }
                    ?>
            
        
                 <div class="bucketContent">
                        <a href="<?php the_permalink(); ?>"><h3><?php the_title();?></h3></a>
                </div>
            </div>
        </li>
 <?php endwhile; ?>
    </ul>
</div>



<?php
get_footer();
?>