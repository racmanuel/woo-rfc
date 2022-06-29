jQuery(document).ready(function ($) {

    /** Hide the Fields on Load */
    $("#woo_rfc_fm_field").hide();
    $("#woo_rfc_field").hide();
    $("#woo_rfc_regimen_field").hide();
    $("#woo_rfc_cfdi_field").hide();

    /** If is Cheked the box */
    $("#woo_rfc_check").click(function () {
        /** Is True */
        if ($(this).is(":checked")) {
            $("#woo_rfc_fm_field").show(300);
            $("#woo_rfc_field").show(300);
            $("#woo_rfc_regimen_field").show(300);
            $("#woo_rfc_cfdi_field").show(300);
        } else {
            $("#woo_rfc_fm_field").hide(200);
            $("#woo_rfc_field").hide(200);
            $("#woo_rfc_regimen_field").hide(200);
            $("#woo_rfc_cfdi_field").hide(200);
        }
    });
});