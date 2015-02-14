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
 * Board
 */
class Board extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * Forbid threads
	 *
	 * @var bool
	 */
	protected $forbidThreads = FALSE;

	/**
	 * Parent board
	 *
	 * @var \T3easy\Dialogue\Domain\Model\Board
	 */
	protected $parentBoard = NULL;

	/**
	 * subBoards
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Board>
	 * @cascade remove
	 * @lazy
	 */
	protected $subBoards = NULL;

	/**
	 * threads
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Thread>
	 * @cascade remove
	 * @lazy
	 */
	protected $threads = NULL;

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
		$this->subBoards = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->threads = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return boolean
	 */
	public function isForbidThreads() {
		return $this->forbidThreads;
	}

	/**
	 * @param boolean $forbidThreads
	 */
	public function setForbidThreads($forbidThreads) {
		$this->forbidThreads = $forbidThreads;
	}

	/**
	 * @return \T3easy\Dialogue\Domain\Model\Board
	 */
	public function getParentBoard() {
		return $this->parentBoard;
	}

	/**
	 * @param \T3easy\Dialogue\Domain\Model\Board $parentBoard
	 */
	public function setParentBoard(\T3easy\Dialogue\Domain\Model\Board $parentBoard) {
		$this->parentBoard = $parentBoard;
	}

	/**
	 * Adds a Board
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Board $subBoard
	 * @return void
	 */
	public function addSubBoard(\T3easy\Dialogue\Domain\Model\Board $subBoard) {
		$this->subBoards->attach($subBoard);
	}

	/**
	 * Removes a Board
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Board $subBoardToRemove The Board to be removed
	 * @return void
	 */
	public function removeSubBoard(\T3easy\Dialogue\Domain\Model\Board $subBoardToRemove) {
		$this->subBoards->detach($subBoardToRemove);
	}

	/**
	 * Returns the subBoards
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Board> $subBoards
	 */
	public function getSubBoards() {
		return $this->subBoards;
	}

	/**
	 * Sets the subBoards
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Board> $subBoards
	 * @return void
	 */
	public function setSubBoards(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $subBoards) {
		$this->subBoards = $subBoards;
	}

	/**
	 * Adds a Thread
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Thread $thread
	 * @return void
	 */
	public function addThread(\T3easy\Dialogue\Domain\Model\Thread $thread) {
		$this->threads->attach($thread);
	}

	/**
	 * Removes a Thread
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Thread $threadToRemove The Thread to be removed
	 * @return void
	 */
	public function removeThread(\T3easy\Dialogue\Domain\Model\Thread $threadToRemove) {
		$this->threads->detach($threadToRemove);
	}

	/**
	 * Returns the threads
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Thread> $threads
	 */
	public function getThreads() {
		return $this->threads;
	}

	/**
	 * Sets the threads
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\T3easy\Dialogue\Domain\Model\Thread> $threads
	 * @return void
	 */
	public function setThreads(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $threads) {
		$this->threads = $threads;
	}

}