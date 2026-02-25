// responsive Menu
jQuery(document).ready(function($){
	
	var isMenuShown = false;
		
	$('#menuResponsiveBtn').click(function(){

		if(isMenuShown){
			isMenuShown = false;
			$('html, body').animate({
					right:  0
				}, 400, function(){
						$('.menuWrapper').css('display', 'none');
					}
				);
		}
		else {
			$('.menuWrapper').css('display', 'block');
			isMenuShown = true;
			$('html, body').animate({
					right:  250
				}, 400);
		
		}	
	});

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        
		window.setTimeout(function(){
				var height = 0;
				$('.header').siblings().each(function ()
					{
						if(!($(this).hasClass('skinsWrapper')))
						{
							 height += $(this).height();
						}
					});
				$('.menuWrapper').css('height', height);
		},800);
    }


    jQuery(window).bind('orientationchange', function() {
        window.setTimeout(function(){
    	var height = 0;
		$('.header').siblings().each(function ()
			{
				 height += $(this).height();
			});
        $('.menuWrapper').css('height', height);

        }, 800);
    });
	// responsive Menu

});
    