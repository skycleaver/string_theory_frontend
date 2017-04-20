function getScaleNamesAndDraw(select_name) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        url: "http://localhost:8000/scale_names"
    }).done(function (response) {
        for (var i = 0; i < response.scale_names.length; i++) {
            $('select[name='+select_name+']').append($('<option>', {
                value: response.scale_names[i]['value'],
                text: response.scale_names[i]['name']
            })); 
        };
    });
}