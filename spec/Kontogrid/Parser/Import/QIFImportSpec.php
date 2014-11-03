<?php

namespace spec\Kontogrid\Parser\Import;

use ArrayObject;
use Kontogrid\Parser\Exceptions\UnknownImportField;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QIFImportSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kontogrid\Parser\Import\QIFImport');
    }

	public function it_should_find_2_lines(){
		$qif = <<<TXT
!Type:Bank
D10.10.2014
T-100,00
CCredit Cart
MAbrechnung Nr. 000000058
Peasykreditkarte MasterCard
Ntransfer
^
D08.10.2014
T+300,00
COther
MKonto Ausgleich
PAT662344444546456456 (Max Musterman)
Ntransfer
^
TXT;
		$this->getIteratorForBinaryData($qif)->shouldHaveCount(2);
	}

	public function it_should_throw_exception_for_invalid_field(){
		$qif = <<<TXT
!Type:Bank
D10.10.2014
T-100,00
CCredit Cart
MAbrechnung Nr. 000000058
Peasykreditkarte MasterCard
Ntransfer
^
D08.10.2014
T+300,00
COther
MKonto Ausgleich
PAT662344444546456456 (Max Musterman)
Ntransfer
ZKomisch
^
TXT;
		$this->shouldThrow(new UnknownImportField("unknown row type [Z] with data [Komisch]"))->during('getIteratorForBinaryData', array($qif));
	}
}
