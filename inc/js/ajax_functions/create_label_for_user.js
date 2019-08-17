function create_label_for_user(label, selected) {
    if ($.isEmptyObject(label) || $.isEmptyObject(selected))
        return false;
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "create_label_for_user", label: label, selected: selected},
        success: function (response) {

        }
    });
}