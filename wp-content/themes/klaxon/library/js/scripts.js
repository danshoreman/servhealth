	
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
		
		
		function onScrollInit( items, trigger ) {
		  items.each( function() {
		    var osElement = $(this),
		        osAnimationClass = osElement.attr('data-os-animation'),
		        osAnimationDelay = osElement.attr('data-os-animation-delay');
		      
		        osElement.css({
		          '-webkit-animation-delay':  osAnimationDelay,
		          '-moz-animation-delay':     osAnimationDelay,
		          'animation-delay':          osAnimationDelay
		        });
		
		        var osTrigger = ( trigger ) ? trigger : osElement;
		        
		        osTrigger.waypoint(function() {
		          osElement.addClass('animated').addClass(osAnimationClass);
		          },{
		              triggerOnce: true,
		              offset: '90%'
		        });
		  });
		}
		
		onScrollInit( $('.os-animation') );
		onScrollInit( $('.staggered-animation01'), $('.staggered-animation-container01') );
		onScrollInit( $('.staggered-animation02'), $('.staggered-animation-container02') );
		
		
	});

})(jQuery);