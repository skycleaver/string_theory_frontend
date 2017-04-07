<html>

    <head>
    </head>

    <body>
        <div class='col-md-12'>
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
            <div id="scale_canvas" class="col-md-offset-2 col-md-8" style="font-size:4em;">
                <?php
                    // echo $_POST['scale']['name'] . '</br>';
                    // foreach ($_POST['scale']['chords'] as $chord_name => $chord) {
                    //     echo '<div class="clickable_chord" onclick="get_chord(\'' . $chord_name . '\')">' . $chord_name . ' => ' . $chord . '</div>';
                    // }
                ?>
            </div>
<!--             <form id="get_chord" action="../chords/index.php" method="post">
                <input id="chord_root" name="chord_root" type="hidden"></input>
                <input id="chord_type" name="chord_type" type="hidden"></input>
                <input id="chord_seventh" name="chord_seventh" type="hidden"></input>
            </form> -->
        </div>
    </body>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    
    <script src='../js/jquery-3.2.0.js' type='text/javascript'></script>
    <script src='../js/get_scale.js' type='text/javascript'></script>
    <script src='../js/draw_scale.js' type='text/javascript'></script>
    <script type='text/javascript'>
        //resize();
        getScaleWithInput();

        function getScaleWithInput() {
            getScaleAndDraw(
                document.getElementsByName("scale_root")[0].value,
                document.getElementsByName("scale_name")[0].value,
                drawScale
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
    <script src='../js/click_scales.js' type='text/javascript'></script>

    
</html>