<?php

namespace Kontogrid\Parser\Interfaces;
use DateTime;

/**
 * @author michael.schramm@gmail.com
 */
interface LineInterface {
	/**
	 * @return string
	 */
	public function getCategory();

	/**
	 * @param string $category
	 */
	public function setCategory($category);

	/**
	 * @return DateTime
	 */
	public function getLineDate();

	/**
	 * @param DateTime $line_date
	 */
	public function setLineDate($line_date);

	/**
	 * @return string
	 */
	public function getMessage();

	/**
	 * @param string $message
	 */
	public function setMessage($message);

	/**
	 * @return string
	 */
	public function getPayee();

	/**
	 * @param string $payee
	 */
	public function setPayee($payee);

	/**
	 * @return double
	 */
	public function getValue();

	/**
	 * @param double $value
	 */
	public function setValue($value);

	/**
	 * @return DateTime
	 */
	public function getValueDate();

	/**
	 * @param DateTime $value_date
	 */
	public function setValueDate($value_date);
}
