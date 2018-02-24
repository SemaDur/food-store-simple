@extends('layouts.layout')

@section('content')

        <menu class="category">
            <ul class="nav nav-justified">
                <li><a href="/admin/products" class="nav-link">Dodaj produkt ili kategoriju</a></li>
                <li><a href="/editProducts" class="nav-link">Modifikovanje produkta</a></li>
                <li><a href="#" class="nav-link">Izbaceni produkti iz prodaje</a></li>
                <li><a href="/editUser" class="nav-link">Pregled Korisnika</a></li>
            </ul>
        </menu>

        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div id="trash" class="panel-heading">Kanta za uklonjene produkte:</div>
                <div class="panel-body">

                    @forelse ($trashed as $item)
                        <div class="col-xs-10 col-sm-5 col-md-4 col-lg-3 container prod">
                            <div class="row prod_block">

                                <div class="prod_name">
                                    <span>{{$item->name}}</span>
                                </div>

                                <div>
                                    {!! Form::open(['route' => ['trash.update', $item->id], 'method' => 'PUT']) !!}
                                    {!! csrf_field() !!}
                                    {!! Form::submit('Vrati produkt', ['class' => 'btn btn-danger btn-sm btn-course']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>Nema Produkta u kanti!</h3>
                    @endforelse

                </div>
            </div>
        </div>

@endsection