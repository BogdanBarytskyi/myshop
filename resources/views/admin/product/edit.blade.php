@extends('main')
@section('content')

<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/product') }}">Все товары</a></li>
            <li><a href="{{ URL::to('admin/product/edit') }}">Редактировать товар</a>
        </ul>
    </nav>

    <h1>Редактировать товар{{$product->name }}</h1>

    {{ Form::model($product, array('route' => array('admin.product.update', $product->id), 'method' => 'PUT')) }}


    <div class="form-group">
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name',$product->name, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Цена') }}
        {{ Form::text('price',$product->price, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Описание') }}
        {{ Form::textarea('description',$product->description, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('images', 'URL картинки') }}
        {{ Form::text('images',$product->imges, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('sort', 'Сортировка') }}
        {{ Form::number('sort',$product->sort, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('active', 'Активность') }}
        {{ Form::checkbox('active',$product->active, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('currency', 'Валюта') }}
        {{ Form::select('currency',array('USD'=>'USD','UAH'=>'UAH'), $product->currency, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('category_id', 'Категория') }}
        {{ Form::select('category_id',$category, $product->category_id, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Редактировать товар', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
@endsection