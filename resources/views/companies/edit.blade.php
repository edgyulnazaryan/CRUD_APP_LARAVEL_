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
                <form action="{{ route('companies.update', $companies->id) }}" method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    @csrf

                    <div class="form-group mt-3">
                        <label for="name">Company Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $companies->name }}">
                    </div>

                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ $companies->email }}">
                    </div>

                    <div class="form-group mt-3">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" class="form-control" value="{{ $companies->website }}">
                    </div>

                    <div class="form-group mt-3">

                        <img src="/tmp/uploads/{{ $companies->logo }}" style="width: 100px; height: 100px;">
{{--                        <input type="hidden" name="old_image" value="{{ $companies->logo }}">--}}
                        <input type="file" name="logo" id="logo" class="form-control" value="{{ old('logo', $companies->logo) }}">
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" id="submit" class="form-control btn btn-dark" value="Update Company data">
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
