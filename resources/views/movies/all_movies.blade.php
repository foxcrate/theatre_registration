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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Create</button>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Ticket Cost</th>
                            <th>Date Added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{$movie->title}}</td>
                                <td>{{$movie->ticket_cost}}</td>
                                <td>{{$movie->created_at}}</td>
                                <td>
                                    <a  class="btn btn-primary" href="{{url('movies').'/'.$movie->id.'/'.'edit'}}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{url('movies').'/'.$movie->id}}">
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
                    <h5 class="modal-title" id="exampleModalLabel">Create Show Movie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="post" action="{{url('movies')}}">
                        @csrf
                        <label>Movie Title</label>
                        <input name="title" required type="text">
                        <label>Ticket Cost</label>
                        <input name="ticket_cost" required type="number">

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