@extends('layouts.main')

@section('title')
    <title>Show Times</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h2>Show Times</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Create</button>
            </div>

            @if(session()->has('warning'))
                <div class="alert alert-warning mt-2" role="alert">
                    {{session()->get('warning')}}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Event Day</th>
                            <th>Movie</th>
                            <th>Attendee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($show_times as $show_time)
                            <tr>
                                <td>{{$show_time->time}}</td>
                                <td>{{$show_time->event_day->date}}</td>
                                @if($show_time->movie)
                                <td>{{$show_time->movie->title}}</td>
                                @else
                                <td>No Movie</td>
                                @endif
                                <td>{{ count($show_time->attendees) }}</td>
                                <td>
                                    <a  class="btn btn-primary" href="{{url('show_times').'/'.$show_time->id.'/'.'edit'}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{url('show_times').'/'.$show_time->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Show Time</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{url('show_times')}}">
                    @csrf
                    <label>Time</label>
                    <input name="time" required type="time">

                    <label>Event Day</label>
                    <select id="1" name="event_day_id" class="form-select" aria-label="Default select example" required>
                        <option value="">Open this select menu</option>
                            @foreach($event_days as $event_day)
                                <option value="{{$event_day->id}}">{{$event_day->date}}</option>
                            @endforeach
                    </select>

                    <label>Movie</label>
                    <select id="1" name="movie_id" class="form-select" aria-label="Default select example" required>
                        <option value="">Open this select menu</option>
                            @foreach($movies as $movie)
                                <option value="{{$movie->id}}">{{$movie->title}}</option>
                            @endforeach
                    </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                
                </form>

            </div>
            </div>
        </div>

    </div>

@endsection