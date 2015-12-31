<?php

namespace Day1;

class InstructionParser
{
    private $instructionPosition = 0;

    /**
     * @var Elevator
     */
    private $elevator;

    public function __construct(Elevator $elevator)
    {
        $this->elevator = $elevator;
    }

    public function parseInstructions($instructions)
    {
        foreach (str_split($instructions) as $instruction) {
            if ('(' === $instruction) {
                $this->instructionPosition++;
                $this->elevator->goUp();
            } elseif (')' === $instruction) {
                $this->instructionPosition++;
                $this->elevator->goDown();
            }
        }
    }

    public function getInstructionPosition()
    {
        return $this->instructionPosition;
    }
}
