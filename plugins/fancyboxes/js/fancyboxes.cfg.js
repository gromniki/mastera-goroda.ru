$('.fancybox').fancybox();
$('.fancybox-thumbs').fancybox({
        openEffect: 'elastic',
        closeEffect: 'fade',
        prevEffect: 'elastic',
        nextEffect: 'elastic',
        helpers: {
                thumbs: {
                        width: 80,
                        height: 80
                }
        }
});
$(".various").fancybox({
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        width: '95%',
        height: '95%',
        autoSize: true,
        openEffect: 'fade',
        closeEffect: 'fade',
        helpers: {
                overlay: {
                        closeClick: false,
                        speedOut: 200,
                        showEarly: true,
                        locked: true
                }
        }
});
$(document).ready(function() {
        $('.fancybox-media').fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                helpers: {
                        media: {},
                        overlay: {
                                closeClick: false,
                                speedOut: 200,
                                showEarly: true,
                                locked: true
                        }
                }
        });
});
$('.fancybox-buttons').fancybox({
        openEffect: 'elastic',
        closeEffect: 'fade',
        prevEffect: 'elastic',
        nextEffect: 'elastic',
        closeBtn: false,
        helpers: {
                title: {
                        type: 'inside'
                },
                buttons: {
                        position: 'bottom'
                }
        },
        afterLoad: function() {
                this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
});