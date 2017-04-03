@extends('main')
@section('content')

<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/product') }}">Все товары</a></li>
            <li><a href="{{ URL::to('admin/product/create') }}">Добавить товар</a>
        </ul>
    </nav>

    <h1>Добавить товар</h1>


    {{ Form::open(array('url' => '/admin/product')) }}

    <div class="form-group">
        {{ Form::label('name', 'Название') }}
        {{ Form::text('name',null, array('class' => 'form-control')) }}
    </div>


    <div class="form-group">
        {{ Form::label('price', 'Цена') }}
        {{ Form::text('price',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Описание') }}
        {{ Form::textarea('description',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('images', 'URL картинки') }}
        {{ Form::text('images',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('sort', 'Сортировка') }}
        {{ Form::number('sort',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('active', 'Активность') }}
        {{ Form::checkbox('active',null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('currency', 'Валюта') }}
        {{ Form::select('currency',array('USD'=>'USD','UAH'=>'UAH'), array('class' => 'form-control')) }}
    </div>

   <div class="form-group">
        {{ Form::label('category_id', 'Категория') }}
        {{ Form::select('category_id',$category, array('class' => 'form-control')) }}
    </div>

{{ Form::submit('Добавить товар', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@endsection