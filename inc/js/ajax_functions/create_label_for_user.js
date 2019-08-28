function create_label_for_user(label) {
    console.log("create_label_for_user");
    if ($.isEmptyObject(label))
        return false;
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "create_label_for_user", label: label},
        success: function (response) {
                console.log(response);
        }
    });
}

$(document).ready(function () {
    $("#favorite_label_create_message").click(function () {
        let value=$("#favorite_input").val();
        create_label_for_user(value);
    })
});