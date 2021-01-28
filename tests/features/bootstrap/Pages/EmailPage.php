<?php

namespace Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use WebDriver\Exception\NoAlertOpenError;

class EmailPage extends Page
{

	public function fillInTheEmailField($emailLabel, $emailAddress) {
		$this->fillField($emailLabel, $emailAddress);
	}


        public function submitTheForm($submitButton) {
		$this->pressButton($submitButton);
		$this->acceptAlert();
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
