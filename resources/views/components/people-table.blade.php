<x-person-filters />

<x-validation-errors :errors="$errors" />

<x-custom-pagination 
    :paginator="$people->appends(request()->query())"
    :total_records="$total_records"
/>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Phone</th>
            <th scope="col">IP</th>
            <th scope="col">Country</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($people as $person)
        <tr>
            <td>{{ $person->id }}</td>
            <td>{{ $person->email_address ?? '' }}</td>
            <td>{{ $person->name ?? '' }}</td>
            <td>{{ $person->birthday ?? '' }}</td>
            <td>{{ $person->phone ?? '' }}</td>
            <td>{{ $person->ip ?? '' }}</td>
            <td>{{ $person->country ?? '' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<x-custom-pagination 
    :paginator="$people->appends(request()->query())" 
    :total_records="$total_records"
/>
<!-- {{ $people->links() }} -->
