@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-8">
                <form action="{{ route('employees.update', $employees->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group mt-3">
                        <label for="company_id">Company</label>
                        <select name="company_id" id="company_id" class="form-control">
                            @foreach($companies as $company)
                                @if($company->id == $employees->company_id)
                                    <option selected value="{{ $company->id }}">{{ $company->name }}</option>
                                @else
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employees->first_name }}">
                    </div>

                    <div class="form-group mt-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employees->last_name }}">
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $employees->email }}">
                    </div>

                    <div class="form-group mt-3">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control" value="{{ $employees->phone }}">
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" id="submit" class="form-control btn btn-dark" value="Update Employee Data">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
