var slideMenu = function() {
    $(document).ready(function() {
        $('.submenu').addClass('submenu-li-none');
        console.log('ok');
    });
    $('.menu-li').mouseenter(function() {
        $(this).children('.submenu').removeClass('submenu-li-none');
        $(this).children('submenu').addClass('submenu-li');
        console.log('dupa');
    });
    $('.menu-li').mouseleave(function() {
        $(this).children('.submenu').removeClass('submenu-li');
        $(this).children('.submenu').addClass('submenu-li-none');
    });
};


$(function() {
    slideMenu();
});
