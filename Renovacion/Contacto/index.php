<?php
	//start session
	session_start();
	
	//set a key, checked in mailer, prevents against 
         //spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if(!isset($_SESSION['formMessage'])) $_SESSION['formMessage'] =
                                                    'Nos encantará recibir noticias tuyas. Escríbenos  ';
	if(!isset($_SESSION['formFooter'])) $_SESSION['formFooter'] = '';
	
	if(!isset($_SESSION['form'])) $_SESSION['form'] = array();
	
	function check($field, $type = "", $value = "") {
		$string = "";
		if(isset($_SESSION['form'][$field])) {
			switch($type) {
				case "checkbox":
					$string = 'checked="checked"';
					break;
				case "radio":
					if($_SESSION['form'][$field] == $value) 
                                                 $string = 'checked="checked"';
					break;
				case "select":
					if($_SESSION['form'][$field] == $value) 
                                                 $string = 'selected="selected"';
					break;
				default:
					$string = unescape_string($_SESSION['form'][$field]);
			}
		}
		return $string;
	}
	
	function unescape_string($string) {
		return stripslashes(@ html_entity_decode($string, ENT_QUOTES));
	}
?><!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

	<head>
		<meta charset="utf-8" />

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Articulos Promocionales" content="Venta de articulos promocionales personalizados" />
		<meta name="generator" content="RapidWeaver" />
		
		

	  <meta name="viewport" content="width=device-width" />
	  <title>Contacto</title>

		<!-- Load some fonts from Google -->
		<link href='http://fonts.googleapis.com/css?family=Lato:300,700|Raleway:100' rel='stylesheet' type='text/css'>

		<!-- CSS reset -->
	  <link rel="stylesheet" href="../rw_common/themes/Feather/css/normalize.css" />

		<!-- CSS for the Foundation.js framework that handles the responsive layout for the theme -->
	  <link rel="stylesheet" href="../rw_common/themes/Feather/css/foundation.css" />

		<!-- Targets specific 3rd-party addons to make sure they work in the responsive environment of this theme. -->
	  <link rel="stylesheet" href="../rw_common/themes/Feather/css/3rdparty_fixes.css" />

	  <!-- Theme's main CSS file -->
	  <link rel="stylesheet" href="../rw_common/themes/Feather/styles.css" />
		
		<!-- RapidWeaver Color Picker Stylesheet -->
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/colors-page2.css"  />  

	  <!-- Theme specific media queries -->
		<link rel="stylesheet" href="../rw_common/themes/Feather/css/media_queries.css" />

  <script src="../rw_common/themes/Feather/js/custom.modernizr.js"></script>


		<!-- 
				CSS: First section handles styling for title area background using RapidWeaver's Resources area 
				Second section handles the @font-face declarations here so that FireFox properly accesses the font files.			
		-->
		<style type="text/css">
			/* Section 1 */
			.banner1 { background-image: url(../resources/banner1.jpg); background-size: cover; background-position: center center; }
			.banner2 { background-image: url(../resources/banner2.jpg); background-size: cover; background-position: center center; }
			.banner3 { background-image: url(../resources/banner3.jpg); background-size: cover; background-position: center center; }
			.banner4 { background-image: url(../resources/banner4.jpg); background-size: cover; background-position: center center; }
			.banner5 { background-image: url(../resources/banner5.jpg); background-size: cover; background-position: center center; }
			.banner6 { background-image: url(../resources/banner6.jpg); background-size: cover; background-position: center center; }
			.banner7 { background-image: url(../resources/banner7.jpg); background-size: cover; background-position: center center; }
			.banner8 { background-image: url(../resources/banner8.jpg); background-size: cover; background-position: center center; }
			.banner9 { background-image: url(../resources/banner9.jpg); background-size: cover; background-position: center center; }
			.banner10 { background-image: url(../resources/banner10.jpg); background-size: cover; background-position: center center; }
			.banner11 { background-image: url(../resources/banner11.jpg); background-size: cover; background-position: center center; }
			.banner12 { background-image: url(../resources/banner12.jpg); background-size: cover; background-position: center center; }
			.banner13 { background-image: url(../resources/banner13.jpg); background-size: cover; background-position: center center; }
			.banner14 { background-image: url(../resources/banner14.jpg); background-size: cover; background-position: center center; }
			.banner15 { background-image: url(../resources/banner15.jpg); background-size: cover; background-position: center center; }

			/* Section 2 */
			@font-face {
				font-family: 'FontAwesome';
				src: url('../rw_common/themes/Feather/fonts/fontawesome-webfont.eot');
				src: local('fonts/museo_slab_500-webfont'), url('../rw_common/themes/Feather/fonts/fontawesome-webfont.eot?#iefix') format('eot'), url('../rw_common/themes/Feather/fonts/fontawesome-webfont.woff') format('woff'), url('../rw_common/themes/Feather/fonts/fontawesome-webfont.ttf') format('truetype'), url('../rw_common/themes/Feather/fonts/fontawesome-webfont.svg#FontAwesome') format('svg');
				font-weight: normal;
				font-style: normal;
			}

			@font-face {
				font-family: 'MuseoSlab500';
				src: url('../rw_common/themes/Feather/fonts/museo_slab_500-webfont.eot');
				src: local('fonts/museo_slab_500-webfont'), url('../rw_common/themes/Feather/fonts/museo_slab_500-webfont.woff') format('woff'), url('../rw_common/themes/Feather/fonts/museo_slab_500-webfont.ttf') format('truetype'), url('../rw_common/themes/Feather/fonts/museo_slab_500-webfont.svgz#webfont') format('svg'), url('../rw_common/themes/Feather/fonts/museo_slab_500-webfont.svg#webfont') format('svg');
				font-weight: normal;
				font-style: normal;
			}

		</style>

		<!-- RapidWeaver's Javascript File -->
	  <script src="../rw_common/themes/Feather/javascript.js"></script>

		<!-- jQuery 1.8 is included in the theme internally -->
	  <script src="../rw_common/themes/Feather/js/jquery.min.js"></script>

	  <!-- Elixir specific javascript, along with jQuery Easing and a few other elements -->
	  <script src="../rw_common/themes/Feather/js/elixir.js"></script>

		<!-- Theme variations -->
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/background/bkg_textured_1.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/title/title_lato.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/title/title_3_5_em.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/slogan/slogan_lato.css" />
		<script type="text/javascript" src="../rw_common/themes/Feather/js/banner/banner1.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/banner/overlay_none.css" />
		<script type="text/javascript" src="../rw_common/themes/Feather/js/navigation/mobile_toggle_icon_menu.js"></script>
		<script type="text/javascript" src="../rw_common/themes/Feather/js/toggles/scroll_to_top.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/slogan/slogan_shadow.css" />
		<script type="text/javascript" src="../rw_common/themes/Feather/js/sidebar/sidebar_hidden.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/edge_to_edge/ec1_edge_to_edge.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/Feather/css/edge_to_edge/ec4_edge_to_edge.css" />
			

		<!-- Plugins insert their additional code here -->
				<link rel='stylesheet' type='text/css' media='all' href='../rw_common/plugins/stacks/stacks.css' />
		<!--[if lte IE 7]>
			<link rel='stylesheet' type='text/css' media='all' href='../rw_common/plugins/stacks/stacks_ie.css' />
		<![endif]-->
		<link rel='stylesheet' type='text/css' media='all' href='files/stacks_page_page2.css' />
		<script type='text/javascript' charset='utf-8' src='https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js'></script>
		<script type='text/javascript' charset='utf-8' src='files/stacks_page_page2.js'></script>


	  <!-- User defined custom javascript -->	
		  

	  <!-- User definied custom CSS -->
		

	</head>


	<body>
		<div id="container" class="row">
				<div id="extraContent4" class="large-12 columns">
					<div class="inset">
						<div id="extraContainer4"></div>
						<div class="clearer"></div>
					</div>
				</div>  <!-- ExtraContent Area 4 -->
				<div class="clearer"></div>
			<header id="title_area">
				<div id="site_logo"><img src="../rw_common/images/Logo%20Web.png" width="157" height="153" alt="Site logo"/></div>
				<h1 id="site_title"></h1>
				<div id="social_badges"></div>
			</header>
			<nav id="main_navigation" class="hide-for-small"><ul><li><a href="../index.html" rel="self">Servicios</a></li><li><a href="../Somos/index.html" rel="self">Somos</a></li><li><a href="../Catalogo/index.html" rel="self">Cat&aacute;logo</a><ul><li><a href="../Catalogo/A la Medida/index.html" rel="self">A la Medida</a></li><li><a href="../Catalogo/Importados/index.html" rel="self">Importados</a><ul><li><a href="../Catalogo/Importados/photos-3/index.html" rel="self">Belleza</a></li><li><a href="../Catalogo/Importados/photos-4/index.html" rel="self">Bol&iacute;grafos</a></li><li><a href="../Catalogo/Importados/photos-8/index.html" rel="self">Escolares</a></li><li><a href="../Catalogo/Importados/photos-9/index.html" rel="self">Golf</a></li><li><a href="../Catalogo/Importados/photos-10/index.html" rel="self">Herramientas</a></li><li><a href="../Catalogo/Importados/photos-18/index.html" rel="self">Hogar/Gourmet</a></li><li><a href="../Catalogo/Importados/photos-16/index.html" rel="self">Juegos</a></li><li><a href="../Catalogo/Importados/photos-17/index.html" rel="self">Llaveros</a></li><li><a href="../Catalogo/Importados/photos-14/index.html" rel="self">M&eacute;dicos</a></li><li><a href="../Catalogo/Importados/photos-12/index.html" rel="self">Oficina</a></li><li><a href="../Catalogo/Importados/photos-23/index.html" rel="self">Termos</a></li><li><a href="../Catalogo/Importados/photos-22/index.html" rel="self">Textiles</a></li><li><a href="../Catalogo/Importados/photos-21/index.html" rel="self">USBs</a></li><li><a href="../Catalogo/Importados/photos-20/index.html" rel="self">Viajes</a></li></ul></li></ul></li><li><a href="../Aviso Privacidad/index.html" rel="self">Aviso de Privacidad</a></li><li><a href="index.php" rel="self" class="current">Contacto</a></li></ul></nav>
			<nav id="mobile_navigation" class="show-for-small">
				<div id="mobile_navigation_toggle"></div>
				<ul><li><a href="../index.html" rel="self">Servicios</a></li><li><a href="../Somos/index.html" rel="self">Somos</a></li><li><a href="../Catalogo/index.html" rel="self">Cat&aacute;logo</a><ul><li><a href="../Catalogo/A la Medida/index.html" rel="self">A la Medida</a></li><li><a href="../Catalogo/Importados/index.html" rel="self">Importados</a><ul><li><a href="../Catalogo/Importados/photos-3/index.html" rel="self">Belleza</a></li><li><a href="../Catalogo/Importados/photos-4/index.html" rel="self">Bol&iacute;grafos</a></li><li><a href="../Catalogo/Importados/photos-8/index.html" rel="self">Escolares</a></li><li><a href="../Catalogo/Importados/photos-9/index.html" rel="self">Golf</a></li><li><a href="../Catalogo/Importados/photos-10/index.html" rel="self">Herramientas</a></li><li><a href="../Catalogo/Importados/photos-18/index.html" rel="self">Hogar/Gourmet</a></li><li><a href="../Catalogo/Importados/photos-16/index.html" rel="self">Juegos</a></li><li><a href="../Catalogo/Importados/photos-17/index.html" rel="self">Llaveros</a></li><li><a href="../Catalogo/Importados/photos-14/index.html" rel="self">M&eacute;dicos</a></li><li><a href="../Catalogo/Importados/photos-12/index.html" rel="self">Oficina</a></li><li><a href="../Catalogo/Importados/photos-23/index.html" rel="self">Termos</a></li><li><a href="../Catalogo/Importados/photos-22/index.html" rel="self">Textiles</a></li><li><a href="../Catalogo/Importados/photos-21/index.html" rel="self">USBs</a></li><li><a href="../Catalogo/Importados/photos-20/index.html" rel="self">Viajes</a></li></ul></li></ul></li><li><a href="../Aviso Privacidad/index.html" rel="self">Aviso de Privacidad</a></li><li><a href="index.php" rel="self" class="current">Contacto</a></li></ul>
			</nav>
			<div id="banner">
				<div class="banner_overlay">
					<h2 id="site_slogan"></h2>
				</div>
			</div>
			<div id="extraContent1" class="large-10 columns large-centered">
				<div id="extraContainer1"></div>
				<div class="clearer"></div>
			</div>

			<div id="content_container" class="inset">
					<div id="content" class="large-8 columns">
						

<!-- Stacks v1051 --><div id='stacks_out_141_page2' class='stacks_top'><div id='stacks_in_141_page2' class=''><div id='stacks_out_166_page2' class='stacks_out'><div id='stacks_in_166_page2' class='stacks_in info_extracontent_extracontent_stack'><div id="myExtraContent3"><div id='stacks_out_146_page2' class='stacks_out'><div id='stacks_in_146_page2' class='stacks_in text_stack'>
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Nombre:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>E-mail:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Me Interesa:</label> *<br />
		<select name="form[element2]">			<option <?php echo check('element2', 'select','Busco Art&iacute;culos Promocionales'); ?> value="Busco Art&iacute;culos Promocionales">Busco Art&iacute;culos Promocionales</option>
			<option <?php echo check('element2', 'select','Necesito Relaciones P&uacute;blicas'); ?> value="Necesito Relaciones P&uacute;blicas">Necesito Relaciones P&uacute;blicas</option>
			<option <?php echo check('element2', 'select','Quiero un Sitio Web!'); ?> value="Quiero un Sitio Web!">Quiero un Sitio Web!</option>
			<option <?php echo check('element2', 'select','Administraci&oacute;n de Social Media'); ?> value="Administraci&oacute;n de Social Media">Administraci&oacute;n de Social Media</option>
		</select><br /><br />

		<label>Mensaje:</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		<input class="form-input-button" type="reset" name="resetButton" value="Borrar" />
		<input class="form-input-button" type="submit" name="submitButton" value="Enviar" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?></div></div></div></div></div><div id='stacks_out_142_page2' class='stacks_out'><div id='stacks_in_142_page2' class='stacks_in stack_stack'><div id='stacks_out_163_page2' class='stacks_out'><div id='stacks_in_163_page2' class='stacks_in columns_stack'><div class='stacks_div stacks_left'>
<div id='stacks_out_144_page2' class='stacks_out'><div id='stacks_in_144_page2' class='stacks_in uk_doobox_dooamap_stack'>
<!-- start doobox doo a map stack -->
<div class="stacks_in_144_page2script">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
</div>

<div class="stacks_in_144_page2widthWrapper">
<div class="stacks_in_144_page2mapcontainer">
<div class="stacks_in_144_page2mapWrapper">

</div><!-- end map wrapper -->


<div class="stacks_in_144_page2buttonWrapper">
<div class="stacks_in_144_page2mapplus mapplus"><img src="files/mapassets/doomapplus0.png" /></div>
<div class="stacks_in_144_page2mapminus mapminus"><img src="files/mapassets/doomapminus0.png" /></div>

</div>

</div><!-- end mapcontainer -->
</div><!-- end widthWrapper -->



<div id='stacks_in_144_page2overlay'></div>
<div id='stacks_in_144_page2modal'>
<div id='stacks_in_144_page2close'>close</div>
    <div id='stacks_in_144_page2modalcontent' style="color:#333;">
	    <form id="stacks_in_144_page2route" style="color:#333;"> 
	    <div style="font-weight:bold; font-size:18px;padding-bottom:10px;">Get Directions to Our Location</div>                     
		   <label> Your Postal / Zip Code :<br /> <input type="text" id="stacks_in_144_page2addr" /></label>
		   <button id="stacks_in_144_page2route">Show Directions</button>&nbsp;<button id="stacks_in_144_page2reset">Reset</button>&nbsp;<button id="stacks_in_144_page2print">Print</button>
		</form>
		<div id="stacks_in_144_page2directions"></div>
    </div>
</div>

<!-- for backward compatability only -->
<div class="stacks_in_144_page2oldlabelWrapper"><div class='slice empty out'><div class='slice empty in'></div></div></div>

<!-- end doobox doo a map stack -->

    

	






    
    </div></div>
</div>
<div class='stacks_div stacks_right'>
<div id='stacks_out_153_page2' class='stacks_out'><div id='stacks_in_153_page2' class='stacks_in uk_co_doobox_imagelist_stack'>
<!-- start image list stack from doobox -->

	<div class="stacks_in_153_page2imagelist"><div class="stacks_in_153_page2listIcon"><div class='centered_image' ><img class='imageStyle' src='files/stacks_image_154.png' width='800' height='800' alt='Stacks Image 154' /></div></div><div class="stacks_in_153_page2listTitle">Direcci&oacute;n</div>
	
	<div class="stacks_in_153_page2listContent">Lamartine 712 | Col Bosque de Chapultepec | Miguel Hidalgo | M&eacute;xico DF |</div>
	
	<div class="stacks_in_153_page2breaker"></div></div>

	<div class="stacks_in_153_page2imagelist"><div class="stacks_in_153_page2listIcon"><div class='centered_image' ><img class='imageStyle' src='files/stacks_image_155.png' width='800' height='604' alt='Stacks Image 155' /></div></div><div class="stacks_in_153_page2listTitle">E-Mail</div>
	
	<div class="stacks_in_153_page2listContent">contacto@PTNS.com.mx</div>
	
	<div class="stacks_in_153_page2breaker"></div></div>

	<div class="stacks_in_153_page2imagelist"><div class="stacks_in_153_page2listIcon"><div class='centered_image' ><img class='imageStyle' src='files/stacks_image_156.png' width='618' height='800' alt='Stacks Image 156' /></div></div><div class="stacks_in_153_page2listTitle">Tel&eacute;fono</div>
	
	<div class="stacks_in_153_page2listContent">+52 (55) 5280 42 59</div>
	
	<div class="stacks_in_153_page2breaker"></div></div>

<!-- end image list stack from doobox -->


</div></div><div id='stacks_out_720_page2' class='stacks_out'><div id='stacks_in_720_page2' class='stacks_in uk_co_doobox_imagelist_stack'>
<!-- start image list stack from doobox -->

	<div class="stacks_in_720_page2imagelist"><div class="stacks_in_720_page2listIcon"><div class='centered_image' ><img class='imageStyle' src='files/stacks_image_721.png' width='288' height='217' alt='Stacks Image 721' /></div></div><div class="stacks_in_720_page2listTitle">Ventas</div>
	
	<div class="stacks_in_720_page2listContent">Gracia Moreno</div>
	
	<div class="stacks_in_720_page2breaker"></div></div>

	<div class="stacks_in_720_page2imagelist"><div class="stacks_in_720_page2listIcon"><div class='centered_image' ><img class='imageStyle' src='files/stacks_image_722.png' width='800' height='604' alt='Stacks Image 722' /></div></div><div class="stacks_in_720_page2listTitle">E-Mail</div>
	
	<div class="stacks_in_720_page2listContent">gmoreno@PTNS.com.mx</div>
	
	<div class="stacks_in_720_page2breaker"></div></div>

	<div class="stacks_in_720_page2imagelist"><div class="stacks_in_720_page2listIcon"><div class='centered_image' ><img class='imageStyle' src='files/stacks_image_723.png' width='618' height='800' alt='Stacks Image 723' /></div></div><div class="stacks_in_720_page2listTitle">Tel&eacute;fono</div>
	
	<div class="stacks_in_720_page2listContent">+52 (55) 5280 42 59  Ext. 219</div>
	
	<div class="stacks_in_720_page2breaker"></div></div>

<!-- end image list stack from doobox -->


</div></div>
</div></div></div></div></div></div></div>



<!-- End of Stacks Content -->



					</div>  <!-- #content -->
					<div id="sidebar" class="large-4 columns">
						<h4 class="sidebar_title"></h4>
						<a class="myBadge icon-twitter" href="http://twitter.com/ProyectandoTuNe"></a><br /><br /><br /><a class="myBadge icon-facebook-sign" href="http://www.facebook.com/proyectandotunegocio"></a><br /><br /><br /><a class="myBadge icon-linkedin-sign" href="http://www.linkedin.com/company/proyectando-tu-negocio"></a><br /><br /><br /><br /><a class="myBadge icon-google-plus-sign" href="https://plus.google.com/103733762281672279675/about?hl=es"></a><br /><br />
						<div id="archives">
							
						</div>
					</div>  <!-- #sidebar -->
				<div class="clearer"></div>
			</div>

			<div id="extraContent2" class="large-12 columns">
				<div class="inset">
					<div id="extraContainer2"></div>
					<div class="clearer"></div>
				</div>
			</div>  <!-- ExtraContent Area 2 -->

			<div id="extraContent3" class="large-12 columns">
				<div class="inset">
					<div id="extraContainer3"></div>
					<div class="clearer"></div>
				</div>
			</div>  <!-- ExtraContent Area 3 -->

			<div id="breadcrumb" class="row">
				<div id="breadcrumb_content" class="large-12 columns"></div>
			</div>  <!-- Breadcrumb -->


		</div>  <!-- #container -->

		<footer class="row">
			<div class="large-12 columns">&copy; 2014 TodoMarketing - Estrategias para Vender M&aacute;s <a href="#" id="rw_email_contact">Contact Me</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":lu";var _rwObsfuscatedHref3 = "is@";var _rwObsfuscatedHref4 = "tod";var _rwObsfuscatedHref5 = "oma";var _rwObsfuscatedHref6 = "rke";var _rwObsfuscatedHref7 = "tin";var _rwObsfuscatedHref8 = "g.c";var _rwObsfuscatedHref9 = "om.";var _rwObsfuscatedHref10 = "mx";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8+_rwObsfuscatedHref9+_rwObsfuscatedHref10; document.getElementById('rw_email_contact').href = _rwObsfuscatedHref;</script></div>
		</footer>



		<div id="to_the_top">
			<i class="icon-chevron-up"></i>
		</div>

	</body>

</html>
