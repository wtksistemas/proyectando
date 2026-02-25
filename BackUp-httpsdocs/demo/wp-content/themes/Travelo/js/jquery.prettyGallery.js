/* ------------------------------------------------------------------------
	Class: prettyGallery
	Use: Gallery plugin for jQuery
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Version: 1.1.1
------------------------------------------------------------------------- */
jQuery(document).ready(function(){
	if ( ( jQuery('.left').length > 0 ) || ( jQuery('.right').length > 0 ) ) {
			jQuery('.toursShortcode').css({
				'width': '620px', 
				'margin': '20px 0 40px -25px'
				});
			jQuery('.pg_previous').css({
				'margin': '0 295px',
				'background': 'url(' + theme_directory + '/images/prettyGallery/prev.gif) top left no-repeat'
				});
			jQuery('.pg_next').css({
				'margin': '0px 320px',
				'background': 'url(' + theme_directory + '/images/prettyGallery/next.gif) top left no-repeat'
				});
		}
});
	
jQuery.fn.prettyGallery = function(settings) {

var items = 3;

        if ( ( jQuery('.left').length > 0 ) || ( jQuery('.right').length > 0 ) ) {
			items = 2;
		}
		if (jQuery(window).width() <= 645) {
			items = 1;
		}
		else if (jQuery(window).width() <= 979) {
			items = 2;
		}

	settings = jQuery.extend({
		itemsPerPage : items,
		animationSpeed : 'normal', /* fast/normal/slow */
		navigation : 'both',  /* top/bottom/both */
		of_label: '', //' of ', /* The content in the page "1 of 2" */
		previous_title_label: 'Previous page', /* The title of the previous link */
		next_title_label: 'Next page', /* The title of the next link */
		previous_label: 'Previous', /* The content of the previous link */
		next_label: 'Next' /* The content of the next link */
	}, settings);
	return this.each(function(){
		// Global variables needed in multiple functions.	
		var currentPage = 1,
			itemWidth = 300,
			itemMargin = 0,
			galleryWidth = 900,
			pageCount = 0,
			animated = false,
			jQuerygallery = jQuery(this);
		
		var prettyGalleryPrevious = function(caller) {
			// Make sure not to double animate, and not animate of the button is disabled
			if(animated || jQuery(caller).hasClass('disabled')) return;
			animated = true;

			jQuerygallery.find('li:lt('+(currentPage * settings.itemsPerPage)+')').each(function(i){
				jQuery(this).animate({'left': parseFloat(jQuery(this).css('left')) + (galleryWidth + itemMargin) }, settings.animationSpeed, function(){
					animated = false;
				});
			});

			jQuerygallery.find('li:gt('+ ((currentPage * settings.itemsPerPage) - 1) +')').each(function(i){
				jQuery(this).animate({'left': parseFloat(jQuery(this).css('left')) + (galleryWidth + itemMargin) }, settings.animationSpeed);
			});

			currentPage--;

			_displayPaging();
		};

		var prettyGalleryNext = function(caller) {
			// Make sure not to double animate, and not animate of the button is disabled
			if(animated || jQuery(caller).hasClass('disabled')) return;
			animated = true;

			jQuerygallery.find('li:lt('+(currentPage * settings.itemsPerPage)+')').each(function(i){
				jQuery(this).animate({'left': parseFloat(jQuery(this).css('left')) - (galleryWidth + itemMargin) }, settings.animationSpeed, function(){
					animated = false;
				});
			});

			jQuerygallery.find('li:gt('+ ((currentPage * settings.itemsPerPage) - 1) +')').each(function(i){
				jQuery(this).animate({'left': parseFloat(jQuery(this).css('left')) - (galleryWidth + itemMargin) }, settings.animationSpeed);
			});

			currentPage++;

			_displayPaging();
		};

		var _formatGallery = function() {
			itemWidth = jQuerygallery.find('li:first').css('position','absolute').width();
			
			itemMargin += (jQuerygallery.find('li:first').css('margin-right') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('margin-right'));
			itemMargin += (jQuerygallery.find('li:first').css('margin-left') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('margin-left'));
			itemMargin += (jQuerygallery.find('li:first').css('padding-right') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('padding-right'));
			itemMargin += (jQuerygallery.find('li:first').css('padding-left') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('padding-left'));

			var itemSpacingTopBottom = 0;
				itemSpacingTopBottom += (jQuerygallery.find('li:first').css('margin-top') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('margin-top'));
				itemSpacingTopBottom += (jQuerygallery.find('li:first').css('margin-bottom') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('margin-bottom'));
				itemSpacingTopBottom += (jQuerygallery.find('li:first').css('padding-top') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('padding-top'));
				itemSpacingTopBottom += (jQuerygallery.find('li:first').css('padding-bottom') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('padding-bottom'));

			var itemHeight = jQuerygallery.find('li:first').height() + itemSpacingTopBottom;
			var marginRight = (jQuerygallery.find('li:first').css('margin-right') == 'auto') ? 0 : parseFloat(jQuerygallery.find('li:first').css('margin-right'));
			galleryWidth = (itemWidth + itemMargin) * settings.itemsPerPage - marginRight; // We don't want the margin of the last item, that's why we remove it.

			jQuerygallery.css({
				'width': galleryWidth,
				'height': itemHeight,
				'overflow': 'hidden',
				'position': 'relative',
				'clear': 'left'
			});
			jQuerygallery.find('li').each(function(i){
				jQuery(this).css({
					'position':'absolute',
					'top':0,
					'left':i * (itemWidth + itemMargin)
				});
			});

			jQuerygallery.wrap('<div class="prettyGalleryContainer"></div>');
		};
        
		var _displayPaging = function() {
			jQuerycg = jQuerygallery.parents('div.prettyGalleryContainer:first'); // The containing gallery

			jQuerycg.find('ul.pg_paging span.current').text(currentPage);
			jQuerycg.find('ul.pg_paging span.total').text(pageCount);

			// Make sur all the links are enabled
			jQuerycg.find('ul.pg_paging li a').removeClass('disabled');

			// Display the proper nav
			if(currentPage == 1){
				// Hide the previous button
				jQuerycg.find('ul.pg_paging li.pg_previous a').addClass('disabled');
			} else if(currentPage == pageCount) {
				// Hide the next button
				jQuerycg.find('ul.pg_paging li.pg_next a').addClass('disabled');
			};
		};
        
		var _applyNav = function() {
			var template = '';
				template +='<ul class="pg_paging">';
				template += '<li class="pg_previous"><a href="#" title="'+settings.previous_title_label+'">'+settings.previous_label+'</a></li>';
				template += '<li><span class="current" style="display:none;">1</span>'+settings.of_label+'<span class="total" style="display:none;">1</span></li>';
				template += '<li class="pg_next"><a href="#" title="'+settings.next_title_label+'">'+settings.next_label+'</a></li>';
				template += '</ul>';

			switch(settings.navigation){
				case 'top':
					jQuerygallery.before(template);
					break;
				case 'bottom':
					jQuerygallery.after(template);
					break;
				case 'both':
					jQuerygallery.before(template);
					jQuerygallery.after(template);
					break;
			};

			// Adjust the nav to the gallery width
			var jQuerytheNav = jQuerygallery.parent('div.prettyGalleryContainer:first').find('ul.pg_paging');
			galleryBorderWidth = parseFloat(jQuerytheNav.css('border-left-width')) + parseFloat(jQuerytheNav.css('border-right-width'));
			jQuerytheNav.width(galleryWidth - galleryBorderWidth);
			jQuerytheNav.each(function(){
				jQuery(this).find('li:eq(1)').width(galleryWidth - galleryBorderWidth - parseFloat(jQuery(this).parent().find('ul.prettyNavigation li:first').width()) - parseFloat(jQuery(this).parent().find('ul.prettyNavigation li:last').width()));
			});
            
			// Apply the functions to the buttons
			jQuerytheNav.find('li.pg_previous a').click(function(){
				prettyGalleryPrevious(this);
				return false;
			});

			jQuerytheNav.find('li.pg_next a').click(function(){
				prettyGalleryNext(this);
				return false;
			});
		};
		
		// Check if we need the gallery
		if(jQuery(this).find('li').size() > settings.itemsPerPage) {		
			// Set the number of pages
			pageCount = Math.ceil(jQuery(this).find('li').size() / settings.itemsPerPage);
			
			// Format the gallery properly
			_formatGallery();
			
			// Build and display the nav
			_applyNav();
			
			// Display the proper paging
			_displayPaging(this);
			currentPage = 1;
		};
	});
};