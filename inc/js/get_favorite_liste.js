function get_ajax() {
    jQuery.ajax({
        type: "post",
        dataType: "json",
        url: "/wp-admin/admin-ajax.php",
        data: {action: "add_favorite_action_ajax"},
        success: function (response) {
            console.log(response);
        }
    });
}
setTimeout(function () {
    get_ajax();
},1024);