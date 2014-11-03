<?php

namespace Kontogrid\Parser\Import\Line;

use DateTime;
use Kontogrid\Parser\Interfaces\ImportLineInterface;

/**
 * @author michael.schramm@gmail.com
 */
class RawImportLine implements ImportLineInterface {
	/**
	 * day the line shows up in your account
	 *
	 * @var DateTime
	 */
	protected $line_date;

	/**
	 * day the value is applied to your account
	 *  -> minus lines are usually valued the same day
	 *  -> plus lines are sometimes valued a few days later
	 *
	 * @var DateTime
	 */
	protected $value_date;

	protected $value;

	protected $payee;

	protected $category;

	protected $raw_message;

	protected $message;

	/**
	 * @return string
	 */
	public function getCategory(){
		return $this->category;
	}

	/**
	 * @param string $category
	 */
	public function setCategory($category){
		$this->category = $category;
	}

	/**
	 * @return DateTime
	 */
	public function getLineDate(){
		return $this->line_date;
	}

	/**
	 * @param DateTime $line_date
	 */
	public function setLineDate($line_date){
		$this->line_date = $line_date;
	}

	/**
	 * @return string
	 */
	public function getMessage(){
		return $this->message;
	}

	/**
	 * @param string $message
	 */
	public function setMessage($message){
		$this->message = $message;
	}

	/**
	 * @return string
	 */
	public function getPayee(){
		return $this->payee;
	}

	/**
	 * @param string $payee
	 */
	public function setPayee($payee){
		$this->payee = $payee;
	}

	/**
	 * @return string
	 */
	public function getRawMessage(){
		return $this->raw_message;
	}

	/**
	 * @param string $raw_message
	 */
	public function setRawMessage($raw_message){
		$this->raw_message = $raw_message;
	}

	/**
	 * @return double
	 */
	public function getValue(){
		return $this->value;
	}

	/**
	 * @param double $value
	 */
	public function setValue($value){
		$this->value = $value;
	}

	/**
	 * @return DateTime
	 */
	public function getValueDate(){
		return $this->value_date;
	}

	/**
	 * @param DateTime $value_date
	 */
	public function setValueDate($value_date){
		$this->value_date = $value_date;
	}
}
