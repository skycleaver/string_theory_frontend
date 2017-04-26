# features/landing_titles.feature
Feature: Landing titles
  In order to know what the page is about
  As a website user that reaches the main page
  I need to be able to see the landing titles

  Scenario: Seeing the landing titles
    Given I am on "/"
    Then I should see "Arturo Ortega"
