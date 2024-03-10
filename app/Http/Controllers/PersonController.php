<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Services\PersonService;
use App\Http\Resources\PersonResource;
use App\Http\Requests\FilterPeopleRequest;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }
    
    public function index(FilterPeopleRequest $request)
    {
        $people = $this->personService->peopleList($request);
        // $people = PersonResource::collection($people['data']);
        return view('people.index', $people);
    }
}
