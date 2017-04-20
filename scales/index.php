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

                    </select>
                </form>
            </div>
            <div id="scale_div" class="col-md-offset-2 col-md-8" style="font-size:4em;">

            </div>
    </body>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script src='../js/jquery-3.2.0.js' type='text/javascript'></script>

    <script src='../js/scales/get_scale.js' type='text/javascript'></script>
    <script src='../js/scales/draw_scale.js' type='text/javascript'></script>
    <script src='../js/scales/get_scale_names.js' type='text/javascript'></script>
    <script src='../js/chords/click_chord.js' type='text/javascript'></script>
    <script src='../js/chords_by_scale/get_chords_by_scale.js' type='text/javascript'></script>
    <script src='../js/chords_by_scale/draw_chords_by_scale.js' type='text/javascript'></script>
    <script type='text/javascript'>
        getScaleNamesAndDraw("scale_name");
        getScaleWithInput();

        function getScaleWithInput() {
            // can't do this with jQuery's change() function, it does not cover adding options to a select
            setTimeout(function() {
                var scale_root = $('select[name=scale_root]').val();
                var scale_name = $('select[name=scale_name]').val();
                if (!scale_root || !scale_name) {
                    getScaleWithInput()
                }
                getScaleAndDraw(
                    scale_root,
                    scale_name,
                    drawScale
                );
                getChordsByScaleAndDraw(
                    scale_root,
                    scale_name,
                    drawChordsByScale
                );
            }, 100);
        }
    </script>
    
</html>