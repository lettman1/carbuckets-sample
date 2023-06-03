@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="//{{ env('APP_PATH_URL') }}/user/books">Browse Books</a>
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Book Show') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                Title: {{ $data['book'][0]->title }}
                                <br><br>
                                Description: {{ $data['book'][0]->description }}
                                <br><br>
                                Price: {{ $data['book'][0]->price }}
                                <br><br>
                                Author: {{ $data['book'][0]->author->name }}
                                <br><br>
                                Publisher: {{ $data['book'][0]->publisher->name }}
                            </p>
                                
                            <form method="POST" action="//{{ env('APP_PATH_URL') }}/user/loan/books/{{ $data['book'][0]->id }}">
                                @csrf
                                <input type="submit" value="Borrow" class="btn btn-success" />
                                <br><br>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ $data['book'][0]->cover_photo }}" style="max-width: 200px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection