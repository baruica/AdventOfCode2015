<?php

namespace Day1;

class Part1
{
    public function __invoke()
    {
        $instructions = file_get_contents(__DIR__ . '/../../input/day1.txt');

        $elevator = new Elevator();
        $parser = new InstructionParser($elevator);

        $parser->parseInstructions($instructions);

        echo 'Final floor : '.$elevator->getFloor()."\n\n";
    }
}