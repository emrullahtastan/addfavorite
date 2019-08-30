function create_label_for_user(label) {
    if ($.isEmptyObject(label))
        return false;
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "create_label_for_user", label: label},
        success: function (response) {
            if (response) {
                get_labels_for_user();
                $("#favorite_label_create_message").hide().find("label").empty();
                $("#favorite_input").val("");
            }
        }
    });
}

$(document).ready(function () {
    $("#favorite_label_create_message").click(function () {
        let value = $("#favorite_input").val();
        create_label_for_user(value);
    })
});