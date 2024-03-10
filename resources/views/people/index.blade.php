@extends('layouts.app')

@section('title', 'People List')

@section('content')
    <div class="mt-5">
        <h1>People List</h1>
        @include('components.people-table', ['people' => $people])
    </div>
@endsection
