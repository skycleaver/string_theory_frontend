<html>

    <head>
    </head>

    <body>
        <div class='col-md-4 col-md-offset-4'>
            <form action="" method="POST">
                <select name="chord_root" onchange="getChordWithInput()">

                </select>
                <select name="chord_type" onchange="getChordWithInput()">

                </select>
                <select name="chord_seventh" onchange="getChordWithInput()">
                    <option value="">-</option>
                    <option value="maj7">Major 7th</option>
                    <option value="min7">Minor 7th</option>
                </select>
            </form>
        </div>
        <div class="chord_guitar col-md-6 col-md-offset-2">
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
    <script src='../js/draw_strings.js' type='text/javascript'></script>
    <script src='../js/notes/get_notes.js' type='text/javascript'></script>
    
    <script type='text/javascript'>
        getNotesAndDraw("chord_root");
        getChordTypesAndDraw("chord_type");
        getChordWithInput();

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

    </script>

</html>