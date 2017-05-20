function drawFingeringGuitar(canvas_id, fingering) {

	my_canvas = document.getElementById(canvas_id);
	context = my_canvas.getContext('2d');

    fingering = fingering[0];

    for (var i = 0; i < 6; i++) {
        console.log(fingering[i]);
        if (fingering[i] !== null) {
            width = fret_length * fingering[i];
            context.beginPath();
            context.arc(width + canvas_margin, fretboard_width/5 * Math.abs(i - 5) + canvas_margin, mark_radius, 0, 2*Math.PI);
            context.strokeStyle = '#ff0000';
            context.stroke();
            context.strokeStyle = '#000000';
        }
    };
}