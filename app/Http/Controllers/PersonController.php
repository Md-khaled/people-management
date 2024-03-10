<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PersonService;
use App\Http\Resources\PersonResource;
use App\Http\Requests\FilterPeopleRequest;

class PersonController extends Controller
{
    protected PersonService $personService;

    /**
     * Create a new controller instance.
     *
     * @param  PersonService  $personService
     * @return void
     */
    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  FilterPeopleRequest  $request
     * @return \Illuminate\View\View
     */
    public function index(FilterPeopleRequest $request): \Illuminate\View\View
    {
        $people = $this->personService->peopleList($request);
        
        // Uncomment the line below if you want to use PersonResource
        // $people = PersonResource::collection($people['data']);
        
        return view('people.index', $people);
    }
}
