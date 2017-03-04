<?php
	require('get_chord.php');
	require('get_scales.php');

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

	$getChord = new GetChord($notes);
	$getChord->getChord();

	$getScales = new GetScales($notes, $getChord);
	$getScales->getScalesByChord($_POST['chord']);
?>

<html>

	<head>
    </head>

	<body>
		<div class='col-md-4 col-md-offset-4'>
			<form action="" method="POST">
				<select name="chord_root">
					<option value="c" <?= $_POST["chord_root"] === 'c' ? 'selected' : '' ?> >C</option>
					<option value="c#" <?= $_POST["chord_root"] === 'c#' ? 'selected' : '' ?> >C#</option>
					<option value="d" <?= $_POST["chord_root"] === 'd' ? 'selected' : '' ?> >D</option>
					<option value="d#" <?= $_POST["chord_root"] === 'd#' ? 'selected' : '' ?> >D#</option>
					<option value="e" <?= $_POST["chord_root"] === 'e' ? 'selected' : '' ?> >E</option>
					<option value="f" <?= $_POST["chord_root"] === 'f' ? 'selected' : '' ?> >F</option>
					<option value="f#" <?= $_POST["chord_root"] === 'f#' ? 'selected' : '' ?> >F#</option>
					<option value="g" <?= $_POST["chord_root"] === 'g' ? 'selected' : '' ?> >G</option>
					<option value="g#" <?= $_POST["chord_root"] === 'g#' ? 'selected' : '' ?> >G#</option>
					<option value="a" <?= $_POST["chord_root"] === 'a' ? 'selected' : '' ?> >A</option>
					<option value="a#" <?= $_POST["chord_root"] === 'a#' ? 'selected' : '' ?> >A#</option>
					<option value="b" <?= $_POST["chord_root"] === 'b' ? 'selected' : '' ?> >B</option>
				</select>
				<select name="chord_type">
					<option value="maj" <?= $_POST["chord_type"] === 'maj' ? 'selected' : '' ?> >Major</option>
					<option value="min" <?= $_POST["chord_type"] === 'min' ? 'selected' : '' ?> >Minor</option>
				</select>
				<select name="chord_seventh">
					<option value="" <?= $_POST["chord_seventh"] === '' ? 'selected' : '' ?> >-</option>
					<option value="maj7" <?= $_POST["chord_seventh"] === 'maj7' ? 'selected' : '' ?> >Major 7th</option>
					<option value="min7" <?= $_POST["chord_seventh"] === 'min7' ? 'selected' : '' ?> >Minor 7th</option>
				</select>
				<input type="submit" value="Get">
			</form>
			<div class="chord">
				<?= $_POST["chord"]; ?>
			</div>
		</div>
		<div class="chord_guitar col-md-2 col-md-offset-5">
			<?php 
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
			?>
		</div>
		<div class="chord_guitar col-md-6 col-md-offset-2">
			<canvas id="canvas" width="1200" height="400">
	            This text is displayed if your browser does not support HTML5 Canvas.
	        </canvas>
		</div>
		<div class="chord_scales col-md-6 col-md-offset-2">
			<div class="major_scales col-md-6">
				<?php 
					foreach ($_POST['chord_scales']['major'] as $scaleRoot => $majorScale) {
						echo '<strong>' . $scaleRoot . ' major' . '</strong>';
						echo "</br>";
						foreach ($majorScale as $note) {
							echo $note . ' ';
						}
						echo "</br>";
					}
				?>
			</div>
			<div class="minor_scales col-md-6">
				<?php 
					foreach ($_POST['chord_scales']['minor'] as $scaleRoot => $minorScale) {
						echo '<strong>' . $scaleRoot . ' minor' . '</strong>';
						echo "</br>";
						foreach ($minorScale as $note) {
							echo $note . ' ';
						}
						echo "</br>";
					}
				?>
			</div>
		</div>
	</body>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<script type='text/javascript'>var chord=<?php echo $_POST["chord_guitar_json"]; ?></script>
	<script src='js/draw_strings.js' type='text/javascript'></script>

</html>