function draw(canvas_id, notes, fingering) {
    
    notes = initializeVariableWithBackup(notes, "notes");

    my_canvas = document.getElementById(canvas_id);

    initializeDrawingVariables();

    context = my_canvas.getContext('2d');
    context.clearRect(0, 0, my_canvas.width, my_canvas.height);
    context.beginPath();

    drawFretboard();
    drawStrings();
    drawNotes(notes);
    drawFingering(fingering);
}

/** PRIVATE **/
function initializeVariableWithBackup(variable, backup_key) {
    if (typeof backup === 'undefined') {
        backup = [];
    }
    if (variable !== undefined) {
        backup[backup_key] = variable;
    } else {
        if (typeof backup[backup_key] === 'undefined') {
            return undefined;
        } else {
            return backup[backup_key];
        }
    }
    return variable;
}

function initializeDrawingVariables() {
    number_of_strings = 6;
    number_of_frets = 12;
    canvas_margin = 50;
    string_separation = 50;
    fret_length = (my_canvas.width - canvas_margin * 2) / number_of_frets;
    fretboard_length = number_of_frets * fret_length;
    fretboard_width = string_separation * (number_of_strings - 1);
    mark_radius = 10;
    note_margin_from_fret = 30;
    note_margin_from_string = 5;
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

function drawNotes(strings) {
    for (var i = 0; i < number_of_frets; i++) {
        for (var j = 0; j < number_of_strings; j++) {
            if (isFretValid(strings[j][i])) {
                drawNote(fret_length * i, string_separation * Math.abs(j - 5), strings[j][i]);
            }
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
    return fret !== '-' && fret !== 'X';
}

function drawFingering(fingering) {
    if (fingering !== undefined) {
        for (var i = 0; i < 6; i++) {
            if (fingering[i] !== null) {
                width = fret_length * fingering[i];
                context.beginPath();
                context.arc(width + canvas_margin - note_margin_from_fret * 0.75, fretboard_width/5 * Math.abs(i - 5) + canvas_margin, mark_radius * 1.5, 0, 2*Math.PI);
                context.strokeStyle = '#ff0000';
                context.lineWidth = 2;
                context.stroke();

                context.strokeStyle = '#000000';
                context.lineWidth = 1;
            }
        };
    }
}