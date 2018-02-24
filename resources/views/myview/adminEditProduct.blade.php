@extends('layouts.layout')

@section('content')

    <menu class="category">
        <ul class="nav nav-justified">
            <li><a href="/admin/products" class="nav-link">Dodaj produkt ili kategoriju</a></li>
            <li><a href="#" class="nav-link">Modifikovanje produkta</a></li>
            <li><a href="/trashProducts" class="nav-link">Izbaceni produkti iz prodaje</a></li>
            <li><a href="/editUser" class="nav-link">Pregled Korisnika</a></li>
        </ul>
    </menu>

    <div class="container">

        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Product <b>Details</b></h2>
                    </div>
                    @if (session('edit'))
                        <div class="col-xs-12">
                            @foreach(session('edit') as $key => $error)
                                <span class="help-block">
                                                <strong>ERROR: Validation of meaning ({{$key}})! </strong>
                                    @foreach($error as $value)
                                        {{$value}}
                                    @endforeach
                                            </span><br>
                            @endforeach
                        </div>
                    @endif

                    <div class="col-sm-6">
                        <div class="search-box">
                            <div class="input-group">
                                <input id="filter" type="text" class="form-control" placeholder="Filter...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr  class="row">
                    <th class="col-sm-2">Slika</th>
                    <th class="col-sm-2">Naziv</th>
                    <th class="col-sm-1">Cijena</th>
                    <th class="col-sm-2">Kategorija</th>
                    <th class="col-sm-2">Deskripcija</th>
                </tr>
                </thead>
                @forelse($products as $item)
                    {!! Form::open(['route' => ['products.update', $item->id] , 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    {{ csrf_field() }}
                    <tbody class="searchable">
                    <tr class="row">
                        <td data-name="img" class="col-sm-2">
                            <img src="{{asset('images/'.$item->image)}}" width="100px" height="100px">
                        </td>
                        <td data-name="name" class="col-sm-2">
                            <input id="name" type="text" name='name'  class="form-control" value="{{$item->name}}" required/>
                        </td>
                        <td data-name="price" class="col-sm-1">
                            <input id="price" type="text" name='price' class="form-control" value="{{$item->price}}" required/>
                        </td>
                        <td data-name="desc" class="col-sm-2">
                            @if(count($item->categories) == 1)
                                <select name="category_id" class="form-control">
                                    <option value="{{$item->categories[0]->id}}">{{$item->categories[0]->name}}</option>
                                    @foreach($categories as $category)
                                        @if ($category->id != $item->categories[0]->id)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @elseif(count($item->categories) > 1)
                                {!! Form::hidden('many_categories', count($item->categories)) !!}
                                @foreach($item->categories as $v)
                                    <select name="{{'categories_'.$loop->iteration}}" class="form-control">
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                        @foreach($categories as $category)
                                            @if ($category->id != $v->id)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endforeach
                            @endif

                        </td>
                        <td data-name="desc" class="col-sm-2">
                            <textarea  name="description" class="form-control">{{$item->description}}</textarea>
                        </td>
                        <td data-name="edit">
                            <div>
                                {!! Form::submit('Spasi promjenu', ['class' => 'btn-edit pull-right']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                        <td data-name="del">
                            {!! Form::open(['route' => ['products.destroy', $item->id] , 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                            {{ csrf_field() }}
                            {!! Form::hidden('id',  $item->id) !!}
                            {!! Form::submit('Izbrisi', ['class' => 'btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                        <h3>Sorry, no products!</h3>
                    @endforelse
                    </tbody>
            </table>
        </div>

    </div>



@endsection