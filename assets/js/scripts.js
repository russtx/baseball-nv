(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
                
            $(document).ready(function() {
                $('.bottom').click(function() {
                    $('html, body').animate({
                        scrollTop: $(document).height()
                    }, 1500);
                    return false;
                });

                $('.middle').click(function() {
                    $('html, body').animate({
                        scrollTop: '2000px'
                    }, 1500);
                    return false;
                });

                $('.top').click(function() {
                    $('html, body').animate({
                        scrollTop: '0px'
                    }, 1500);
                    return false;
                });
            });
		
		// DOM ready, take it away
		
	});
	
})(jQuery, this);
