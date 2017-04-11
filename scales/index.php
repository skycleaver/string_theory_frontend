<html>

    <head>
    </head>

    <body>
        <div class='col-md-12'>
            <div class='col-md-offset-4 col-md-4'>
                <form action="" method="POST">
                    <select name="scale_root" onchange="getScaleWithInput()">
                        <option value="c"?>C</option>
                        <option value="c#"?>C#</option>
                        <option value="d"?>D</option>
                        <option value="d#"?>D#</option>
                        <option value="e"?>E</option>
                        <option value="f"?>F</option>
                        <option value="f#"?>F#</option>
                        <option value="g"?>G</option>
                        <option value="g#"?>G#</option>
                        <option value="a"?>A</option>
                        <option value="a#"?>A#</option>
                        <option value="b"?>B</option>
                    </select>
                    <select name="scale_name" onchange="getScaleWithInput()">
                        <option value="major">Major</option>
                        <option value="minor">Minor</option>
                    </select>
                </form>
            </div>
            <div id="scale_div" class="col-md-offset-2 col-md-8" style="font-size:4em;">

            </div>
    </body>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <script src='../js/jquery-3.2.0.js' type='text/javascript'></script>
    <script src='../js/get_scale.js' type='text/javascript'></script>
    <script src='../js/draw_scale.js' type='text/javascript'></script>
    <script src='../js/get_chords_by_scale.js' type='text/javascript'></script>
    <script src='../js/draw_chords_by_scale.js' type='text/javascript'></script>
    <script src='../js/click_chord.js' type='text/javascript'></script>
    <script type='text/javascript'>
        //resize();
        getScaleWithInput();

        function getScaleWithInput() {
            getScaleAndDraw(
                document.getElementsByName("scale_root")[0].value,
                document.getElementsByName("scale_name")[0].value,
                drawScale
            );
            getChordsByScaleAndDraw(
                document.getElementsByName("scale_root")[0].value,
                document.getElementsByName("scale_name")[0].value,
                drawChordsByScale
            );
        }

        // function resize() {
        //     var chord_guitar = getChordGuitar(
        //         document.getElementsByName("chord_root")[0].value,
        //         document.getElementsByName("chord_type")[0].value,
        //         document.getElementsByName("chord_seventh")[0].value,
        //         draw
        //     );
        // }
    </script>
    
</html>