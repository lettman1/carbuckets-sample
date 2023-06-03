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
                        <div class="col-md-12">
                            <form method="POST" action="//{{ env('APP_PATH_URL') }}/admin/books">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Book title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cover_photo">Photo:</label>
                                    <input type="text" id="cover_photo" name="cover_photo" class="form-control" placeholder="URL to cover photo">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price:</label>
                                    <input type="text" id="price" name="price" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <label for="author">Author:</label>
                                    <input type="text" name="author" class="form-control" id="author" placeholder="Author">
                                </div>
                                <div class="form-group">
                                    <label for="publisher">Publisher:</label>
                                    <input type="text" name="publisher" class="form-control" id="publisher" placeholder="Publisher">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" />
                                </div>
                                <br><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection