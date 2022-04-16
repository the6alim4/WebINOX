$(document).ready(function() {
    $("body").fadeIn(400);

$('#myCarousel').carousel()
$('#newProductCar').carousel()
$("#btnup").click(function() {
    $('html, body').animate({
        scrollTop: $("#gototop").offset().top
    }, 500);
});
setTimeout(() => {
	const box = document.getElementById('spin');
	const dvv = document.getElementById('dvv');
	box.style.display = 'none';
	dvv.style.display = 'inline';
  }, 5500);

/* Home page item price animation */
$('.thumbnail').mouseenter(function() {
   $(this).children('.zoomTool').fadeIn();
});

$('.thumbnail').mouseleave(function() {
	$(this).children('.zoomTool').fadeOut();
});

// Show/Hide Sticky "Go to top" button
	$(window).scroll(function(){
		if($(this).scrollTop()>200){
			$(".gotop").fadeIn(200);
		}
		else{
			$(".gotop").fadeOut(200);
		}
	});
// Scroll Page to Top when clicked on "go to top" button
	$(".gotop").click(function(event){
		event.preventDefault();

		$.scrollTo('#gototop', 1500, {
        	easing: 'easeOutCubic'
        });
	});

});
