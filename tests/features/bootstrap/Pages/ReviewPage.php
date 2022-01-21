<?php

namespace Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class ReviewPage extends Page
{
        private $formSubmit = "div#tfaContent form";

	public function confirmTheForm($confirm) {
		$this->pressButton($confirm);
	}

	public function reConfirmTheForm() {
                $this->find('css', strval($this->formSubmit))->submit();
	}

	public function makeTheCorrection($linkText) {
		$this->clickLink($linkText);
	}

}
