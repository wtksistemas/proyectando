<?php
/*
Template Name:Contact
*/
$contacted = FALSE;
$latlang = get_field("google_map");

function ContactError($fieldName)
{
    wp_die(__('Error: please fill the Field "'.$fieldName.'"!','um_lang' ) .
    __('<a onclick="history.go(-1)"><p style="cursor: hand; cursor: pointer;">Back</p></a>'));
}

 if(isset($_POST["um_submitted"]) && $_POST["um_submitted"])
 {
    if(!(isset($_POST["um_name"]) && $_POST["um_name"]))
    {
        ContactError('Name');
    }
    else if(!(isset($_POST["um_email"]) && $_POST["um_email"]))
    {
        ContactError('E-mail');
    }
    else if(!(isset($_POST["um_comment"]) && $_POST["um_comment"]))
    {
      ContactError('Comment');  
    }
    else
    {
        $name = $_POST["um_name"];
        $email = $_POST["um_email"];
        $comments = $_POST["um_comment"];
        $phone = '';
        if((isset($_POST["um_phone"]) && $_POST["um_phone"]))
        {
            $phone = $_POST['um_phone'];
        }
        if($phone != '')
        {
          $body = "Name: $name nnEmail: $email nnComments: $comments nnPhone : $phone";
        }
        else
        {
            $body = "Name: $name nnEmail: $email nnComments: $comments";
        }
            $emailTo = get_option('admin_email');
            $subject = 'Contact Form Submission from '.$name;
            $headers = 'From: My Site <'.$emailTo.'>' . "rn" . 'Reply-To: ' . $email;
            mail($emailTo, $subject, $body, $headers); 
            $contacted = TRUE;
    }
 }

get_header();
?>

            <script>
			jQuery(document).ready(function ($) {
                var myCenter=new google.maps.LatLng(<?php echo $latlang['coordinates']; ?>);

                function initialize()
                {
                    var mapProp = {
                      center:myCenter,
                      zoom:5,
                      mapTypeId:google.maps.MapTypeId.ROADMAP
                 };

                var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                var marker=new google.maps.Marker({
                  position:myCenter,
                  });

                marker.setMap(map);
                }

                google.maps.event.addDomListener(window, 'load', initialize);
			});
            </script>

<div class="contactContent">

	<div class="mainContent">
				<div class = "blankBody"id ="Blank">
						<?php setup_postdata($post);?>
							<?php the_content();?>
						<?php wp_reset_postdata();?> 
				</div>
            </div>

    <?php if(!get_field('disable_map')):?>
        <div class="mapView">
                <div id="googleMap"  style="width:370px;height:500px;"></div>
        </div>
    <?php endif;?>

        <div id="um_contactForm" class="contactForm">

            <h5><b><?php the_field('contact_form_name');?></b></h5>


    <?php if(!$contacted):?>
            <form method="post" class="contact">
                  <input type="hidden" name="um_submitted" value="true" />

                <div class="reviewInput">        
                    <label><b><?php _e('Name:','um_lang');?></b></label><br />
                    <input name="um_name" type="text" id="um_contactName" class="contactInputFields"/>
                </div>
                <div class="reviewInput">
                    <label><b><?php _e('E-mail:','um_lang');?></b></label><br />
                    <input type="email" name ="um_email" id="um_contactEmail" class="contactInputFields"/>
                </div>

                <?php if(!get_field('disable_phone')):?>
                <div class="reviewInput">
                    <label><b><?php _e('Phone:','um_lang');?></b></label><br />
                    <input type="text" name="um_phone" id="um_contactPhone" class="contactInputFields"/>
                </div>
                <?php endif;?>
                
                <div class="reviewInput">
                    <label><b><?php _e('Comment:','um_lang')?></b></label><br />
                    <textarea  name="um_comment" id="um_contactComment" class="contactText"></textarea>
                </div>
                <div class="reviewInput">
                    <input type="button" id="submitContactBtn" value="Submit" class="contactSendBtn"></input>
                </div>
                <div class="reviewInput">
                  <input type="reset" class="reviewResetBtn"></input>
                </div>        
            </form>
    <?php else:?>
        
             <div class="resultWrapper">
        <h3 class="orange"><?php _e("Thank You.","um_lang");?></h3>
        <p><?php _e("Your message has been sent.","um_lang");?></p>
        <p class="smile">:)</p>
    </div>
        <?php endif;?>


            <div class="contactInfo">
                <?php if(!get_field('disable_location')): ?>
                <div class="firstContactinfo">
                    <h6><?php _e('Location','um_lang');?></h6>
                    <p><?php the_field('location'); ?></p>
                </div>
                <?php endif;?>
                <?php if(!get_field('disable_contact_info')):?>
                <div class="secondContactinfo">
                    <h6><?php _e('Contact Info','um_lang');?></h6>
                    <p><b><?php _e('Mobile: ','um_lang');?></b><?php the_field('mobile');?></p>
                    <p><b><?php _e('Email: ','um_lang');?></b><?php the_field('email');?></p>
                    <p><b><?php _e('Fax: ','um_lang');?></b><?php the_field('fax');?></p>
                </div>
                <?php endif;?>
            </div>

        </div>
    </div>

<?php get_footer();?>