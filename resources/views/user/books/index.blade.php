@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="//{{ env('APP_PATH_URL') }}/home">Home</a>
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Books') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Books List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data['books'] as $book)
                                        <tr>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author->name }}</td>
                                            <td>
                                                <a href="//{{ env('APP_PATH_URL') }}/user/books/{{ $book->id }}" class="btn btn-info btn-circle btn-sm">
                                                    <i class="fas fa-eye text-white"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script>
                        $( document ).ready(function() {
                            let table = new DataTable('#dataTable');
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection