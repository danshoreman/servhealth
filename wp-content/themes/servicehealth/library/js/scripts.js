	
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
		
		
		$('a[href^="#"]').on('click',function (e) {
		    e.preventDefault();
	
		    var target = this.hash;
		    var $target = $(target);
	
		    $('html, body').stop().animate({
		        'scrollTop': $target.offset().top
		    }, 900, 'swing');
		});
		
		
		
	});

})(jQuery);