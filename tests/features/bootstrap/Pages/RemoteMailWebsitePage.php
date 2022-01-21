<?php

namespace Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class RemoteMailWebsitePage extends Page
{
	private $emailId = "span[title=\"Click to Edit\"]";
	private $emailInput = "span#inbox-id > input";
        private $emailHost = "select#gm-host-select option:first-of-type";
        private $emailTable = "tbody#email_list tr";
	protected $path = "https://www.guerrillamail.com/";
	private $forgetMe = "a#forget_button";
	private $set = "button.save";
        private $alert = "div.status_alert.shadow";

	public function registerRemoteEmailAddress($remoteEmailId) {
		$this->open();
		$this->find('css', strval($this->forgetMe))->click();
		$this->find('css', strval($this->emailInput))->setValue(strval($remoteEmailId));
		$this->find('css', strval($this->set))->click();
	}

	public function waitForMail() {
		$this->open();

		$i = 0;
		while($i < 60) {
			sleep(1);
			$alertShadow = $this->find('css', strval($this->alert));

			if ($alertShadow != NULL) {
				break;
			}

			$i++;
		}
	}
}
