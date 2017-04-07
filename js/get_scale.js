function getScaleAndDraw(scale_root, scale_name, callback_draw_function) {    
    console.log(scale_root, scale_name);
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        url: "http://localhost:8000/scale",
        data: {
            scale_root: scale_root,
            scale_name: scale_name
        }
    }).done(function (response) {
        callback_draw_function(response.scale);
    });
}