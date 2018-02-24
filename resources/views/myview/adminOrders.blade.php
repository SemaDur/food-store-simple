@extends('layouts.layout')

@section('content')

    <article>

        <div class="col-xs-12">
            <div class="panel panel-default">
                <div id="add" class="panel-heading">Dashbord Narudzbe:</div>
                <div class="panel-body">

                        @if(!is_null($orders->first()))
                            <div class="container">
                                @foreach($orders as $order)
                                <div class="table-wrapper">
                                    <div class="table-title">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h2>Narucio: {{ $order->user->name }} Adresa: {{ $order->user->address }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Product:</th>
                                            <th>Status:</th>
                                            <th>Date created:</th>
                                            <th>Cost:</th>
                                        </tr>
                                        </thead>

                                            <tbody>

                                            @foreach($order->products as $product)
                                                <tr class="{{$order->status}}">

                                                    <td>
                                                        {{isset($product->name) ? $product->name : 'This product: '.$trashed->where('id', $product->id)->first()->name.' has been removed'}}
                                                    </td>
                                                    <td>{{$order->status}}</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>
                                                        {{isset($product->price) ? 'KM ' . $product->price : 'KM '. $trashed->where('id', $$product->id)->first()->price }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr style="border-top: 1px solid gray;border-bottom: 2px solid gray">
                                                <td colspan="5">
                                                    <strong>Total cost: KM {{$order->amount}}</strong>
                                                </td>
                                                <td>
                                                    @if($order->status == 'active')
                                                        {!! Form::open(['route' => ['orders.update', $order->id], 'method' => 'PUT']) !!}
                                                        {{ csrf_field() }}
                                                        {!! Form::submit('Zavrsi', ['class' => 'btn btn-primary']) !!}
                                                        {!! Form::close() !!}
                                                        {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'DELETE']) !!}
                                                        {{ csrf_field() }}
                                                        {!! Form::submit('Izbrisi', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}

                                                    @else
                                                        Order is closed
                                                    @endif
                                                </td>
                                            </tr>

                                            </tbody>
                                    </table>
                                    @endforeach
                        @else
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                                <h2>No orders</h2>
                                            </div>
                                        </div>
                        @endif
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </article>

@endsection