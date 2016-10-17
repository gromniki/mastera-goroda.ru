function make_lazyload(){
	$( 'img[data-original]'+lazy_class ).show().lazyload({
		effect: "fadeIn",
		threshold : 200
	});
}

$(function() {
	make_lazyload();
	ajaxSuccessHandlers.push(function (){
		make_lazyload(); // after pressing reset or update button
	});
});