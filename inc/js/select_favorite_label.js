$(".favorite_label_row").change(function () {
    let value=$(this).find(".label_checkbox").prop("checked");
    let label_id=parseInt($(this).data("label_id"));
    select_label_for_user(label_id, value);
});


