@extends('layouts.main')

@section('title')
    <title>Event Days</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h2>Event Days</h2>
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
                            <th>Event Date</th>
                            <th>Date Added</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event_days as $event_day)
                            <tr>
                                <td>{{$event_day->date}}</td>
                                <td>{{$event_day->created_at}}</td>
                                <td>
                                    <a href="{{url('event_days').'/'.$event_day->id}}">Details</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Event Day</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="post" action="{{url('event_days')}}">
                    @csrf
                    <label>Date</label>
                    <input name="date" required type="date">

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