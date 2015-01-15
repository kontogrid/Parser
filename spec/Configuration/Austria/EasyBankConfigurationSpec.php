<?php

namespace spec\Kontogrid\Parser\Configuration\Austria;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EasyBankConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kontogrid\Parser\Configuration\Austria\EasyBankConfiguration');
    }
}
