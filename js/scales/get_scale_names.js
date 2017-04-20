function getScaleNamesAndDraw(element) {    
    $.ajax({
        method: "GET",
        dataType: "jsonp",
        url: "http://localhost:8000/scale_names"
    }).done(function (response) {
        for (var i = 0; i < response.scale_names.length; i++) {
            var opt = document.createElement('option');
            opt.value = response.scale_names[i]['value'];
            opt.innerHTML = response.scale_names[i]['name'];
            element.appendChild(opt); 
        };
    });
}