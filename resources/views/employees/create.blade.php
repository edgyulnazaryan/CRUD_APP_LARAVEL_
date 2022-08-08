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
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="form-group mt-3">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <input type="submit" id="submit" class="form-control btn btn-dark" value="Create Employee">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
