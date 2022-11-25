@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Wykonaj przelew') }}</div>


                    <form method="POST" action="{{ action('App\Http\Controllers\TransferController@send_money') }}" class="card-body transfer-box">
                        @csrf

                        <div>
                            <span>Moje konta:</span>
                            <select name="owner_account" class="form-select" aria-label="Default select example">
                                @foreach($bank_account as $account)
                                    <option value="{{$account->number}}">{{$account->name}} ({{$account->balance}} zł)</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <span>Tytuł przelewu:</span>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Wpisz nazwe przelewu" name="title" aria-describedby="basic-addon1">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong>Wprowadź tytuł przelewu</strong>
                                    </span>
                            @enderror
                        </div>

                        <div>
                            <span>Numer rachunku odbiorcy:</span>
                            <input type="text" class="form-control @error('recipient_number') is-invalid @enderror" placeholder="Numer rachunku odbiorcy" name="recipient_number" aria-describedby="basic-addon1" step=".01">

                            @error('recipient_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>Wprowadź numer konta odbiorcy</strong>
                                    </span>
                            @enderror
                        </div>

                        <div>
                            <span>Nazwa odbiorcy:</span>
                            <input type="text" class="form-control @error('recipient_name') is-invalid @enderror" placeholder="Wpisz nazwe odbiorcy" name="recipient_name" aria-describedby="basic-addon1">

                            @error('recipient_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>Wprowadź nazwe odbiorcy</strong>
                                    </span>
                            @enderror
                        </div>

                        <div>
                            <span>Kwota:</span>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" aria-describedby="basic-addon1" step=".01">

                            @error('amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>Niepoprwany format</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="action-box">
                            <button onclick="window.location='{{url('/home')}}'" type="button" class="btn btn-danger">Anuluj</button>
                            <button type="submit" class="btn btn-primary">Przelej</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
