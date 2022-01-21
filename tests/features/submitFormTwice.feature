@javascript
	Feature: Submit form twice 
		Scenario: Display error on repeated form submission
		       Given I am on "https://www.tfaforms.com/4710335"
		       Given I fill "Your email" with the temporary email address "test1@user.ie"
                       When I check the favorite food option "Cheese"
		       When I submit the form, by clicking "Submit"
		       When I confirm the form, by clicking "Confirm"
		       Then I should see "Thank you. Your response has been processed successfully."
		       When I click back in the browser
		       When I reconfirm the form
		       Then I should see "This response has already been processed." on the confirmation page

