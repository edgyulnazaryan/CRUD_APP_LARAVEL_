@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 18rem;">

                    <div class="card-body">
                        <h2 class="card-title">{{ $employees->company->name }}</h2>
                        <h5 class="card-title"><strong>First Name : </strong>{{ $employees->first_name }}</h5>
                        <p class="card-text"><strong>Last Name : </strong> {{ $employees->last_name }}</p>
                        <p class="card-text"><strong>E-Mail : </strong>{{ $employees->email }}</p>
                        <p class="card-text"><strong>Phone : </strong>{{ $employees->phone }}</p>
                        <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
