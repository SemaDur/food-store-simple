@extends('layouts.layout')

@section('content')


    <article>

        <div id="success"></div>

        <div class="row">
        @forelse ($products as $item)

                    <div class="col-sm-3">
                        <div class="col-item">
                            <div class="photo">
                                <img src="{{ asset('images/'.$item->image) }}" class="img-responsive"  height="155px" width="155"/>
                            </div>
                            <div class="info">
                                <div class="col-item">
                                    <div>
                                        <p> Naziv: {{$item->name}}</p>
                                        <p> Cijena: KM{{$item->price}}</p>
                                    </div>

                                </div>
                                <div class="separator clear-left">
                                    <p class="btn-add">
                                        <button type="button" class="btn btn-danger btn-sm btn-course" onclick="addToCart({{$item->id}})">Dodaj</button></p>
                                    <p class="btn-details">
                                        <i class="fa fa-list"></i><a href="{{route('details', $item->id)}}" class="hidden-sm">Vise info!</a></p>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>

        @empty
            <h3>Nepostoji product u ovoj kategoriji!</h3>
        @endforelse
        </div>

    </article>

@endsection