
/*-------------------------------------------
	Browser Detection
-------------------------------------------*/

// For when you get desparate.

// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


/*-------------------------------------------
	General Functions
-------------------------------------------*/


(function($){


	/* On Page Ready */

	$(document).ready(function (){


		/*-------------------------------------------
			Title
		-------------------------------------------*/

		// Notes...


		/*-------------------------------------------
			Nav Toggle
		-------------------------------------------*/

		// Notes...


		/* Toggle class once toggle is tapped / clicked on */

		$("#nav").find(".toggle").click(function() {

			$(this).next("ul").toggleClass("open");

		});


		/*-------------------------------------------
			Subnav Toggle
		-------------------------------------------*/

		// Notes...


		/* Add a toggle div */

		$("#nav").find(".sub-menu").before('<div class="subnav-toggle">View</div>');


		/* Toggle class once toggle is tapped / clicked on */

		$("#nav").find(".subnav-toggle").click(function() {

			$(this).next(".sub-menu").toggleClass("subnav-open");

		});


		/*-------------------------------------------
			Smooth Scrolling
		-------------------------------------------*/

		// Miscellaneous calls to make scrolling smooth.


		$(function(){

			$(".to-top a").bind("click", function (event) {

				event.preventDefault ? event.preventDefault() : event.returnValue = false;

				var target = $(this).attr("href");

				$("html, body").stop().animate({

					scrollLeft: $(target).offset().left,
					scrollTop: $(target).offset().top

				}, 600, function() {

					// $("body").addClass("fixed");

				});

			});

		});


		/*-------------------------------------------
			FitVids
		-------------------------------------------*/

		// Notes...


		// $(".training-video").find("figure").fitVids();


		/*-------------------------------------------
			Screen Size
		-------------------------------------------*/


		/* Add class of "dev" to <body> */


		// $("body").addClass("dev");


		/* Displays screen size on the fly. */


		// var windowSize = $(window).width();

		// $("#footer").after('<div id="dev"></div>');

		// $("#dev").text(windowSize);


	});


	/* On Page Load */


	$(window).load(function() {


		/*-------------------------------------------
			Title
		-------------------------------------------*/

		// Notes...


		/* Featured Products */

		$("#featured-products").find(".flexslider").flexslider({

			animation: "slide",
			slideshow: false,
			useCSS: false,
			smoothHeight: true,
			animationLoop: false,
			start: function(slider){

				$("body").removeClass("loading");

			}

		});

		/* Testimonials */

		$(".testimonials").find(".flexslider").flexslider({

			animation: "fade",
			slideshowSpeed: 15000,
			useCSS: false,
			smoothHeight: true,
			controlNav: false,
			directionNav: false,
			animationLoop: false,
			start: function(slider){

				// $("body").removeClass("loading");

			}

		});


		/*-------------------------------------------
			Featured Products
		-------------------------------------------*/

		// Displayed on home page.


		// $("#featured-products").find(".flexslider").flexslider({

			// animation: "slide",
			// slideshow: false,
			// useCSS: false,
			// smoothHeight: true,
			// start: function(slider){

				// $("body").removeClass("loading");

			// }

		// });


		/*-------------------------------------------
			Testimonials
		-------------------------------------------*/

		// Displayed on home page.


		// $("#testimonials").find(".flexslider").flexslider({

			// animation: "slide",
			// slideshow: false,
			// useCSS: false,
			// directionNav: false,
			// smoothHeight: true,
			// start: function(slider){

				// $("body").removeClass("loading");

			// }

		// });


	});


	/* On Window Resize */


	$(window).resize(function() {


		/*-------------------------------------------
			Screen Size
		-------------------------------------------*/


		// Displays screen size on the fly.


		// var windowSize = $(window).width();

		// $("#dev").text(windowSize);


	});


})(window.jQuery);