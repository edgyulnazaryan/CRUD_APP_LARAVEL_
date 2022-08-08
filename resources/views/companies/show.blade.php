@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/tmp/uploads/{{ $companies->logo }}" style="width: 100px; height: 100px;" alt="Company LOGO">

                    <div class="card-body">
                        <h5 class="card-title">{{ $companies->name }}</h5>
                        <p class="card-text">{{ $companies->website }}</p>
                        <p class="card-text">{{ $companies->email }}</p>
                        <a href="{{ route('companies.index') }}" class="btn btn-primary">Back</a>
                        <form method="POST" action="{{route('companies.destroy', $companies->id) }}"  >
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
