jQuery(document).ready(function($) {
	
	$('.bucketEx').each(function() {
		var row = $(this).find('tr').size();
		var rez = row / 5;
		if(!isInt(rez)){
			rez = parseInt(rez);
			rez = rez+1;
		}
		if(rez == 0)
		{rez = 1;}
		
		for( var i = 0; i< rez;i++) {
			$(this).find('.bPageList').append('<li></li>');
			if (i == 0) {
				$(this).find('.bPageList li').css({"background-color":"#fff", 
												   "width":"5px", 
												   "height":"5px", 
												   "border":"solid 1px #CCC"
												 });
			}			
		}
		
		if(rez === 1) {
			$(this).find('li').hide();	
		}
		
		var widthSize = rez * 13;
		$(this).find('.bPageList').css('width', widthSize);
		
	});
	
	  $('.bucketEx').each(function() {
	 var tables = $(this).find('table').size();
	 if(tables != 1){
		  $(this).find('table').hide();
		  $(this).find('table').eq(0).show();
	 }
	});	
	
 $('.bucketEx').find('.bPageList li')
	.click(function () {
		var indexi = $(this).index(); 
		var tables = $(this).parent().parent().parent().find("table");
		$(this).parent().find('li').css({"background-color":"#CCC",
										 "width":"7px", 
										 "height":"7px", 
										 "border":"none"
										 });	
		
		
		
		$(this).css({"background-color":"#fff", 
					 "width":"5px", 
					 "height":"5px", 
					 "border":"solid 1px #CCC"
				    });	

		
			tables.fadeOut();
			tables.eq(indexi).fadeIn('normal');
	
			
	});
	
});

function isInt(n) {
   return n % 1 === 0;
}

