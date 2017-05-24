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
        $('.bar1, .bar2, .bar3, .wave1, .wave2, .brandName').addClass('white');
    } else {
        $('nav').addClass('navbar-trans');
        $('.bar1, .bar2, .bar3, .wave1, .wave2, .brandName').removeClass('white');
    }
}