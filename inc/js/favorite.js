$(document).ready(function () {
    let favorite_card_display = "none";
    $("#add_favorite_button").click(function () {
        let top = $(this).position().top + 33;
        $("#favorite_card").css({'top': top}).toggle();
        favorite_card_display = $("#favorite_card").css('display');
        if (favorite_card_display == "block") {
            $("#favorite_input").focus();
            setTimeout(function () {
                $("#favorite_card").click(function (event) {
                    event.stopPropagation();
                });
                $("body").click(function () {
                    $("#favorite_card").hide();
                    $("body").unbind("click");
                });
            }, 100);
            let selected_favorite_label_id = $(".selected_favorite_label").length - 1;
            let favorite_label_count = $(".favorite_label_row").length;
            $("#favorite_card").keydown(function (event) {
                let keys = [38, 40];
                if ($.inArray(event.keyCode, keys)>-1) {
                    $(".selected_favorite_label").removeClass("selected_favorite_label");
                    switch (event.keyCode) {
                        case 38: // yukarı
                            selected_favorite_label_id--;
                            break;
                        case 40: // aşağı
                            selected_favorite_label_id++;
                            break;
                    }
                    if (selected_favorite_label_id > favorite_label_count - 1)
                        selected_favorite_label_id = favorite_label_count - 1;
                    else if (selected_favorite_label_id < 0)
                        selected_favorite_label_id = 0;
                    $(".favorite_label_row").eq(selected_favorite_label_id).addClass("selected_favorite_label");
                    $(".favorite_label_row").eq(selected_favorite_label_id).find("input").focus();
                    event.preventDefault();
                }
            });
        }
    });
    $("#favorite_input").keyup(function (event) {
        let text = $(this).val();
        $(".favorite_label_row").hide().each(function (i, val) {
            let favorite_label = $(val).data("favorite_label");
            if (favorite_label.includes(text))
                $(val).show();
        });
        let count = $(".favorite_label_row:visible").length;
        $("#favorite_label_create_message").hide().find("label").empty();
        if (count == 0) {
            $("#favorite_label_create_message").show().find("label").html("Create <b>" + text + "</b>");
        }
    });
});
