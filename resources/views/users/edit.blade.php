@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Edytuj użytkownika</div>
                <div class="card-body">
                    <form method="POST" action="{{ action('App\Http\Controllers\AdminController@edit_user') }}">
                        @csrf
                        <div>
                            <label for="user_id">Id użytkownika</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="id" value="{{$user->id}}" id="user_id" readonly>
                            </div>
                        </div>

                        <div>
                            <label for="name">Imię i Nazwisko</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name">
                            </div>
                        </div>

                        <div>
                            <label for="email">E-mail</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" id="email">
                            </div>
                        </div>

                        <div>
                            <label for="balance">Balans konta</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="balance" value="{{$account->balance}}" id="balance">
                            </div>
                        </div>

                        <div>
                            <label for="date">Data dołączenia klienta</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="date" value="{{$user->created_at}}" id="date">
                            </div>
                        </div>

                        <div class="float-end">
                            <button onclick="window.location='{{url('/admin')}}'" type="button" class="btn btn-danger">Anuluj</button>
                            <button type="submit" class="btn btn-primary">Akceptuj</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
