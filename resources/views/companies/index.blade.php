@extends('layouts.app')
@section('content')
<div class="container">
    <section class="d-flex justify-content-between">
        <h1>Company Page</h1>

        <div>
            <a href="{{ route('companies.create') }}" class="btn btn-success">Create</a>
        </div>
    </section>
    <div class="row mt-5">
        @include('companies.table')
    </div>
</div>
@endsection
