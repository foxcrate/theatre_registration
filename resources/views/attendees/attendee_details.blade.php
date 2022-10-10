@extends('layouts.main')

@section('title')
    <title>Attendee Show Times</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h2>Attendee Show Times</h2>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Movie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendee->show_times as $show_time)
                            <tr>
                                <td>{{$show_time->event_day->date}} .. {{$show_time->time}}</td>
                                <td>{{$show_time->movie->title}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>

@endsection