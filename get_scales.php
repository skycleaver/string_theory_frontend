<?php
class GetScales {

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

		$_POST['chord_scales'] = ['major' => $majorScales, 'minor' => $minorScales];
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
}