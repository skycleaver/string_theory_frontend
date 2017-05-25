function getChordFingeringGuitarAndDraw(chord_root, chord_type, chord_seventh, callback_draw_function, div_id, canvas_id) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        cache: true,
        url: "http://localhost:8000/fingerings",
        data: {
            chord_root: chord_root,
            chord_type: chord_type,
            chord_seventh: chord_seventh 
        }
    }).done(function (response) {
        callback_draw_function(div_id, canvas_id, response.fingerings);
    });
}