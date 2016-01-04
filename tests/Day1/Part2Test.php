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
     *
     * @param string $instructions
     * @param int    $expectedPosition
     */
    public function close_causes_entering_basement_at_position_one($instructions, $expectedPosition)
    {
        $this->parser->parseInstructions($instructions);

        $this->assertEquals($expectedPosition, $this->floorObserver->getInstructionPosition());
    }

    /**
     * @return array
     */
    public function getInstructions()
    {
        return array(
            array(')', 1),
            array('()())', 5),
        );
    }
}
