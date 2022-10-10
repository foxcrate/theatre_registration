@extends('layouts.main')

@section('title')
    <title>Edit Movie</title>
@endsection

@section('body')

    <div class="row">
        @include('layouts.admin_sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h2>Edit Movie</h2>
            </div>

            <form method="post" action="{{url('movies'.'/'.$movie->id)}}">
                    @csrf
                    @method('PUT')

                    <label>Title</label>
                    <input type="text" value="{{$movie->title}}" name="title">

                    <label>Ticket Cost</label>
                    <input type="number" value="{{$movie->ticket_cost}}" name="ticket_cost">

                    <button type="submit" class="btn btn-primary">Save changes</button>
                
                </form>

        </main>

    </div>

@endsection