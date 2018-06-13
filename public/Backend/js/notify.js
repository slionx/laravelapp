function show_notify(notify_type_key,message,icon_key,url,title) {
    var type_key = notify_type_key;
    var icon_key = icon_key;
    var title = title ? title : "";
    var url = url ? url : "";
    var icon_arr = ["la la-warning","la la-check","la la-info"];
    var notify_type_arr = ["danger","success","warning","info","primary","brand"];
    var e = {
        title : title,
        message : message,
        icon : "icon " + icon_arr[icon_key],
        url : url,
        target:"_blank"
    };
    var t = $.notify(e, {
        type: notify_type_arr[type_key],
        allow_dismiss: true,
        newest_on_top: false,
        mouse_over: false,
        showProgressbar: false,
        spacing: 10,
        timer: 3000,
        placement: {
            from: "top",
            align: "center"
        },
        offset: {
            x: 30,
            y: 30,
        },
        delay: 1000,
        z_index: 10000,
        animate: {
            enter: "animated " + "bounce",
            exit: "animated " + "flash"
        }
    });
    /*        (setTimeout(function() {
                t.update("message", "<strong>Saving</strong> Page Data."), t.update("type", "primary"), t.update("progress", 20)
            }, 1e3), setTimeout(function() {
                t.update("message", "<strong>Saving</strong> User Data."), t.update("type", "warning"), t.update("progress", 40)
            }, 2e3), setTimeout(function() {
                t.update("message", "<strong>Saving</strong> Profile Data."), t.update("type", "danger"), t.update("progress", 65)
            }, 3e3), setTimeout(function() {
                t.update("message", "<strong>Checking</strong> for errors."), t.update("type", "success"), t.update("progress", 100)
            }, 4e3))*/
}

