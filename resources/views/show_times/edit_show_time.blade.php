@extends('layouts.main')

@section('title')
    <title>Event Days</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <h4>Edit Show Time</h4> 
            <form method="post" action="{{url('show_times').'/'.$show_time->id}}">
                @csrf
                @method('PUT')
                
                <label>From</label>
                <input name="from" required value="{{$show_time->from}}" required type="time">

                <label>To</label>
                <input name="to" required value="{{$show_time->to}}" required type="time">

                <label>Event Day</label>
                <select id="1" name="event_day_id" class="form-select" aria-label="Default select example" required>
                    alo
                    <option value="">Open this select menu</option>
                        @foreach($event_days as $event_day)
                            @if($show_time->event_day->date == $event_day->date)
                                <option selected value="{{$event_day->id}}">{{$event_day->date}}</option>
                            @else
                                <option value="{{$event_day->id}}">{{$event_day->date}}</option>
                            @endif
                        @endforeach
                </select>

                <label>Movie</label>
                <select id="1" name="movie_id" class="form-select" aria-label="Default select example" required>
                    <option value="">Open this select menu</option>
                        @foreach($movies as $movie)
                            @if($show_time->movie->id == $movie->id)
                            <option selected value="{{$movie->id}}">{{$movie->title}}</option>
                            @else
                            <option value="{{$movie->id}}">{{$movie->title}}</option>
                            @endif
                            
                        @endforeach
                </select>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            
            </form>

        </main>
    </div>

@endsection