<?php

namespace Kontogrid\Parser\Interfaces;

/**
 * @author michael.schramm@gmail.com
 */
interface ImportLineInterface extends LineInterface {
	/**
	 * @return string
	 */
	public function getRawMessage();

	/**
	 * @param string $raw_message
	 */
	public function setRawMessage($raw_message);
}
