@extends('main')
@section('sitebar')

    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
        <div class="list-group">
            <h3>Каталог</h3>
            @foreach($category as $section)
                <a href="/category/{{$section->id}}/" class="list-group-item @if($active_category==$section->id)active @endif">{{$section->name}}</a>
            @endforeach
        </div>
    </div>

@endsection

@section('content')

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://www.dverimpery.com.ua/innovaeditor/assets/ru4ki_punto/RUMBA%20TL%20ABG-6.jpg" alt="...">
                <div class="carousel-caption">

                </div>
            </div>
            <div class="item">
                <img src="http://www.italiandoors.com.ua/img/1982/1974.png" alt="...">
                <div class="carousel-caption">

                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <div class="container" style="margin-top:50px;">
        <div class="row">
            @if(count($products)==0)
                <h1>В данном розделе нет товаров</h1>
            @else
                <h1>Каталог товарів</h1>
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
                                        <i class="fa fa-shopping-cart"></i><a href="#" data-id='{{$item->id}}' class="add hidden-sm">Купить</a></p>
                                    <p class="btn-details">
                                        <i class="fa fa-list"></i><a href="/product/{{$item->slag}}/" class="hidden-sm">Подробнее</a></p>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            @endif

        </div>
        <div class="text-center">
            <?php echo $products->render(); ?>
        </div>
    </div>
@endsection