<?php

namespace App\Interview;

class EventController
{
    public function __construct()
    {
        
    }

    public function indexAction()
    {
        $collection  = new CalendarEventCollection(Repository::all());
        $events = $collection->toArray();
        $gregorio = new CustomGregorianCalendar();  // To be implemented  $gregorio = new CustomGregorianCalendar($collection)
        // Iterate calendar in a view and match date against events. That's it.
    }
}
