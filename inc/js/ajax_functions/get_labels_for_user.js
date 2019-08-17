function get_labels_for_user() {
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "get_labels_for_user"},
        success: function (response) {
            if (!$.isEmptyObject(response)) {
                $("#favorite_card_body").empty();
                $(".selected_favorite_label").removeClass("selected_favorite_label");
                $("#favorite_input").empty();
                let label_row_clone = $("#favorite_label_row_example").clone().removeAttr("id").show().addClass("favorite_label_row");
                $.each(response, function (i, val) {
                    let label_row=label_row_clone.clone();
                    label_row.find(".label_checkbox").prop("checked", true);
                    label_row.find(".label_name").html(val['label']);
                    $("#favorite_card_body").append(label_row);
                });
            }
        }
    });
}
