jQuery(document).ready(function($) {

	/*** Change icon color on focus ***/

	$('.gform_wrapper .gform_body input, .gform_wrapper .gform_body textarea').click(function(){

		$('.gform_wrapper span,.gform_wrapper div').removeClass('focus-color');

		$(this).parent().addClass('focus-color');

	});

	/*** Make an Appointment PopUp ***/

	$('.appointment-btn-dark, .appointment-btn-light').attr({ 'data-target':"#appointment", 'data-toggle':"modal",'title':"Make an Appointment"})

	/*** Testimonial Slider ***/

	$("#testimonials-slider").lightSlider({

		loop:true,

		keyPress:true,

		item:2,

		adaptiveHeight:true,

		auto:true,

		pauseOnHover:true,

		pause:5000,

		slideMargin:0,

		responsive : [

			{

				breakpoint:768,

				settings: {

					item:1,

					slideMove:1,

					slideMargin:6,

					adaptiveHeight:true,

				  }

			}

		]

	});

	/*** Read more toggle on about us page ***/

	$(".read-more").click(function(){

	    $(".extra-info").slideToggle(500);

	    $(".read-more").toggleClass("up-down-arrow");

	});

	/*** Parallax footer ***/

	if($(window).width() > 767) {

		$('.home').addClass('parallax-footer');

		var classFooter = $('#copyright-sec').outerHeight() + $('footer').outerHeight();

		$('.home #accel-main-content').css('margin-bottom',classFooter+'px');

	}

});

