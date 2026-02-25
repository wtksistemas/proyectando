elixir.mobileNavToggle = {};
elixir.mobileNavToggle = (function() {
    var jQuery = elixir.jQuery;
    var $ = jQuery;
	var $elixir = jQuery.noConflict();

	function mobileNavToggleFunction() {
		$elixir('#mobile_navigation_toggle').html('<i class="icon-link"></i>');
	}
	
	$elixir(document).ready(function() {
		mobileNavToggleFunction();
	});	
})(elixir.mobileNavToggle);

