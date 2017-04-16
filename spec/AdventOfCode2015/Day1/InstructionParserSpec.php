<?php declare(strict_types=1);

namespace spec\AdventOfCode2015\Day1;

use PhpSpec\ObjectBehavior;

use AdventOfCode2015\Day1\Elevator;
use AdventOfCode2015\Day1\InstructionParser;

class InstructionParserSpec extends ObjectBehavior
{
    public function let(Elevator $elevator)
    {
        $this->beConstructedWith($elevator);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(InstructionParser::class);
    }

    public function it_goes_up_with_open_paren(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalled();

        $this->parseInstructions('(');
    }

    public function it_goes_down_with_close_paren(Elevator $elevator)
    {
        $this->parseInstructions(')');

        $elevator->goDown()->shouldHaveBeenCalled();
    }

    public function it_comes_back_to_zero_with_open_open_close_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(2);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('(())');
    }

    public function it_comes_back_to_zero_with_open_close_open_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(2);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('()()');
    }

    public function it_goes_to_third_floor_with_open_open_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(3);

        $this->parseInstructions('(((');
    }

    public function it_goes_to_third_floor_with_open_open_close_open_open_close_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(5);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('(()(()(');
    }

    public function it_goes_to_third_floor_with_close_close_open_open_open_open_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(5);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('))(((((');
    }

    public function it_goes_to_first_basement_level_with_open_close_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(1);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('())');
    }

    public function it_goes_to_first_basement_level_with_close_close_open(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(1);
        $elevator->goDown()->shouldBeCalledTimes(2);

        $this->parseInstructions('))(');
    }

    public function it_goes_to_third_basement_level_with_close_close_close(Elevator $elevator)
    {
        $elevator->goDown()->shouldBeCalledTimes(3);

        $this->parseInstructions(')))');
    }

    public function it_goes_to_third_basement_level_with_close_open_close_close_open_close_close(Elevator $elevator)
    {
        $elevator->goUp()->shouldBeCalledTimes(2);
        $elevator->goDown()->shouldBeCalledTimes(5);

        $this->parseInstructions(')())())');
    }

    public function it_starts_with_position_zero()
    {
        $this->getInstructionPosition()->shouldBe(0);
    }

    public function it_tracks_how_many_instructions_it_parses()
    {
        $instructions = '(())(())';

        $this->parseInstructions($instructions);

        $this->getInstructionPosition()->shouldBe(strlen($instructions));
    }
}
