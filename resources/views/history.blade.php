@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <button type="button" onclick="window.location='{{url('/history/all')}}'" class="btn btn-primary">Wszystko</button>
                    <button type="button" onclick="window.location='{{url('/history/recognition')}}'" class="btn btn-secondary">Uznania</button>
                    <button type="button" onclick="window.location='{{url('/history/charge')}}'" class="btn btn-secondary">Obciążenia</button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Historia przelewów</div>
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
                </div>

            </div>
        </div>
    </div>
@endsection
