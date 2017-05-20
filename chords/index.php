<html>

    <head>
    </head>

    <body onresize='setCanvasSize("chord_guitar_canvas")'>
        <div class='col-md-4 col-md-offset-4'>
            <form action="" method="POST">
                <select name="chord_root" onchange="getChordAndFingering()">

                </select>
                <select name="chord_type" onchange="getChordAndFingering()">

                </select>
                <select name="chord_seventh" onchange="getChordAndFingering()">
                    <option value="">-</option>
                    <option value="maj7">Major 7th</option>
                    <option value="min7">Minor 7th</option>
                </select>
            </form>
        </div>
        <div class="chord_guitar col-md-8 col-md-offset-2">
            <canvas id="chord_guitar_canvas" width="1200" height="400">
                This text is displayed if your browser does not support HTML5 Canvas.
            </canvas>
        </div>
        </div>
    </body>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery --> 
    <script src='../js/jquery-3.2.0.js' type='text/javascript'></script>
    <!-- Own libraries -->
    <script src='../js/chords/get_chord.js' type='text/javascript'></script>
    <script src='../js/chords/get_chord_types.js' type='text/javascript'></script>
    <script src='../js/chords/draw_chord.js' type='text/javascript'></script>

    <script src='../js/fingerings/get_fingerings.js' type='text/javascript'></script>
    <script src='../js/fingerings/draw_fingerings.js' type='text/javascript'></script>

    <script src='../js/draw_strings.js' type='text/javascript'></script>
    <script src='../js/notes/get_notes.js' type='text/javascript'></script>
    
    <script type='text/javascript'>
        getNotesAndDraw("chord_root");
        getChordTypesAndDraw("chord_type");
        getChordAndFingering();
        setCanvasSize("chord_guitar_canvas");

        function getChordAndFingering() {
            getChordWithInput();
            getFingeringWithInput();
        }

        function getChordWithInput() {
            // can't do this with jQuery's change() function, it does not cover adding options to a select
            setTimeout(function() {
                getChordGuitarAndDraw(
                    $('select[name=chord_root]').val(),
                    $('select[name=chord_type]').val(),
                    $('select[name=chord_seventh]').val(),
                    drawChordGuitar,
                    "chord_guitar_canvas"
                );
            }, 100);
        }

        function getFingeringWithInput() {
            // can't do this with jQuery's change() function, it does not cover adding options to a select
            setTimeout(function() {
                getChordFingeringGuitarAndDraw(
                    $('select[name=chord_root]').val(),
                    $('select[name=chord_type]').val(),
                    $('select[name=chord_seventh]').val(),
                    drawFingeringGuitar,
                    "chord_guitar_canvas"
                );
            }, 100);
        }

        function setCanvasSize(canvas_id) {
            $('#'+canvas_id).width($('#'+canvas_id).parent().width());
            $('#'+canvas_id).height($('#'+canvas_id).width() / 2.75);
        }

    </script>

</html>