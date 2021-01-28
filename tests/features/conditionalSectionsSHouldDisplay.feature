@javascript
Feature: Conditional sections should display when trigger is selected 
	
	Scenario: Hide conditional sections when done
		Given I am on "https://www.tfaforms.com/4710335"
	
		When I check the favorite food option "Cheese"
		Then I should see the "Cheese" section, including the instruction "Pick a cheese"
		When I uncheck the favorite food option "Cheese"
		Then I should not see the field section "Cheese" - which includes the instruction "Pick a cheese"
