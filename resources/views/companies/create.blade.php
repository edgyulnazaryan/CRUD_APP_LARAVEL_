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
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-3">
                    <label for="name">Company Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="logo">Phone</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <input type="submit" id="submit" class="form-control btn btn-dark" value="Create Company">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
