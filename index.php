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
					<option value="c#" <?= isset($_POST["chord_root"]) && $_POST["chord_root"] === 'c#' ? 'selected' : '' ?> >C#</option>
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
					<option value="min7" <?= isset($_POST["chord_seventh"]) && $_POST["chord_seventh"] === 'min7' ? 'selected' : '' ?> >Minor 7th</option>
				</select>
				<input type="submit" value="Get">
			</form>
			<div class="chord">
				<?= isset($_POST["chord"]) ? $_POST["chord"] : ''; ?>
			</div>
		</div>
		<div class="chord_guitar col-md-2 col-md-offset-5">
			<?php if (isset($_POST["chord_guitar"])) {
				foreach ($_POST["chord_guitar"][5] as $fret) {
					echo $fret . ' ';
				}
				echo "</br>";
				foreach ($_POST["chord_guitar"][4] as $fret) {
					echo $fret . ' ';
				}
				echo "</br>";
				foreach ($_POST["chord_guitar"][3] as $fret) {
					echo $fret . ' ';
				}
				echo "</br>";
				foreach ($_POST["chord_guitar"][2] as $fret) {
					echo $fret . ' ';
				}
				echo "</br>";
				foreach ($_POST["chord_guitar"][1] as $fret) {
					echo $fret . ' ';
				}
				echo "</br>";
				foreach ($_POST["chord_guitar"][0] as $fret) {
					echo $fret . ' ';
				}
			} ?>
		</div>
		<div class="chord_guitar col-md-6 col-md-offset-2">
			<canvas id="canvas" width="1200" height="400">
	            This text is displayed if your browser does not support HTML5 Canvas.
	        </canvas>
		</div>
	</body>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<script type='text/javascript'>var chord=<?php if (isset($_POST["chord_guitar_json"])) echo $_POST["chord_guitar_json"]; ?></script>
	<script src='js/draw_strings.js' type='text/javascript'></script>

</html>