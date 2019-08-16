function get_labels_for_user() {
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "get_labels_for_usuer"},
        success: function (response) {
            console.log(response);
        }
    });
}