<?php

namespace Kontogrid\Parser\Import;

use ArrayObject;
use DateTime;
use Kontogrid\Parser\Exceptions\InvalidImportFile;
use Kontogrid\Parser\Exceptions\UnknownImportField;
use Kontogrid\Parser\Import\Line\RawImportLine;
use Kontogrid\Parser\Interfaces\ImportFileInterface;
use Kontogrid\Parser\Interfaces\ImportLineInterface;

/**
 * @author michael.schramm@gmail.com
 */
class QIFImport implements  ImportFileInterface {

	public function getFileExtension(){
		return 'QIF';
	}

	public function getDescription(){
		return <<<TXT
Quicken Interchange Format
TXT;

	}

	/**
	 * split the file into line items
	 *
	 * @param mixed $binary
	 * @return ImportLineInterface[]|ArrayObject
	 */
	public function getIteratorForBinaryData($binary){
		$binary = explode("\n", $binary);

		if(stripos(array_shift($binary), '!Type:')!==0){
			throw new InvalidImportFile('QIF Files start with !Type declaration');
		}

		$list = new ArrayObject();
		$line = new RawImportLine();

		foreach($binary as $row){
			if(empty($row)){
				continue;
			}

			$data = substr($row, 1);

			switch(strtoupper($row[0])){
				case '^':
					$list->append($line);
					$line = new RawImportLine();
					break;

				case 'D': // Date
					$date = new DateTime($data);
					$line->setLineDate($date);
					$line->setValueDate($date);
					break;

				case 'T': // Amount
					$line->setValue((double)$data);
					break;

				case 'C': // Category
					$line->setCategory($data);
					break;

				case 'M': // Message
					$line->setRawMessage($data);
					break;

				case 'P': // Payee
					$line->setPayee($data);
					break;

				case 'N': // Mode
					// TODO mode!?!?
					break;

				default:
					throw new UnknownImportField('unknown row type ['.$row[0].'] with data ['.$data.']');
			}
		}

		return $list;
	}
}
