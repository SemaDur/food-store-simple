@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h1><b>{{ $userid->name }}</b></h1>
                    </div>
                </br>
                    <ul class="list-group">
                        <li ><p>Moji podaci:</p></li>
                        <li class="list-group-item  active"><p><b>Email:</b> {{ $userid->email }}</p></li>
                        <form action="{{route('user.update')}}" method="POST" role="form">
                        @csrf
                            <li class="list-group-item">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Adresa:</span>
                                        <input id="address" type="text" name='address' class="form-control" value="{{$userid->address}}" required/>

                                    </div>
                            </li>
                            <span class="input-group-btn">
                                {!! Form::submit('Spasi promjenu', ['class' => 'btn btn-secondary']) !!}
                            </span>
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        @if(!is_null($orders->first()))
            <div class="container">

                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Moje <b>Narudzbe</b></h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Produkt:</th>
                            <th>Status:</th>
                            <th>Datum:</th>
                            <th>Cijena:</th>
                        </tr>
                        </thead>
                        @foreach($orders as $order)
                            <tbody>

                            @foreach($order->products as $product)
                                <tr class="{{$order->status}}">
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        {{$product->price}} KM
                                    </td>

                                </tr>
                            @endforeach

                            <tr style="border-top: 1px solid gray;border-bottom: 2px solid gray">
                                <td colspan="5">
                                    <strong>Total cost: KM {{$order->amount}}</strong>
                                </td>
                                <td>
                                    @if($order->status == 'active')
                                        Narudzba u toku
                                    @else
                                        Isporuceno
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
    </div>

    @endif

@endsection