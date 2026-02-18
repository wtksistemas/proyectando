
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

// Javascript for stacks_in_879_page1
// ---------------------------------------------------------------------

// Each stack has its own object with its own namespace.  The name of
// that object is the same as the stack's id.
stacks.stacks_in_879_page1 = {};

// A closure is defined and assigned to the stack's object.  The object
// is also passed in as 'stack' which gives you a shorthand for referring
// to this object from elsewhere.
stacks.stacks_in_879_page1 = (function(stack) {

	// When jQuery is used it will be available as $ and jQuery but only
	// inside the closure.
	var jQuery = stacks.jQuery;
	var $ = jQuery;
	
// imagelist Stack by http://www.doobox.co.uk
// Copyright@2010 Mr JG Simpson, trading as Doobox.
// all rights reserved.



$(document).ready(function() {


if("no" == "yes"){
var thefirstsource = $( "#stacks_in_879_page1:first-child img" ).attr("src");
$( "#stacks_in_879_page1 .stacks_in_879_page1listIcon .centered_image" ).each(function(){
$(this).html('<img width="128" height="128" src="' + thefirstsource + '" />');
});
}

else{

$("#stacks_in_879_page1 .stacks_in_879_page1listIcon").each(function(){
if(!$(this).find("img").attr("src")){
$(this).html('<img width="128" height="128" src="files/imagelistimages/tick.png" />');
}
});

}

});

	return stack;
})(stacks.stacks_in_879_page1);


// Javascript for stacks_in_1053_page1
// ---------------------------------------------------------------------

// Each stack has its own object with its own namespace.  The name of
// that object is the same as the stack's id.
stacks.stacks_in_1053_page1 = {};

// A closure is defined and assigned to the stack's object.  The object
// is also passed in as 'stack' which gives you a shorthand for referring
// to this object from elsewhere.
stacks.stacks_in_1053_page1 = (function(stack) {

	// When jQuery is used it will be available as $ and jQuery but only
	// inside the closure.
	var jQuery = stacks.jQuery;
	var $ = jQuery;
	
// imagelist Stack by http://www.doobox.co.uk
// Copyright@2010 Mr JG Simpson, trading as Doobox.
// all rights reserved.



$(document).ready(function() {


if("no" == "yes"){
var thefirstsource = $( "#stacks_in_1053_page1:first-child img" ).attr("src");
$( "#stacks_in_1053_page1 .stacks_in_1053_page1listIcon .centered_image" ).each(function(){
$(this).html('<img width="128" height="128" src="' + thefirstsource + '" />');
});
}

else{

$("#stacks_in_1053_page1 .stacks_in_1053_page1listIcon").each(function(){
if(!$(this).find("img").attr("src")){
$(this).html('<img width="128" height="128" src="files/imagelistimages/tick.png" />');
}
});

}

});

	return stack;
})(stacks.stacks_in_1053_page1);


