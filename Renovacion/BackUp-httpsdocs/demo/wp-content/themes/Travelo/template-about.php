<?php
/*
Template Name:About
*/
get_header();
global $post;
setup_postdata($post);
?>

 <div class="aboutUsContent">
        <div class="aboutUsWrapper">
            <div class="aboutUsHeader">
                <h5><?php the_title();?></h5>
            </div>

             <div class="aboutUsBody">
                <?php the_content(); ?> 
            </div>
        </div><!-- END aboutUsWrapper-->

</div>

 <div class="aboutUsContent msnrParagraph ">
     <?php $paragraphs = get_field('paragraphs');
            if($paragraphs):
        foreach($paragraphs as $paragraph):
        ?>
     
        <div class="aboutUsBWrapper">
            <div class="aboutUsInfoHeader">
                <h5><?php echo $paragraph['title'];?></h5>
            </div>
            <div class="aboutUsInfoBody">
                <p><?php echo $paragraph['content'];?></p>
            </div>
        </div>

     <?php endforeach;?>
     <?php endif;?>
</div>
     <!-- END aboutUsWrapper -->
 <div class="aboutUsContent msnrStaff">
     <?php $staff_members = get_field('staff_members');
            if($staff_members):
                foreach($staff_members as $member):
        ?>
     
        <div class="aboutUsSWrapper">
            <div class="aboutUsStaffHeader">
            <img src="<?php echo $member['image']['sizes']['staff_preview']; ?>"/>
              
                    <h5><?php echo $member['full_name']; ?></h5>
                <h6 class="Title"><?php echo $member['position'];?></h6>
                
                <div class="aboutSocial">
                   
                    <?php if($member['facebook']): ?>
                    <a href="<?php echo  $member['facebook']; ?>">F</a>
                    <?php endif;?>
                    
                    <?php if($member['linked_in']): ?>
                    <a href="<?php echo  $member['linked_in']; ?>">l</a>
                    <?php endif;?>
                    
                    <?php if($member['twitter']): ?>
                    <a href="<?php echo  $member['twitter']; ?>">t</a>
                    <?php endif;?>
                </div>
            </div>
            <div class="aboutUsStaffBody">
                <p><?php echo $member['description']; ?></p>
            </div>
        </div>
      <?php endforeach;?>
     <?php endif;?>

    </div><!-- END aboutUsContent-->
<?php get_footer();?>
