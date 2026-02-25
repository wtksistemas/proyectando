<?php
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */ 

// Fields 
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	include_once('add-ons/acf-repeater/repeater.php');
	//include_once('add-ons/acf-gallery/gallery.php');
	include_once('add-ons/acf-flexible-content/flexible-content.php');
}

// Options Page 
include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */


if(function_exists("register_field_group"))
{
register_field_group(array (
		'id' => 'acf_main',
		'title' => 'Main',
		'fields' => array (
			array (
				'key' => 'field_51d4377064949',
				'label' => 'Skins',
				'name' => 'skins',
				'type' => 'radio',
				'instructions' => 'Choose a skin for your website',
				'multiple' => 0,
				'allow_null' => 0,
				'choices' => array (
					'skin_default.css' => 'Default',
					'skin_blue.css' => 'Blue',
					'skin_green.css' => 'Green',
					'skin_orange.css' => 'Orange',
					'skin_pink.css' => 'Pink',
					'skin_purple.css' => 'Purple',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_51e4211bf77b9',
				'label' => 'Google Fonts',
				'name' => 'google_fonts',
				'type' => 'googlefonts',
				'instructions' => 'Choose a font for you website',
			),
			array (
				'key' => 'field_51e54b3aaec15',
				'label' => 'Disable Responsive',
				'name' => 'disable_responsive',
				'type' => 'true_false',
				'instructions' => 'Click if you want to disable Responsive',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51caf3141c21e',
				'label' => 'Disable all price',
				'name' => 'disable_all_price',
				'type' => 'true_false',
				'instructions' => 'Disables all the precises',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_51cc5fba3b2c2',
				'label' => 'Right Sidebar',
				'name' => 'right_sidebar',
				'type' => 'true_false',
				'instructions' => 'To setup the sidebar in the Right side.',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-main',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_revslider',
		'title' => 'RevSlider',
		'fields' => array (
			array (
				'key' => 'field_51e409e870ea2',
				'label' => 'Do shortcode',
				'name' => 'do_shortcode',
				'type' => 'text',
				'instructions' => 'Add the short code of the RevSlider here to appear on the header.',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tours_post',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_short-code-sliders',
		'title' => 'Short-code Sliders',
		'fields' => array (
			array (
				'key' => 'field_51d19c62d4eb6',
				'label' => 'Sliders',
				'name' => 'sliders',
				'type' => 'repeater',
				'instructions' => 'Use "Add Slider" button to add a new Slider',
				'sub_fields' => array (
					array (
						'key' => 'field_51d19cbbd4eb7',
						'label' => 'Unique Slider Name',
						'name' => 'slider_name',
						'type' => 'text',
						'instructions' => 'Use this Slider name for the shortcode -	Name must be unique.',
						'column_width' => 100,
						'default_value' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_51d19d40d4eb8',
						'label' => 'Theme',
						'name' => 'theme',
						'type' => 'select',
						'multiple' => 0,
						'allow_null' => 0,
						'choices' => array (
							'' => 'Default',
							'minimalist' => 'Minimalist',
							'round' => 'Round',
							'clean' => 'Clean',
							'square' => 'Square',
						),
						'default_value' => '',
						'column_width' => 100,
					),
					array (
						'key' => 'field_51d19d7dd4eb9',
						'label' => 'Size',
						'name' => 'size',
						'type' => 'select',
						'multiple' => 0,
						'allow_null' => 0,
						'choices' => array (
							'large' => 'Large',
							'medium' => 'Medium',
							'small' => 'Small',
						),
						'default_value' => '',
						'column_width' => 100,
					),
					array (
						'key' => 'field_51d19da8d4eba',
						'label' => 'Images',
						'name' => 'images',
						'type' => 'repeater',
						'instructions' => 'Use "Add Image" button to add a new image to the slider',
						'column_width' => 100,
						'sub_fields' => array (
							array (
								'key' => 'field_51d19dc0d4ebb',
								'label' => 'Image',
								'name' => 'image',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'id',
								'preview_size' => 'thumbnail',
							),
							array (
								'key' => 'field_51d19e4dd4ebd',
								'label' => 'Image Description',
								'name' => 'image_description',
								'type' => 'textarea',
								'column_width' => '',
								'default_value' => '',
								'formatting' => 'br',
							),
							array (
								'key' => 'field_51d19debd4ebc',
								'label' => 'Image Effet',
								'name' => 'image_effet',
								'type' => 'select',
								'multiple' => 0,
								'allow_null' => 0,
								'choices' => array (
									'random' => 'random',
									'randomSmart' => 'randomSmart',
									'cube' => 'cube',
									'cubeRandom' => 'cubeRandom',
									'block' => 'block',
									'cubeStop' => 'cubeStop',
									'cubeHide' => 'cubeHide',
									'cubeSize' => 'cubeSize',
									'horizontal' => 'horizontal',
									'showBars' => 'showBars',
									'showBarsRandom' => 'showBarsRandom',
									'tube' => 'tube',
									'fade' => 'fade',
									'fadeFour' => 'fadeFour',
									'paralell' => 'paralell',
									'blind' => 'blind',
									'blindHeight' => 'blindHeight',
									'blindWidth' => 'blindWidth',
									'directionTop' => 'directionTop',
									'directionBottom' => 'directionBottom',
									'directionRight' => 'directionRight',
									'directionLeft' => 'directionLeft',
									'cubeStopRandom' => 'cubeStopRandom',
									'cubeSpread' => 'cubeSpread',
									'cubeJelly' => 'cubeJelly',
									'glassCube' => 'glassCube',
									'glassBlock' => 'glassBlock',
									'circles' => 'circles',
									'circlesInside' => 'circlesInside',
									'circlesRotate' => 'circlesRotate',
									'cubeShow' => 'cubeShow',
									'upBars' => 'upBars',
									'downBars' => 'downBars',
									'hideBars' => 'hideBars',
									'swapBars' => 'swapBars',
									'swapBarsBack' => 'swapBarsBack',
									'swapBlocks' => 'swapBlocks',
									'cut' => 'cut',
								),
								'default_value' => '',
								'column_width' => '',
							),
						),
						'row_min' => 0,
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Image',
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Slider',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-shortcode-sliders',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916cb118',
		'title' => 'About Fields',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_51543c4cdcea1',
				'label' => 'Paragraphs',
				'name' => 'paragraphs',
				'type' => 'repeater',
				'instructions' => 'A paragraph to display your work',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_51543c4cdceb3',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_51543c4cdceb9',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'br',
						'order_no' => 1,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Paragraph',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_515444a5ac160',
				'label' => 'Staff Members',
				'name' => 'staff_members',
				'type' => 'repeater',
				'instructions' => '',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_515444a5ac169',
						'label' => 'Full Name',
						'name' => 'full_name',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_515444a5ac16d',
						'label' => 'Position',
						'name' => 'position',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 1,
					),
					2 => 
					array (
						'key' => 'field_515444a5ac171',
						'label' => 'Facebook',
						'name' => 'facebook',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 2,
					),
					3 => 
					array (
						'key' => 'field_515444a5ac174',
						'label' => 'Linked in',
						'name' => 'linked_in',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 3,
					),
					4 => 
					array (
						'key' => 'field_515444a5ac177',
						'label' => 'Twitter',
						'name' => 'twitter',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 4,
					),
					5 => 
					array (
						'key' => 'field_515444a5ac17a',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'order_no' => 5,
					),
					6 => 
					array (
						'key' => 'field_515444a5ac17e',
						'label' => 'Description',
						'name' => 'description',
						'type' => 'wysiwyg',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'br',
						'order_no' => 6,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add staff',
				'order_no' => 1,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-about.php',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916cb882',
		'title' => 'Animate',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_513e11e304aba',
				'label' => 'Slide Down',
				'name' => 'slide_down',
				'type' => 'true_false',
				'instructions' => 'Check to animate - slide down',
				'required' => '0',
				'message' => '',
				'order_no' => 0,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'options-main',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916cbc42',
		'title' => 'Booking Fields',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_51486df054962',
				'label' => 'Booking Field',
				'name' => 'booking_field',
				'type' => 'repeater',
				'instructions' => 'Use "Add field" to add a field, ',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_51486df054974',
						'label' => 'Field Name',
						'name' => 'field_name',
						'type' => 'text',
						'instructions' => 'Add a name to your field',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 0,
					),
					1 => 
					array (
						'choices' => 
						array (
							'text' => 'Text',
							'phone' => 'Phone',
							'num' => 'Number',
							'date' => 'Date',
						),
						'key' => 'field_51486df05497a',
						'label' => 'Type',
						'name' => 'type',
						'type' => 'select',
						'instructions' => 'Choose a type for your field',
						'column_width' => '',
						'default_value' => 'text : Text',
						'allow_null' => '0',
						'multiple' => '0',
						'order_no' => 1,
					),
					2 => 
					array (
						'key' => 'field_51486df054991',
						'label' => 'Is Mandatory',
						'name' => 'is_mandatory',
						'type' => 'true_false',
						'instructions' => 'Choose if the field is mandatory',
						'column_width' => '',
						'message' => '',
						'order_no' => 2,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Field',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_514870d0d4274',
				'label' => 'Extra Text',
				'name' => 'extra_text',
				'type' => 'true_false',
				'instructions' => 'Click to add an "Extra Message" filed on the booking page',
				'required' => '0',
				'message' => '',
				'order_no' => 1,
			),
			2 => 
			array (
				'key' => 'field_514871f8910bd',
				'label' => 'Terms and Conditions ',
				'name' => 'terms_and_conditions',
				'type' => 'true_false',
				'instructions' => 'Click to add	"Terms and Conditions"	to the page',
				'required' => '0',
				'message' => '',
				'order_no' => 2,
			),
			3 => 
			array (
				'key' => 'field_514871f8916bf',
				'label' => 'Terms and Conditions Short Text',
				'name' => 'terms_and_conditions_short_text',
				'type' => 'text',
				'instructions' => 'Add the text witch will appear on the "Terms and Conditions"',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 3,
			),
			4 => 
			array (
				'key' => 'field_514871f891c83',
				'label' => 'Terms and Conditions	Long Text',
				'name' => 'terms_and_conditions_long_text',
				'type' => 'wysiwyg',
				'instructions' => 'Add the log text for the Terms and Conditions witch will appear when the user clicks the link in the "Terms and Conditions "',
				'required' => '0',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
				'the_content' => 'yes',
				'order_no' => 4,
			),
			5 => 
			array (
				'key' => 'field_515056c892bb7',
				'label' => 'Message Subject',
				'name' => 'message_subject',
				'type' => 'text',
				'instructions' => 'Add the email subject for the approved/unapproved	booking ',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 5,
			),
			6 => 
			array (
				'key' => 'field_515056c8933e5',
				'label' => 'Approved Booking Email Message',
				'name' => 'approved_booking_email_message',
				'type' => 'wysiwyg',
				'instructions' => 'Add the email text for the approved booking',
				'required' => '0',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
				'the_content' => 'yes',
				'order_no' => 6,
			),
			7 => 
			array (
				'key' => 'field_515056c8939c5',
				'label' => 'Unapproved Booking Email Message',
				'name' => 'unapproved_booking_email_message',
				'type' => 'wysiwyg',
				'instructions' => 'Add the email text for the unapproved booking',
				'required' => '0',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
				'the_content' => 'yes',
				'order_no' => 7,
			),	array (
				'key' => 'field_518be9074b923',
				'label' => 'Enable Email Notification',
				'name' => 'enable_email_notification',
				'type' => 'true_false',
				'instructions' => 'Get notified by email when a new booking is made',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_518be94b4b924',
				'label' => 'Email Address (e-mail notification)',
				'name' => 'email_address',
				'type' => 'text',
				'instructions' => 'Add a custom email	that you want to receive the notifications. Note: if left empty the notification will go to the admin Email',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				1 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'options-booking-options',
					'order_no' => 1,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916ccc29',
		'title' => 'ContactFields',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_5152f5a996501',
				'label' => 'Disable map',
				'name' => 'disable_map',
				'type' => 'true_false',
				'instructions' => 'Disable map',
				'required' => '0',
				'message' => '',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_5152fd9adc1df',
				'label' => 'Disable phone',
				'name' => 'disable_phone',
				'type' => 'true_false',
				'instructions' => 'Disable phone in contact form',
				'required' => '0',
				'message' => '',
				'order_no' => 1,
			),
			2 => 
			array (
				'key' => 'field_5153118680fc6',
				'label' => 'Disable Contact info',
				'name' => 'disable_contact_info',
				'type' => 'true_false',
				'instructions' => 'Disable Contact info',
				'required' => '0',
				'message' => '',
				'order_no' => 2,
			),
			3 => 
			array (
				'key' => 'field_515313d68a2b4',
				'label' => 'Disable location',
				'name' => 'disable_location',
				'type' => 'true_false',
				'instructions' => 'Disable location',
				'required' => '0',
				'message' => '',
				'order_no' => 3,
			),
			4 => 
			array (
				'label' => 'Location',
				'name' => 'location',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_515ae0f880270',
				'order_no' => 4,
			),
			5 => 
			array (
				'key' => 'field_5152f6cece83c',
				'label' => 'Contact form name',
				'name' => 'contact_form_name',
				'type' => 'text',
				'instructions' => 'The contact form title',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 5,
			),
			6 => 
			array (
				'key' => 'field_51531186815b4',
				'label' => 'Mobile',
				'name' => 'mobile',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 6,
			),
			7 => 
			array (
				'key' => 'field_5153118688c29',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 7,
			),
			8 => 
			array (
				'key' => 'field_515311868935b',
				'label' => 'Fax',
				'name' => 'fax',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 8,
			),
			9 => 
			array (
				'key' => 'field_5153179e48841',
				'label' => 'Google Map',
				'name' => 'google_map',
				'type' => 'googlemap',
				'instructions' => '',
				'required' => '0',
				'val' => 'address',
				'center' => '48.856614,2.3522219000000177',
				'zoom' => '2',
				'order_no' => 9,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-contact.php',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916cdde4',
		'title' => 'Default Tour Attributes',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_513dc3f3ea422',
				'label' => 'Tour Attributes',
				'name' => 'tour_attributes',
				'type' => 'repeater',
				'instructions' => 'Use add row to create attributes which you can use them for the default tours ',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_513dc3f3ea432',
						'label' => 'Attribute Name',
						'name' => 'attribute_name',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_513dc3f3ea438',
						'label' => 'Attribute Value',
						'name' => 'attribute_value',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 1,
					),
					2 => 
					array (
						'key' => 'field_513dc3f3ea43b',
						'label' => 'Show on tours',
						'name' => 'show_on_tour',
						'type' => 'true_false',
						'instructions' => 'Check to show the attributes on your tours',
						'column_width' => '',
						'message' => '',
						'order_no' => 2,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 0,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'options-default-tour-attibutes',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916ce1b9',
		'title' => 'Filter Options',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_512b4a81c3365',
				'label' => 'Show price on filter',
				'name' => 'show_price_on_filter',
				'type' => 'true_false',
				'instructions' => 'Check to show the price in the filter',
				'required' => '0',
				'message' => '',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_5123b8ac986ba',
				'label' => 'FIlter Options',
				'name' => 'filter_options',
				'type' => 'repeater',
				'instructions' => 'Chose as many filter price options as you want by clicking "Add row" button.',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_5123b8ac986cf',
						'label' => 'Minimum Price',
						'name' => 'minimum_price',
						'type' => 'number',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_5123b8ac986dc',
						'label' => 'Maximum Price',
						'name' => 'maximum_price',
						'type' => 'number',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'order_no' => 1,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 1,
			),
			2 => 
			array (
				'key' => 'field_5123b9094a366',
				'label' => 'Filter Options Attributes',
				'name' => 'filter_options_attributes',
				'type' => 'repeater',
				'instructions' => 'Use add row to create Tour Categories which you can use them for filter purposes',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_5123b9094a374',
						'label' => 'Category Name',
						'name' => 'category_name',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'none',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_5127528fba272',
						'label' => 'Show on filter',
						'name' => 'show_on_filter',
						'type' => 'true_false',
						'instructions' => '',
						'column_width' => '',
						'message' => 'Show on filter',
						'order_no' => 1,
					),
				),
				'row_min' => '0',
				'row_limit' => '6',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 2,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'options-filter',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916ce8e0',
		'title' => 'Footer Fields',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_51546405b4e43',
				'label' => 'Disable Text Field',
				'name' => 'disable_text_field',
				'type' => 'true_false',
				'instructions' => 'Disable the Text field.',
				'required' => '0',
				'message' => '',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_515468f4638f6',
				'label' => 'Footer Text Title',
				'name' => 'footer_text_title',
				'type' => 'text',
				'instructions' => 'Add the Title',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 1,
			),
			2 => 
			array (
				'key' => 'field_515468f463ef4',
				'label' => 'Footer Text Content',
				'name' => 'footer_text_content',
				'type' => 'wysiwyg',
				'instructions' => 'Add the content',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'br',
				'order_no' => 2,
			),
			3 => 
			array (
				'key' => 'field_51546b62ed3cd',
				'label' => 'Disable Gallery',
				'name' => 'disable_gallery',
				'type' => 'true_false',
				'instructions' => '',
				'required' => '0',
				'message' => '',
				'order_no' => 3,
			),
			4 => 
			array (
				'key' => 'field_51546b742272d',
				'label' => 'Gallery Title',
				'name' => 'gallery_title',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 4,
			),
			5 => 
			array (
				'key' => 'field_51546adab6a95',
				'label' => 'Tour Gallery',
				'name' => 'tour_gallery',
				'type' => 'repeater',
				'instructions' => 'Select the tour to display in the footer',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_51546adab6aa2',
						'label' => 'Tours',
						'name' => 'tours',
						'type' => 'page_link',
						'instructions' => '',
						'column_width' => '',
						'post_type' => 
						array (
							0 => 'tours_post',
						),
						'allow_null' => '0',
						'multiple' => '0',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_51546adab6aa9',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'tour_footer',
						'order_no' => 1,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 5,
			),
			6 => 
			array (
				'key' => 'field_51547584f1a1d',
				'label' => 'Disable Contact',
				'name' => 'disable_contact',
				'type' => 'true_false',
				'instructions' => '',
				'required' => '0',
				'message' => '',
				'order_no' => 6,
			),
			7 => 
			array (
				'key' => 'field_51547584f2136',
				'label' => 'Address',
				'name' => 'address',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 7,
			),
			8 => 
			array (
				'key' => 'field_51547584f2871',
				'label' => 'Phone',
				'name' => 'phone',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 8,
			),
			9 => 
			array (
				'key' => 'field_51547584f2df5',
				'label' => 'Email',
				'name' => 'email',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 9,
			),
			10 => 
			array (
				'key' => 'field_51547c7523144',
				'label' => 'Social Networks',
				'name' => 'social_networks',
				'type' => 'repeater',
				'instructions' => 'Add a Social Network',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'choices' => 
						array (
							'F' => 'Facebook',
							'v' => 'vimeo',
							't' => 'twitter',
							'l' => 'Linked in',
							'g' => 'google+',
							's' => 'skype',
							'y' => 'you tube',
						),
						'key' => 'field_51547c752314d',
						'label' => 'Network',
						'name' => 'network',
						'type' => 'select',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'allow_null' => '0',
						'multiple' => '0',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_51547c7523171',
						'label' => 'Link',
						'name' => 'link',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 1,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 10,
			),
			11 => 
			array (
				'key' => 'field_5154784d2dbea',
				'label' => 'Copyright Text 1',
				'name' => 'copyright_text_1',
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
				'the_content' => 'yes',
				'order_no' => 11,
			),
			12 => 
			array (
				'key' => 'field_5154784d2e362',
				'label' => 'Copyright Text 2',
				'name' => 'copyright_text_2',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'options-footer',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916cfdd7',
		'title' => 'Main',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_5154620a2112a',
				'label' => 'Logo',
				'name' => 'logo',
				'type' => 'image',
				'instructions' => '',
				'required' => '0',
				'save_format' => 'object',
				'preview_size' => 'logo',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_5127b5b748560',
				'label' => 'Currency',
				'name' => 'currency',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 1,
			),
			2 => 
			array (
				'key' => 'field_515c31eac2409',
				'label' => 'Default image',
				'name' => 'default_image',
				'type' => 'image',
				'instructions' => 'In case a page dosent have the featured image.
	Add a default image that will be used as a page featured image',
				'required' => '0',
				'save_format' => 'url',
				'preview_size' => 'page_featured_image',
				'order_no' => 2,
			),
			3 => 
			array (
				'key' => 'field_515c09871f1fe',
				'label' => 'Disable Search',
				'name' => 'disable_search',
				'type' => 'true_false',
				'instructions' => 'Disable search filter on Home page',
				'required' => '0',
				'message' => '',
				'order_no' => 3,
			),
			4 => 
			array (
				'key' => 'field_515c0d9f2a901',
				'label' => 'Disable attributes on bucket',
				'name' => 'disable_attributes_on_bucket',
				'type' => 'true_false',
				'instructions' => 'Show / Hide attributes on Bucket',
				'required' => '0',
				'message' => '',
				'order_no' => 4,
			),
			5 => 
			array (
				'key' => 'field_515c1645389ec',
				'label' => 'Custom css',
				'name' => 'custom_css',
				'type' => 'textarea',
				'instructions' => 'Add custom css',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 5,
			),
			6 => 
			array (
				'key' => 'field_515c1645390c5',
				'label' => 'Custom javascript',
				'name' => 'custom_javascript',
				'type' => 'textarea',
				'instructions' => 'Add custom javascript',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 6,
			),
			7 => 
			array (
				'label' => 'site_favicon',
				'name' => 'site_favicon',
				'type' => 'image',
				'instructions' => 'add site icon',
				'required' => '0',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'key' => 'field_5165792d1bda6',
				'order_no' => 7,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'options-main',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916d0a6c',
		'title' => 'Post Fields',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_51507270b1642',
				'label' => 'Content Image',
				'name' => 'content_image',
				'type' => 'image',
				'instructions' => 'Add image',
				'required' => '0',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_5150763f1b3dc',
				'label' => 'Post Description',
				'name' => 'post_description',
				'type' => 'wysiwyg',
				'instructions' => 'Post Description that will show on the blog page',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'br',
				'order_no' => 1,
			),
			2 => 
			array (
				'key' => 'field_51509086057bc',
				'label' => 'Disable comments',
				'name' => 'disable_comments',
				'type' => 'true_false',
				'instructions' => 'Disable comments',
				'required' => '0',
				'message' => '',
				'order_no' => 2,
			),
			3 => 
			array (
				'label' => 'Disable Tags',
				'name' => 'disable_tags',
				'type' => 'true_false',
				'instructions' => 'Disable Tags',
				'required' => '0',
				'message' => '',
				'key' => 'field_5166a33056c6e',
				'order_no' => 3,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916d1165',
		'title' => 'Slider options',
		'fields' => 
		array (
			0 => 
			array (
				'label' => 'Tours',
				'name' => 'tours',
				'type' => 'relationship',
				'instructions' => '',
				'required' => '0',
				'post_type' => 
				array (
					0 => 'tours_post',
				),
				'taxonomy' => 
				array (
					0 => 'all',
				),
				'max' => '',
				'key' => 'field_5124dbffd391d',
				'order_no' => 0,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-home.php',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '5166a916d1488',
		'title' => 'Tour Meta',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_51225aa17a08d',
				'label' => 'Price',
				'name' => 'price',
				'type' => 'text',
				'instructions' => 'Enter the price for this tour.',
				'required' => '0',
				'default_value' => '',
				'order_no' => 0,
			),
			1 => 
			array (
				'key' => 'field_51225bc8b594c',
				'label' => 'Currency',
				'name' => 'tour_currency',
				'type' => 'text',
				'instructions' => 'Enter the currency.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => 1,
			),
			2 => 
			array (
				'key' => 'field_5125fb116c538',
				'label' => 'Tour Description',
				'name' => 'tour_description',
				'type' => 'wysiwyg',
				'instructions' => 'Enter the tour description which will get displayed on tour home page list.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'br',
				'order_no' => 2,
			),
			3 => 
			array (
				'key' => 'field_5125fb116cb2b',
				'label' => 'Tour Description on Home Slider',
				'name' => 'tour_description_slider',
				'type' => 'wysiwyg',
				'instructions' => 'Enter tour description which will show on slider.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'br',
				'order_no' => 3,
			),
			4 => 
			array (
				'key' => 'field_514706cf36863',
				'label' => 'Available dates',
				'name' => 'available_dates',
				'type' => 'repeater',
				'instructions' => 'Use Add row to add available dates for this tour ',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_514706cf3686d',
						'label' => 'Arrival date',
						'name' => 'arrival_date',
						'type' => 'date_picker',
						'instructions' => 'The day that this tour starts',
						'column_width' => '45',
						'date_format' => 'yymmdd',
						'display_format' => 'dd.mm.yy',
						'order_no' => 0,
					),
					1 => 
					array (
						'label' => 'Return date',
						'name' => 'return_date',
						'type' => 'date_picker',
						'instructions' => '',
						'column_width' => '45',
						'date_format' => 'yymmdd',
						'display_format' => 'dd.mm.yy',
						'key' => 'field_51471cf4e4219',
						'order_no' => 1,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 4,
			),
			5 => 
			array (
				'key' => 'field_5137533fcdc10',
				'label' => 'Tour Attributes',
				'name' => 'tour_attributes',
				'type' => 'repeater',
				'instructions' => 'Use add row to create attributes which you can use them for tour purposes',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_5137533fcdc1b',
						'label' => 'Attribute Name',
						'name' => 'attribute_name',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_5137533fcdc1f',
						'label' => 'Attribute Value',
						'name' => 'attribute_value',
						'type' => 'text',
						'instructions' => '',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 1,
					),
					2 => 
					array (
						'key' => 'field_5137533fcdc22',
						'label' => 'Show on tour',
						'name' => 'show_on_tour',
						'type' => 'true_false',
						'instructions' => 'Check to show the attributes on your tour',
						'column_width' => '',
						'message' => '',
						'order_no' => 2,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 5,
			),
			6 => 
			array (
				'key' => 'field_513f49bad43de',
				'label' => 'Tour Slider',
				'name' => 'tour_slider',
				'type' => 'repeater',
				'instructions' => '',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_513f49bad43e6',
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => 'Add image to slider',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'thumbnail',
						'order_no' => 0,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
				'order_no' => 6,
			),
			7 => 
			array (
				'key' => 'field_5140738d1b68b',
				'label' => 'Tabs',
				'name' => 'tabs',
				'type' => 'repeater',
				'instructions' => 'Press "Add Tab"	to add a new tab',
				'required' => '0',
				'sub_fields' => 
				array (
					0 => 
					array (
						'key' => 'field_5140738d1b694',
						'label' => 'Title',
						'name' => 'title',
						'type' => 'text',
						'instructions' => 'Add a Tab title',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => 0,
					),
					1 => 
					array (
						'key' => 'field_5140738d1b698',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'instructions' => 'Add the Tab content',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'br',
						'order_no' => 1,
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Tab',
				'order_no' => 7,
			),
			8 => 
			array (
				'choices' => 
				array (
					1 => 'One',
					2 => 'Two',
					3 => 'Three',
					4 => 'Four',
					5 => 'Five',
				),
				'key' => 'field_5142fa5509606',
				'label' => 'Rating',
				'name' => 'rating',
				'type' => 'select',
				'instructions' => 'Rate the tour
	',
				'required' => '0',
				'default_value' => '1 : One',
				'allow_null' => '0',
				'multiple' => '0',
				'order_no' => 8,
			),
			9 => 
			array (
				'key' => 'field_514079691dc69',
				'label' => 'Show Tabs on Page',
				'name' => 'show_on_page',
				'type' => 'true_false',
				'instructions' => 'Check to show Tabs on Tour Page',
				'required' => '0',
				'message' => '',
				'order_no' => 9,
			),
			10 => 
			array (
				'key' => 'field_513dc528c62ec',
				'label' => 'Use Default Tour Attribute',
				'name' => 'use_default_tour_attribute',
				'type' => 'true_false',
				'instructions' => 'Check this if you want to use the default values (Witch can be fount in Ubrella -> Default Tour Attributes)',
				'required' => '0',
				'message' => '',
				'order_no' => 10,
			),
			11 => 
			array (
				'key' => 'field_513dba91918c7',
				'label' => 'Category on Home slider',
				'name' => 'category_on_slider',
				'type' => 'true_false',
				'instructions' => 'Check if you want to show the category of this tour on the slider',
				'required' => '0',
				'message' => '',
				'order_no' => 11,
			),
			12 => 
			array (
				'key' => 'field_5141999c0749e',
				'label' => 'Show Reviews on Page',
				'name' => 'show_reviews_on_page',
				'type' => 'true_false',
				'instructions' => 'Check to show the Reviews on the tour page',
				'required' => '0',
				'message' => '',
				'order_no' => 12,
			),
			13 => 
			array (
				'key' => 'field_5146e013cb315',
				'label' => 'Enable User Rating',
				'name' => 'enable_user_rating',
				'type' => 'true_false',
				'instructions' => 'Enable users to rate the Tour ',
				'required' => '0',
				'message' => '',
				'order_no' => 13,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'tours_post',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));

}
?>