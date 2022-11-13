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
                    <div>
                        <h4>Witaj, {{ Auth::user()->name }}</h4>
                    </div>

                    <div class="account-info">
                        <b>{{$bankAccount->name}}:</b>
                        <span>{{$bankAccount->number}}</span>
                    </div>

                    <div class="balance-account">
                        <b>Dostępne środki:</b>
                        <span>{{$bankAccount->balance}} zł</span>
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">Panel akcji</div>

                <div class="card-body">
                    <button class="btn btn-icon"><i class="material-icons">payments</i>Wykonaj przelew</button>
                    <button class="btn btn-icon"><i class="material-icons">history</i>Historia przelewów</button>
                    <button class="btn btn-icon"><i class="material-icons">contacts</i>Kontkaty</button>
                </div>

            </div>

            <div class="card mt-2">
                <div class="card-header">Ostatnie przelewy</div>

                <div class="card-body">

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
