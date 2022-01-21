<?php

namespace Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use WebDriver\Exception\NoAlertOpenError;
use Pages\Elements\EmailPageCheeseForm;

class EmailPage extends Page
{

	public function fillInTheEmailField($emailLabel, $emailAddress) {
		$this->fillField($emailLabel, $emailAddress);
	}

	public function checkTheFavouriteFoodOption($option) {
		$this->checkField($option);
	}

	public function uncheckTheFavouriteFoodOption($option) {
		$this->uncheckField($option);
        }


        public function submitTheForm($submitButton) {
		$this->pressButton($submitButton);
		$this->acceptAlert();
	}

	public function attachingFileForUpload($filePath) {
		$returnValue = $this->getElement(EmailPageCheeseForm::class)->attachFile($filePath);
		#var_dump($returnValue->getText());
	}

	public function acceptAlert(){
    		$i = 0;
    		while($i < 5) {
        		try {
            			$this->getDriver()->getWebDriverSession()->accept_alert();
            			break;
        		}
        		catch(NoAlertOpenError $e) {
				sleep(1);
            			$i++;
        		}
    		}
	}

}
