<?php
class GetScales {

	const MAJOR = 'major';

	const MINOR = 'minor';

	private $notes;

	private $getChord;

	public function __construct(array $notes, GetChord $getChord) {
		$this->notes = $notes;
		$this->getChord = $getChord;
	}

	public function getScalesByChord($chord) {
		$chordNotes = explode(' ', $chord);
		$allMajorScales = $this->getAllMajorScales();
		$allMinorScales = $this->getAllMinorScales();

		$majorScales = [];
		foreach ($allMajorScales as $rootOfScale => $majorScale) {
			$isChordPartOfScale = true;
			foreach ($chordNotes as $note) {
				if (!in_array($note, $majorScale)) {
					$isChordPartOfScale = false;
				}
			}
			if ($isChordPartOfScale) {
				$majorScales[$rootOfScale] = $majorScale;
			}
		}

		$minorScales = [];
		foreach ($allMinorScales as $rootOfScale => $minorScale) {
			$isChordPartOfScale = true;
			foreach ($chordNotes as $note) {
				if (!in_array($note, $minorScale)) {
					$isChordPartOfScale = false;
				}
			}
			if ($isChordPartOfScale) {
				$minorScales[$rootOfScale] = $minorScale;
			}
		}

		$_POST['chord_scales'] = [self::MAJOR => $majorScales, self::MINOR => $minorScales];
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
			$this->getChord->getSecond($rootNote),
			$this->getChord->getMajorThird($rootNote),
			$this->getChord->getFourth($rootNote),
			$this->getChord->getFifth($rootNote),
			$this->getChord->getMajorSixth($rootNote),
			$this->getChord->getMajorSeventh($rootNote)
		];
	}

	private function getMinorScale($rootNote) {
		return [
			$rootNote,
			$this->getChord->getSecond($rootNote),
			$this->getChord->getMinorThird($rootNote),
			$this->getChord->getFourth($rootNote),
			$this->getChord->getFifth($rootNote),
			$this->getChord->getMinorSixth($rootNote),
			$this->getChord->getMinorSeventh($rootNote)
		];
	}

	public function getScale($rootNote, $scaleName) {
		$_POST['scale']['name'] = $rootNote . ' ' . $scaleName;
		switch ($scaleName) {
			case self::MAJOR:
				$scale = $this->getMajorScale($rootNote);
				$_POST['scale']['chords'][$scale[0] . ' ' . self::MAJOR] = $this->getChord->getMajorChord($scale[0]);
				$_POST['scale']['chords'][$scale[1] . ' ' . self::MINOR] = $this->getChord->getMinorChord($scale[1]);
				$_POST['scale']['chords'][$scale[2] . ' ' . self::MINOR] = $this->getChord->getMinorChord($scale[2]);
				$_POST['scale']['chords'][$scale[3] . ' ' . self::MAJOR] = $this->getChord->getMajorChord($scale[3]);
				$_POST['scale']['chords'][$scale[4] . ' ' . self::MAJOR] = $this->getChord->getMajorChord($scale[4]);
				$_POST['scale']['chords'][$scale[5] . ' ' . self::MINOR] = $this->getChord->getMinorChord($scale[5]);
				break;
			case self::MINOR:
				$_POST['scale']['chords'] = $this->getMinorScale($rootNote);
				break;
			default:
				unset($_POST['scale']);
				throw new \Exception('Unrecognized scale: ' . $scaleName);
		}
	}
}