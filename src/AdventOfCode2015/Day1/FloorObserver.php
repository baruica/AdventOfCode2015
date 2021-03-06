<?php declare(strict_types=1)

namespace Day1;

class FloorObserver implements \SplObserver
{
    /** @var InstructionParser */
    private $parser;

    private $instructionPosition;

    public function __construct(InstructionParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param \SplSubject $elevator <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(\SplSubject $elevator)
    {
        if ($elevator instanceof Elevator) {
            if (-1 === $elevator->getFloor()) {
                if (null === $this->instructionPosition) {
                    $this->instructionPosition = $this->parser->getInstructionPosition();
                }
            }
        }
    }

    public function getInstructionPosition() : int
    {
        return $this->instructionPosition;
    }
}
