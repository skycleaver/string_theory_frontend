function drawChordsByScale(chords) {
	for (var i = 0; i < chords.length; i++) {
		var chord_root = chords[i]['chord_root'];
		var chord_type = chords[i]['chord_type'];
		//jQuery doesn't like id selectors with # in it, like d# :(
		var div = $('#scale_note_div_' + chord_root.replace(/#/g, "\\#"));

		div.append($('<div>', {
			css: {'font-size': '0.3em'},
            text: chord_root + ' ' + chord_type,
            // for some reason, if I do:
            // click: function() { clickChord(chord_root, chord_type) }
            // the values it passes to the function are always the same
            onclick: "clickChord('"+chord_root+"', '"+chord_type+"')"
        }));
	};
}