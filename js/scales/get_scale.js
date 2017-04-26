function getScaleAndDraw(scale_root, scale_name, callback_draw_function) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        cache: true,
        url: "http://localhost:8000/scale",
        data: {
            scale_root: scale_root,
            scale_name: scale_name
        }
    }).done(function (response) {
        callback_draw_function(response.scale);
    });
}

function getScaleGuitarAndDraw(scale_root, scale_name, callback_draw_function, canvas_id) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        cache: true,
        url: "http://localhost:8000/scale_guitar",
        data: {
            scale_root: scale_root,
            scale_name: scale_name
        }
    }).done(function (response) {
        callback_draw_function(response.scale_guitar, canvas_id);
    });
}