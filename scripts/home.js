$(window).on('load', init);
$(window).resize(function () {

})
$(window).scroll(function () {
    navControl();
})

function init() {
    $('form:eq(0)').submit(submitForm);
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

window.submitForm = function (e) {
    e.preventDefault();
    if (grecaptcha.getResponse().length > 0) {
        $('[type="submit"]').addClass('disabled');
        $('#recaptcha_msg').hide();
        var data = {};
        var rawData = JSON.parse(JSON.stringify($(this).serializeArray()));
        rawData.forEach(function (element) {
            data[element.name] = element.value;
        }, this);
        $.ajax({
            type: "POST",
            url: "./endpoints/send-mail.php",
            dataType: 'text',
            data: {
                myData: JSON.stringify(data)
            },
            complete: function (r) {
                if (r.responseText == "ok") {
                    $('.form-hide').show();
                    $('.form-hide').css('display', 'flex');
                } else {
                    $('#recaptcha_msg').html("Some thing went wrong! Please try again.");
                    $('#recaptcha_msg').show();
                    $('[type="submit"]').removeClass('disabled');
                }
            }
        })
    } else {
        $('#recaptcha_msg').show();
    }


}