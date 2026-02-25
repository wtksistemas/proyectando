
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

// Javascript for stacks_in_406_page10
// ---------------------------------------------------------------------

// Each stack has its own object with its own namespace.  The name of
// that object is the same as the stack's id.
stacks.stacks_in_406_page10 = {};

// A closure is defined and assigned to the stack's object.  The object
// is also passed in as 'stack' which gives you a shorthand for referring
// to this object from elsewhere.
stacks.stacks_in_406_page10 = (function(stack) {

	// When jQuery is used it will be available as $ and jQuery but only
	// inside the closure.
	var jQuery = stacks.jQuery;
	var $ = jQuery;
	


/*
 * jQuery Easing Compatibility v1 - http://gsgd.co.uk/sandbox/jquery.easing.php
 *
 * Adds compatibility for applications that use the pre 1.2 easing names
 *
 * Copyright (c) 2007 George Smith
 * Licensed under the MIT License:
 *   http://www.opensource.org/licenses/mit-license.php
 */

jQuery.extend( jQuery.easing,
{
	easeIn: function (x, t, b, c, d) {
		return jQuery.easing.easeInQuad(x, t, b, c, d);
	},
	easeOut: function (x, t, b, c, d) {
		return jQuery.easing.easeOutQuad(x, t, b, c, d);
	},
	easeInOut: function (x, t, b, c, d) {
		return jQuery.easing.easeInOutQuad(x, t, b, c, d);
	},
	expoin: function(x, t, b, c, d) {
		return jQuery.easing.easeInExpo(x, t, b, c, d);
	},
	expoout: function(x, t, b, c, d) {
		return jQuery.easing.easeOutExpo(x, t, b, c, d);
	},
	expoinout: function(x, t, b, c, d) {
		return jQuery.easing.easeInOutExpo(x, t, b, c, d);
	},
	bouncein: function(x, t, b, c, d) {
		return jQuery.easing.easeInBounce(x, t, b, c, d);
	},
	bounceout: function(x, t, b, c, d) {
		return jQuery.easing.easeOutBounce(x, t, b, c, d);
	},
	bounceinout: function(x, t, b, c, d) {
		return jQuery.easing.easeInOutBounce(x, t, b, c, d);
	},
	elasin: function(x, t, b, c, d) {
		return jQuery.easing.easeInElastic(x, t, b, c, d);
	},
	elasout: function(x, t, b, c, d) {
		return jQuery.easing.easeOutElastic(x, t, b, c, d);
	},
	elasinout: function(x, t, b, c, d) {
		return jQuery.easing.easeInOutElastic(x, t, b, c, d);
	},
	backin: function(x, t, b, c, d) {
		return jQuery.easing.easeInBack(x, t, b, c, d);
	},
	backout: function(x, t, b, c, d) {
		return jQuery.easing.easeOutBack(x, t, b, c, d);
	},
	backinout: function(x, t, b, c, d) {
		return jQuery.easing.easeInOutBack(x, t, b, c, d);
	}
});

        
$(document).ready(function(){

var stacks_in_406_page10thisImage = "";
var stacks_in_406_page10imageHeight = "";

$(window).load(function(){
$('#stacks_in_406_page10 .stacks_in_406_page10colouredTile img ').each(function(){
	stacks_in_406_page10thisImage = $(this).height();
	if(stacks_in_406_page10thisImage <= stacks_in_406_page10imageHeight){
		stacks_in_406_page10imageHeight = stacks_in_406_page10thisImage;
	}
});
$('#stacks_in_406_page10 .centered_image').css("max-height",stacks_in_406_page10imageHeight);
});


            

$.fn.reverseOrder = function() {
	return this.each(function() {
		$(this).prependTo( $(this).parent() );
	});
};

			


            $('.stacks_in_406_page10itemContainer').hover(function(){
					$(".stacks_in_406_page10sliderBox", this).stop().animate({top:'-60px'},300, "easeOutBack",{queue:false});
				}, function() {
					$(".stacks_in_406_page10sliderBox", this).stop().animate({top:'0px'},300, "easeOutBack",{queue:false});
                       
            });
                
                

               
               

       
});
            
     

 

	return stack;
})(stacks.stacks_in_406_page10);


