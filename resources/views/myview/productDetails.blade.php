@extends('layouts.layout')

@section('content')

    <article>

        <div class="col-sm-3">
            <div class="col-item">
                <div class="photo">
                    <img src="{{ asset('images/'.$product->image) }}"  class="img-responsive" alt="a" />
                </div>
                <div class="info">
                    <div class="row">
                        <div class="price col-md-6">
                            <h5>
                                {{ $product->name }}</h5>
                            <h5 class="price-text-color">
                                Cijena: KM {{ $product->price }}</h5>
                        </div>
                        <div class="rating hidden-sm col-md-6">
                            <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                            </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                            </i><i class="fa fa-star"></i>
                        </div>
                    </div>
                    <div class="separator clear-left">
                        <p class="btn-add">
                            <button type="button" class="btn btn-sm btn-course" onclick="addToCart({{ $product->id }})">Dodaj u korpu</button>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </article>

@endsection