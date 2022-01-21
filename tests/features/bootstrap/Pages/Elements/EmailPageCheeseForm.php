<?php

namespace Pages\Elements;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Pages\EmailPage;

class EmailPageCheeseForm extends Element
{
    /**
     * @var array|string $selector
     */
    protected $selector = 'fieldset#tfa_8';
    private $inputField = 'tfa_13';

    /**
     * @param string $fileName
     *
     * @return Page
     */
    public function attachFile($fileName)
    {
	$this->attachFileToField($this->inputField, $fileName);         
        return $this->getPage(EmailPage::class);
    }
}
