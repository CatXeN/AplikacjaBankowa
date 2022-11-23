@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if (!Auth::User()->is_admin)
                <h2>Brak uprawnień</h2>
            @else
                <div>
                    <h2>Użytkownicy:</h2>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Imie i Nazwisko</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Utworzony o</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr scope="row">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><input type="checkbox" disabled @checked($user->is_admin) "></td>
                                <td>
                                    <button type="button" class="btn btn-primary">Edytuj</button>
                                    <button type="button" class="btn btn-danger">Usuń</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
