<?php    

$theme_name = "Travelo";
$theme_version = "2.1";
global $theme_name;
global $theme_version;


define( 'ACF_LITE' , true );
include_once('advanced-custom-fields/acf.php' );
include "includes/post-types.php";
include "includes/filter-search.php";
include "includes/pagination.php";
include "includes/comment.php";
include "includes/booking.php";
include "includes/register-sidebar.php";
include 'includes/shortcodes.php';
//include "googlemap/location-field.php";
include "includes/costume_fields.php";
include "themeoptions/options.php";
include "widgets/widget-search-filter.php";
wp_require_once("/tgm/plugins.php");


add_action('acf/register_fields', 'register_fields');
function register_fields()
{
	include_once('registered-fields/presets/acf-presets.php');
	include_once('registered-fields/google-font/acf-googlefonts.php');
	include_once('registered-fields/googlemap/acf-googlemap.php');

	include_once('registered-fields/presets/acf-presets.php');
	include_once('registered-fields/google-font/acf-googlefonts.php');
	include_once('registered-fields/googlemap/acf-googlemap.php');
}

function my_acf_settings( $options )
{
    // activate add-ons
    $options['activation_codes']['repeater'] = 'QJF7-L4IX-UCNP-RF2W';
    $options['activation_codes']['options_page'] = 'OPN8-FA4J-Y2LW-81LS';
    $options['activation_codes']['flexible_content'] = 'FC9O-H6VN-E4CL-LT33';
     
    // set options page structure
    $options['options_page']['title'] = 'Umbrella';
    $options['options_page']['pages'] = array('Main', 'Filter' , 'Default Tour Attibutes' , 'Booking Options','Footer');
           
    return $options;
}
add_filter('acf_settings', 'my_acf_settings');


//register_field('register_field_group', dirname(__File__) . '/includes/costume_fields.php');

if(function_exists("register_options_page"))
{
	if(current_user_can('edit_theme_options')){
	    //$ico_dir = get_template_directory_uri()."/images/icons/small_icons/";
        register_options_page('Main','');
        register_options_page('Filter','');
        register_options_page('Default Tour Attibutes','');
        register_options_page('Booking Options','');
        register_options_page('Footer','');
		register_options_page('Shortcode Sliders','');
	}
}


load_theme_textdomain('um_lang', get_template_directory().'/lang');

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
	load_theme_textdomain('um_lang', get_template_directory().'/lang');
}

function wpex_clean_shortcodes($content){   
$array = array (
    '<p>[' => '[', 
    ']</p>' => ']', 
    ']<br />' => ']'
);
$content = strtr($content, $array);
return $content;
}
add_filter('the_content', 'wpex_clean_shortcodes');


if ( !isset( $content_width ) ) $content_width = 900;    
 
add_image_size("tour_preview", 300 , 165 , true);
add_image_size("staff_preview", 300 , 169 , true);
add_image_size("tour_footer", 65 , 65 , true);
add_image_size("logo", 153 , 41 , true);
add_image_size("page_featured_image", 1600 , 362 ,true);
add_image_size("home_slider_featured_image", 1600 , 550 ,true);
add_image_size("skitter-large",  800 , 300, true);
add_image_size("skitter-medium",  500 , 200, true);
add_image_size("skitter-small",  200 , 100, true);
 
$deffault_image = get_field('default_image','options');

if(isset($_POST["um_FilterSearch"]) && $_POST["um_FilterSearch"]){
    $_SESSION['filter_session'] = search_filter();
}

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
/*
if(!get_option('acf_repeater_ac'))
{ 
	update_option('acf_repeater_ac', "QJF7-L4IX-UCNP-RF2W");
}
if(!get_option('acf_options_page_ac'))
{ 
	update_option('acf_options_page_ac', "OPN8-FA4J-Y2LW-81LS");
}
if(!get_option('acf_flexible_content_ac')){
	update_option('acf_flexible_content_ac', "FC9O-H6VN-E4CL-LT33");
} 
*/ 

	function curPageURL() {
	 $pageURL = 'http';
	 if(isset($_SERVER["HTTPS"]))
	 {
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 }
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
	
	
function print_title()
{
    $title_layout = get_field("title_display_style","options");
    if(is_tag()){
        echo get_query_var("tag");
    }
    else if(is_category()){
        echo get_query_var("category_name");
    }
    else{
        if($title_layout == "name_title"){
        ?>
            <?php bloginfo("name"); ?> : <?php the_title(); ?>
        <?php
        }
        else if ($title_layout == "name"){
            bloginfo("name");
        }
        else{
            the_title();
        }
    }
}

  
/*Add Menu Support*/
	add_action( 'init', 'register_my_menus' );

	function register_my_menus() {
		register_nav_menus(
			array(
			'main_menu' => __( 'Main Menu',"um-lang" )
					
			)
		);
	}
/*Add Menu Support*/



add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
	global $wp_admin_bar;
	//remove_menu_page('edit.php?post_type=acf');
}


add_action( 'wp_enqueue_scripts', 'add_external_stylesheets' );
function add_external_stylesheets() {
wp_enqueue_style("main", get_stylesheet_uri() , false, "1.0");
wp_enqueue_style("selectBox", get_template_directory_uri()."/css/jquery.selectbox.css" , false, "1.0");
wp_enqueue_style("ssubnav", get_template_directory_uri()."/css/ssubnav.css" , false, "1.0");
wp_enqueue_style("gallery", get_template_directory_uri()."/css/jquery.ad-gallery.css" , false, "1.0");
wp_enqueue_style("fonts", get_template_directory_uri()."/font/stylesheet.css" , false, "1.0");
wp_enqueue_style("jquaryUiCSS", get_template_directory_uri()."/css/jquery-ui-1.10.1.custom.css" , false, "1.0");
wp_enqueue_style("justVector", get_template_directory_uri()."/JustVector/stylesheet.css" , false, "1.0");
wp_enqueue_style("prettyGallery", get_template_directory_uri()."/css/prettyGallery.css" , false, "1.0");
wp_enqueue_style("Font", get_template_directory_uri()."/font/FontAwesome/css/font-awesome.css" , false, "1.0");
wp_enqueue_style("Font-ie7", get_template_directory_uri()."/font/FontAwesome/css/font-awesome-ie7.min.css" , false, "1.0");
wp_enqueue_style("skitter-css", get_template_directory_uri()."/skitter/css/skitter.styles.css" , false, "1.0");

	if(!get_field('disable_responsive','options'))
	{
		wp_enqueue_style("travelo_responsive", get_template_directory_uri()."/css/travelo_responsive.css" , false, "1.0");
	}

 $skin = get_field('skins','options');
	if($skin)
	{
		wp_enqueue_style("skin_default", get_template_directory_uri()."/css/".$skin , false, "1.0");
	}
	else
	{
		wp_enqueue_style("skin_default", get_template_directory_uri()."/css/skin_default.css" , false, "1.0");
	}



	
}

add_action( 'wp_enqueue_scripts', 'add_external_JS' );
function add_external_JS(){
		wp_enqueue_script('jquery');
		
		wp_enqueue_script("google_map","https://maps.googleapis.com/maps/api/js?sensor=true",'','',TRUE);
		wp_enqueue_script("selectBox-JS", get_template_directory_uri()."/js/jquery.selectbox-0.2.min.js" ,array(),'',TRUE);
		wp_enqueue_script("Modenizer-js", get_template_directory_uri()."/js/modernizr.js" , array(),'',TRUE);
		wp_enqueue_script("script-js", get_template_directory_uri()."/js/script.js" , array(),'',TRUE);
		wp_enqueue_script("script_text-js", get_template_directory_uri()."/js/script_text.js" , array(),'',TRUE);
		wp_enqueue_script("left-content", get_template_directory_uri()."/js/left-content.js" , array(),'',TRUE);
		wp_enqueue_script("bucket-js", get_template_directory_uri()."/js/bScript.js" , array(),'',TRUE);

		wp_enqueue_script("easing-js", get_template_directory_uri()."/skitter/js/jquery.easing.1.3.js" , array(),'',TRUE);
		wp_enqueue_script("skitter-js", get_template_directory_uri()."/skitter/js/jquery.skitter.js" , array(),'',TRUE);
		wp_enqueue_script("Sliders-js", get_template_directory_uri()."/js/Sliders.js" , array(),'',TRUE);

		wp_enqueue_script("cookie-js", get_template_directory_uri()."/js/jquery.cookie.js" , array(),'',TRUE);
		wp_enqueue_script("addgallery", get_template_directory_uri()."/js/jquery.ad-gallery.js" , array(),'',TRUE);
		wp_enqueue_script("ui-js", get_template_directory_uri()."/js/jquery-ui-1.10.1.custom.js" , array(),'',TRUE);
		wp_enqueue_script("raty-js", get_template_directory_uri()."/js/jquery.raty.js" , array(),'',TRUE);
		wp_enqueue_script("rating-js", get_template_directory_uri()."/js/rating.js" , array(),'',TRUE);
		wp_enqueue_script("bookingFormValidator-js", get_template_directory_uri()."/js/bookingFormValidator.js" , array(),'',TRUE);
		wp_enqueue_script("bPopup-js", get_template_directory_uri()."/js/bPopup.js" , array(),'',TRUE);
		wp_enqueue_script("contactFormWidth-js", get_template_directory_uri()."/js/contactFormWidth.js" , array(),'',TRUE);
		wp_enqueue_script("shortcodesScript-js", get_template_directory_uri()."/js/shortcodesScript.js" , array(),'',TRUE);
		wp_enqueue_script("prettyGallery-js", get_template_directory_uri()."/js/jquery.prettyGallery.js" , array(),'',TRUE);
		wp_enqueue_style("responsive-main-slider", get_template_directory_uri()."/css/travelo_responsive_main_slider.css" , false, "1.0");

		wp_enqueue_script("masonry-js", get_template_directory_uri()."/masonry-site/jquery.masonry.js" , array(),'',TRUE);
		if(!get_field('disable_responsive','options'))
		{
			wp_enqueue_script("responsiveMenu", get_template_directory_uri()."/js/responsiveMenu.js" , array(),'',TRUE);
		}	
		if ( is_singular() ){
			wp_enqueue_script( 'comment-reply','',array(),'',TRUE );
		}
		
}

function wp_require_once($path)
{
    $UM_TEMPLATEPATH = str_replace("\\", "/", get_template_directory());
    $UM_STYLESHEETPATH = str_replace("\\", "/", get_stylesheet_directory());
    if( $UM_TEMPLATEPATH != $UM_STYLESHEETPATH && is_file($UM_STYLESHEETPATH . $path) )
        require_once ($UM_STYLESHEETPATH . $path);
    else
        require_once ($UM_TEMPLATEPATH . $path);
}

?>