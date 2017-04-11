function drawChordsByScale(chords) {
	var chords_parsed = JSON.parse(chords);
	
	for (var i = 0; i < chords_parsed.length; i++) {
		var chord_parsed = chords_parsed[i];
		var div = document.getElementById('scale_note_div_' + chord_parsed['chord_root']);
		var sub_div = getSubDiv(chord_parsed['chord_root'], chord_parsed['chord_type']);

		div.appendChild(sub_div);
	};
}

/* PRIVATE */
function getSubDiv(chord_root, chord_type) {
	var sub_div = document.createElement('div');
	sub_div.style.fontSize = '0.3em';
	sub_div.textContent = chord_root + ' ' + chord_type;
	return sub_div;
}