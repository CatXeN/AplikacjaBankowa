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

                    <!-- {{ __('You are logged in!') }} -->
                    <h2>{{$bankAccount->name}}</h2>
                    <p>{{$bankAccount->number}}</p>
                    <h2>Dostępne środki: {{$bankAccount->balance}}</h2>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">Panel akcji</div>

                <button type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-euro" aria-hidden="true"></span> Star
                </button>

                <i class="bi bi-1-circle-fill"></i>
            </div>
        </div>
    </div>
</div>
@endsection
