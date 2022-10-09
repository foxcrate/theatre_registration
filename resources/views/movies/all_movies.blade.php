@extends('layouts.main')

@section('title')
    <title>All Movies</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h2>All Movies</h2>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Ticket Cost</th>
                            <th>Date Added</th>
                            <th>Number Of attendee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{$movie->title}}</td>
                                <td>{{$movie->ticket_cost}}</td>
                                <td>{{$movie->created_at}}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>

@endsection