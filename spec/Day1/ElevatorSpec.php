<?php

namespace spec\Day1;

use PhpSpec\ObjectBehavior;

use Day1\Elevator;

/**
 * @mixin \Day1\Elevator
 */
class ElevatorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Elevator::class);
    }

    public function it_starts_on_ground_floor()
    {
        $this->getFloor()->shouldReturn(0);
    }

    public function it_can_go_up()
    {
        $this->goUp();
        $this->getFloor()->shouldReturn(1);
    }

    public function it_can_go_down()
    {
        $this->goDown();
        $this->getFloor()->shouldReturn(-1);
    }

    public function it_implements_SplSubject()
    {
        $this->shouldImplement(\SplSubject::class);
    }

    public function it_notifies_when_going_up(\SplObserver $observer)
    {
        $this->attach($observer);
        $observer->update($this)->shouldBeCalled();

        $this->goUp();
    }

    public function it_notifies_when_going_down(\SplObserver $observer)
    {
        $this->attach($observer);
        $observer->update($this)->shouldBeCalled();

        $this->goDown();
    }
}
