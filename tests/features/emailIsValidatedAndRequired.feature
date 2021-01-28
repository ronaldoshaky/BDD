@javascript
Feature: Email is validated and required
	
	Background:
		Given I am on "https://www.tfaforms.com/4710335"
	
	Scenario Outline: Confirm email validation
		Given I fill in the "Your email" field with "<email_value>" 
		When I submit the form, by clicking "Submit"
		Then I should see "<submission result>"

        Examples:		
		|email_value|submission result|
		||This field is required.|
	        |test@|This does not appear to be a valid email address.|
		|test@user.ie|Please review your response and confirm.|
