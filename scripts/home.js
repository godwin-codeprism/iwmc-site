$(window).on('load', init);
$(window).resize(function () {

})
$(window).scroll(function () {
    navControl();
})

function init() {

}

function navControl() {
    if ($(window).scrollTop() > 20) {
        $('nav').removeClass('navbar-trans');
    } else {
        $('nav').addClass('navbar-trans');
    }
}