@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br /><br />
                    @can('create', \App\Models\Book::class)
                        <a href="//{{ env('APP_PATH_URL') }}/admin/books">Books</a>
                        <br><br>
                    @endcan
                    
                    @can('create', \App\Models\Loan::class)
                        <a href="//{{ env('APP_PATH_URL') }}/user/books">Browse Books</a>
                        <br><br>
                        <a href="//{{ env('APP_PATH_URL') }}/user/loans">Borrowed Books</a>
                    @endcan


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
