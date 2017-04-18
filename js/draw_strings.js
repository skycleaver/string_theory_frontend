function drawChordGuitar(chord_guitar) {
    initializeDrawingVariables();
    applyRatioToDrawingVariables();

    my_canvas = document.getElementById('canvas');
    context = my_canvas.getContext('2d');
    context.clearRect(0, 0, my_canvas.width, my_canvas.height);
    context.beginPath();

    drawFretboard();
    drawStrings();
    drawChord(chord_guitar);
}

function initializeDrawingVariables() {
    number_of_strings = 6;
    number_of_frets = 12;
    canvas_margin = 50;
    string_separation = 50;
    fret_length = 80;
    fretboard_length = number_of_frets * fret_length;
    fretboard_width = string_separation * (number_of_strings - 1);
    mark_radius = 10;
    note_margin_from_fret = 30;
    note_margin_from_string = 5;
}

function applyRatioToDrawingVariables() {
    var screen_width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var ratio = screen_width / 1800;

    canvas_margin = canvas_margin * ratio;
    string_separation = string_separation * ratio;
    fretboard_length = fretboard_length * ratio;
    fret_length = fret_length * ratio;
    fretboard_width = fretboard_width * ratio;
    mark_radius = mark_radius * ratio;
    note_margin_from_fret = note_margin_from_fret * ratio;
    note_margin_from_string = note_margin_from_string * ratio;
}

function drawFretboard() {
    for (var i = 0; i <= number_of_frets; i++) {
        drawFret(fret_length * i);
        if (i === 3 || i === 5 || i === 7 || i === 9) {
            drawMark(fret_length * i - fret_length/2);
        }
        if (i === 12) {
            drawDoubleMark(fret_length * i - fret_length/2);
        }
    }
}

function drawStrings() {
    for (var i = 0; i < number_of_strings; i++) {
        drawString(string_separation * i);
    }
}

function drawString(height) {
    context.moveTo(0 + canvas_margin, height + canvas_margin);
    context.lineTo(fretboard_length + canvas_margin, height + canvas_margin);
    context.stroke();
}

function drawFret(width) {
    context.moveTo(width + canvas_margin, 0 + canvas_margin);
    context.lineTo(width + canvas_margin, fretboard_width + canvas_margin);
    context.stroke();
}

function drawMark(width) {
    context.beginPath();
    context.arc(width + canvas_margin, fretboard_width/2 + canvas_margin, mark_radius, 0, 2*Math.PI);
    context.stroke();
}

function drawDoubleMark(width) {
    context.beginPath();
    context.arc(width + canvas_margin, fretboard_width/2 - string_separation + canvas_margin, mark_radius, 0, 2*Math.PI);
    context.stroke();
    context.beginPath();
    context.arc(width + canvas_margin, fretboard_width/2 + string_separation + canvas_margin, mark_radius, 0, 2*Math.PI);
    context.stroke();
}

function drawChord(chord) {
    for (var i = 0; i < 12; i++) {
        if (isFretValid(chord[5][i])) {
            drawNote(fret_length * i, string_separation * 0, chord[5][i]);
        }
        if (isFretValid(chord[4][i])) {
            drawNote(fret_length * i, string_separation * 1, chord[4][i]);
        }
        if (isFretValid(chord[3][i])) {
            drawNote(fret_length * i, string_separation * 2, chord[3][i]);
        }
        if (isFretValid(chord[2][i])) {
            drawNote(fret_length * i, string_separation * 3, chord[2][i]);
        }
        if (isFretValid(chord[1][i])) {
            drawNote(fret_length * i, string_separation * 4, chord[1][i]);
        }
        if (isFretValid(chord[0][i])) {
            drawNote(fret_length * i, string_separation * 5, chord[0][i]);
        }
    }
}

function drawNote(width, height, note) {
    width = width - note_margin_from_fret + canvas_margin;
    height = height + note_margin_from_string + canvas_margin;

    context.font = 'bold 20px Verdana';
    context.fillStyle = 'red';
    context.fillText(note, width, height);
}

function isFretValid(fret) {
    return fret !== '-' && fret !== 'X'
}