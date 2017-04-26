function getNotesAndDraw(select_name) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        cache: true,
        url: "http://localhost:8000/notes"
    }).done(function (response) {
        for (var i = 0; i < response.notes.length; i++) {
            $('select[name='+select_name+']').append($('<option>', {
                value: response.notes[i]['value'],
                text: response.notes[i]['name']
            }));
        };
    });
}