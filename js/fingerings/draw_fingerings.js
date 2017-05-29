function drawFingeringsGuitar(div_id, canvas_id, fingerings) {
    var div = $('#' + div_id);
    div.empty();

    for (var i = 0; i < fingerings.length; i++) {
        div.append($('<div>', {
            id: 'fingering_' + i,
            css: {'cursor': 'pointer'},
            text: 'Fingering ' + i,
            fingering: JSON.stringify(fingerings[i])
        }));
        $('#fingering_' + i).click(function () {
            draw(canvas_id, undefined, JSON.parse(this.getAttribute('fingering')));
        });
    };
}