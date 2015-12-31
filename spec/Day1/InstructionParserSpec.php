<?php

namespace spec\Day1;

use Day1\Elevator;
use PhpSpec\ObjectBehavior;

class InstructionParserSpec extends ObjectBehavior
{
    function let(Elevator $elevator)
    {
        $this->beConstructedWith($elevator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\InstructionParser');
    }

    function it_will_go_up_with_open_paren(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalled();

        $this->parseInstructions('(');
    }

    function it_will_go_down_with_close_paren(Elevator $elevator)
    {
        $this->parseInstructions(')');

        $elevator->goDown()->shouldHaveBeenCalled();
    }

    function it_comes_back_to_zero_with_open_open_close_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(2);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('(())');
    }

    function it_comes_back_to_zero_with_open_close_open_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(2);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('()()');
    }

    function it_goes_to_third_floor_with_open_open_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(3);

        $this->parseInstructions('(((');
    }

    function it_goes_to_third_floor_with_open_open_close_open_open_close_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(5);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('(()(()(');
    }

    function it_goes_to_third_floor_with_close_close_open_open_open_open_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(5);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('))(((((');
    }

    function it_goes_to_first_basement_level_with_open_close_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(1);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('())');
    }

    function it_goes_to_first_basement_level_with_close_close_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(1);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('))(');
    }

    function it_goes_to_third_basement_level_with_close_close_close(Elevator $elevator)
    {
        $elevator->goDown()->shouldBeCalledTimes(3);

        $this->parseInstructions(')))');
    }

    function it_goes_to_third_basement_level_with_close_open_close_close_open_close_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(2);
        $elevator->goDown()->shouldBeCalledTimes(5);

        $this->parseInstructions(')())())');
    }
}
