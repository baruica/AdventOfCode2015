<?php

namespace spec\Day1;

use Day1\Elevator;
use Day1\InstructionParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FloorObserverSpec extends ObjectBehavior
{
    public function let(InstructionParser $parser)
    {
        $this->beConstructedWith($parser);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('Day1\FloorObserver');
    }

    public function it_implements_SplObserver()
    {
        $this->shouldImplement(\SplObserver::class);
    }

    public function it_records_instruction_position_if_floor_is_minus_one(InstructionParser $parser, Elevator $elevator)
    {
        $position = mt_rand(1, 1000);
        $parser->getInstructionPosition()->willReturn($position);
        $elevator->getFloor()->willReturn(-1);

        $this->update($elevator);

        $this->getInstructionPosition()->shouldReturn($position);
    }

    public function it_only_records_the_instruction_position_when_entering_basement_for_the_first_time(InstructionParser $parser, Elevator $elevator)
    {
        $position = mt_rand(1, 1000);
        $parser->getInstructionPosition()->willReturn($position);
        $elevator->getFloor()->willReturn(-1);

        $this->update($elevator);
        $this->getInstructionPosition()->shouldBe($position);

        $parser->getInstructionPosition()->willReturn($position * 2);
        $this->update($elevator);
        $this->getInstructionPosition()->shouldBe($position);
    }
}
