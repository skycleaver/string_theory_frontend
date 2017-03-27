<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/chords/get_chord.php';
    require $_SERVER['DOCUMENT_ROOT'].'/chords/get_scales.php';

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

    if (!isset($_POST['rootNote'])) {
        $_POST['rootNote'] = 'c';
    }
    if (!isset($_POST['scaleName'])) {
        $_POST['scaleName'] = GetScales::MAJOR;
    }

    $getChord = new GetChord($notes);

    $getScales = new GetScales($notes, $getChord);
    $getScales->getScale($_POST['rootNote'], $_POST['scaleName']);
?>

<html>

    <head>
    </head>

    <body>
        <div class="scale col-md-offset-2 col-md-8">
            <?php
                echo $_POST['scale']['name'] . '</br>';
                foreach ($_POST['scale']['chords'] as $chord_name => $chord) {
                    echo $chord_name . ' => ' . $chord . '</br>';
                }
            ?>
        </div>
    </body>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
</html>