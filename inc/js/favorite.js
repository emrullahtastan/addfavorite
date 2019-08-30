$(document).ready(function () {
    let favorite_card_display = "none";
    $("#add_favorite_button").click(function () {
        let top = $(this).position().top + 33;
        $("#favorite_card").css({'top': top}).toggle(1,function (x) {
            $("#favorite_input").val("");
            $("#favorite_label_create_message").hide().find("label").empty();
        });
        favorite_card_display = $("#favorite_card").css('display');
        if (favorite_card_display == "block") {
            get_labels_for_user();
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
        }
    });
    $("#favorite_card").keydown(function (event) {
        let selected_favorite_label_id = $(".selected_favorite_label").index();
        let favorite_label_count = $(".favorite_label_row:visible").length;
        let keys = [38, 40];
        if ($.inArray(event.keyCode, keys) > -1) {
            let create_label = $("#favorite_label_create_message").css('display') != "none" ? true : false;
            let create_label_is_selected=$("#favorite_label_create_message").hasClass("selected_favorite_label");
            $(".selected_favorite_label").removeClass("selected_favorite_label");
            switch (event.keyCode) {
                case 38: // yukarı
                    selected_favorite_label_id--;
                    break;
                case 40: // aşağı
                    selected_favorite_label_id++;
                    break;
            }
            if (selected_favorite_label_id > favorite_label_count - 1) {
                if (!create_label)
                    selected_favorite_label_id = favorite_label_count - 1;
                else if (create_label_is_selected && event.keyCode==38) {
                    selected_favorite_label_id=$(".favorite_label_row:visible:last").index();
                }
            } else if (selected_favorite_label_id <= 0)
                selected_favorite_label_id = 0;

            if (selected_favorite_label_id < favorite_label_count) {
                $(".favorite_label_row:visible").eq(selected_favorite_label_id).addClass("selected_favorite_label");
                $(".favorite_label_row:visible").eq(selected_favorite_label_id).find("input").focus();
            } else {
                $("#favorite_label_create_message").addClass("selected_favorite_label");
            }
            event.preventDefault();
        }
    });

    $("#favorite_input").keyup(function (event) {
        let text = $(this).val();
        if (text.length > 0) {
            let equal_label = false;
            $(".favorite_label_row").hide().each(function (i, val) {
                let favorite_label = $(val).data("favorite_label");
                if (favorite_label.includes(text))
                    $(val).show();

                if (favorite_label === text)
                    equal_label = true;
            });

            let count = $(".favorite_label_row:visible").length;
            if (!equal_label) {
                setTimeout(function () {
                    $("#favorite_label_create_message").show().find("label").html("Create <b>" + $("#favorite_input").val() + "</b>");
                }, 100)
            } else {
                $("#favorite_label_create_message").hide().find("label").empty();
            }

            //====================================
            // favori etiketi girişi yapılırken bir tuş seçimi yapılırsa
            //====================================
            switch (event.keyCode) {
                case 38://yukarı
                case 40://aşağı
                    //Bir etiket oluşturulmak için Create düğmesi yön tuşlarıyla seçilirse
                    if (count === 0)
                        $("#favorite_label_create_message").addClass("selected_favorite_label");
                    break;
                case 13://enter
                    //Yön tuşlarıyla bir element veya create element seçilip, enter düğmesine basıldığında o kullanıcı için işlem yapılır.
                    let element = $("#favorite_card_body").find(".selected_favorite_label");
                    let selected_item = $(element).css("visibility");
                    if (!$.isEmptyObject(selected_item) || selected_item == "visible") {
                        let element_type = $(element).data("process_type");
                        console.log(element_type);
                        switch (element_type) {
                            case "create":
                                //İlk defa bir etiket oluşturulmak istendiğinde
                                create_label_for_user(text);
                                break;
                            case "select":
                                //Daha önce eklenmiş bir etiket seçilmek istendiğinde
                                let label_id = parseInt($(element).data("label_id"));
                                select_label_for_user(label_id);
                                break;
                        }
                    } else {
                        //text kutusundayken enter düğmesine basılırsa
                        let label_selected = false;
                        if (equal_label) {
                            //eğer label liste bulunan bir label'a ait bir name girildiyse
                            let equal_element = $(".favorite_label_row[data-favorite_label='" + text + "']");
                            label_selected = !$(equal_element).find(".label_checkbox").prop("checked");
                            let label_id = parseInt($(equal_element).data("label_id"));
                            select_label_for_user(label_id, label_selected);
                        } else {
                            //eğer label liste bulunmayan bir label name yazılıp, enter tuşuna basılırsa
                            create_label_for_user(text);
                        }
                    }
                    break;
            }
            //====================================
        } else {
            $(".selected_favorite_label").removeClass("selected_favorite_label");
            $("#favorite_label_create_message").hide().find("label").empty();
            $(".favorite_label_row").show();
        }
    });


});


