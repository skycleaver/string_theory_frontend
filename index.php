<?php
require('get_chord.php');
$getChord = new GetChord();
$getChord->getChord();
?>

<html>

	<head>
    </head>

	<body>
		<div class='col-md-4 col-md-offset-4'>
			<form action="" method="POST">
				<select name="chord_root">
					<option value="c" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'c' ? 'selected' : '' ?> >C</option>
					<option value="c#" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'c' ? 'selected' : '' ?> >C</option>
					<option value="d" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'd' ? 'selected' : '' ?> >D</option>
					<option value="d#" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'd#' ? 'selected' : '' ?> >D#</option>
					<option value="e" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'e' ? 'selected' : '' ?> >E</option>
					<option value="f" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'f' ? 'selected' : '' ?> >F</option>
					<option value="f#" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'f#' ? 'selected' : '' ?> >F#</option>
					<option value="g" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'g' ? 'selected' : '' ?> >G</option>
					<option value="g#" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'g#' ? 'selected' : '' ?> >G#</option>
					<option value="a" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'a' ? 'selected' : '' ?> >A</option>
					<option value="a#" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'a#' ? 'selected' : '' ?> >A#</option>
					<option value="b" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'b' ? 'selected' : '' ?> >B</option>
				</select>
				<select name="chord_type">
					<option value="maj" <?= isset($_POST["chord_type"]) && $_POST["chord_type"] === 'maj' ? 'selected' : '' ?> >Major</option>
					<option value="min" <?= isset($_POST["chord_type"]) && $_POST["chord_type"] === 'min' ? 'selected' : '' ?> >Minor</option>
				</select>
				<select name="chord_seventh">
					<option value="" <?= isset($_POST["chord_seventh"]) && $_POST["chord_seventh"] === '' ? 'selected' : '' ?> >-</option>
					<option value="maj7" <?= isset($_POST["chord_seventh"]) && $_POST["chord_seventh"] === 'maj7' ? 'selected' : '' ?> >Major 7th</option>
				</select>
				<input type="submit" value="Get">
			</form>
			<div class="chord">
				<?= isset($_POST["chord"]) ? $_POST["chord"] : ''; ?>
			</div>
		</div>
	</body>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

</html>