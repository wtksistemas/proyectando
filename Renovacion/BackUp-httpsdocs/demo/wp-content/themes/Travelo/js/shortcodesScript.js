jQuery(document).ready(function ($) {
    	//remove rapper in home if empty
		if(jQuery('#Blank').children().length == 0)
		{
			jQuery('#Blank').remove();
		}
		
	
    //tabs
    $('.tabsBody').children().each(function(){
        if($(this).text() == '')
        {
            $(this).remove();
        }
    });

    //tab
    var tabID = 0;
    $('.tabAllHolder').each(function () {
        $(this).attr('id', 'tabs-' + tabID);
        tabID++;
    });

    tabID = 0;
    $('.tabs').each(function () {
        $(this).attr('id', 'tabs-' + tabID);
        tabID++;
    });

    (function ($) {

        var titles = new Array();
        var contents = new Array();
        var IDs = new Array();

        $(".tabAllHolder").find(".tab-all").each(function () {
            if ($(this).attr("rendered") != "true") {
                var title = $(this).data("title");
                titles.push(title);
                contents.push($(this).text());
                IDs.push($(this).parent().attr('id'));
            }
        });
        $('div').remove('.tabAllHolder');
        $('.tabs').each(function () {
            for (var i = 0; i < titles.length; i++) {
                if (IDs[i] == $(this).attr('id')) {
                    $(this).children('.tabsHeader').append('<h5 class="tab">' + titles[i] + '</h5>');
                    $(this).children('.tabsBody').append('<div>' + contents[i] + '</div>');
                }
            }
        });

    })(jQuery);
	
    $('.tabsBody div').hide();
    $('.tabsBody').each(function () {
        $(this).children().eq(0).show();
    });
	
	$('.tabsBody').addClass('tabHeaderActive');
	
    $('.tabsHeader').each(function () {
        $(this).children().eq(0).addClass('tabHeaderActive');
    });
    
	$(".tabsHeader .tab").click(function () {
	  var indexi = $(this).index();
	  var ID = $(this).parent().parent().attr('id');
		
		$('#' + ID).children('.tabsHeader').children().removeClass('tabHeaderActive').addClass('tabHeaderPasive');
        $('#' + ID).children('.tabsHeader').children().eq(indexi).removeClass('tabHeaderPasive').addClass('tabHeaderActive');
        
        $('#' + ID).find('.tabsBody').find('div').hide();
        $('#' + ID).children('.tabsBody').children().eq(indexi).slideDown("slow");
    });

	
    //accordion
    jQuery(function ($) {
        $(".accordion").accordion({
            heightStyle: "content"
        });
        
        $(".accordion").each(function () { 
             $(this).children('.accHeader').eq(0).addClass('ui-accordion-header-active');
        });
       

    });
	
	if($('.left').length == 1 || $('.right').length == 1){
		$('.half').css("width",'42.7%');
		$('.third').css("width",'25.9%');
		$('.quarter').css("width",'17.6%');
		$('.sixth').css("width",'9.3%');
	}	
	if($('.right').length == 1 && $('.singleCommentHeader').length > 0){
		$('.singleCommentHeader').css('float','left');
		$('.singleCommentBody').css('float','left');
	}
	
});