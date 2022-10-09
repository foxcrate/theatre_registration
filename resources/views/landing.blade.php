@extends('layouts.main')

@section('title')
    <title>Welcome</title>
@endsection

@section('body')  

    <div class="card mt-4" id="the_card">
        <div class="card-body">
            
            <div class="row mt-2">
                <h1>Welcome to our Theatre</h1>
            </div>

            <div class="row mt-4">
                <div class="col-4">
                    <a class="btn btn-primary" href="{{url('/get_attend')}}">Attend a Movie</a>
                </div>
                
            </div>

        </div>
    </div>
    


@endsection
