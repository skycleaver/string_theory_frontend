function getChordTypesAndDraw(select_name) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        cache: true,
        url: "http://localhost:8000/chord_types"
    }).done(function (response) {
        for (var i = 0; i < response.chord_types.length; i++) {
            $('select[name='+select_name+']').append($('<option>', {
                value: response.chord_types[i]['value'],
                text: response.chord_types[i]['name']
            }));
        };
    });
}