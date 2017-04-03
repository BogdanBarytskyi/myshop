@extends('main')

@section('content')
    <h1>Каталог товарів</h1>

<div class="container" style="margin-top:50px;">
    <div class="row">
        @foreach($products as $indexkey => $item)

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="col-item">
                <div class="post-img-content">
                    <img src="{{$item->images}}" class="img-responsive" />
                </div>
                <div class="info">
                    <div class="row">
                        <div class="price col-md-6">s
                            <h5> {{$item->name}}</h5>
                        </div>
                        <div class="rating hidden-sm col-md-6">
                            <h5 class="price-text-color">{{$item->price}}</h5>
                        </div>
                    </div>
                    <div class="separator clear-left">
                        <p class="btn-add">
                            <i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm">Купить</a></p>
                        <p class="btn-details">
                            <i class="fa fa-list"></i><a href="/product/{{$item->slag}}/" class="hidden-sm">Подробнее</a></p>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
        <div class="text-center">
            <?php echo $products->render(); ?>
        </div>
</div>
@endsection