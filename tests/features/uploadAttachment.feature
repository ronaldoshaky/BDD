@javascript
	Feature: Upload files
		Scenario: Display filename on confirmation page
		       Given I am on "https://www.tfaforms.com/4710335"
		       Given I fill "Your email" with the temporary email address "test@user.ie"
                       When I check the favorite food option "Cheese"
                       When I attach a file "behat.yml" for upload
                       When I submit the form, by clicking "Submit"
		       Then I see the uploaded filename "behat.yml" on the review page
