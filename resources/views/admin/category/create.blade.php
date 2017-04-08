@extends('admin.main')
@section('content')

<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/category') }}">Все категории</a></li>
            <li><a href="{{ URL::to('admin/category/create') }}">Создать категорию</a>
        </ul>
    </nav>

    <h1>Create a Nerd</h1>

    {{ Form::open(array('url' => '/admin/category')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name',null, array('class' => 'form-control')) }}
    </div>

{{ Form::submit('Создать категорию', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
@endsection