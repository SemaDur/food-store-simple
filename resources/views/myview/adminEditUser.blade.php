@extends('layouts.layout')

@section('content')

    <menu class="category">
        <ul class="nav nav-justified">
            <li><a href="/admin/products" class="nav-link">Dodaj produkt ili kategoriju</a></li>
            <li><a href="/editProducts" class="nav-link">Modifikovanje produkta</a></li>
            <li><a href="/trashProducts" class="nav-link">Izbaceni produkti iz prodaje</a></li>
            <li><a href="/editUser" class="nav-link">Pregled Korisnika</a></li>
        </ul>
    </menu>

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>User <b>Details</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="search-box">
                            <div class="input-group">
                                <input id="filter" type="text" class="form-control" placeholder="Filter...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Adresa</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                    <tbody class="searchable">
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>@if( $user->role_id  == 1)Admin
                                @else User
                                @endif</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>


@endsection