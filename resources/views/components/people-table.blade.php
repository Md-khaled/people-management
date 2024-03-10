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
        @forelse ($people as $person)
        <tr>
            <td>{{ $person->id }}</td>
            <td>{{ $person->email_address ?? '' }}</td>
            <td>{{ $person->name ?? '' }}</td>
            <td>{{ $person->birthday ?? '' }}</td>
            <td>{{ $person->phone ?? '' }}</td>
            <td>{{ $person->ip ?? '' }}</td>
            <td>{{ $person->country ?? '' }}</td>
        </tr>
        @empty
        <tr><td colspan="7"><h2 class="text-center">Record Not Exist</h2></td></tr>
        @endforelse
    </tbody>
</table>

<x-custom-pagination 
    :paginator="$people->appends(request()->query())" 
    :total_records="$total_records"
/>
<!-- {{ $people->links() }} -->
