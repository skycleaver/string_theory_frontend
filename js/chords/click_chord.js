function clickChord(chord_root, chord_type) {
	$('select[name=chord_root]').val(chord_root);
	$('select[name=chord_type]').val(chord_type);
	$('select[name=chord_seventh]').val('-');
	// triggering the change on any of them performs the call
	$('select[name=chord_type]').trigger("change");
}