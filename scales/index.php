<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/string_theory/get_chord.php';
    require $_SERVER['DOCUMENT_ROOT'].'/string_theory/get_scales.php';

    $notes = [
        'c',
        'c#',
        'd',
        'd#',
        'e',
        'f',
        'f#',
        'g',
        'g#',
        'a',
        'a#',
        'b'
    ];

    if (!isset($_POST['scale_root'])) {
        $_POST['scale_root'] = 'c';
    }
    if (!isset($_POST['scale_name'])) {
        $_POST['scale_name'] = GetScales::MAJOR;
    }

    $getChord = new GetChord($notes);

    $getScales = new GetScales($notes, $getChord);
    $getScales->getScale($_POST['scale_root'], $_POST['scale_name']);
?>

<html>

    <head>
    </head>

    <body>
        <form action="" method="POST">
            <select name="scale_root">
                <option value="c" <?= $_POST["scale_root"] === 'c' ? 'selected' : '' ?> >C</option>
                <option value="c#" <?= $_POST["scale_root"] === 'c#' ? 'selected' : '' ?> >C#</option>
                <option value="d" <?= $_POST["scale_root"] === 'd' ? 'selected' : '' ?> >D</option>
                <option value="d#" <?= $_POST["scale_root"] === 'd#' ? 'selected' : '' ?> >D#</option>
                <option value="e" <?= $_POST["scale_root"] === 'e' ? 'selected' : '' ?> >E</option>
                <option value="f" <?= $_POST["scale_root"] === 'f' ? 'selected' : '' ?> >F</option>
                <option value="f#" <?= $_POST["scale_root"] === 'f#' ? 'selected' : '' ?> >F#</option>
                <option value="g" <?= $_POST["scale_root"] === 'g' ? 'selected' : '' ?> >G</option>
                <option value="g#" <?= $_POST["scale_root"] === 'g#' ? 'selected' : '' ?> >G#</option>
                <option value="a" <?= $_POST["scale_root"] === 'a' ? 'selected' : '' ?> >A</option>
                <option value="a#" <?= $_POST["scale_root"] === 'a#' ? 'selected' : '' ?> >A#</option>
                <option value="b" <?= $_POST["scale_root"] === 'b' ? 'selected' : '' ?> >B</option>
            </select>
            <select name="scale_name">
                <option value="<?= GetScales::MAJOR ?>" <?= $_POST["scale_name"] === GetScales::MAJOR ? 'selected' : '' ?> >Major</option>
                <option value="<?= GetScales::MINOR ?>" <?= $_POST["scale_name"] === GetScales::MINOR ? 'selected' : '' ?> >Minor</option>
            </select>
            <input type="submit" value="Get">
        </form>
        <div class="scale col-md-offset-2 col-md-8">
            <?php
                echo $_POST['scale']['name'] . '</br>';
                foreach ($_POST['scale']['chords'] as $chord_name => $chord) {
                    echo '<div class="clickable_chord" onclick="get_chord(\'' . $chord_name . '\')">' . $chord_name . ' => ' . $chord . '</div>';
                }
            ?>
        </div>
        <form id="get_chord" action="../" method="post">
            <input id="chord_root" name="chord_root" type="hidden"></input>
            <input id="chord_type" name="chord_type" type="hidden"></input>
            <input id="chord_seventh" name="chord_seventh" type="hidden"></input>
        </form>
    </body>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src='../js/click_chords.js' type='text/javascript'></script>
    
</html>