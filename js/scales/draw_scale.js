function drawScale(scale) {
	var scale_div = document.getElementById('scale_div');
	clearDiv(scale_div);
	var scale_array = scale.split(" ");

	for (var i = 0; i < scale_array.length; i++) {
		var div = document.createElement('div');
		div.id = 'scale_note_div_'+scale_array[i];
		div.className = 'col-sm-1';
		div.textContent = scale_array[i];

		scale_div.appendChild(div);
	};	
}

/* PRIVATE */
function clearDiv(scale_div) {
	while (scale_div.firstChild) {
	    scale_div.removeChild(scale_div.firstChild);
	}
}