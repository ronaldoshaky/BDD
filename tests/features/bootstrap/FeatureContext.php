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

}
