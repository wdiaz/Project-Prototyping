<?php
namespace App\Interview;

use PHPUnit\Framework\TestCase;
use App\Interview\Exception\InvalidDateTimeException;

class CalendarEventCollectionTest extends TestCase
{

    /**
     * Event cannot be created in the past
     */
    public function testInvalidEventDate()
    {
        $this->expectException(InvalidDateTimeException::class);
        $input = [
            ['title'=>'event 1', 'date' => '2015-12-29'],
            ['title'=>'event 2', 'date' => '2015-12-29']
        ];
        new CalendarEventCollection($input);
    }

    public function testInvalidTitle()
    {
        $this->expectException(\InvalidArgumentException::class);
        $input = [['title'=>'', 'date'=>'2015-10-10']];
        new CalendarEventCollection($input);
    }

    public function testInvalidDataProvided()
    {
        $this->expectException(\InvalidArgumentException::class);
        new CalendarEventCollection([]);
    }

    public function testObjectEquality()
    {
        $input = [
                    ['title'=>'event 1', 'date'=>'2018-12-29']
                ];
        $collection = new CalendarEventCollection($input);
        $testEvent = new EventCalendar('event 1', new \DateTime('2018-12-29'));
        $event = $collection->pop();
        $this->assertTrue($event->equals($testEvent));
    }

    public function testCopyObjectEquality()
    {
        $event = new EventCalendar('event 1', new \DateTime('2018-12-29'));
        $copy = EventCalendar::copyOf($event);
        $this->assertTrue($event->equals($copy));
    }

    public function testCollectionToArray()
    {
        $input = [
                    ['title'=>'event 1', 'date' => '2018-12-29'],
                    ['title'=>'event 2', 'date' => '2018-12-29']
                ];
        $collection = new CalendarEventCollection($input);
        $a = $collection->toArray();
        $this->assertNotEmpty($a);
    }

    public function testCountNumberOfEntries()
    {
        //$eventsArray = Repository::all();  Malevolent query
        /**
         * Method toArray() groups events by date so the following array will return 2 in the
         * assertion.
         * Why this form? When displaying the actual calendar day,month,year we just need to check if the current date is in
         * the events array isset(current_date); this way we prevent looping over and over again through the array to check if
         * there is a match in the events array
         */
        $input = [
            ['title'=>'event 1', 'date' => '2018-12-29'],
            ['title'=>'event 2', 'date' => '2018-12-29'],
            ['title'=>'event 2', 'date' => '2018-12-30']
        ];
        $collection = new CalendarEventCollection($input);
        $data = $collection->toArray();
        $this->assertCount(2, $data);
    }

    public function testEventExactlyAt()
    {
        $input = [['title'=>'event 1', 'date' => '2018-12-29 11:25:30']];
        $collection = new CalendarEventCollection($input);
        $event = $collection->pop();
        $this->assertSame('2018-12-29 11:25:30', $event->getDate()->format('Y-m-d H:i:s'));
    }
}
