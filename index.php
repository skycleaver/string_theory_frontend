<?php

?>

<script src='js/jquery-3.2.0.js' type='text/javascript'></script>
<script type='text/javascript'>
    //window.location.replace("./chords");

    $.ajax({
        method: "GET",
        dataType: "jsonp",
        url: "http://localhost:8000/chord",
        data: { name: "John", location: "Boston" }
    }).done(function (msg) {
        console.log(msg);
    });


    // var HttpClient = function() {
    //     this.get = function(aUrl, aCallback) {
    //         var anHttpRequest = new XMLHttpRequest();
    //         anHttpRequest.onreadystatechange = function() { 
    //             if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
    //                 aCallback(anHttpRequest.responseText);
    //         }

    //         anHttpRequest.open( "GET", aUrl, true );            
    //         anHttpRequest.send( null );
    //     }
    // }

    // var client = new HttpClient();
    // client.get('http://localhost:8000/chord?with=arguments', function(response) {
    //     console.log(response);
    // });

</script>