jQuery(document).ready(function ($) {
    $("#form").click(function () {
        $('#modalBaoGia').addClass('in')
    });

    $('.icon_group_parent button').on('click', function (e) {
        e.preventDefault();
        let __self = $(this)
        let closest = __self.closest('.mobile_custom_icon_plg')
        closest.hasClass('active') ? closest.removeClass('active') : closest.addClass('active')
        $('.mobile_custom_icon_plg .nkd-button-contact').toggleClass('active-show-icon-mobile')
        $('.icon_group_parent').toggleClass('active-close-icon-mobile');
        // $('.mobile_custom_icon_plg .nkd-button-contact').css('bottom', '0');
        // $('.mobile_custom_icon_plg .nkd-button-contact').css('scale', '1');
        // $('.mobile_custom_icon_plg .nkd-button-contact').css('opacity', '1');
    })
});
