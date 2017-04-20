function drawScale(scale) {
	var scale_div = $('#scale_div');
	var scale_array = scale.split(" ");

	scale_div.empty();
	for (var i = 0; i < scale_array.length; i++) {

		scale_div.append($('<div>', {
			id: 'scale_note_div_'+scale_array[i],
            class: 'col-sm-1',
            text: scale_array[i]
        }));
	};	
}