<?php
namespace TYPO3\CMS\Styleguide\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012-2013 Felix Kopp <felix-source@phorax.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Core\Messaging\FlashMessage;

/**
 * Backend module for Styleguide
 */
class StyleguideController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * Index
	 */
	public function indexAction() {
		$this->flashMessageContainer->add($this->getLoremIpsum(), 'Title for Info message', FlashMessage::INFO, TRUE);
		$this->flashMessageContainer->add($this->getLoremIpsum(), 'Title for Info message', FlashMessage::NOTICE, TRUE);
		$this->flashMessageContainer->add($this->getLoremIpsum(), 'Title for Info message', FlashMessage::ERROR, TRUE);
		$this->flashMessageContainer->add($this->getLoremIpsum(), 'Title for Info message', FlashMessage::OK, TRUE);
		$this->flashMessageContainer->add($this->getLoremIpsum(), 'Title for Info message', FlashMessage::WARNING, TRUE);
	}

	/**
	 * Forms
	 */
	public function formAction() {
	}

	/**
	/**
	 * Tables
	 */
	public function tableAction() {
	}

	/**
	 * Lorem ipsum test with fixed length
	 *
	 * @return string
	 */
	protected function getLoremIpsum() {
		return 'Bacon ipsum dolor sit amet capicola jerky pork chop rump shoulder shank. Shankle strip steak pig salami. Leberkas shoulder ham hock cow salami bacon pork pork chop, jerky pork belly drumstick ham. Tri-tip strip steak sirloin prosciutto pastrami. Corned beef venison tenderloin, biltong meatball pork tongue short ribs jowl cow hamburger strip steak. Doner turducken jerky short loin chuck filet mignon.';
	}

}

?>
