<?php

namespace App\Observers;

use App\Models\Person;
use Illuminate\Support\Facades\Cache;

class PersonObserver
{
    public function creating(Person $person)
    {
        self::updateTotalCount();
    }

    public function deleted(Person $person)
    {
        self::updateTotalCount();
    }

    public static function updateTotalCount()
    {
        $newCount = Person::totalRecordCount();
        Cache::put(Person::CACHE_RECORD_KEY, $newCount);
    }
}
