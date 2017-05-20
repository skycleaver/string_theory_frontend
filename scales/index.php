<html>

    <head>
    </head>

    <body onresize='setCanvasSize("canvas_scale_guitar")'>
        <div class='col-md-12'>
            <div class='col-md-offset-4 col-md-4'>
                <form action="" method="POST">
                    <select name="scale_root" onchange="getScaleWithInput()">

                    </select>
                    <select name="scale_name" onchange="getScaleWithInput()">

                    </select>
                </form>
            </div>
            <div id="scale_div" class="col-md-offset-1 col-md-4" style="font-size:4em;">

            </div>
            <div class="scale_guitar col-md-offset-1 col-md-6">
                <canvas id="canvas_scale_guitar" width="800" height="400">
                    This text is displayed if your browser does not support HTML5 Canvas.
                </canvas>
            </div>
    </body>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script src='../js/jquery-3.2.0.js' type='text/javascript'></script>
    <!-- Own libraries -->
    <script src='../js/scales/get_scale.js' type='text/javascript'></script>
    <script src='../js/scales/draw_scale.js' type='text/javascript'></script>
    <script src='../js/scales/get_scale_names.js' type='text/javascript'></script>
    <script src='../js/chords/click_chord.js' type='text/javascript'></script>
    <script src='../js/chords_by_scale/get_chords_by_scale.js' type='text/javascript'></script>
    <script src='../js/chords_by_scale/draw_chords_by_scale.js' type='text/javascript'></script>
    <script src='../js/notes/get_notes.js' type='text/javascript'></script>
    <script src='../js/draw_strings.js' type='text/javascript'></script>
    
    <script type='text/javascript'>
        getNotesAndDraw("scale_root");
        getScaleNamesAndDraw("scale_name");
        getScaleWithInput();
        setCanvasSize("canvas_scale_guitar");

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
                getScaleGuitarAndDraw(
                    scale_root,
                    scale_name,
                    drawScaleGuitar,
                    "canvas_scale_guitar"
                );
            }, 100);
        }

        function setCanvasSize(canvas_id) {
            $('#'+canvas_id).width($('#'+canvas_id).parent().width());
            $('#'+canvas_id).height($('#'+canvas_id).width() / 2.2);
        }
    </script>
    
</html>