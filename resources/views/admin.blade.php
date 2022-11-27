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
                                <td style="display: flex;">
                                    <button onclick="window.location='{{url('/users/edit/' . $user->id)}}'" type="button" class="btn btn-primary">Edytuj</button>

                                    <form method="POST" action="{{ action('App\Http\Controllers\AdminController@remove') }}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <button style="margin-left: 5px;" type="submit" class="btn btn-danger">Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
