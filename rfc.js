jQuery(document).ready(function ($) {
    $("#user_rfc_field").hide();
    $("#user_rfc_check").click(function () {
        if ($(this).is(":checked")) {
            $("#user_rfc_field").show(300);
        } else {
            $("#user_rfc_field").hide(200);
        }
    });
});