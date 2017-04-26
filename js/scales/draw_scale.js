function drawScale(scale) {
	var scale_div = $('#scale_div');
	var scale_array = scale.split(" ");

	scale_div.empty();
	for (var i = 0; i < scale_array.length; i++) {
		var width = 1;
		if (i < 5) {
			var width = 2;
		}
		scale_div.append($('<div>', {
			id: 'scale_note_div_' + scale_array[i],
            class: 'col-sm-' + width,
            text: scale_array[i]
        }));
	};	
}

function drawScaleGuitar(scale_guitar, canvas_id) {
	draw(scale_guitar, canvas_id);
}