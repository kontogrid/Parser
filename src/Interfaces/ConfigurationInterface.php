<?php

namespace Kontogrid\Parser\Interfaces;

/**
 * @author michael.schramm@gmail.com
 */
interface ConfigurationInterface {
	/**
	 * @param ImportLineInterface $import
	 * @return LineInterface
	 */
	public function convert(ImportLineInterface $import);
}
