$(document).ready(function() {
    // active tab
    $(".course-detail-sub-menu ul.menu li:first-child a").addClass('active');
    $(".course-detail-sub-menu ul.menu li a").click(function() {
        $(".course-detail-sub-menu ul.menu li a").removeClass('active');
        $(this).addClass('active');
    });

    // back to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('#scroll').fadeIn();
        } else {
            $('#scroll').fadeOut();
        }
    });
    $('#scroll').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});

function sticky_menu(menu, sticky) {
    if (typeof sticky === 'undefined' || !jQuery.isNumeric(sticky)) sticky = 0;
    if ($(window).scrollTop() >= sticky) {
        if ($('#just-for-height').length === 0) {
            menu.after('<div id="just-for-height" style="height:' + menu.height() + 'px"></div>')
        }
        menu.addClass("sticky");
    } else {
        menu.removeClass("sticky");
        $('#just-for-height').remove();
    }
}

$(document).ready(function() {
    var menu = $(".wp-menu");
    if (menu.length) {
        var sticky = menu.offset().top + 1;
        if ($(window).width() > 100) {
            sticky_menu(menu, sticky);
            $(window).on('scroll', function() {
                sticky_menu(menu, sticky);
            });
        }
    }
});