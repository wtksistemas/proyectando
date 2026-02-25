
	<div class="footerBg">
		<div class="footer">
    	<?php if(!(get_field('disable_text_field','options'))):?>
       		<div class="footerBucketContent">
				<h3> <?php the_field("footer_text_title","options");?> </h3>
				<p> <?php the_field("footer_text_content","options");?> </p>
			</div>
            <?php endif;?>
            
        <?php if(!(get_field('disable_gallery','options'))):?>
        	<div class="footerBucketContent">
				<h3><?php the_field('gallery_title','options');?></h3>
				<?php $gallery = get_field('tour_gallery','options');
                if($gallery):
                foreach($gallery as $image):
                ?>
                <a class="fImage" href="<?php echo $image['tours'];?>">
					<div class="footer_imgHover"></div>
					<img class="footer_img" src="<?php echo $image['image']['sizes']['tour_footer'];?>">
				</a>
                <?php endforeach;?>
                <?php endif;?>
			</div>
            <?php endif;?>
            
            <?php if(!(get_field('disable_contact','options'))):?>
       		<div class="footerBucketContent">
				<h3><?php _e('Contact','um_lang');?></h3>
                   
				<?php if(get_field('address','options')):?><p><span class="bold"><b><?php _e('Address ','um_lang');?></b></span><?php the_field('address','options');?></p><?php endif?>
                <?php if(get_field('phone','options')):?><p><span class="bold"><b><?php _e('Phone ','um_lang');?></b></span>  <?php the_field('phone','options');?></p><?php endif?>
                <?php if(get_field('email','options')):?><p><span class="bold"><b><?php _e('Email ','um_lang');?></b></span>  <?php the_field('email','options');?></p><?php endif?>
			
            <?php $social = get_field('social_networks','options');
                if($social):?>
              <div class="aboutSocialFooter">
               <?php foreach($social as $network):?>
                    <a href="<?php echo $network['link'];?>"><?php echo $network['network'];?></a>
                  <?php endforeach;?>
            </div>    
              <?php endif;?>
               </div>
    	    <?php endif;?> 
    	</div><!-- END footer -->
        
        <hr />
        <div class="footer2">
    		<div class="copyRight1"><?php the_field('copyright_text_1','options')?></div>
        	
            <div class="copyRight2"><?php the_field('copyright_text_2','options')?></div>
    	</div><!-- END footer2 -->
        
        
	</div><!-- END footerBg -->
</div><!--wraper-->
<?php
wp_footer();
?>
</html>