
$(document).ready(function() {
    $('.nav__outer').click(function () {
        $('.nav__outer').removeClass('active');
        $(this).addClass('active');
        console.log('ok')
    })
})
