<?php

namespace spec\Day1;

use PhpSpec\ObjectBehavior;

use Day1\Part1;

class Part1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Part1::class);
    }
}
