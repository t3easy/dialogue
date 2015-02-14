<?php
namespace T3easy\Dialogue\Controller;

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
 * ThreadController
 */
class ThreadController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * threadRepository
	 *
	 * @var \T3easy\Dialogue\Domain\Repository\ThreadRepository
	 * @inject
	 */
	protected $threadRepository = NULL;

	/**
	 * boardRepository
	 *
	 * @var \T3easy\Dialogue\Domain\Repository\BoardRepository
	 * @inject
	 */
	protected $boardRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction(\T3easy\Dialogue\Domain\Model\Board $board) {
		$this->view->assign('board', $board);

		$threads = $this->threadRepository->findByBoard($board);
		$this->view->assign('threads', $threads);

		$subBoards = $this->boardRepository->findByParentBoard($board);
		$this->view->assign('subBoards', $subBoards);
	}

	/**
	 * action new
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Board $board
	 * @param \T3easy\Dialogue\Domain\Model\Thread $newThread
	 *
	 * @ignorevalidation $newThread
	 * @return void
	 */
	public function newAction(\T3easy\Dialogue\Domain\Model\Board $board, \T3easy\Dialogue\Domain\Model\Thread $newThread = NULL) {
		if ($board->isForbidThreads() == 1) {
			$this->addFlashMessage('Threads are forbidden in this board!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
			$this->redirect('list', NULL, NULL, array('board' => $board));
		}
		$this->view->assign('newThread', $newThread);
		$this->view->assign('board', $board);
	}

	/**
	 * action create
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Thread $newThread
	 * @return void
	 */
	public function createAction(\T3easy\Dialogue\Domain\Model\Thread $newThread) {
		$board = $newThread->getBoard();
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->threadRepository->add($newThread);
		$this->redirect('list', NULL, NULL, array('board' => $board));
	}

	/**
	 * action edit
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Thread $thread
	 * @ignorevalidation $thread
	 * @return void
	 */
	public function editAction(\T3easy\Dialogue\Domain\Model\Thread $thread) {
		$this->view->assign('thread', $thread);
	}

	/**
	 * action update
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Thread $thread
	 * @return void
	 */
	public function updateAction(\T3easy\Dialogue\Domain\Model\Thread $thread) {
		$board = $thread->getBoard();
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->threadRepository->update($thread);
		$this->redirect('list', NULL, NULL, array('board' => $board));
	}

	/**
	 * action delete
	 *
	 * @param \T3easy\Dialogue\Domain\Model\Thread $thread
	 * @return void
	 */
	public function deleteAction(\T3easy\Dialogue\Domain\Model\Thread $thread) {
		$board = $thread->getBoard();
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->threadRepository->remove($thread);
		$this->redirect('list', NULL, NULL, array('board' => $board));
	}
}