<?php
class GetChord {
	private $notes = [
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

	public function getChord() {
		$chordRoot = isset($_POST["chord_root"]) ? $_POST["chord_root"] : 'c';
		$chordType = isset($_POST["chord_type"]) ? $_POST["chord_type"] : 'maj';
		$chordSeventh = isset($_POST["chord_seventh"]) ? $_POST["chord_seventh"] : '';

		switch ($chordType) {
			case 'maj':
				$_POST['chord'] = $this->getMajorChord($chordRoot);
				break;
			case 'min':
				$_POST['chord'] = $this->getMinorChord($chordRoot);
				break;
			default:
				throw new \Exception('Unrecognized chord type');
		}
		switch ($chordSeventh) {
			case '':
				break;
			case 'maj7':
				$_POST['chord'] = $this->getMajorSeventhChord($chordRoot);
				break;
			default:
				throw new \Exception('Unrecognized seventh type');
		}
	}

	private function getMajorChord($chordRoot) {
		return $chordRoot . ' ' .  $this->getMajorThird($chordRoot) . ' ' . $this->getFifth($chordRoot);
	}

	private function getMinorChord($chordRoot) {
		return $chordRoot . ' ' .  $this->getMinorThird($chordRoot) . ' ' . $this->getFifth($chordRoot);
	}

	private function getMajorThird($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 4);
	}

	private function getMinorThird($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 3);
	}

	private function getFifth($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 7);
	}

	private function getMajorSeventh($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 11);
	}

	private function getMajorSeventhChord($chordRoot) {
		$chord = $this->getMajorChord($chordRoot);
		return $chord . ' ' . $this->getMajorSeventh($chordRoot);
	}

	private function getNoteBySemiToneDifference($rootNote, $semiToneDifference) {
		$notesFlipped = array_flip($this->notes);
		$chordRootPosition = $notesFlipped[$rootNote];
		$resultingNotePosition = ($chordRootPosition + $semiToneDifference) % 12;
		return $this->notes[$resultingNotePosition];
	}

}
?>