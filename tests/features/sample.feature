@javascript
Feature: View Example.org
  As an internet user
  I want to visit exmaple.org
  So I know the internet is working

  Scenario: Visit Example.org
    Given I go to "http://www.example.org"
    Then I should see "Example Domain"
