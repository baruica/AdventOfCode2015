<?php

namespace spec\Day1;

use PhpSpec\ObjectBehavior;

class ElevatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Day1\Elevator');
    }

    function it_starts_on_ground_floor()
    {
        $this->getFloor()->shouldReturn(0);
    }

    function it_can_go_up()
    {
        $this->goUp();
        $this->getFloor()->shouldReturn(1);
    }

    function it_can_go_down()
    {
        $this->goDown();
        $this->getFloor()->shouldReturn(-1);
    }

    function it_implements_SplSubject()
    {
        $this->shouldImplement(\SplSubject::class);
    }

    function it_notifies_when_going_up(\SplObserver $observer)
    {
        $this->attach($observer);
        $observer->update($this)->shouldBeCalled();

        $this->goUp();
    }

    function it_notifies_when_going_down(\SplObserver $observer)
    {
        $this->attach($observer);
        $observer->update($this)->shouldBeCalled();

        $this->goDown();
    }
}
