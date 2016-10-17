function make_lazyload(){
	lazy_load_init();

	function lazy_load_init() {
		$( 'img[data-original]' ).show().bind( 'scrollin', { distance: 200 }, function() {
			lazy_load_image( this );
		});
	}

	function lazy_load_image( img ) {
		var $img = $( img ),
			src = $img.attr( 'data-original' );

		$img.unbind( 'scrollin' ) // remove event binding
			.hide()
			.removeAttr( 'data-original' )
			.attr( 'data-lazy-loaded', 'true' );
		img.src = src;

		$img.bind('load',function(){
			$img.fadeIn();
		});
	}

}

$(function() {
	make_lazyload();
	ajaxSuccessHandlers.push(function (){
		make_lazyload(); // after pressing reset or update button
	});
});