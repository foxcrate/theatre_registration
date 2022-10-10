@extends('layouts.main')

@section('title')
    <title>Event Days</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <!-- <h2>Event Details</h2> -->
            </div>

        

            <div class="card text-center">
                <div class="card-header">
                    Event Day Details
                </div>

                @if(session()->has('warning'))
                    <div class="alert alert-warning mt-2" role="alert">
                        {{session()->get('warning')}}
                    </div>
                @endif
                <div class="card-body">
                    <div>
                    <label>Date</label>
                    <h5 class="card-title">{{$event_day->date}}</h5>
                    </div>

                    <div class="mt-4">
                        <p>Show Times</p>
                        @foreach ($event_day->show_times as $show_time)
                        <div class="row">
                            <div class="col">
                                <p>from: {{$show_time->from}}</p>
                                <p>to: {{$show_time->from}}</p>
                            </div>
                            
                            <div class="col">
                                <form method="post" action="{{url('show_times').'/'.$show_time->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-link" type="submit" value="remove show time">
                                </form>
                            </div>
                            <hr>
                        </div>

                        @endforeach

                        @if(count($event_day->show_times) == 0)
                            <p>No Show Times</p>
                        @endif
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit Event Day
                    </button>
                    <form method="post" action="{{url('event_days').'/'.$event_day->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Remove Event Day</button>
                        
                    </form>
                </div>
            </div>

        </main>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit event day</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{url('event_days').'/'.$event_day->id}}">
                    @csrf
                    @method('PUT')  
                    <input id="event_day_date1" name="date" value="{{ date('Y-m-d', strtotime($event_day->date)) }}" type="date">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </form>
            
            </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("event_day_date").defaultValue = "2014-02-09";
    </script>

@endsection