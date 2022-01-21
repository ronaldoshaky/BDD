@javascript
	Feature: Make a correction
		Scenario: Display the correction on confirmation page
		       Given I am on "https://www.tfaforms.com/4710335"
		       Given I fill "Your email" with the temporary email address "test@user.ie"
                       When I check the favorite food option "Cheese"
		       When I submit the form, by clicking "Submit"
		       When I click "Make a correction"
		       When I check the favorite food option "Bread"
		       When I submit the form, by clicking "Submit"
		       Then I should see "Bread" on the confirmation page
