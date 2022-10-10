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

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success mt-2" role="alert">
                    {{session()->get('success')}}
                </div>
            @endif

            <div class="row mt-4">
                <div class="col-4">
                    <!-- <a class="btn btn-primary" href="{{url('/get_attend')}}">Attend a Movie</a> -->
                    <h4>Pick A Movie To Watch</h4> 
                    <form method="post" action="{{url('get_registration_for_movie')}}">
                        @csrf
                        <select id="1" name="movie_id" class="form-select" aria-label="Default select example" required>
                            <option value="" required >Open this select menu</option>
                                @foreach($movies as $movie)
                                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                                @endforeach
                        </select>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            <button type="submit" class="btn btn-primary">Attend</button>
                        </div>
                        
                    </form>
                </div>
                
            </div>

        </div>
    </div>
    


@endsection
