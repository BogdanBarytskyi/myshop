@extends('admin.main')
@section('content')

<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/product') }}">Все товары</a></li>
            <li><a href="{{ URL::to('admin/product/create') }}">Добавить товар</a>
        </ul>
    </nav>

    <h1>Все товары</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Название</td>
            <td>Действие</td>
        </tr>
        </thead>
        <tbody>
        @foreach($product as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>


                <td>

                    <a class="btn btn-small btn-info" href="{{ URL::to('admin/product/' . $value->id . '/edit') }}">Редактировать</a>


                    {{ Form::open(array('url' => 'admin/product/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('удалить', array('class' => 'btn btn-small btn-info')) }}
                    {{ Form::close() }}

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection