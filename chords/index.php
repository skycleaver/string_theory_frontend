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
                    <option value="major">Major</option>
                    <option value="minor">Minor</option>
                </select>
                <select name="chord_seventh" onchange="getChordWithInput()">
                    <option value="">-</option>
                    <option value="maj7">Major 7th</option>
                    <option value="min7">Minor 7th</option>
                </select>
            </form>
            <div class="chord">
                <?= $_POST["chord"]; ?>
            </div>
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
    
    <script src='../js/jquery-3.2.0.js' type='text/javascript'></script>
    <script src='../js/get_chord.js' type='text/javascript'></script>
    <script src='../js/draw_strings.js' type='text/javascript'></script>
    
    <script type='text/javascript'>
        resize();
        getChordWithInput();

        function getChordWithInput() {
            getChordGuitarAndDraw(
                document.getElementsByName("chord_root")[0].value,
                document.getElementsByName("chord_type")[0].value,
                document.getElementsByName("chord_seventh")[0].value,
                drawChordGuitar
            );
        }

        function resize() {
            getChordWithInput()
        }
    </script>
    <script src='../js/click_scales.js' type='text/javascript'></script>

</html>