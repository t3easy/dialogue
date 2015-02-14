<?php
namespace T3easy\Dialogue\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Jan Kiesewetter <jan@t3easy.de>, t3easy
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * message
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $message = '';

	/**
	 * ipaddress
	 *
	 * @var string
	 */
	protected $ipaddress = '';

	/**
	 * thread
	 *
	 * @var \T3easy\Dialogue\Domain\Model\Thread
	 * @lazy
	 */
	protected $thread = NULL;

	/**
	 * creator
	 *
	 * @var \T3easy\Dialogue\Domain\Model\User
	 * @lazy
	 */
	protected $creator = NULL;

	/**
	 * Creation date
	 *
	 * @var \DateTime
	 */
	protected $creationDate = NULL;

	/**
	 * Modification date
	 *
	 * @var \DateTime
	 */
	protected $modificationDate = NULL;

	/**
	 * attachments
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Attachment>
	 * @cascade remove
	 * @lazy
	 */
	protected $attachments = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->attachments = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the message
	 *
	 * @return string $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * Sets the message
	 *
	 * @param string $message
	 * @return void
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * Returns the ipaddress
	 *
	 * @return string $ipaddress
	 */
	public function getIpaddress() {
		return $this->ipaddress;
	}

	/**
	 * Sets the ipaddress
	 *
	 * @param string $ipaddress
	 * @return void
	 */
	public function setIpaddress($ipaddress) {
		$this->ipaddress = $ipaddress;
	}

	/**
	 * @return \T3easy\Dialogue\Domain\Model\Thread
	 */
	public function getThread() {
		return $this->thread;
	}

	/**
	 * @param \T3easy\Dialogue\Domain\Model\Thread $thread
	 */
	public function setThread(Thread $thread) {
		$this->thread = $thread;
	}

	/**
	 * Returns the creator
	 *
	 * @return \T3easy\Dialogue\Domain\Model\User $creator
	 */
	public function getCreator() {
		return $this->creator;
	}

	/**
	 * Sets the creator
	 *
	 * @param \T3easy\Dialogue\Domain\Model\User $creator
	 * @return void
	 */
	public function setCreator(\T3easy\Dialogue\Domain\Model\User $creator) {
		$this->creator = $creator;
	}

	/**
	 * Returns the creation date
	 *
	 * @return \DateTime
	 */
	public function getCreationDate() {
		return $this->creationDate;
	}

	/**
	 * Sets the creation date
	 *
	 * @param \DateTime $creationDate
	 */
	public function setCreationDate(\DateTime $creationDate) {
		$this->creationDate = $creationDate;
	}

	/**
	 * Returns modification date
	 *
	 * @return \DateTime
	 */
	public function getModificationDate() {
		return $this->modificationDate;
	}

	/**
	 * Sets the modification date
	 *
	 * @param \DateTime $modificationDate
	 */
	public function setModificationDate(\DateTime $modificationDate) {
		$this->modificationDate = $modificationDate;
	}

	/**
	 * Adds a Attachment
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Attachment $attachment
	 * @return void
	 */
	public function addAttachment(\T3easy\Dialogue\Domain\Model\Attachment $attachment) {
		$this->attachments->attach($attachment);
	}

	/**
	 * Removes a Attachment
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Attachment $attachmentToRemove The Attachment to be removed
	 * @return void
	 */
	public function removeAttachment(\T3easy\Dialogue\Domain\Model\Attachment $attachmentToRemove) {
		$this->attachments->detach($attachmentToRemove);
	}

	/**
	 * Returns the attachments
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Attachment> $attachments
	 */
	public function getAttachments() {
		return $this->attachments;
	}

	/**
	 * Sets the attachments
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Attachment> $attachments
	 * @return void
	 */
	public function setAttachments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attachments) {
		$this->attachments = $attachments;
	}

}