elixir.titleBackgroundImage = {};
elixir.titleBackgroundImage = (function() {
    var jQuery = elixir.jQuery;
    var $ = jQuery;
	var $elixir = jQuery.noConflict();

	function titleBackgroundImageFunction() {
		$elixir('#banner').addClass('banner12');
	}
	
	$elixir(document).ready(function() {
		titleBackgroundImageFunction();
	});	
})(elixir.titleBackgroundImage);

