# features/gets_scale_notes.feature
Feature: Gets a specified scale's notes
  In order to know which notes a specific scale has
  As a website user that is using the scales function
  I need to be able to see the scale's notes

  Scenario: Landing on the scales section
    Given I am on "/scales"
    Then I should see "c" in the "scale_note_div_c" element
    And I should see "d"
    And I should see "e"
    And I should see "f"
    And I should see "g"
    And I should see "a"
    And I should see "b"

  Scenario: Asking for the d minor scale
    Given I am on "/scales"
    And I should see "d"
    And I should see "e"
    And I should see "f"
    And I should see "g"
    And I should see "a"
    And I should see "a#"
    And I should see "c"
    And I should not see "b"
