$(document).ready(function(e) {
    
	/*
	$(window).scroll(function(){
		
		if($(this).scrollTop() > 90){
			$('header').addClass('fixed');	
		}
		
		if($(this).scrollTop() < 90){
			if($('header').hasClass('fixed')){
				$('header').removeClass('fixed');
			}
		}	
	});
	*/
	
	$(".menu-holder li a").click(function(e){
		if($(this).data('type') == 'link'){
			return true;
		}
		
		var target = $(this).attr('href');
		$('document').localScroll({
	   		target:target
		});
	});
	
	
	
});