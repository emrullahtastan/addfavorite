function select_label_for_user(label_id) {
    if (!$.isNumeric(label_id))
        return false;
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "select_label_for_user", label_id: label_id},
        success: function (response) {
            console.log(response);
        }
    });
}