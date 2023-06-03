@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="//{{ env('APP_PATH_URL') }}/admin/books">Books</a>
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Book Edit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <form method="POST" action="//{{ env('APP_PATH_URL') }}/admin/books/{{ $data['book'][0]->id }}">
                                @csrf
                                @method('PUT')
                                <label for="title">Title:</label> <input type="text" id="title" name="title" value="{{ $data['book'][0]->title }}">
                                <br><br>
                                <label for="description">Description:</label> <textarea id="description" name="description">{{ $data['book'][0]->description }}</textarea>
                                <br><br>
                                <label for="cover_photo">Photo:</label> <input type="text" id="cover_photo" name="cover_photo" value="{{ $data['book'][0]->cover_photo }}">
                                <br><br>
                                <label for="price">Price:</label> <input type="text" id="price" name="price" value="{{ $data['book'][0]->price }}">
                                <br><br>
                                <label for="author">Author:</label> 
                                <select name="author_id" id="author">
                                    <option value="{{ $data['book'][0]->author->id }}">{{ $data['book'][0]->author->name }}</option>
                                    @foreach ($data['authors'] as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                <br><br>
                                <label for="publisher">Publisher:</label> 
                                <select name="publisher_id" id="publisher">
                                    <option value="{{ $data['book'][0]->publisher->id }}">{{ $data['book'][0]->publisher->name }}</option>
                                    @foreach ($data['publishers'] as $publishers)
                                    <option value="{{ $publishers->id }}">{{ $publishers->name }}</option>
                                    @endforeach
                                </select>
                                <br><br>
                                <input type="submit" />
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