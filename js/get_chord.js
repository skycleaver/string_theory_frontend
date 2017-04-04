function getChord(chord_root, chord_type, chord_seventh) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        url: "http://localhost:8000/chord",
        data: {
            chord_root: chord_root,
            chord_type: chord_type,
            chord_seventh: chord_seventh 
        }
    }).done(function (response) {
        console.log(response);
    });
}

function getChordGuitarAndDraw(chord_root, chord_type, chord_seventh, callback_draw_function) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        url: "http://localhost:8000/chord_guitar",
        data: {
            chord_root: chord_root,
            chord_type: chord_type,
            chord_seventh: chord_seventh 
        }
    }).done(function (response) {
        console.log(response.chord_guitar);
        callback_draw_function(response.chord_guitar);
    });
}