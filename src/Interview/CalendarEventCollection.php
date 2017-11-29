<?php

namespace App\Interview;
use Prophecy\Exception\InvalidArgumentException;

class CalendarEventCollection
{
    private $events;

    /**
     * CalendarEventCollection constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
            $this->validateInputNotEmpty($data);
            foreach ($data as $idx => $event) {
                $this->events [] = new EventCalendar($event['title'] , new \DateTime($event['date']));
            }
    }

    /**
     * @return mixed|void
     */
    public function getEvents() : array
    {
        $events = [];
        foreach($this->events as $event)
        {
            $events [] = $event;
        }
        return $events;
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        $events = [];
        foreach($this->events as $event)
        {
            $events [$event->getDate()->format('Y-m-d')][] = $event;
        }
        return $events;
    }

    /**
     * @return EventCalendar
     */
    public function pop() : EventCalendar
    {
        return array_pop($this->events);
    }

    public function push(EventCalendar $calendar)
    {
        try {
            array_push($this->events, $calendar);
        } catch (\Exception $ex) {
            printf("Unable to push object. Error %s\n", $ex->getMessage());
        }
        return true;
    }
    /**
     * @param $data
     * @return bool
     */
    private function validateInputNotEmpty($data) : bool
    {
        if(empty($data)) {
            throw new InvalidArgumentException("Invalid Argument Provided");
        }
        return true;
    }
}
