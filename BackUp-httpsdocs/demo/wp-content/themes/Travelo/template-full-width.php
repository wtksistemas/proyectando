<?php
/*
Template Name:Full Width
*/
get_header();
global $post;
setup_postdata($post);
?>
    <div class="mainContent positioning">
          <div class="blankHeader">
                <h5><?php the_title();?></h5>
            </div>
        <div class ="blankBody">
            <?php the_content(); ?>
        </div>
    </div>
<?php get_footer(); ?>
