function drawChordsByScale(chords) {
	for (var i = 0; i < chords.length; i++) {
		var chord = chords[i];
		var div = document.getElementById('scale_note_div_' + chord['chord_root']);
		var sub_div = getSubDiv(chord['chord_root'], chord['chord_type']);

		div.appendChild(sub_div);
	};
}

/* PRIVATE */
function getSubDiv(chord_root, chord_type) {
	var sub_div = document.createElement('div');
	sub_div.style.fontSize = '0.3em';
	sub_div.textContent = chord_root + ' ' + chord_type;
	sub_div.onclick = function() { clickChord(chord_root, chord_type) };
	
	return sub_div;
}