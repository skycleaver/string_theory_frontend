canvas_margin = 50;

my_canvas = document.getElementById('canvas');
context = my_canvas.getContext('2d');
context.beginPath();

drawFretboard();
drawString(0);
drawString(50);
drawString(100);
drawString(150);
drawString(200);
drawString(250);
drawChord();

function drawString(height) {
	context.moveTo(0 + canvas_margin, height + canvas_margin);
	context.lineTo(1000 + canvas_margin, height + canvas_margin);
	context.stroke();
}

function drawFretboard() {
	for (var i = 0; i < 12; i++) {
		drawFret(80 * i);
		if (i === 3) {
			drawMark(80 * i - 40);
		}
		if (i === 5) {
			drawMark(80 * i - 40);
		}
		if (i === 7) {
			drawMark(80 * i - 40);
		}
	}
}

function drawFret(width) {
	context.moveTo(width + canvas_margin, 0 + canvas_margin);
	context.lineTo(width + canvas_margin, 250 + canvas_margin);
	context.stroke();
}

function drawMark(width) {
	context.beginPath();
	context.arc(width + canvas_margin, 125 + canvas_margin, 10, 0, 2*Math.PI);
	context.stroke();
}

function drawChord() {
	for (var i = 0; i < 12; i++) {
		if (chord[5][i] !== '-') {
			drawNote(80 * (i) - 20, 0, chord[5][i]);
		}
		if (chord[4][i] !== '-') {
			drawNote(80 * (i) - 20, 50, chord[4][i]);
		}
		if (chord[3][i] !== '-') {
			drawNote(80 * (i) - 20, 100, chord[3][i]);
		}
		if (chord[2][i] !== '-') {
			drawNote(80 * (i) - 20, 150, chord[2][i]);
		}
		if (chord[1][i] !== '-') {
			drawNote(80 * (i) - 20, 200, chord[1][i]);
		}
		if (chord[0][i] !== '-') {
			drawNote(80 * (i) - 20, 250, chord[0][i]);
		}
	}
}

function drawNote(width, height, note) {
	width = width - 10 + canvas_margin;
	height = height + 5 + canvas_margin;
	// context.beginPath();
	// context.arc(width, height, 8, 0, 2*Math.PI);
	// context.stroke();
	// context
	context.font = 'bold 20px Verdana';
	context.fillStyle = 'red';
	context.fillText(note, width, height);
}