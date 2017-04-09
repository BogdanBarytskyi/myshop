@extends('main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>

                @foreach($cart as $item)
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#">

                                <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="/product//">{{$item->product_name}}</a></h4>

                            </div>
                        </div></td>
                    <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{$item->quantity}}">
                    </td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{$item->price}} </strong></td>
                    <td class="col-sm-1 col-md-1 text-center"><strong>{{ ($item->price)*($item->quantity) }}</strong></td>
                    <td class="col-sm-1 col-md-1">
                        <button type="button" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Удалить
                        </button></td>
                </tr>
                @endforeach
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Сумма покупки</h3></td>
                    <td class="text-right"><h3><strong>{{$total_price}}</strong></h3></td>
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
                        <button type="button" class="btn btn-success">
                            Оформить заказ <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection