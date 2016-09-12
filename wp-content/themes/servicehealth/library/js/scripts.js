	
(function($)	{
	
	$(document).ready(function() {
		
		
		// Nav
		// Show and hide main nav on mobile
		$('#toggle').click(function(){
			$('.main-menu').slideToggle('fast');
		});
		
		// On window resize reset menu to ensure nav displays
		var menu = $('.main-menu'); 
		$(window).on('resize', function(){     
		    if(!$("#toggle").is(":visible") && !menu.is(':visible'))
		    {
		      menu.css({'display':''});   
		    }
		});
		
		
		
	});

})(jQuery);