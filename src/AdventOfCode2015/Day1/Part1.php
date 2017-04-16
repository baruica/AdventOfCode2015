<?php declare(strict_types=1)

namespace Day1;

class Part1
{
    public function __invoke()
    {
        $elevator = new Elevator();
        $parser = new InstructionParser($elevator);

        $parser->parseInstructions(file_get_contents(__DIR__ . '/../../input/day1.txt'));

        echo 'Final floor : '.$elevator->getFloor()."\n\n";
    }
}
