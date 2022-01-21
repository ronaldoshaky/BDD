@javascript
Feature: Email confirmation sent on form submission 
	
	Scenario: Register using a temporary email address
		Given I register a temporary email address "remote912"
		And I am on "https://www.tfaforms.com/4710335"
		Given I fill "Your email" with the temporary email address "remote912@sharklasers.com"
		When I submit the form, by clicking "Submit"
		When I confirm the form, by clicking "Confirm"
		Then I see a confirmation email in my temporary email inbox from "patrick@veerwest.com"
