@extends('layouts.app')
@section('content')
<div class="container">
    <section class="d-flex justify-content-between">
        <h1>Employee Page</h1>

        <div>
            <a href="{{ route('employees.create') }}" class="btn btn-success">Create</a>
        </div>
    </section>
    <div class="row mt-5">
        @include('employees.table')
    </div>
</div>
@endsection
