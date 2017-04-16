<?php declare(strict_types=1);

namespace spec\AdventOfCode2015\Day1;

use PhpSpec\ObjectBehavior;

use AdventOfCode2015\Day1\Part1;

class Part1Spec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Part1::class);
    }
}
