<?php

use Behat\MinkExtension\Context\MinkContext;
use Pages\EmailPage;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext
{

    /**
      * @var EmailPage
     */
    private $emailPage;	

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(EmailPage $emailPage) {
	$this->emailPage = $emailPage;
    }

    /**
     * 
     * @Given I fill in the :arg1 field with :arg2
     */
    public function fillInEmailField($arg1, $arg2)
    {
        $this->emailPage->fillInTheEmailField($arg1, $arg2);
    }
        
    /**
     * 
     * @When I submit the form, by clicking :arg1
     */
    public function submitForm($arg1)
    {
        $this->emailPage->submitTheForm($arg1);
    }

    /**
     * 
     * @When I check the favorite food option :arg1 
     */
    public function checkFavouriteFoodOption($arg1)
    {
        $this->emailPage->checkTheFavouriteFoodOption($arg1);
    }

    /**
     * 
     * @Then I should see the :arg1 section, including the instruction :arg2 
     */
    public function shouldSeeSubsection($arg2)
    {
	$this->assertPageContainsText($arg2);
    }

   /**
     * 
     * @When I uncheck the favorite food option :arg1 
     */
    public function uncheckFavouriteFoodOption($arg1)
    {
        $this->emailPage->uncheckTheFavouriteFoodOption($arg1);
    }

    /**
     * 
     * @Then I should not see the field section :arg1 - which includes the instruction :arg2 
     */
    public function shouldNotSeeSubsection($arg2)
    {
	$this->assertPageNotContainsText($arg2);
    }

}
