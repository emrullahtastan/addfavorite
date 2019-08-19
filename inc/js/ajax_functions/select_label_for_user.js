function select_label_for_user(label_id, value) {
    if (!$.isNumeric(label_id) || value.length==0)
        return false;
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "select_label_for_user", label_id: label_id, value: value},
        success: function (response) {
            console.log(response);
        }
    });
}