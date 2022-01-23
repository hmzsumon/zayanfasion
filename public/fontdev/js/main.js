var preloader=document.getElementById('load');
function myfunctions() {
	preloader.style.display='none';
}


$(document).ready(function(){

	$('.product-image-zoom').elevateZoom();

	// slick slider
	$('.simpleLens-big-image-container').slick({
		asNavFor: '.slider-for',
		dots: false,
		asNavFor: '.product-thumb-gallery',
	});

	$('.product-thumb-gallery').slick({
		slidesToShow: 4,
		slidesToScroll: 2,
		asNavFor: '.simpleLens-big-image-container',
		dots: false,
		centerMode: true,
		focusOnSelect: true
	});

	$(window).scroll(function() {
		if ($(window).scrollTop() > 20) {
			$('.menubar').addClass('menubarshadow');
		} else {
			$('.menubar').removeClass('menubarshadow');
		}
	});
});