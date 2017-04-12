@extends('main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            @if( count($cart)>0)
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Товар</th>
                    <th>Количество</th>
                    <th class="text-center">Цена</th>
                    <th class="text-center">Сумма</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>

                @foreach($cart as $item)
                <tr id="cart_{{$item->id}}">
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="/product/{{$item->product->slag}}/">
                                <img class="media-object" src="{{$item->product->images}}" style="width: 72px; height: 72px;">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="/product/{{$item->product->slag}}/">{{$item->product_name}}</a></h4>
                                <span>{{$item->product->category->name}}</span>
                            </div>
                        </div></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control" onblur="return SetQuantity('{{$item->id}}', this)" value="{{$item->quantity}}">
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong id="cart_item_price_{{$item->id}}" >{{$item->price}} </strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong id="cart_item_sum_{{$item->id}}">{{ ($item->price)*($item->quantity) }}</strong></td>
                    <td class="col-sm-1 col-md-1">
                        <button  onclick="return DeleteCart('{{$item->id}}', this)" type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Удалить
                        </button></td>
                </tr>
                @endforeach
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Сумма покупки</h3></td>
                    <td class="text-right"><h3><strong id="total_sum_cart" >{{$total_price}}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <div type="button" class="btn btn-default">
                            <a href="/catalog/" class="glyphicon glyphicon-shopping-cart"> Продолжыть покупки</a>
                        </div></td>
                    <td>
                        <a href="/order/" type="button" class="btn btn-success">
                            Оформить заказ <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                </tr>
                </tbody>
            </table>
                @else
            <h3>В корззине нет товаров</h3>
            @endif
        </div>
    </div>
</div>

@endsection