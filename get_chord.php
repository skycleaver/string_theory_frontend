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
				$_POST['chord'] .= ' ' . $this->getMajorSeventh($chordRoot);
				break;
			case 'min7':
				$_POST['chord'] .= ' ' . $this->getMinorSeventh($chordRoot);
				break;
			default:
				throw new \Exception('Unrecognized seventh type');
		}

		$_POST['chord_guitar'] = $this->getChordGuitar($_POST['chord']);
		$_POST['scales'] = $this->getScalesByChord($_POST['chord']);
		$_POST['chord_guitar_json'] = json_encode($_POST['chord_guitar']);
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

	private function getMinorSeventh($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 10);
	}

	private function getScalesByChord($chord) {
		$allMajorScales = $this->getAllMajorScales();
		$allMinorScales = $this->getAllMinorScales();
		return ['major' => $allMajorScales, 'minor' => $allMinorScales];
	}

	private function getAllMajorScales() {
		$scales = [];
		foreach ($this->notes as $note) {
			$scales[$note] = $this->getMajorScale($note);
		}
		return $scales;
	}

	private function getAllMinorScales() {
		$scales = [];
		foreach ($this->notes as $note) {
			$scales[$note] = $this->getMinorScale($note);
		}
		return $scales;
	}

	private function getMajorScale($rootNote) {
		return [
			$rootNote,
			$this->getSecond($rootNote),
			$this->getMajorThird($rootNote),
			$this->getFourth($rootNote),
			$this->getFifth($rootNote),
			$this->getMajorSixth($rootNote),
			$this->getMajorSeventh($rootNote)
		];
	}

	private function getMinorScale($rootNote) {
		return [
			$rootNote,
			$this->getSecond($rootNote),
			$this->getMinorThird($rootNote),
			$this->getFourth($rootNote),
			$this->getFifth($rootNote),
			$this->getMinorSixth($rootNote),
			$this->getMinorSeventh($rootNote)
		];
	}

	private function getSecond($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 2);
	}

	private function getFourth($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 5);
	}

	private function getMajorSixth($chordRoot) {
		return $this->getNoteBySemiToneDifference($chordRoot, 9);
	}

	private function getMinorSixth($chordRoot) {
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
				$string[] = '-';
			}
		}
		return $string;
	}

}
?>