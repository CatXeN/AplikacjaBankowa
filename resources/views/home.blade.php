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
                    <button onclick="window.location='{{url('/transfer')}}'" class="btn btn-icon"><i class="material-icons">payments</i>Wykonaj przelew</button>
                </div>

            </div>

            <div class="card mt-2">
                <div class="card-header">Ostatnie przelewy</div>

                <div class="card-body">
                    @foreach($transactions_history as $transaction)
                    <div class="transaction-list">
                        @if ($transaction->user_id === Auth::user()->id)
                            <div class="transaction-icon">
                                <span class="material-icons charge">attach_money</span>
                            </div>
                        @else
                            <div class="transaction-icon">
                                <span class="material-icons recognition">attach_money</span>
                            </div>
                        @endif
                        <div class="transfer-history">
                            <div>
                                @if ($transaction->user_id === Auth::user()->id)
                                    {{$transaction->recipient_name}}
                                    <b class="charge">{{$transaction->amount}} zł</b>
                                @else
                                    {{$transaction->name}}
                                    <b class="recognition">{{$transaction->amount}} zł</b>
                                @endif
                            </div>
                            <div>
                                {{$transaction->transfer_title}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button onclick="window.location='{{url('/history/all')}}'" class="btn btn-icon"><i class="material-icons">history</i>Historia przelewów</button>
            </div>

        </div>
    </div>
</div>
@endsection
