<?php

namespace Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class RemoteMailViaAPIPage extends Page
{
        protected $path = "http://api.guerrillamail.com/ajax.php";
	private $emailAddress = "";
	private $sidToken = "";

	public function registerEmail($emailId) {
                $this->path = "http://api.guerrillamail.com/ajax.php?f=set_email_user&email_user={$emailId}&ip=127.0.0.1&agent=Mozilla_foo_bar";
		$result = $this->open();
		$jsonObject = json_decode($result->getText());
		$this->sidToken = $jsonObject->sid_token;
		$this->emailAddress = $jsonObject->email_addr;
	}

	public function waitforMail($sendersEmailAddress) {
		$this->path = "http://api.guerrillamail.com/ajax.php?f=check_email&seq={$this->sidToken}&ip=127.0.0.1&agent=Mozilla_foo_bar";
                boolean $found = false;

		$i = 0;
		while($i < 60) {
			sleep(1);
			$mailBox = $this->open();

			if (strpos($mailBox->getText(), $sendersEmailAddress) !== false) {
				$found = true;
				break;		
			}
                        
			$i++;
		}
		return $found;
	}

}
