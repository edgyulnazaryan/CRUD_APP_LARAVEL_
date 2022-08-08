
<table class="table table-hover">
    <thead>
    <tr>
        <th>Company name</th>
        <th>Email</th>
        <th>Website</th>
        <th>Logo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td>
                <img src="tmp/uploads/{{ $company->logo }}" style="width: 100px; height: 100px;">
            </td>
            <td>
                <form method="POST" action="{{route('companies.destroy', $company->id) }}"  >
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-primary">Show</a>
                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning text-white">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $companies->withQueryString()->links('pagination::bootstrap-5') !!}
