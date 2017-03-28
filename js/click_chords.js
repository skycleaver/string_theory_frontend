function get_chord(chord) {
	var chord_split = chord.split(" ");
	document.getElementById('chord_root').value = chord_split[0];
	document.getElementById('chord_type').value = chord_split[1];
	document.getElementById('chord_seventh').value = '';
    document.getElementById('get_chord').submit();
}