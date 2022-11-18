@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Wykonaj przelew') }}</div>

                    <div class="card-body transfer-box">
                        <b>Tytuł przelewu</b>
                        <input placeholder="Tytuł przelewu">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
