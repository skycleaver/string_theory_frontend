function getChord(chord_root, chord_type, chord_seventh) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        cache: true,
        url: "http://localhost:8000/chord",
        data: {
            chord_root: chord_root,
            chord_type: chord_type,
            chord_seventh: chord_seventh 
        }
    }).done(function (response) {
    });
}

function getChordGuitarAndDraw(chord_root, chord_type, chord_seventh, callback_draw_function, canvas_id) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        cache: true,
        url: "http://localhost:8000/chord_guitar",
        data: {
            chord_root: chord_root,
            chord_type: chord_type,
            chord_seventh: chord_seventh 
        }
    }).done(function (response) {
        callback_draw_function(response.chord_guitar, canvas_id);
    });
}