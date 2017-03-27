<?php
class GetChord {

	private $notes;

	public function __construct(array $notes) {
		$this->notes = $notes;
	}

	public function getChord() {
		$this->setChordAndRootNoteDefaults();
		$chordRoot = $_POST["chord_root"];
		$chordType = $_POST["chord_type"];
		$chordSeventh = $_POST["chord_seventh"];
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
				$_POST['chord'] .= ' ' . $this->getMajorSeventh($chordRoot);
				break;
			case 'min7':
				$_POST['chord'] .= ' ' . $this->getMinorSeventh($chordRoot);
				break;
			default:
				throw new \Exception('Unrecognized seventh type');
		}

		$_POST['chord_guitar'] = $this->getChordGuitar($_POST['chord']);
		$_POST['chord_guitar_json'] = json_encode($_POST['chord_guitar']);
	}

	private function setChordAndRootNoteDefaults() {
		if (!isset($_POST["chord_root"])) {
			$_POST["chord_root"] = 'c';
		}
		if (!isset($_POST["chord_type"])) {
			$_POST["chord_type"] = 'maj';
		}
		if (!isset($_POST["chord_seventh"])) {
			$_POST["chord_seventh"] = '';
		}
	}

	public function getMajorChord($chordRoot) {
		return $chordRoot . ' ' .  $this->getMajorThird($chordRoot) . ' ' . $this->getFifth($chordRoot);
	}

	public function getMinorChord($chordRoot) {
		return $chordRoot . ' ' .  $this->getMinorThird($chordRoot) . ' ' . $this->getFifth($chordRoot);
	}

	public function getMajorThird($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 4);
	}

	public function getMinorThird($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 3);
	}

	public function getFifth($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 7);
	}

	public function getMajorSeventh($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 11);
	}

	public function getMinorSeventh($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 10);
	}

	public function getSecond($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 2);
	}

	public function getFourth($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 5);
	}

	public function getMajorSixth($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 9);
	}

	public function getMinorSixth($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 8);
	}

	private function getNoteBySemiToneDifference($rootNote, $semiToneDifference) {
		$notesFlipped = array_flip($this->notes);
		$chordRootPosition = $notesFlipped[$rootNote];
		$resultingNotePosition = ($chordRootPosition + $semiToneDifference) % 12;
		return $this->notes[$resultingNotePosition];
	}

	private function getChordGuitar($chord) {
		$chordPieces = explode(' ', $chord);

		$strings = [
			$this->getString($chordPieces, 'e'),
			$this->getString($chordPieces, 'a'),
			$this->getString($chordPieces, 'd'),
			$this->getString($chordPieces, 'g'),
			$this->getString($chordPieces, 'b'),
			$this->getString($chordPieces, 'e'),
		];
		return $strings;
	}

	private function getString($chordPieces, $startingNote) {
		$startingNoteOffset = array_flip($this->notes)[$startingNote];
		$chordRoot = $chordPieces[0];
		$stringLength = 12;
		$string = [];
		for ($i = 0; $i < $stringLength; $i++) {
			if ($chordRoot === $this->notes[($i + $startingNoteOffset) % 12]) {
				$string[] = strtoupper($chordRoot);
			} elseif (in_array($this->notes[($i + $startingNoteOffset) % 12], $chordPieces)) {
				$string[] = $this->notes[($i + $startingNoteOffset) % 12];
			} else {
				if ($i === 0) {
					$string[] = 'X';
				} else {
					$string[] = '-';
				}
			}
		}
		return $string;
	}

}
?>