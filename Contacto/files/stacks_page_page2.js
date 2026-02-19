
// 'stacks' is the Stacks global object.
// All of the other Stacks related Javascript will 
// be attatched to it.
var stacks = {};


// this call to jQuery gives us access to the globaal
// jQuery object. 
// 'noConflict' removes the '$' variable.
// 'true' removes the 'jQuery' variable.
// removing these globals reduces conflicts with other 
// jQuery versions that might be running on this page.
stacks.jQuery = jQuery.noConflict(true);

// Javascript for stacks_in_144_page2
// ---------------------------------------------------------------------

// Each stack has its own object with its own namespace.  The name of
// that object is the same as the stack's id.
stacks.stacks_in_144_page2 = {};

// A closure is defined and assigned to the stack's object.  The object
// is also passed in as 'stack' which gives you a shorthand for referring
// to this object from elsewhere.
stacks.stacks_in_144_page2 = (function(stack) {

	// When jQuery is used it will be available as $ and jQuery but only
	// inside the closure.
	var jQuery = stacks.jQuery;
	var $ = jQuery;
	

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// DOO A MAP STACK BY http://www.doobox.co.uk XXXXXXX
// COPYRIGHT@2010 MR JG SIMPSON, TRADING AS DOOBOX
// ALL RIGHTS RESERVED XXXXXXXXXXXXXXXXXXXXXXXXXXX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx


//printing function called like : $( "#stacks_in_144_page2directions" ).printThis();
(function(b){var a;b.fn.printThis=function(d){a=b.extend({},b.fn.printThis.defaults,d);var c=(this instanceof jQuery)?this:b(this);if(window.opera&&window.opera.buildNumber){var e=window.open("","Print Preview");e.document.open()}else{var f=("printThis-"+(new Date()).getTime());var g=b("<iframe id='"+f+"' src='about:blank'/>");if(!a.debug){g.css({position:"absolute",width:"0px",height:"0px",left:"-600px",top:"-600px"})}g.appendTo("body")}setTimeout(function(){if(window.opera&&window.opera.buildNumber){var h=e.document}else{var h=b("#"+f).contents()}if(a.importCSS){b("link[rel=stylesheet]").each(function(){var i=b(this).attr("href");if(i){var j=b(this).attr("media")||"all";h.find("head").append("<link type='text/css' rel='stylesheet' href='"+i+"' media='"+j+"'>")}})}if(a.loadCSS){h.find("head").append("<link type='text/css' rel='stylesheet' href='"+a.loadCSS+"'>")}if(a.titlePage){h.find("head").append("<title>"+a.titlePage+"</title>")}if(a.printContainer){h.find("body").append(c.outer())}else{c.each(function(){h.find("body").append(b(this).html())})}(window.opera&&window.opera.buildNumber?e:g[0].contentWindow).focus();setTimeout(function(){(window.opera&&window.opera.buildNumber?e:g[0].contentWindow).print();if(e){e.close()}},1000);setTimeout(function(){g.remove()},(60*1000))},333)};b.fn.printThis.defaults={debug:false,importCSS:true,printContainer:true,loadCSS:"",titlePage:""};jQuery.fn.outer=function(){return b(b("<div></div>").html(this.clone())).html()}})(jQuery);




$(document).ready(function() {

	// append the modal stuff
	$('body').append($("#stacks_in_144_page2overlay"));
	$('body').append($("#stacks_in_144_page2modal"));
		
	// declare the vars
	var doomaplocation = "Lamartine 712, Bosque de Chapultepec, Mexico";
	var doomaptype = "1";
	if (doomaptype == 1){
	doomaptype = "roadmap"}
	else{
	doomaptype = "hybrid"} 
	var doomapwidth = "400";
	var doomapheight = "400";
	var doozoomlevel = "17";
	var doomappincolor = "3793FF";
	var dooamap;
	var doomaplabelborder = "";
	var doomaplabelbackground = "";

	
	function dootidylocation(doomaplocation) {
		doomaplocation = doomaplocation.replace(/\<\s*br\s*\/\>/g,',');
		doomaplocation = doomaplocation.replace(/[\s]+/g,'+');
		doomaplocation = doomaplocation.replace(/\s*\,+\s*/g,',');
		return $.trim(doomaplocation);
	}
	
	doomaplocation = dootidylocation(doomaplocation);
	
	function stacks_in_144_page2maintainHeight() {
		$(".stacks_in_144_page2mapcontainer").height($(".stacks_in_144_page2mapcontainer").height());
	}
	
	function stacks_in_144_page2resetAutoHeight() {
		$(".stacks_in_144_page2mapcontainer").height("auto");
	}
	
	$('.stacks_in_144_page2mapplus').click(function() {
		stacks_in_144_page2maintainHeight();
		doozoomlevel = parseInt(doozoomlevel) + 1;
		dooshowthemap();
	});
	
	
	$('.stacks_in_144_page2mapminus').click(function() {
		stacks_in_144_page2maintainHeight();
		doozoomlevel = parseInt(doozoomlevel) - 1;
		dooshowthemap();
	});


	function dooshowthemap() {
	$(".stacks_in_144_page2mapWrapper img").remove();
	$(".stacks_in_144_page2mapWrapper canvas").remove();
	var dooamap = "http://maps.googleapis.com/maps/api/staticmap?center=" + doomaplocation + "&zoom=" + doozoomlevel + "&size="+ doomapwidth +"x"+ doomapheight +"&maptype="+ doomaptype +"&markers=|color:0x"+doomappincolor+"|"+ doomaplocation +"&sensor=false";
	// Append the map
	$(".stacks_in_144_page2mapWrapper").append('<img src="'+ dooamap +'" id="stacks_in_144_page2dooamap" alt="Loading Map..."/>');
	}
	
	
	
	function getDirections2(addr) {
		var stacks_in_144_page2url = encodeURI("http://maps.googleapis.com/maps/api/directions/json?origin=" + addr + "&destination=Lamartine 712, Bosque de Chapultepec, Mexico&sensor=false");
		//alert(stacks_in_144_page2url);
		 $.ajax({
	        type: "GET",
	        url: stacks_in_144_page2url,
	        dataType: "json",
	        success: function (data) {
	            if(data.routes[0]){
					var directions = "<hr /><br />";
						$.each(data.routes[0].legs[0].steps, function(index, steps) {
									directions += "<div>";
									directions += steps.html_instructions + "<br />";
						});
									directions += "<hr />" + data.routes[0].copyrights + "<br />";
									directions += "</div>";
						$('#stacks_in_144_page2directions').append(directions);
						$( "#stacks_in_144_page2print" ).show();
						centerfullmodal();
						$("#stacks_in_144_page2modal").css({"position": "absolute"});
				    		$("#stacks_in_144_page2modal").css({"top": $("body").scrollTop() + 10});
				}
				else
				{
						$('#stacks_in_144_page2directions').prepend("Sorry, we could not calculate directions from your location.");
						centermodal();
				}
	        },
	     });
    

	}
	

      
function getDirections(addr) {
      var ds = new google.maps.DirectionsService();
      ds.route({
         origin:addr,
         destination:"Lamartine 712, Bosque de Chapultepec, Mexico",
         region:'at',
         travelMode: google.maps.TravelMode.DRIVING
      },function(data,status){
       if(status == google.maps.DirectionsStatus.OK){
          var directions = "<hr /><br />";
						$.each(data.routes[0].legs[0].steps, function(index, steps) {
									directions += "<div>";
									directions += steps.instructions + "<br />";
						});
									directions += "<hr />" + data.routes[0].copyrights + "<br />";
									directions += "</div>";
						$('#stacks_in_144_page2directions').append(directions);
						$( "#stacks_in_144_page2print" ).show();
						centerfullmodal();
						$("#stacks_in_144_page2modal").css({"position": "absolute"});
				    		$("#stacks_in_144_page2modal").css({"top": $("body").scrollTop() + 10});
       }else{
	       $('#stacks_in_144_page2directions').prepend("Sorry, we could not calculate directions from your location.");
		   centermodal();
       }
      });
 };
   
   
   
    // directions icon click function
	$('#stacks_in_144_page2route').submit(function(ev){
		$('#stacks_in_144_page2directions').html("");
		$( "#stacks_in_144_page2print" ).hide();
	      var addr = $('#stacks_in_144_page2addr').val();
	      getDirections(addr);
	      ev.preventDefault();
    });
   
   // reset directions
	$('#stacks_in_144_page2reset').click(function (e) {
		$('#stacks_in_144_page2directions').html("");
		$( "#stacks_in_144_page2print" ).hide();
		$('#stacks_in_144_page2addr').val("");
		centermodal();
		e.preventDefault();
	});	
	
	// print button
	$( "#stacks_in_144_page2print" ).click(function(){
    	$( "#stacks_in_144_page2directions" ).printThis();         
    });
	
	// get directions
	$('#stacks_in_144_page2getdirections').click(function(e) {
	$('#stacks_in_144_page2directions').html("");
	$('#stacks_in_144_page2addr').val("");
	$('#stacks_in_144_page2overlay').fadeIn(500);
	$('#stacks_in_144_page2modal').fadeIn(1000);	
	centermodal();
	});
	
	
	// close modal
	$('#stacks_in_144_page2close').click(function (e) {
		$('#stacks_in_144_page2overlay').hide();
		$('#stacks_in_144_page2modal').hide();
	});		
	
	// close modal from mask
	$('#stacks_in_144_page2overlay').click(function (e) {
		$(this).hide();
		$('#stacks_in_144_page2modal').hide();
	});	  
	
	function isCanvasSupported(){
	  var elem = document.createElement('canvas');
	  return !!(elem.getContext && elem.getContext('2d'));
	}
	
	
	if(!isCanvasSupported()){
	$('#stacks_in_144_page2getdirections').css("display","none"); 
	};
   

dooshowthemap();
	
	
	
	
	// resize and scroll functions

	
	
	// center the modal
	function centermodal() {
		$("#stacks_in_144_page2modal").css({"position": "fixed", top: "50%"});
		var left;
	    left = Math.round(Math.max($(window).width() - $("#stacks_in_144_page2modal").width(), 0) / 2);
	    $("#stacks_in_144_page2modal").css({"margin-top":- Math.round($("#stacks_in_144_page2modal").height() / 2) + $("body").offset().top, left:left});
	}
	
	function centerfullmodal() {
		$("#stacks_in_144_page2modal").css({"position": "fixed"});
		var left;
	    left = Math.round(Math.max($(window).width() - $("#stacks_in_144_page2modal").outerWidth(), 0) / 2);
	    $("#stacks_in_144_page2modal").css({top: 0, "margin-top": 10, left:left});
	}

	
	
	var rtime = new Date(1, 1, 2000, 12,00,00);
	var timeout = false;
	var delta = 200;


	$(window).resize(function(){
	  stacks_in_144_page2resetAutoHeight();
	  
	  rtime = new Date();
	    if (timeout === false) {
	        timeout = true;
	        setTimeout(resizeend, delta);
	    }
	}); 
	
	
	
	function resizeend() {
    if (new Date() - rtime < delta) {
        setTimeout(resizeend, delta);
    } else {
        timeout = false;
        centermodal();
        dooshowthemap();
    }               
    }

	 	 

}); // end doc ready

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// END DOOBOX DOO A MAP STACK XXXXXXXXXXXXXXXXX
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
	return stack;
})(stacks.stacks_in_144_page2);


// Javascript for stacks_in_153_page2
// ---------------------------------------------------------------------

// Each stack has its own object with its own namespace.  The name of
// that object is the same as the stack's id.
stacks.stacks_in_153_page2 = {};

// A closure is defined and assigned to the stack's object.  The object
// is also passed in as 'stack' which gives you a shorthand for referring
// to this object from elsewhere.
stacks.stacks_in_153_page2 = (function(stack) {

	// When jQuery is used it will be available as $ and jQuery but only
	// inside the closure.
	var jQuery = stacks.jQuery;
	var $ = jQuery;
	
// imagelist Stack by http://www.doobox.co.uk
// Copyright@2010 Mr JG Simpson, trading as Doobox.
// all rights reserved.



$(document).ready(function() {


if("no" == "yes"){
var thefirstsource = $( "#stacks_in_153_page2:first-child img" ).attr("src");
$( "#stacks_in_153_page2 .stacks_in_153_page2listIcon .centered_image" ).each(function(){
$(this).html('<img width="128" height="128" src="' + thefirstsource + '" />');
});
}

else{

$("#stacks_in_153_page2 .stacks_in_153_page2listIcon").each(function(){
if(!$(this).find("img").attr("src")){
$(this).html('<img width="128" height="128" src="files/imagelistimages/tick.png" />');
}
});

}

});

	return stack;
})(stacks.stacks_in_153_page2);


// Javascript for stacks_in_720_page2
// ---------------------------------------------------------------------

// Each stack has its own object with its own namespace.  The name of
// that object is the same as the stack's id.
stacks.stacks_in_720_page2 = {};

// A closure is defined and assigned to the stack's object.  The object
// is also passed in as 'stack' which gives you a shorthand for referring
// to this object from elsewhere.
stacks.stacks_in_720_page2 = (function(stack) {

	// When jQuery is used it will be available as $ and jQuery but only
	// inside the closure.
	var jQuery = stacks.jQuery;
	var $ = jQuery;
	
// imagelist Stack by http://www.doobox.co.uk
// Copyright@2010 Mr JG Simpson, trading as Doobox.
// all rights reserved.



$(document).ready(function() {


if("no" == "yes"){
var thefirstsource = $( "#stacks_in_720_page2:first-child img" ).attr("src");
$( "#stacks_in_720_page2 .stacks_in_720_page2listIcon .centered_image" ).each(function(){
$(this).html('<img width="128" height="128" src="' + thefirstsource + '" />');
});
}

else{

$("#stacks_in_720_page2 .stacks_in_720_page2listIcon").each(function(){
if(!$(this).find("img").attr("src")){
$(this).html('<img width="128" height="128" src="files/imagelistimages/tick.png" />');
}
});

}

});

	return stack;
})(stacks.stacks_in_720_page2);


