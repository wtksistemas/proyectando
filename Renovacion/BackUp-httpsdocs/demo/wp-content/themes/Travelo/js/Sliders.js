//skitter sliders
jQuery(document).ready(function($){

    $('.box_skitter_large').skitter({
        numbers: false
    });

    $('.box_skitter_small').skitter({
        label: false,
        numbers: false,
        interval: 1000,
        hideTools: true
    });

    $('.box_skitter_medium').css({
        width: 500,
        height: 200
    }).skitter({
            interval: 4000,
            hideTools: true,
            label: false,
            numbers: false
    });

    $('.box_skitter_normal').css({
        width: 450,
        height: 300
    }).skitter({
        interval: 2000,
        hideTools: true
    });

    // gallery custom skitter slider
    $('.box_skitter_gallery_inside').css({
        width: 540,
        height: 366
    }).skitter({
        label: false,
        numbers: false,
        theme: 'square',
        animation: 'fade'
    });
	
	$('.box_skitter_inside_large').css({
        width: 960,
        height: 480
    }).skitter({
        label: false,
        numbers: false,
        theme: 'square',
        animation: 'fade'
    });
	
	$('.box_skitter_gallery_inside_flip').css({
        width: 400,
        height: 300
    }).skitter({
        label: false,
        numbers: false,
        theme: 'square',
        animation: 'fade'
    });

});
