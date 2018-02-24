@extends('layouts.layout')

@section('content')

    <menu class="category">
        <ul class="nav nav-justified">
            <li><a href="#add" class="nav-link">Dodaj produkt ili kategoriju</a></li>
            <li><a href="/editProducts" class="nav-link">Modifikovanje produkta</a></li>
            <li><a href="/trashProducts" class="nav-link">Izbaceni produkti iz prodaje</a></li>
            <li><a href="/editUser" class="nav-link">Pregled Korisnika</a></li>
        </ul>
    </menu>


    <div class="col-xs-16">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-sm-16 col-md-9">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Dodavanje produkta:</div>
                        <div class="panel-body add_product">

                            <form action="{{route('products.store')}}" method="POST" role="form"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @if (session('add_product'))
                                    <div class="col-xs-18">
                                        <span class="help-block">
                                            @foreach(session('add_product') as $errors)
                                                @foreach($errors as $value)
                                                    {{ $value }}
                                                @endforeach
                                            @endforeach
                                        </span>
                                    </div>
                                @endif

                                <div class="container" >
                                    <div class="table-wrapper" >
                                    <div class="row clearfix">
                                        <div class="col-15 table-responsive" >
                                            <table class="table table-striped table-bordered" id="tab_logic">
                                                <thead>
                                                <tr >
                                                    <th class="text-center">
                                                        Naziv
                                                    </th>
                                                    <th class="text-center ">
                                                        Cijena
                                                    </th>
                                                    <th class="text-center">
                                                        Deskripcija
                                                    </th>
                                                    <th class="text-center ">
                                                        Kategorija
                                                    </th>
                                                    <th class="text-center">
                                                        Slika
                                                    </th>
                                                    <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr id='addr0' data-id="0" class="hidden">
                                                    <td data-name="name">
                                                        <input id="name" type="text" name='name'  placeholder='Naziv' class="form-control" value="{{ old('name') }}" required/>
                                                    </td>
                                                    <td data-name="mail">
                                                        <input id="price" type="text" name='price' placeholder='Cijena' class="form-control" value="{{ old('price') }}" required/>
                                                    </td>
                                                    <td data-name="desc" >
                                                        <textarea  name="description" class="form-control" placeholder="Deskripcija..." required>{{ old('description') }}</textarea>
                                                    </td>

                                                    <td data-name="sel">
                                                        <select name="category_id" class="form-control">
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td data-name="img">
                                                        <div class="file-upload upload-add" >
                                                            <label>
                                                                <input type="file"  class="btn" name="image" onclick="getFileName('add')">
                                                                <span id="img-add">Upload:</span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td data-name="del">
                                                        <input type="submit" class="btn btn-primary" name="add_name" value="Spasi">
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="panel panel-primary">
                        <div id="edit" class="panel-heading">Dodaj ili ukloni kategoriju za produkte:</div>
                        <div class="panel-body">
                            @if (session('add_category'))
                                <div class="col-xs-12">
                                        <span class="help-block">
                                            @foreach(session('add_category') as $errors)
                                                @foreach($errors as $value)
                                                    {{ $value }}
                                                @endforeach
                                            @endforeach
                                        </span>
                                </div>
                            @endif

                            {!! Form::open(['route'=>'categories.store', 'method'=>'POST', 'role'=>'form']) !!}
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" name="name" class="form-control input-sm" required>
                                <span class="input-group-btn" style="margin-left: 4px">
                                    {!! Form::submit('Dodaj', ['class' => 'btn btn-primary btn-sm']) !!}
                                </span>
                            </div>
                            {!! Form::close() !!}
                            <br>


                            <ul class="list-group">
                                @foreach($categories as $category)
                                    <li class="list-group-item">
                                        {{$category->name}}
                                        {!! Form::open(['route' => ['categories.destroy', $category->id] , 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                                        {!! csrf_field() !!}
                                        {!! Form::hidden('id',  $category->id) !!}
                                        {!! Form::submit('Izbrisi', ['class' => 'buttonDanger', 'style'=>'margin-top:-100px']) !!}
                                        {!! Form::close() !!}
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection