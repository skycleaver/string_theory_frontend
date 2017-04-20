<html>

    <head>
    </head>

    <body onresize="resize()">
        <div class='col-md-4 col-md-offset-4'>
            <form action="" method="POST">
                <select name="chord_root" onchange="getChordWithInput()">
                    <option value="c">C</option>
                    <option value="c#">C#</option>
                    <option value="d">D</option>
                    <option value="d#">D#</option>
                    <option value="e">E</option>
                    <option value="f">F</option>
                    <option value="f#">F#</option>
                    <option value="g">G</option>
                    <option value="g#">G#</option>
                    <option value="a">A</option>
                    <option value="a#">A#</option>
                    <option value="b">B</option>
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
            <canvas id="canvas" width="1200" height="400">
                This text is displayed if your browser does not support HTML5 Canvas.
            </canvas>
        </div>
        </div>
    </body>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery --> 
    <script src='../js/jquery-3.2.0.js' type='text/javascript'></script>
    
    <script src='../js/chords/get_chord.js' type='text/javascript'></script>
    <script src='../js/chords/get_chord_types.js' type='text/javascript'></script>
    <script src='../js/draw_strings.js' type='text/javascript'></script>
    
    <script type='text/javascript'>
        getChordTypesAndDraw("chord_type");
        getChordWithInput();

        function getChordWithInput() {
            // can't do this with jQuery's change() function, it does not cover adding options to a select
            setTimeout(function() {
                getChordGuitarAndDraw(
                    $('select[name=chord_root]').val(),
                    $('select[name=chord_type]').val(),
                    $('select[name=chord_seventh]').val(),
                    drawChordGuitar
                );
            }, 100);
        }

        function resize() {
            getChordWithInput()
        }
    </script>

</html>