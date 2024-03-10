<?php

namespace App\Services;

use App\Models\Person;
use App\Http\Requests\FilterPeopleRequest;
use Illuminate\Support\Facades\Cache;

class PersonService
{
    const PER_PAGE = 20;
    const CACHED_EXPIRED = 60;
    const FILTER_PREFIX = "filtered_data_";
    
    /**
     * Retrieve a list of people based on filter criteria.
     *
     * @param  FilterPeopleRequest  $request
     * @return array
     */
    public function peopleList(FilterPeopleRequest $request): array
    {
        $year = $request->get('birth_year');
        $month = $request->get('birth_month');
        $page = $request->get('page') ?? 1;

        if ($year || $month || $page) {
            $cacheFilterKey = self::FILTER_PREFIX . $year . "_" . $month . "_" . $page;
            return Cache::remember($cacheFilterKey, self::CACHED_EXPIRED, function () use ($request) {
                return $this->filterPeople($request);
            });
        }
        
        return $this->filterPeople($request);
    }

    /**
     * Filter people based on the provided criteria.
     *
     * @param  FilterPeopleRequest  $request
     * @return array
     */
    private function filterPeople(FilterPeopleRequest $request): array
    {
        $query = Person::query();
        $result = $query->select('id', 'email_address', 'name', 'birthday', 'phone', 'ip', 'country')
            ->filterByBirthYear($request)
            ->filterByBirthMonth($request)
            ->paginate(self::PER_PAGE);

        return [
            'total_records' => Cache::get(Person::CACHE_RECORD_KEY),
            'people' => $result,
        ];
    }
}
