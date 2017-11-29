<?php

namespace App\Interview;
use App\Interview\Exception\InvalidDateTimeException;

class EventCalendar
{
    private $title;

    private $eventDate;

    /**
     * EventCalendar constructor.
     * @param $title
     * @param \DateTime $eventDate
     */
    public function __construct($title, \DateTime $eventDate)
    {
        $this->validateInput($title, $eventDate);
        $this->title = $title;
        $this->eventDate = $eventDate;
    }

    /**
     * @param $title
     * @param \DateTime $eventDate
     * @throws InvalidDateTimeException
     */
    private function validateInput($title, \DateTime $eventDate) : void
    {
        if(empty($title)) {
            throw new \InvalidArgumentException("Invalid title");
        }

        $todayDate = new \DateTime();
        if($eventDate < $todayDate) {
            throw  new InvalidDateTimeException(
                    sprintf("Events cannot be created for past dates")
                );
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime
     */
    public function getDate() : \DateTime
    {
        return $this->eventDate;
    }

    /**
     * @param EventCalendar $event
     * @return bool
     */
    public function equals(EventCalendar $event) : bool
    {
        if( $this->title == $event->getTitle() &&
            $this->eventDate->format('Y-m-d H:i:s') == $event->getDate()->format('Y-m-d H:i:s') &&
            $this->eventDate->getTimezone()->getName() === $event->getDate()->getTimezone()->getName()
            ) {
            return true;
        }
        return false;
    }

    /**
     * @param EventCalendar $event
     * @return EventCalendar
     */
    public function copyOf(EventCalendar $event) : EventCalendar
    {
        return new self(
            $event->getTitle(),
            $event->getDate()
        );
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            $this->getTitle(),
            $this->getDate()
        );
    }
}