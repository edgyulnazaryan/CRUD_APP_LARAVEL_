
<table class="table table-hover">
    <thead>
    <tr>
        <th>Company</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->company->name ?? "" }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
                <form method="POST" action="{{route('employees.destroy', $employee->id) }}"  >
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning text-white">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $employees->withQueryString()->links('pagination::bootstrap-5') !!}

