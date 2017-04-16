<?php declare(strict_types=1)

namespace Day1;

class Part2
{
    public function __invoke()
    {
        $elevator = new Elevator();
        $parser = new InstructionParser($elevator);
        $floorObserver = new FloorObserver($parser);

        $elevator->attach($floorObserver);

        $parser->parseInstructions(file_get_contents(__DIR__ . '/../../input/day1.txt'));

        echo 'Position of the character that causes Santa to first enter the basement : '.$floorObserver->getInstructionPosition()."\n\n";
    }
}
