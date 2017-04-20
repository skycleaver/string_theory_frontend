function getChordTypesAndDraw(element) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        url: "http://localhost:8000/chord_types"
    }).done(function (response) {
        for (var i = 0; i < response.chord_types.length; i++) {
            var opt = document.createElement('option');
            opt.value = response.chord_types[i]['value'];
            opt.innerHTML = response.chord_types[i]['name'];
            element.appendChild(opt); 
        };
    });
}