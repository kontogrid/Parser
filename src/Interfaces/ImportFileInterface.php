<?php

namespace Kontogrid\Parser\Interfaces;

use ArrayIterator;

/**
 * Importer interface
 *
 * @author michael.schramm@gmail.com
 */
interface ImportFileInterface {
	/**
	 * the file extension without dot
	 *
	 * @return string
	 */
	public function getFileExtension();

	/**
	 * basic description for the importer
	 *
	 * @return string
	 */
	public function getDescription();

	/**
	 * split the file into line items
	 *
	 * @param mixed $binary
	 * @return LineInterface[]|ArrayIterator
	 */
	public function getIteratorForBinaryData($binary);
}
