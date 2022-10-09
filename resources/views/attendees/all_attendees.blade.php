@extends('layouts.main')

@section('title')
    <title>All Attendees</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h2>All Attendees</h2>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendees as $attendee)
                            <tr>
                                <td>{{$attendee->name}}</td>
                                <td>{{$attendee->email}}</td>
                                <td>{{$attendee->phone_number}}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>

@endsection