$(document).ready(function() {

    /** Sidebar toggling **/
    (function() {
        $('.navbar').on('click', '.sidebar-toggle', function (e) {
            e.preventDefault();

            $('body').toggleClass('sidebar-narrow');

            if ($('body').hasClass('sidebar-narrow')) {
                $('.navigation').children('li').children('ul').css('display', '');

                $('.sidebar-content').hide().delay().queue(function(){
                    $(this).show().addClass('animated fadeIn').clearQueue();
                });
            }

            else {
                $('.navigation').children('li').children('ul').css('display', 'none');
                $('.navigation').children('li.active').children('ul').css('display', 'block');

                $('.sidebar-content').hide().delay().queue(function(){
                    $(this).show().addClass('animated fadeIn').clearQueue();
                });
            }
        });

        $('body').on('click', '.offcanvas', function () {
            $('body').toggleClass('offcanvas-active');
        });
    })();

    /** Panel Collapsing **/
    $('[data-panel=collapse]').click(function(e) {

        e.preventDefault();
        var $target = $(this).parent().parent().next('div');

        if($target.is(':visible')) {
            $(this).children('i').removeClass('icon-arrow-up9');
            $(this).children('i').addClass('icon-arrow-down9');
        } else {
            $(this).children('i').removeClass('icon-arrow-down9');
            $(this).children('i').addClass('icon-arrow-up9');
        }

        $target.slideToggle(200);
    });
});