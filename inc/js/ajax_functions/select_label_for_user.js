function select_label_for_user(label_id, value) {
    if (typeof value == "undefined")
        return false;
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "select_label_for_user", label_id: label_id, value: value},
        success: function (response) {
            console.log(response);
            //todo: AF-6  root
            // Text kutusundayken seçim yapılınca işlemin yapılması.
            // Daha önce var olan bir etiket arama kutusunda bulursa ve seçili değilse veya seçiliyse; veritabanından işlemi başarılı olursa ona göre işlem yapılır.
        }
    });
}