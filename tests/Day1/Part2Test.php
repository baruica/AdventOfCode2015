<?php

namespace tests\Day1;

use Day1\Elevator;
use Day1\FloorObserver;
use Day1\InstructionParser;

class Part2Test extends \PHPUnit_Framework_TestCase
{
    /** @var InstructionParser */
    protected $parser;

    /** @var FloorObserver */
    protected $floorObserver;

    public function setUp()
    {
        $elevator = new Elevator();
        $this->parser = new InstructionParser($elevator);
        $this->floorObserver = new FloorObserver($this->parser);

        $elevator->attach($this->floorObserver);
    }

    /**
     * @test
     * @dataProvider getInstructions
     */
    public function close_causes_entering_basement_at_position_one(string $instructions, int $expectedPosition)
    {
        $this->parser->parseInstructions($instructions);

        static::assertEquals($expectedPosition, $this->floorObserver->getInstructionPosition());
    }

    public function getInstructions() : array
    {
        return [
            [')', 1],
            ['()())', 5],
        ];
    }
}
