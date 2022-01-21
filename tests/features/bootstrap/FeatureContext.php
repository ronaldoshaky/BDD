<?php

use Behat\MinkExtension\Context\MinkContext;
use Pages\EmailPage;
use Pages\RemoteMailWebsitePage;
use Pages\ReviewPage;

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
      * @var RemoteMailWebsitePage 
     */
    private $remoteMailWebsitePage;

     /**
      * @var ReviewPage 
     */
    private $reviewPage;


    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(EmailPage $emailPage, RemoteMailWebsitePage $remoteMailWebsitePage, ReviewPage $reviewPage) 
    {
	$this->emailPage = $emailPage;
	$this->remoteMailWebsitePage = $remoteMailWebsitePage;
	$this->reviewPage = $reviewPage;
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
     * @When I confirm the form, by clicking :arg1
     */
    public function confirmForm($arg1)
    {
        $this->reviewPage->confirmTheForm($arg1);
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

    /**
     * 
     * @Given I register a temporary email address :arg1 
     */
    public function registerAtRemoteMailWebsite($arg1)
    {
        $this->remoteMailWebsitePage->registerRemoteEmailAddress($arg1);
    }
 
    /**
     * 
     * @And I am on :arg1 
     */
    public function visitSite($arg1)
    {
	    $this->visit($arg1);
    }
 
    /**
     * 
     * @Given I fill :arg1 with the temporary email address :arg2
     */
    public function fillInTheEmail($arg1, $arg2)
    {
        $this->emailPage->fillInTheEmailField($arg1, $arg2);
    }
 
    /**
     * 
     * @Then I see a confirmation email in my temporary email inbox from :arg1
     */
    public function checkForConfirmationEmail($arg1)
    {
	$this->remoteMailWebsitePage->waitForMail();   
        $this->assertPageContainsText($arg1);
    }

    /**
     * 
     * @When I attach a file :arg1 for upload
     */
    public function attachFileForUpload($arg1)
    {
	$this->emailPage->attachingFileForUpload(realpath($arg1));
    }

    /**
     * 
     * @Then I see the uploaded filename :arg1 on the review page
     */
    public function shouldSeeUploadedFilename($arg1)
    {
         $this->assertPageContainsText($arg1);
    }

     /**
     * 
     * @When I click :arg1
     */
    public function makeACorrection($arg1)
    {
         $this->reviewPage->makeTheCorrection($arg1);
    }

    /**
     * 
     * @Then I should see :arg1 on the confirmation page 
     */
    public function shouldSeeTextOnReviewPage($arg1)
    {
         $this->assertPageContainsText($arg1);
    }

    /**
     * 
     * @When I click back in the browser
     */
    public function clickBrowserBackButton()
    {
	    $this->back();
	    $this->getSession()->wait(10000, "document.readyState === 'complete'");
    }

    /**
     * 
     * @When I reconfirm the form
     */
    public function reConfirmForm()
    {
         $this->reviewPage->reConfirmTheForm();
    }

}
