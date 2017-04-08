@extends('main')

@section('content')

<div class="container">
    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="/catalog/">Каталог</a></li>
        <li><a href="/category/{{$product->category->id}}">{{$product->category->name}}</a></li>
        <li class="active">{{$product->name}}</li>
    </ol>

    <div class="row">
        <div class="col-xs-4 item-photo">
            <img style="max-width:100%;" src="{{$product->images}}" />
        </div>
        <div class="col-xs-5" style="border:0px solid gray">
            <!-- Datos del vendedor y titulo del producto -->
            <h1>{{$product->name}}</h1>


            <!-- Precios -->
            <h6 class="title-price"><small>Цена товара</small></h6>
            <h3 style="margin-top:0px;">{{$product->price}} {{$product->currency}}</h3>

            <div class="section" style="padding-bottom:20px;">
                <h6 class="title-attr"><small>количество</small></h6>
                <div>
                    <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                    <input value="1" />
                    <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                </div>
            </div>

            <!-- Botones de compra -->
            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Добавить в корзину</button>

            </div>
        </div>

        <div class="col-xs-9">
            <ul class="menu-items">
                <li class="active">Описание товара</li>

            </ul>
            <div style="width:100%;border-top:1px solid silver">
                <p style="padding:15px;">
                    {{$product->description}}
                </p>

            </div>
        </div>
    </div>
</div>

@endsection